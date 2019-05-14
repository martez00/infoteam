<?php
$path = $_SERVER['PHP_SELF'];
$pieces = explode("/", $path);
$folder = $pieces[1];

require_once($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/inc/loader.inc.php");

$sql = "SELECT * from positions";
$arr_from_search_format = format_sql_from_search($sql, $_POST, NULL, "GROUP BY positions.id");
$search_arr=$arr_from_search_format["search_arr"];
$positions_in_club = mfa_kaip_array($mysqli, $arr_from_search_format["sql"]);
$kiek_viso_irasu=gor($mysqli,"SELECT COUNT(id) FROM positions WHERE 1=1 $arr_from_search_format[sql_where]");
?>
<!DOCTYPE html>
<html>

<head>
    <?php require($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/inc/head.inc.php"); ?>
    <title>InfoTeam - Rolės</title>
</head>

<body id="page-top">
<?php require($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/view/header.php"); ?>


<div id="wrapper">
    <?php require($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/view/sidebar.php"); ?>

    <div id="content-wrapper">

        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?php echo $GLOBALS['url_path'] . "main"; ?>">InfoTeam</a>
                </li>
                <li class="breadcrumb-item">Vartotojai</li>
                <li class="breadcrumb-item active">Rolės</li>
            </ol>
            <a class='btn btn-outline-secondary' href="<?php echo $GLOBALS['url_path'] . "users/role.php"; ?>" target="_blank">[+] Pridėti naują rolę</a>
            <hr>
            <form name="form" id="form" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <input type="hidden" name="page" id="page" value="<?php echo $page;?>">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Rolės <a onclick="print_table('data_in_table')"><img src="<?php echo $GLOBALS['url_path'] . "images/printer.png"; ?>"></a>
                </div>
                <div class="card-body div_for_responsive_table" id="data_in_table">
                    <?php echo return_positions_in_club_table($positions_in_club, $kiek_viso_irasu, $arr_from_search_format["limit_key"], $arr_from_search_format["page"]); ?>
                </div>

            </div>
                <input type="submit" style="display:none;">
            </form>

        </div>
        <!-- /.container-fluid -->

        <?php require($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/view/footer.php"); ?>

    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->
<?php require ($_SERVER['DOCUMENT_ROOT']."/$folder/system/inc/scripts.inc.php"); ?>
<!-- Page level plugin JavaScript-->
<script src="<?php echo $GLOBALS['url_path']; ?>vendor/datatables/jquery.dataTables.js"></script>
<script src="<?php echo $GLOBALS['url_path']; ?>vendor/datatables/dataTables.bootstrap4.js"></script>

<!-- Demo scripts for this page-->
<script src="<?php echo $GLOBALS['url_path']; ?>js/demo/datatables-demo.js"></script>
</body>

</html>

