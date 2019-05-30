<?php
$path = $_SERVER['PHP_SELF'];
$pieces = explode("/", $path);
$folder = $pieces[1];

require_once($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/inc/loader.inc.php");

if (isset($_GET['id'])) $id = $_GET['id'];
else if(isset($_POST['id'])) $id = $_POST['id'];

if(!$_SESSION['user_is_admin'] && $_SESSION['user_id']!=$id){
    header("Location: $GLOBALS[url_path]main/index.php?redirected=1");
}

if (isset($id)) {
    if (!empty($_POST)) {
        unset($_POST['id']);
        $user_upd_arr = $_POST;
        UpdateField($mysqli, $user_upd_arr, "users", true, $id, true);
    }
    $user_arr = mfa($mysqli, "SELECT * from users where id='$id'");
} else {
    ?>
    <script>
        window.location = "<?php echo $GLOBALS['url_path'] . "main"; ?>";
    </script>
    <?php
}
?>

<!DOCTYPE html>
<html>
<head>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/inc/head.inc.php"); ?>
    <title>InfoTeam - Vartotojo informacijos keitimas</title>
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
        <?php echo "<input type=\"hidden\" name=\"id\" id=\"id\" value=\"$id\">";?>
        <div id="content-wrapper">

            <div class="container-fluid">

                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?php echo $GLOBALS['url_path'] . "main"; ?>">InfoTeam</a>
                    </li>
                    <li class="breadcrumb-item">Vartotojai</li>
                    <li class="breadcrumb-item">Informacijos keitimas</li>
                    <li class="breadcrumb-item active"><?php echo $user_arr['user_name']?></li>
                </ol>

                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        Vartotojas: <b><?php echo $user_arr['user_name']?></b>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <h5>Vartotojo informacija</h5>
                            <hr>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-2">
                                    <label for="password">Naujas slaptažodis:</label>
                                    <input type="text" class="form-control" id="password" name="password" required="required"
                                           value="<?php if(isset($user_arr)) echo $user_arr["password"]; ?>">
                                </div>
                            </div>
                        </div>

                        <hr>
                        <input class='btn btn-primary btn-block' id="saveButton" type='submit' value='Išsaugoti'>
                    </div>
                    <!-- /.content-wrapper -->
</form>
</div>
<!-- /#wrapper -->
<?php require($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/inc/scripts.inc.php"); ?>
</body>

</html>

