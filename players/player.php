<?php
$path = $_SERVER['PHP_SELF'];
$pieces = explode("/", $path);
$folder = $pieces[1];

require_once($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/inc/loader.inc.php");

if (isset($_GET['id'])) $id = $_GET['id'];
else if(isset($_POST['id'])) $id = $_POST['id'];
if (isset($id) && $id!=0) {
    if (!empty($_POST)) {
        if($_POST['delete']==1) {
            DeleteField($mysqli, $id, "players", true);
            ?>
            <script>
                window.location = "<?php echo $GLOBALS['url_path'] . "players/players.php"; ?>";
            </script>
            <?php
        }
        else {
            unset($_POST['id']);
            unset($_POST['delete']);
            unset($_POST['hidden_note_id']);
            unset($_POST['edit_note_content']);
            unset($_POST['item_id']);
            $item_arr = $_POST;
            if(!isset($item_arr['team_id']) || $item_arr['team_id']=="" || $item_arr['team_id']=="0") $item_arr['team_id']="NULL";
            UpdateField($mysqli, $item_arr, "players", true, $id, true);
        }
    }
} else {
    if (!empty($_POST)) {
        unset($_POST['hidden_note_id']);
        unset($_POST['edit_note_content']);
        unset($_POST['item_id']);
        $item_arr = $_POST;
        $exist_player_with_personal_code=check_player_by_personal_code($mysqli, $item_arr[personal_code]);
        if(is_array($exist_player_with_personal_code) || is_object($exist_with_personal_code)){
            $error_message="Žaidėjas su tokiu asmens kodu jau egzistuoja! Aplankykite <a href='$GLOBALS[url_path]players/player.php?id=$exist_player_with_personal_code[id]' target='_blank'>$exist_player_with_personal_code[name] $exist_player_with_personal_code[surname]</a> profilį!";
        }
        else {
            $item_arr['created_by']=$_SESSION['user_id'];
            if(!isset($item_arr['team_id']) || $item_arr['team_id']=="" || $item_arr['team_id']=="0") $item_arr['team_id']="NULL";
            $id = InsertField($mysqli, $item_arr, "players", true, true);
        }
    }
}
if(isset($id))
    $item_arr = mfa($mysqli, "SELECT * from players where id='$id'");
if (isset($item_arr)) $item_exists=1;
else $item_exists=0;
$exist_application_with_personal_code=check_application_by_personal_code($mysqli, $item_arr[personal_code]);
$show_application_text="";
if($exist_application_with_personal_code){
    $show_application_text .=" (žaidėją atitinkantis prašymas: <a href='$GLOBALS[url_path]applications/edit_application.php?id=$exist_application_with_personal_code[id]' target='_blank'>$exist_application_with_personal_code[name] $exist_application_with_personal_code[surname]</a>)";
}
if(isset($_FILES[file][name]) && $_FILES[file][name]!="") {
    $file_arr = $_FILES[file];
    $response = insert_file("players_files", "players_id", $id, $file_arr);
    if($response=="success") $file_message="Jūsų failas sėkmingai įkeltas.";
    else if($response=="duplicate") $file_message="Jūsų keliamas failas su tokiu pavadinimu jau egzistuoja.";
    else if($response=="too_large") $file_message="Jūsų keliamas failas per didelis!";
    else if($response=="error_uploading") $file_message="Įkeliant Jūsų failą į serverį įvyko klaida!";
}
$files=mfa_kaip_array($mysqli, "SELECT * from players_files where players_id='$id'");
?>

<!DOCTYPE html>
<html>
<head>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/inc/head.inc.php"); ?>
    <title>InfoTeam - Žaidėjo profilis</title>
    <style>
        .toast {
            opacity: 1 !important;
        }
    </style>
    <script>
        function add_player_note(id) {
            var pastaba;
            pastaba = document.getElementById("add_note").value;
            if(!pastaba || pastaba==""){
                toastr.error("Neįvedėte pastabos!");
            }
            else {
                $.post("<?= $GLOBALS['url_path'] ?>/ajax/ajax_functions_return.php", {
                        'do': "add_player_note_ajax",
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
        function delete_player_note(note_id, id){
            $.post("<?= $GLOBALS['url_path'] ?>/ajax/ajax_functions_return.php", {
                    'do': "delete_player_note_ajax",
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
        function edit_player_note(){
            var note_content = $('#edit_note_content').val();
            var note_id = $('#hidden_note_id').val();
            var item_id = $('#item_id').val();
            $.post("<?= $GLOBALS['url_path'] ?>/ajax/ajax_functions_return.php", {
                    'do': "edit_player_note_ajax",
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
                    <li class="breadcrumb-item">Žaidėjai</li>
                    <?php if($item_exists) {?> <li class="breadcrumb-item active"><?php echo $item_arr['name']." ".$item_arr['surname']?></li>
                    <?php } else echo "<li class=\"breadcrumb-item active\">Kurti naują žaidėją</li>"; ?>
                </ol>
                <?php
                if(isset($file_message)){
                    echo "<div class='alert alert-primary' role='alert'>$file_message</div>";
                }
                if(isset($error_message)){
                    echo "<div class='alert alert-danger' role='alert'>$error_message</div>";
                }
                ?>
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        <?php if($item_exists) {?> Žaidėjas: <b><?php echo $item_arr['name']." ".$item_arr['surname']?></b> <small><?php echo $show_application_text;?></small>
                        <?php } else echo "Naujo žaidėjo kūrimas"; ?>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <h5><span class="group_name">Asmeninė informacija</span></h5>
                            <hr>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-2">
                                    <label for="name">Vardas</label>
                                    <input type="text" class="form-control" id="name" name="name" required
                                           value="<?php echo $item_arr['name']; ?>">
                                </div>
                                <div class="col-md-2">
                                    <label for="surname">Pavardė:</label>
                                    <input type="text" class="form-control" id="surname" name="surname" required
                                           value="<?php echo $item_arr['surname']; ?>">
                                </div>
                                <div class="col-md-2">
                                    <label for="personal_code">Asmens kodas:</label>
                                    <input type="text" class="form-control" id="personal_code" name="personal_code" required
                                           value="<?php echo $item_arr['personal_code']; ?>">
                                </div>
                                <div class="col-md-2">
                                    <label for="country">Šalis:</label>
                                    <select name="country" id="country" form="form"
                                            class="form-control"><?php echo countries_list($item_arr['country']); ?></select>
                                </div>
                                <div class="col-md-2">
                                    <label for="birth_date">Gimimo data:</label>
                                    <input type="text" name="birth_date" class="form-control datepicker"
                                           value="<?php echo $item_arr['birth_date']; ?>">
                                </div>
                                <div class="col-md-2">
                                    <label for="position_in_field">Pozicija</label>
                                    <select name="position_in_field" id="position_in_field" form="form"
                                            class="form-control"><?php echo positions_list($item_arr['position_in_field']); ?></select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group space_before_group">
                            <h5><span class="group_name">Kontaktinė informacija</span></h5>
                            <hr>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-2">
                                    <label for="email">El. paštas:</label>
                                    <input type="text" class="form-control" id="email" name="email"
                                           value="<?php echo $item_arr['email']; ?>">
                                </div>
                                <div class="col-md-2">
                                    <label for="mob_number">Mob. nr:</label>
                                    <input type="text" class="form-control" id="mob_number" name="mob_number"
                                           value="<?php echo $item_arr['mob_number']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group space_before_group">
                            <h5><span class="group_name">Kita žaidėjo informacija</span></h5>
                            <hr>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-2">
                                    <label for="team_id">Komanda</label>
                                    <select name="team_id" id="team_id" form="form"
                                            class="form-control"><?php echo teams_list($item_arr['team_id'], false, $mysqli); ?></select>
                                </div>
                                <div class="col-md-2">
                                    <label for="salary">Atlyginimas*:</label>
                                    <input type="text" class="form-control" id="salary" name="salary"
                                           value="<?php if(isset($item_arr)) echo $item_arr["salary"]; ?>">
                                </div>
                                <div class="col-md-2">
                                    <label for="working">Stebėti:</label>
                                    <select name="need_to_scout" id="need_to_scout" form="form"
                                            class="form-control"><?php if(isset($item_arr)) $need_to_scout=$item_arr['need_to_scout']; else $need_to_scout="-1"; echo taip_ne_list($need_to_scout, $false, NULL);  ?></select>
                                </div>
                            </div>
                            <b>*</b> – atlyginimas ant popieriaus.
                        </div>
                        <?php if(isset($item_arr)){ ?>
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
                                       onclick='add_player_note("<?php echo $id; ?>")'>PRIDĖTI PASTABĄ</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <div id="pastabos_content">
                                    <?php echo format_players_notes($mysqli, $id); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group space_before_group">
                            <h5><span class="group_name">Failai</span></h5>
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
                        <input class='btn btn-primary btn-block' id="saveButton" type='submit' value='Išsaugoti'>
                        <?php if(isset($item_arr)) { ?> <a class='btn btn-primary btn-block btn-danger' onclick="document.getElementById('delete').value=1; document.getElementById('saveButton').click();" style="color:white">Trinti vartotoją</a> <?php } ?>
                    </div>
                    <!-- /.content-wrapper -->
                    <div class="modal fade" id="edit_player_note" tabindex="-1" role="dialog" aria-labelledby="edit_item_noteLabel" aria-hidden="true">
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
                                    <button onclick="edit_player_note()" type="button" class="btn btn-primary" data-dismiss="modal">Išsaugoti</button>
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
    $('#edit_player_note').on('show.bs.modal', function (event) {
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

