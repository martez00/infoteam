<?php
$path = $_SERVER['PHP_SELF'];
$pieces = explode("/", $path);
$folder = $pieces[1];

require_once($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/inc/loader.inc.php");

if (isset($_GET['player_id'])) $player_id = $_GET['player_id'];
else if(isset($_POST['player_id'])) $player_id = $_POST['player_id'];

if (isset($_GET['user_id'])) $user_id = $_GET['user_id'];
else if(isset($_POST['user_id'])) $user_id = $_POST['user_id'];

$rights=check_salaries_rights();
if($rights['leisti_perziureti']!=1 || (!isset($player_id) && !isset($user_id))) header("Location: $GLOBALS[url_path]main/index.php?redirected=1");

if ((isset($player_id) && $player_id!=0) || (isset($user_id) && $user_id!=0)) {
    if (isset($player_id) && $player_id!=0){
        $table="players";
        $id=$player_id;
    }
    else {
        $table="users";
        $id=$user_id;
    }
    if (!empty($_POST)) {
            unset($_POST['player_id']);
            unset($_POST['user_id']);
            $item_arr = $_POST;
            UpdateField($mysqli, $item_arr, $table, true, $id, true);
    }
}
if(isset($id))
    $item_arr = mfa($mysqli, "SELECT * from $table where id='$id'");
if (isset($item_arr)) $item_exists=1;
else header("Location: $GLOBALS[url_path]main/index.php?redirected=1");
?>

<!DOCTYPE html>
<html>
<head>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/inc/head.inc.php"); ?>
    <title>InfoTeam - Atlyginimai</title>
    <style>
        .toast {
            opacity: 1 !important;
        }
    </style>
</head>
<body id="page-top">
<?php require($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/view/header.php"); ?>
<div>
    <form name="form" id="form" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="hidden" name="player_id" id="player_id" value="<?php if(isset($player_id)) echo $player_id ;?>">
        <input type="hidden" name="user_id" id="user_id" value="<?php if(isset($user_id)) echo $user_id ;?>">
        <div id="wrapper">
            <?php require($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/view/sidebar.php"); ?>
            <div id="content-wrapper">

                <div class="container-fluid">

                    <!-- Breadcrumbs-->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo $GLOBALS['url_path'] . "main"; ?>">InfoTeam</a>
                        </li>
                        <li class="breadcrumb-item">Atlyginimas</li>
                        <?php if($item_exists) {?> <li class="breadcrumb-item active"><?php echo $item_arr['name']." ".$item_arr['surname']?></li>
                        <?php } ?>
                    </ol>
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-table"></i>
                            <?php if(isset($player_id) && $player_id!="") echo "Žaidėjas: "; else echo "Darbuotojas: "; ?> <b><?php echo $item_arr['name']." ".$item_arr['surname']?></b>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <h5><span class="group_name">Finansinė informacija</span></h5>
                                <hr>
                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-2">
                                        <label for="salary">Atlyginimas</label>
                                        <input type="text" class="form-control" id="salary" name="salary"
                                               value="<?php echo $item_arr['salary']; ?>">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <input class='btn btn-primary btn-block' style="<?php if(isset($rights['pagrindiniai_duomenys'])) echo 'display:none';?>" id="saveButton" type='submit' value='Išsaugoti'>
                            </div>
    </form>
</div>
<?php require($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/view/footer.php"); ?>
<!-- /#wrapper -->
<?php require($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/inc/scripts.inc.php"); ?>
</body>

</html>

