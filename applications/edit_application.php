<?php
$path = $_SERVER['PHP_SELF'];
$pieces = explode("/", $path);
$folder = $pieces[1];

require_once($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/inc/loader.inc.php");

if (isset($_GET['id'])) $id = $_GET['id'];
else if (isset($_POST['id'])) $id = $_POST['id'];

if (isset($id)) {
    if (!empty($_POST)) {
        unset($_POST['id']);
        $application_arr = $_POST;
        UpdateField($mysqli, $application_arr, "applications_to_club", true, $id);
    }
    $prasymo_arr = mfa($mysqli, "SELECT * from applications_to_club where id='$id'");
    if (!isset($prasymo_arr['status']) || $prasymo_arr['status'] == 0) $nepatvirtintas = true;
    else $nepatvirtintas = false;
} else {
    ?>
    <script>
        window.location = "<?php echo $GLOBALS['url_path'] . "applications/new_applications.php"; ?>";
    </script>
    <?php
}

?>

<!DOCTYPE html>
<html>
<head>
    <?php require($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/inc/head.inc.php"); ?>
    <title>InfoTeam - Nauji prašymai</title>
    <script>
        function set_application_status(id, status) {
            console.log(status);
            $.post("<?= $GLOBALS['url_path'] ?>/ajax/ajax_functions_return.php", {
                    'do': "set_application_status_ajax",
                    'id': id,
                    'status': status
                }
                , function (data) {
                    data = JSON.parse(data);
                    is_done=data.done;
                    if(is_done==1){
                        window.location = "<?php echo $GLOBALS['url_path'] . "applications/edit_application.php?id=".$id; ?>";
                    }
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
                    <li class="breadcrumb-item">Prašymo redagavimas</li>
                    <li class="breadcrumb-item active"><?php echo $prasymo_arr['name'] . " " . $prasymo_arr['surname'] ?></li>
                </ol>

                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        Žaidėjo prašymas: <b><?php echo $prasymo_arr['name'] . " " . $prasymo_arr['surname'] ?></b>
                        <?php if ($nepatvirtintas == true) {
                            echo "<div class='form-row'><div class='col-md-4'><a class='btn btn-primary btn-block btn-success' onclick='set_application_status(\"$id\", 1)'>Patvirtinti</a></div>";
                            echo "<div class='col-md-4'><a class='btn btn-primary btn-block btn-warning' onclick='set_application_status(\"$id\", 2)'>Atidėti</a></div>";
                            echo "<div class='col-md-4'><a class='btn btn-primary btn-block btn-danger' onclick='set_application_status(\"$id\", 3)'>Atmesti</a></div></div>";
                        } else {
                            echo "<input class='btn btn-primary btn-block' type='submit' value='Išsaugoti'>";
                        }
                        ?>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <h5>Asmeninė informacija</h5>
                            <hr>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-2">
                                    <label for="name">Vardas</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           value="<?php echo $prasymo_arr['name']; ?>">
                                </div>
                                <div class="col-md-2">
                                    <label for="surname">Pavardė:</label>
                                    <input type="text" class="form-control" id="surname" name="surname"
                                           value="<?php echo $prasymo_arr['surname']; ?>">
                                </div>
                                <div class="col-md-2">
                                    <label for="personal_code">Asmens kodas:</label>
                                    <input type="text" class="form-control" id="personal_code" name="personal_code"
                                           value="<?php echo $prasymo_arr['personal_code']; ?>">
                                </div>
                                <div class="col-md-2">
                                    <label for="country">Šalis:</label>
                                    <input type="text" class="form-control" id="country" name="country"
                                           value="<?php echo $prasymo_arr['country']; ?>">
                                </div>
                                <div class="col-md-2">
                                    <label for="birth_date">Gimimo data:</label>
                                    <input type="text" id="datepicker" name="birth_date" class="form-control"
                                           value="<?php echo $prasymo_arr['birth_date']; ?>">
                                </div>
                                <div class="col-md-2">
                                    <label for="position_in_field">Pozicija</label>
                                    <select name="position_in_field" id="position_in_field" form="form"
                                            class="form-control"><?php echo positions_list($prasymo_arr['position_in_field']); ?></select>
                                </div>
                                <?php
                                if($nepatvirtintas == false){
                                    echo "<div class='col-md-2'>
                                    <label for='status'>Statusas</label>
                                    <select name='status' id='status' form='form'
                                            class='form-control'>".applications_status_list($prasymo_arr['status'])."</select>
                                </div>";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Kontaktinė informacija</h5>
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
                        <div class="form-group">
                            <h5>Daugiau informacijos</h5>
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
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

            <?php require($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/view/footer.php"); ?>

        </div>
        <!-- /.content-wrapper -->
</form>
</div>
<!-- /#wrapper -->
<?php require($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/inc/scripts.inc.php"); ?>
<!-- Page level plugin JavaScript-->
<script src="<?php echo $GLOBALS['url_path']; ?>vendor/datatables/jquery.dataTables.js"></script>
<script src="<?php echo $GLOBALS['url_path']; ?>vendor/datatables/dataTables.bootstrap4.js"></script>

<!-- Demo scripts for this page-->
<script src="<?php echo $GLOBALS['url_path']; ?>js/demo/datatables-demo.js"></script>
</body>

</html>

