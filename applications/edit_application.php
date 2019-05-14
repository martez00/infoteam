<?php
$path = $_SERVER['PHP_SELF'];
$pieces = explode("/", $path);
$folder = $pieces[1];

require_once($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/inc/loader.inc.php");

if (isset($_GET['id'])) $id = $_GET['id'];
else if (isset($_POST['id'])) $id = $_POST['id'];

if($_POST["create_player_by_application"]==1){
    $create_player_by_application=1;
}
if (isset($id)) {
    if (!empty($_POST)) {
        unset($_POST['id']);
        unset($_POST['hidden_note_id']);
        unset($_POST['edit_note_content']);
        unset($_POST['app_id']);
        unset($_POST['create_player_by_application']);
        $application_arr = $_POST;
        UpdateField($mysqli, $application_arr, "applications_to_club", true, $id, true);
    }
    $prasymo_arr = mfa($mysqli, "SELECT * from applications_to_club where id='$id'");
    if ($prasymo_arr['status'] == 0) $kokie_prasymai = "Nauji prašymai";
    else if ($prasymo_arr['status'] == 1) $kokie_prasymai = "Patvirtinti prašymai";
    else if ($prasymo_arr['status'] == 2) $kokie_prasymai = "Atidėti prašymai";
    else if ($prasymo_arr['status'] == 3) $kokie_prasymai = "Atmesti prašymai";
    if (!isset($prasymo_arr['status']) || $prasymo_arr['status'] == 0) $nepatvirtintas = true;
    else $nepatvirtintas = false;
} else {
    ?>
    <script>
        window.location = "<?php echo $GLOBALS['url_path'] . "applications/new_applications.php"; ?>";
    </script>
    <?php
}
if(isset($create_player_by_application)){
    $created_player = create_player_by_application($mysqli, $prasymo_arr);
    if(isset($created_player)){
        $info_message="Pagal šį prašymą sėkmingai sukurtas žaidėjas <a href='$GLOBALS[url_path]players/player.php?id=$created_player[id]' target='_blank'><b>$created_player[name] $created_player[surname]</b></a>. Jau dabar galite aplankyti jo profilį ir suvesti visą reikiamą informaciją!";
    }
}
$exist_player_with_personal_code=check_player_by_personal_code($mysqli, $prasymo_arr[personal_code]);
if($exist_player_with_personal_code){
    $create_show_player_text=" (prašymas jau turi sukurtą žaidėją: <a href='$GLOBALS[url_path]players/player.php?id=$exist_player_with_personal_code[id]' target='_blank'>$exist_player_with_personal_code[name] $exist_player_with_personal_code[surname]</a>)";
}
else {
    $create_show_player_text=" ( <input type='checkbox' name='create_player_by_application' id='create_player_by_application' value='1'> sukurti žaidėją pagal prašymą )";
}
if(isset($_FILES[file][name]) && $_FILES[file][name]!="") {
    $file_arr = $_FILES[file];
    $response = insert_file("applications_files","applications_to_club_id", $id, $file_arr);
    if($response=="success") $file_message="Jūsų failas sėkmingai įkeltas.";
    else if($response=="duplicate") $file_message="Jūsų keliamas failas su tokiu pavadinimu jau egzistuoja.";
    else if($response=="too_large") $file_message="Jūsų keliamas failas per didelis!";
    else if($response=="error_uploading") $file_message="Įkeliant Jūsų failą į serverį įvyko klaida!";
}
$files=mfa_kaip_array($mysqli, "SELECT * from applications_files where applications_to_club_id='$id'");
?>

<!DOCTYPE html>
<html>
<head>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/inc/head.inc.php"); ?>
    <title>InfoTeam - Nauji prašymai</title>
    <style>
        .toast {
            opacity: 1 !important;
        }
    </style>
    <script>
        function set_application_status(id, status) {
            $.post("<?= $GLOBALS['url_path'] ?>/ajax/ajax_functions_return.php", {
                    'do': "set_application_status_ajax",
                    'id': id,
                    'status': status
                }
                , function (data) {
                    data = JSON.parse(data);
                    is_done = data.done;
                    if (is_done == 1) {
                        if (status == 1)
                            toastr.success("Aplikacija patvirtinta!");
                        else if (status == 2)
                            toastr.warning("Aplikacija atidėta!");
                        else if (status == 3)
                            toastr.error("Aplikacija atmesta!");
                        setTimeout(function () {
                            window.location = "<?php echo $GLOBALS['url_path'] . "applications/edit_application.php?id=" . $id; ?>"
                        }, 350);
                    }
                });
        }

        function add_application_note(id) {
            var pastaba;
            pastaba = document.getElementById("add_note").value;
            if(!pastaba || pastaba==""){
                toastr.error("Neįvedėte pastabos!");
            }
            else {
                $.post("<?= $GLOBALS['url_path'] ?>/ajax/ajax_functions_return.php", {
                        'do': "add_application_note_ajax",
                        'id': id,
                        'notes': pastaba
                    }
                    , function (data) {
                        data = JSON.parse(data);
                        $('#pastabos_content').html(data.text);
                        document.getElementById("add_note").value="";
                        toastr.success("Pastaba įvesta!");
                    });
            }
        }

        function delete_application_note(note_id, id){
            $.post("<?= $GLOBALS['url_path'] ?>/ajax/ajax_functions_return.php", {
                    'do': "delete_application_note_ajax",
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
        function edit_application_note(){
            var note_content = $('#edit_note_content').val();
            var note_id = $('#hidden_note_id').val();
            var app_id = $('#app_id').val();
            $.post("<?= $GLOBALS['url_path'] ?>/ajax/ajax_functions_return.php", {
                    'do': "edit_application_note_ajax",
                    'note_id': note_id,
                    'id': app_id,
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
    <div id="wrapper">
        <?php require($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/view/sidebar.php"); ?>
        <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
        <div id="content-wrapper">

            <div class="container-fluid">

                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?php echo $GLOBALS['url_path'] . "main"; ?>">InfoTeam</a>
                    </li>
                    <li class="breadcrumb-item">Prašymai</li>
                    <li class="breadcrumb-item"><?php echo $kokie_prasymai; ?></li>
                    <li class="breadcrumb-item">Prašymo redagavimas</li>
                    <li class="breadcrumb-item active"><?php echo $prasymo_arr['name'] . " " . $prasymo_arr['surname'] ?></li>
                </ol>
                <?php
                if(isset($file_message)){
                    echo "<div class='alert alert-primary' role='alert'>$file_message</div>";
                }
                if(isset($info_message)){
                    echo "<div class='alert alert-primary' role='alert'>$info_message</div>";
                }
                ?>
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        Žaidėjo prašymas: <b><?php echo $prasymo_arr['name'] . " " . $prasymo_arr['surname']; ?></b> <small><?php echo $create_show_player_text; ?></small>
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
                                           value="<?php echo $prasymo_arr['name']; ?>">
                                </div>
                                <div class="col-md-2">
                                    <label for="surname">Pavardė:</label>
                                    <input type="text" class="form-control" id="surname" name="surname" required
                                           value="<?php echo $prasymo_arr['surname']; ?>">
                                </div>
                                <div class="col-md-2">
                                    <label for="personal_code">Asmens kodas:</label>
                                    <input type="text" class="form-control" id="personal_code" name="personal_code" required
                                           value="<?php echo $prasymo_arr['personal_code']; ?>">
                                </div>
                                <div class="col-md-2">
                                    <label for="country">Šalis:</label>
                                    <select name="country" id="country" form="form"
                                            class="form-control"><?php echo countries_list($prasymo_arr['country']); ?></select>
                                </div>
                                <div class="col-md-2">
                                    <label for="birth_date">Gimimo data:</label>
                                    <input type="text" name="birth_date" class="form-control datepicker"
                                           value="<?php echo $prasymo_arr['birth_date']; ?>">
                                </div>
                                <div class="col-md-2">
                                    <label for="position_in_field">Pozicija</label>
                                    <select name="position_in_field" id="position_in_field" form="form"
                                            class="form-control"><?php echo positions_list($prasymo_arr['position_in_field']); ?></select>
                                </div>
                                <?php
                                if ($nepatvirtintas == false) {
                                    echo "<div class='col-md-2'>
                                    <label for='status'>Statusas</label>
                                    <select name='status' id='status' form='form'
                                            class='form-control'>" . applications_status_list($prasymo_arr['status']) . "</select>
                                </div>";
                                }
                                ?>
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
                                           value="<?php echo $prasymo_arr['email']; ?>">
                                </div>
                                <div class="col-md-2">
                                    <label for="mob_number">Mob. nr:</label>
                                    <input type="text" class="form-control" id="mob_number" name="mob_number"
                                           value="<?php echo $prasymo_arr['mob_number']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group space_before_group">
                            <h5><span class="group_name">Daugiau informacijos</span></h5>
                            <hr>
                        </div>
                        <div class="form-group">
                            <label for="about">Apie save</label>
                            <textarea name="about" id="about" class="form-control" rows="3"
                                      size="500"><?php echo $prasymo_arr['about']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="motivation_letter">Motyvacinis laiškas</label>
                            <textarea name="motivation_letter" id="motivation_letter" class="form-control" rows="3"
                                      size="500"><?php echo $prasymo_arr['motivation_letter']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="other">Kita informacija</label>
                            <textarea name="other" id="other" class="form-control" rows="3"
                                      size="500"><?php echo $prasymo_arr['other']; ?></textarea>
                        </div>
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
                                       onclick='add_application_note("<?php echo $id; ?>")'>PRIDĖTI PASTABĄ</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <div id="pastabos_content">
                               <?php echo format_applications_notes($mysqli, $id); ?>
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
                        <hr>
                        <?php if ($nepatvirtintas == true) {
                            echo "<div class='form-row'><div class='col-md-4'><a class='btn btn-primary btn-block btn-success' onclick='set_application_status(\"$id\", 1)'>Patvirtinti</a></div>";
                            echo "<div class='col-md-4'><a class='btn btn-primary btn-block btn-warning' onclick='set_application_status(\"$id\", 2)'>Atidėti</a></div>";
                            echo "<div class='col-md-4'><a class='btn btn-primary btn-block btn-danger' onclick='set_application_status(\"$id\", 3)'>Atmesti</a></div></div>";
                        } else {
                            echo "<input class='btn btn-primary btn-block' onclick='toastr.info(\"Aplikacija atnaujinta!\");' type='submit' value='Išsaugoti'>";
                        }
                        ?>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

            <?php require($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/view/footer.php"); ?>

        </div>
        <div class="modal fade" id="edit_application_note" tabindex="-1" role="dialog" aria-labelledby="edit_application_noteLabel" aria-hidden="true">
            <input type="hidden" id="hidden_note_id" name="hidden_note_id">
            <input type="hidden" id="app_id" name="app_id">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="edit_application_noteLabel">Redaguoti pastabą</h5>
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
                        <button onclick="edit_application_note()" type="button" class="btn btn-primary" data-dismiss="modal">Išsaugoti</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-wrapper -->
</form>
</div>
<!-- /#wrapper -->
<?php require($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/inc/scripts.inc.php"); ?>
<script>
    $('#edit_application_note').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var notes = button.data('notes') // Extract info from data-* attributes
        var id = button.data('id') // Extract info from data-* attributes
        var app_id = button.data('appid') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('input[id="hidden_note_id"]').val(id);
        modal.find('input[id="edit_note_content"]').val(notes);
        modal.find('input[id="app_id"]').val(app_id);
    })
</script>
</body>

</html>

