<?php
$path = $_SERVER['PHP_SELF'];
$pieces = explode("/", $path);
$folder = $pieces[1];

require_once($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/inc/loader.inc.php");

$rights=check_user_rights();
if($rights['leisti_perziureti']!=1) header("Location: $GLOBALS[url_path]main/index.php?redirected=1");

if (isset($_GET['id'])) $id = $_GET['id'];
else if(isset($_POST['id'])) $id = $_POST['id'];

if(!isset($id) && $rights['leisti_kurti']!=1) header("Location: $GLOBALS[url_path]main/index.php?redirected=1");

if (isset($id) && $id!=0) {
    if (!empty($_POST)) {
        if($_POST['delete']==1) {
            DeleteField($mysqli, $id, "users", true);
        
        }
        else {
            unset($_POST['id']);
            unset($_POST['delete']);
            unset($_POST['hidden_note_id']);
            unset($_POST['edit_note_content']);
            unset($_POST['item_id']);
            $user_arr = $_POST;
            if(!isset($rights['pagrindiniai_duomenys']))
                UpdateField($mysqli, $user_arr, "users", true, $id, true);
        }
    }
} else {
    if (!empty($_POST)) {
        unset($_POST['hidden_note_id']);
        unset($_POST['edit_note_content']);
        unset($_POST['item_id']);
        unset($_POST['id']);
        unset($_POST['delete']);
        $user_arr = $_POST;
        $id = InsertField($mysqli, $user_arr, "users", true, true);
        header("Location: $GLOBALS[url_path]users/user.php?id=$id");
    }
}
if(isset($id))
    $user_arr = mfa($mysqli, "SELECT * from users where id='$id'");
if (isset($user_arr)) $user_exists=1;
else $user_exists=0;

if(isset($_FILES[file][name]) && $_FILES[file][name]!="") {
    $file_arr = $_FILES[file];
    $response = insert_file("users_files", "users_id", $id, $file_arr);
    if($response=="success") $file_message="Jūsų failas sėkmingai įkeltas.";
    else if($response=="duplicate") $file_message="Jūsų keliamas failas su tokiu pavadinimu jau egzistuoja.";
    else if($response=="too_large") $file_message="Jūsų keliamas failas per didelis!";
    else if($response=="error_uploading") $file_message="Įkeliant Jūsų failą į serverį įvyko klaida!";
}
$files=mfa_kaip_array($mysqli, "SELECT * from users_files where users_id='$id'");
?>

<!DOCTYPE html>
<html>
<head>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/inc/head.inc.php"); ?>
    <title>InfoTeam - Vartotojo profilis</title>
    <style>
        .toast {
            opacity: 1 !important;
        }
    </style>
    <script>
        function add_user_note(id) {
            var pastaba;
            pastaba = document.getElementById("add_note").value;
            if(!pastaba || pastaba==""){
                toastr.error("Neįvedėte pastabos!");
            }
            else {
                $.post("<?= $GLOBALS['url_path'] ?>/ajax/ajax_functions_return.php", {
                        'do': "add_user_note_ajax",
                        'id': id,
                        'note': pastaba
                    }
                    , function (data) {
                        data = JSON.parse(data);
                        $('#pastabos_content').html(data.text);
                        document.getElementById("add_note").value="";
                        toastr.success("Pastaba įvesta!");
                    });
            }
        }
        function delete_user_note(note_id, id){
            $.post("<?= $GLOBALS['url_path'] ?>/ajax/ajax_functions_return.php", {
                    'do': "delete_user_note_ajax",
                    'id': id,
                    'note_id': note_id
                }
                , function (data) {
                    data = JSON.parse(data);
                    $('#pastabos_content').html(data.text);
                    document.getElementById("add_note").value="";
                    toastr.success("Pastaba ištrinta!");
                });
        }
        function edit_user_note(){
            var note_content = $('#edit_note_content').val();
            var note_id = $('#hidden_note_id').val();
            var item_id = $('#item_id').val();
            $.post("<?= $GLOBALS['url_path'] ?>/ajax/ajax_functions_return.php", {
                    'do': "edit_user_note_ajax",
                    'note_id': note_id,
                    'id': item_id,
                    'note_content': note_content
                }
                , function (data) {
                    data = JSON.parse(data);
                    $('#pastabos_content').html(data.text);
                    document.getElementById("add_note").value="";
                    toastr.success("Pastaba pakeista!");
                });
        }
    </script>
</head>
<body id="page-top">
<?php require($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/view/header.php"); ?>
<div>
<form name="form" id="form" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <input type="hidden" name="id" id="id" value="<?php if(isset($id)) echo $id ;?>">
    <div id="wrapper">
        <?php require($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/view/sidebar.php"); ?>
        <?php if(isset($id)) echo "<input type=\"hidden\" name=\"id\" id=\"id\" value=\"$id\"> <input type='hidden' name='delete' id='delete' value='0'>";?>
        <div id="content-wrapper">

            <div class="container-fluid">

                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?php echo $GLOBALS['url_path'] . "main"; ?>">InfoTeam</a>
                    </li>
                    <li class="breadcrumb-item">Vartotojai</li>
                    <?php if($user_exists) {?> <li class="breadcrumb-item active"><?php echo $user_arr['user_name']?></li>
                    <?php } else echo "<li class=\"breadcrumb-item active\">Kurti naują vartotoją</li>"; ?>
                </ol>
                <?php
                if(isset($file_message)){
                    echo "<div class='alert alert-primary' role='alert'>$file_message</div>";
                }
                ?>
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        <?php if($user_exists) {?> Vartotojas: <b><?php echo $user_arr['user_name']?></b>
                        <?php } else echo "Naujo vartotojo kūrimas"; ?>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <h5><span class="group_name">Vartotojo informacija</span></h5>
                            <hr>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-2">
                                    <label for="user_name">Slapyvardis:</label>
                                    <input type="text" class="form-control" id="user_name" name="user_name" required="required"
                                           value="<?php if(isset($user_arr)) echo $user_arr["user_name"]; ?>" <?php if(isset($rights['pagrindiniai_duomenys'])) echo $rights['pagrindiniai_duomenys']; ?>>
                                </div>
                                <div class="col-md-2">
                                    <label for="password">Slaptažodis:</label>
                                    <input type="text" class="form-control" id="password" name="password" required="required"
                                           value="<?php if(isset($user_arr)) echo $user_arr["password"]; ?>" <?php if(isset($rights['pagrindiniai_duomenys'])) echo $rights['pagrindiniai_duomenys']; ?>>
                                </div>
                                <div class="col-md-2">
                                    <label for="role_id">Rolė:</label>
                                    <select name="role_id" id="role_id" form="form"
                                            class="form-control" <?php if(isset($rights['pagrindiniai_duomenys'])) echo $rights['pagrindiniai_duomenys']; ?>><?php if(isset($user_arr)) $role=$user_arr['role_id']; else $role="0"; echo positions_in_club_list($role, false);  ?></select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group space_before_group">
                            <h5><span class="group_name">Asmeninė informacija</span></h5>
                            <hr>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-2">
                                    <label for="name">Vardas:</label>
                                    <input type="text" class="form-control" id="name" name="name" required="required"
                                           value="<?php if(isset($user_arr)) echo $user_arr["name"]; ?>" <?php if(isset($rights['pagrindiniai_duomenys'])) echo $rights['pagrindiniai_duomenys']; ?>>
                                </div>
                                <div class="col-md-2">
                                    <label for="surname">Pavardė:</label>
                                    <input type="text" class="form-control" id="surname" name="surname" required="required"
                                           value="<?php if(isset($user_arr)) echo $user_arr["surname"]; ?>" <?php if(isset($rights['pagrindiniai_duomenys'])) echo $rights['pagrindiniai_duomenys']; ?>>
                                </div>
                                <div class="col-md-2">
                                    <label for="personal_code">Asmens kodas:</label>
                                    <input type="text" class="form-control" id="personal_code" name="personal_code"
                                           value="<?php if(isset($user_arr)) echo $user_arr["personal_code"]; ?>" <?php if(isset($rights['pagrindiniai_duomenys'])) echo $rights['pagrindiniai_duomenys']; ?>>
                                </div>
                                <div class="col-md-2">
                                    <label for="birth_date">Gimimo data:</label>
                                    <input type="text" id="birth_date" name="birth_date" class="form-control datepicker"
                                           value="<?php if(isset($user_arr)) echo $user_arr["birth_date"]; ?>" <?php if(isset($rights['pagrindiniai_duomenys'])) echo $rights['pagrindiniai_duomenys']; ?>>
                                </div>
                                <div class="col-md-2">
                                    <label for="country">Šalis:</label>
                                    <select name="country" id="country" form="form"
                                            class="form-control" <?php if(isset($rights['pagrindiniai_duomenys'])) echo $rights['pagrindiniai_duomenys']; ?>><?php if(isset($user_arr)) $country=$user_arr['country']; else $country="0"; echo countries_list($country);  ?></select>
                                </div>
                                <div class="col-md-2">
                                    <label for="email">El. paštas:</label>
                                    <input type="text" class="form-control" id="email" name="email"
                                           value="<?php if(isset($user_arr)) echo $user_arr["email"]; ?>" <?php if(isset($rights['pagrindiniai_duomenys'])) echo $rights['pagrindiniai_duomenys']; ?>>
                                </div>
                                <div class="col-md-2">
                                    <label for="mob_number">Tel. nr.:</label>
                                    <input type="text" class="form-control" id="mob_number" name="mob_number"
                                           value="<?php if(isset($user_arr)) echo $user_arr["mob_number"]; ?>" <?php if(isset($rights['pagrindiniai_duomenys'])) echo $rights['pagrindiniai_duomenys']; ?>>
                                </div>
                            </div>
                        </div>
                        <div class="form-group space_before_group">
                            <h5><span class="group_name">Darbuotojo informacija</span></h5>
                            <hr>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-2">
                                    <label for="working">Dirba:</label>
                                    <select name="working" id="working" form="form"
                                            class="form-control" <?php if(isset($rights['pagrindiniai_duomenys'])) echo $rights['pagrindiniai_duomenys']; ?>><?php if(isset($user_arr)) $dirba=$user_arr['working']; else $dirba="-1"; echo taip_ne_list($dirba, $false, NULL);  ?></select>
                                </div>
                            </div>
                        </div>
                        <?php if(isset($user_arr)){ ?>
                        <div class="form-group space_before_group">
                            <h5><span class="group_name">Pastabos</span></h5>
                            <hr>
                        </div>
                        <div class="form-group">
                            <div class='form-row'>
                                <div class="col-md-8">
                                    <input type="text" id="add_note" class="form-control" placeholder="Jūsų pastaba...">
                                </div>
                                <div class="col-md-4">
                                    <a class="btn btn-primary btn-block" style="color:white"
                                       onclick='add_user_note("<?php echo $id; ?>")'>PRIDĖTI PASTABĄ</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <div id="pastabos_content">
                                    <?php echo format_users_notes($mysqli, $id); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Failai</h5>
                            <hr>
                        </div>
                        <div class="form-group">
                            <div class='form-row'>
                                <b style="margin-left:5px;">Prisegti failai: </b>
                                <?php
                                foreach($files as $file){
                                    $file_name=str_replace("uploads/","",$file[file_path]);
                                    echo "<a href='$GLOBALS[url_path]$file[file_path]' target='_blank' style='float:left; margin-left:5px;'>$file_name</a>";
                                }
                                ?>
                            </div>
                            <div class='form-row'>
                                <div class="col-md-8">
                                    <b>Pasirinkite norimą prisegti failą:</b>
                                    <input type="file" name="file" id="file">
                                </div>
                                <div class="col-md-4">
                                    <input type='submit' class='btn btn-primary btn-block' value='Pridėti failą'>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <hr>
                        <input class='btn btn-primary btn-block' style="<?php if(isset($rights['pagrindiniai_duomenys'])) echo 'display:none';?>" id="saveButton" type='submit' value='Išsaugoti'>
                       <?php if(isset($user_arr) && $rights['leisti_trinti']==1) { ?> <a class='btn btn-primary btn-block btn-danger' onclick="document.getElementById('delete').value=1; document.getElementById('saveButton').click();" style="color:white">Trinti vartotoją</a> <?php } ?>
                    </div>
                        <!-- /.content-wrapper -->
                    <div class="modal fade" id="edit_user_note" tabindex="-1" role="dialog" aria-labelledby="edit_item_noteLabel" aria-hidden="true">
                        <input type="hidden" id="hidden_note_id" name="hidden_note_id">
                        <input type="hidden" id="item_id" name="item_id">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="edit_item_noteLabel">Redaguoti pastabą</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="edit_note_content" class="col-form-label">Pastaba:</label>
                                        <input type="text" class="form-control" id="edit_note_content">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Uždaryti</button>
                                    <button onclick="edit_user_note()" type="button" class="btn btn-primary" data-dismiss="modal">Išsaugoti</button>
                                </div>
                            </div>
                        </div>
                    </div>
</form>
</div>
<?php require($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/view/footer.php"); ?>
<!-- /#wrapper -->
<?php require($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/inc/scripts.inc.php"); ?>
<script>
    $('#edit_user_note').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var notes = button.data('notes') // Extract info from data-* attributes
        var id = button.data('id') // Extract info from data-* attributes
        var item_id = button.data('item_id') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('input[id="hidden_note_id"]').val(id);
        modal.find('input[id="edit_note_content"]').val(notes);
        modal.find('input[id="item_id"]').val(item_id);
    })
</script>
</body>

</html>

