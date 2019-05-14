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
            $position_arr = $_POST;
            UpdateField($mysqli, $position_arr, "teams", true, $id, true);
        }
    }
} else {
    if (!empty($_POST)) {
        $position_arr = $_POST;
        $id = InsertField($mysqli, $position_arr, "teams", true, true);
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

                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        <?php if($item_exists) {?> Komanda: <b><?php echo $item_exists['name']?></b>
                        <?php } else echo "Naujos komandos kūrimas"; ?>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <h5>Komandos informacija</h5>
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

