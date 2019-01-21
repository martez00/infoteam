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
            DeleteField($mysqli, $id, "positions", true);
            ?>
            <script>
                window.location = "<?php echo $GLOBALS['url_path'] . "users/positions_in_club.php"; ?>";
            </script>
            <?php
        }
        else {
            unset($_POST['id']);
            unset($_POST['delete']);
            $position_arr = $_POST;
            UpdateField($mysqli, $position_arr, "positions", true, $id, true);
        }
    }
} else {
    if (!empty($_POST)) {
            $position_arr = $_POST;
            $id = InsertField($mysqli, $position_arr, "positions", true, true);
    }
}
if(isset($id))
    $roles_arr = mfa($mysqli, "SELECT * from positions where id='$id'");
if (isset($roles_arr)) $role_exists=1;
else $role_exists=0;
?>

<!DOCTYPE html>
<html>
<head>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/inc/head.inc.php"); ?>
    <title>InfoTeam - Rolės</title>
    <style>
        .toast {
            opacity: 1 !important;
        }
    </style>
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
                    <li class="breadcrumb-item">Kita</li>
                    <li class="breadcrumb-item">Rolės</li>
                    <?php if($role_exists) {?> <li class="breadcrumb-item active"><?php echo $roles_arr['position_name']?></li>
                    <?php } else echo "<li class=\"breadcrumb-item active\">Kurti naują rolę</li>"; ?>
                </ol>

                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        <?php if($role_exists) {?> Rolė: <b><?php echo $roles_arr['position_name']?></b>
                        <?php } else echo "Naujos rolės kūrimas"; ?>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <h5>Rolės informacija</h5>
                            <hr>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-2">
                                    <label for="position_name">Rolės pavadinimas:</label>
                                    <input type="text" class="form-control" id="position_name" name="position_name" required="required"
                                           value="<?php if(isset($roles_arr)) echo $roles_arr["position_name"]; ?>">
                                </div>
                                <div class="col-md-2">
                                    <label for='global_position'>Globali rolė</label>
                                    <select name='global_position' id='global_position' form='form'
                                            class='form-control'><?php if(isset($roles_arr)) $role=$roles_arr['global_position']; else $role="0"; echo positions_in_club_list($role) ?></select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <input class='btn btn-primary btn-block' id="saveButton" type='submit' value='Išsaugoti'>
                        <?php if(isset($roles_arr)) { ?>  <a class='btn btn-primary btn-block btn-danger' onclick="document.getElementById('delete').value=1; document.getElementById('saveButton').click();" style="color:white">Trinti rolę</a> <?php } ?>
                    </div>
                        <!-- /.content-wrapper -->
</form>
</div>
<!-- /#wrapper -->
<?php require($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/inc/scripts.inc.php"); ?>
</body>

</html>

