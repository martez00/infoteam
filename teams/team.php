<?php
$path = $_SERVER['PHP_SELF'];
$pieces = explode("/", $path);
$folder = $pieces[1];

require_once($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/inc/loader.inc.php");
$rights=check_teams_rights();
if($rights['leisti_perziureti']!=1) header("Location: $GLOBALS[url_path]main/index.php?redirected=1");
if (isset($_GET['id'])) $id = $_GET['id'];
else if(isset($_POST['id'])) $id = $_POST['id'];
if (isset($id) && $id!=0) {
    if (!empty($_POST)) {
        if($_POST['delete']==1) {
            DeleteField($mysqli, $id, "teams", true);
            ?>
            <script>
                window.location = "<?php echo $GLOBALS['url_path'] . "teams/teams.php"; ?>";
            </script>
            <?php
        }
        else {
            unset($_POST['id']);
            unset($_POST['delete']);
            $team_arr = $_POST;
            if($team_arr[main_team]==1) {
                $exists_main_team = check_if_exists_main_team($mysqli, $id);
                if (isset($exists_main_team)) {
                    $team_arr[main_team] = -1;
                    $error_message = "Šios komandos negalite nustatyti kaip pagrindinės, kadangi <a href='$GLOBALS[url_path]teams/team.php?id=$exists_main_team[id]' target='_blank'><b>$exists_main_team[name]</b></a> komanda jau yra nustatyta kaip pagrindinė!";
                }
            }
            UpdateField($mysqli, $team_arr, "teams", true, $id, true);
        }
    }
} else {
    if (!empty($_POST)) {
        $team_arr = $_POST;
        if($team_arr[main_team]==1){
            $exists_main_team=check_if_exists_main_team($mysqli, NULL);
            if(isset($exists_main_team)) {
                $team_arr[main_team]=-1;
                $error_message="Šios komandos negalite nustatyti kaip pagrindinės, kadangi <a href='$GLOBALS[url_path]teams/team.php?id=$exists_main_team[id]' target='_blank'><b>$exists_main_team[name]</b></a> komanda jau yra nustatyta kaip pagrindinė!";
            }
        }
        $id = InsertField($mysqli, $team_arr, "teams", true, true);
        header("Location: $GLOBALS[url_path]teams/team.php?id=$id");
    }
}
if(isset($id))
    $item_arr = mfa($mysqli, "SELECT * from teams where id='$id'");
if (isset($item_arr)) $item_exists=1;
else $item_exists=0;
?>

<!DOCTYPE html>
<html>
<head>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/inc/head.inc.php"); ?>
    <title>InfoTeam - Komandos profilis</title>
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
                    <li class="breadcrumb-item">Komandos</li>
                    <?php if($item_exists) {?> <li class="breadcrumb-item active"><?php echo $item_arr['name']?></li>
                    <?php } else echo "<li class=\"breadcrumb-item active\">Kurti naują komandą</li>"; ?>
                </ol>
                <?php
                if(isset($error_message)){
                    echo "<div class='alert alert-danger' role='alert'>$error_message</div>";
                }
                ?>
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        <?php if($item_exists) {?> Komanda: <b><?php echo $item_exists['name']?></b>
                        <?php } else echo "Naujos komandos kūrimas"; ?>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <h5><span class="group_name">Komandos informacija</span></h5>
                            <hr>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-2">
                                    <label for="name">Komandos pavadinimas:</label>
                                    <input type="text" class="form-control" id="name" name="name" required="required"
                                           value="<?php if(isset($item_arr)) echo $item_arr["name"]; ?>">
                                </div>
                                <div class="col-md-2">
                                    <label for="short_name">Trumpas pavadinimas:</label>
                                    <input type="text" class="form-control" id="short_name" name="short_name"
                                           value="<?php if(isset($item_arr)) echo $item_arr["short_name"]; ?>">
                                </div>
                                <div class="col-md-2">
                                    <label for="working">Pagrindinė komanda:</label>
                                    <select name="main_team" id="main_team" form="form"
                                            class="form-control"><?php if(isset($item_arr)) $main_team=$item_arr['main_team']; else $main_team="-1"; echo taip_ne_list($main_team, $false, NULL);  ?></select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <input class='btn btn-primary btn-block' id="saveButton" type='submit' value='Išsaugoti'>
                        <?php if(isset($item_arr)) { ?>  <a class='btn btn-primary btn-block btn-danger' onclick="document.getElementById('delete').value=1; document.getElementById('saveButton').click();" style="color:white">Trinti komandą</a> <?php } ?>
                    </div>
                    <!-- /.content-wrapper -->
</form>
</div>
<!-- /#wrapper -->
<?php require($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/inc/scripts.inc.php"); ?>
</body>

</html>

