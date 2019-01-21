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
            DeleteField($mysqli, $id, "users", true);
            ?>
            <script>
                window.location = "<?php echo $GLOBALS['url_path'] . "users/users_in_club.php"; ?>";
            </script>
            <?php
        }
        else {
            unset($_POST['id']);
            unset($_POST['delete']);
            $position_arr = $_POST;
            UpdateField($mysqli, $position_arr, "users", true, $id, true);
        }
    }
} else {
    if (!empty($_POST)) {
        $position_arr = $_POST;
        $id = InsertField($mysqli, $position_arr, "users", true, true);
    }
}
if(isset($id))
    $user_arr = mfa($mysqli, "SELECT * from users where id='$id'");
if (isset($user_arr)) $user_exists=1;
else $user_exists=0;
?>

<!DOCTYPE html>
<html>
<head>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/inc/head.inc.php"); ?>
    <title>InfoTeam - Vartotojai</title>
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
                    <li class="breadcrumb-item">Vartotojai</li>
                    <?php if($user_exists) {?> <li class="breadcrumb-item active"><?php echo $user_arr['user_name']?></li>
                    <?php } else echo "<li class=\"breadcrumb-item active\">Kurti naują vartotoją</li>"; ?>
                </ol>

                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        <?php if($user_exists) {?> Vartotojas: <b><?php echo $user_arr['user_name']?></b>
                        <?php } else echo "Naujo vartotojo kūrimas"; ?>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <h5>Vartotojo informacija</h5>
                            <hr>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-2">
                                    <label for="position_name">Slapyvardis:</label>
                                    <input type="text" class="form-control" id="user_name" name="user_name" required="required"
                                           value="<?php if(isset($user_arr)) echo $user_arr["user_name"]; ?>">
                                </div>
                                <div class="col-md-2">
                                    <label for="password">Slaptažodis:</label>
                                    <input type="text" class="form-control" id="password" name="password" required="required"
                                           value="<?php if(isset($user_arr)) echo $user_arr["password"]; ?>">
                                </div>
                                <div class="col-md-2">
                                    <label for="positions_id">Rolė:</label>
                                    <select name="positions_id" id="positions_id" form="form"
                                            class="form-control"><?php if(isset($user_arr)) $role=$user_arr['positions_id']; else $role="0"; echo roles_list($role, false, $mysqli);  ?></select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Asmeninė informacija</h5>
                            <hr>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-2">
                                    <label for="name">Vardas:</label>
                                    <input type="text" class="form-control" id="name" name="name" required="required"
                                           value="<?php if(isset($user_arr)) echo $user_arr["name"]; ?>">
                                </div>
                                <div class="col-md-2">
                                    <label for="surname">Pavardė:</label>
                                    <input type="text" class="form-control" id="surname" name="surname" required="required"
                                           value="<?php if(isset($user_arr)) echo $user_arr["surname"]; ?>">
                                </div>
                                <div class="col-md-2">
                                    <label for="personl_code">Asmens kodas:</label>
                                    <input type="text" class="form-control" id="personl_code" name="personl_code"
                                           value="<?php if(isset($user_arr)) echo $user_arr["personl_code"]; ?>">
                                </div>
                                <div class="col-md-2">
                                    <label for="birth_date">Gimimo data:</label>
                                    <input type="text" id="datepicker" name="birth_date" class="form-control"
                                           value="<?php if(isset($user_arr)) echo $user_arr["birth_date"]; ?>">
                                </div>
                                <div class="col-md-2">
                                    <label for="country">Šalis:</label>
                                    <select name="country" id="country" form="form"
                                            class="form-control"><?php if(isset($user_arr)) $country=$user_arr['country']; else $country="0"; echo countries_list($country);  ?></select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Darbuotojo informacija</h5>
                            <hr>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-2">
                                    <label for="salary">Atlyginimas:</label>
                                    <input type="text" class="form-control" id="salary" name="salary"
                                    value="<?php if(isset($user_arr)) echo $user_arr["salary"]; ?>">
                                </div>
                                <div class="col-md-2">
                                    <label for="not_working">Dirba:</label>
                                    <select name="not_working" id="not_working" form="form"
                                            class="form-control"><?php if(isset($user_arr)) $dirba=$user_arr['not_working']; else $dirba="0"; echo if_working_list($dirba);  ?></select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <input class='btn btn-primary btn-block' id="saveButton" type='submit' value='Išsaugoti'>
                       <?php if(isset($user_arr)) { ?> <a class='btn btn-primary btn-block btn-danger' onclick="document.getElementById('delete').value=1; document.getElementById('saveButton').click();" style="color:white">Trinti vartotoją</a> <?php } ?>
                    </div>
                        <!-- /.content-wrapper -->
</form>
</div>
<!-- /#wrapper -->
<?php require($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/inc/scripts.inc.php"); ?>
</body>

</html>

