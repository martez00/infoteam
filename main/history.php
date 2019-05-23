<?php
$path = $_SERVER['PHP_SELF'];
$pieces = explode("/", $path);
$folder = $pieces[1];

require_once($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/inc/loader.inc.php");

if($_SESSION['user_is_admin']!=1) header("Location: $GLOBALS[url_path]main/index.php?redirected=1");

if (isset($_GET['table'])) $table = $_GET['table'];
else if(isset($_POST['table'])) $table = $_POST['table'];

if(!isset($table)) exit;

if($table=="teams") $select_name=", teams.name as record_name";

$sql = "SELECT tracking_made_actions.* $select_name from tracking_made_actions LEFT JOIN $table ON $table.id=tracking_made_actions.record_id WHERE 1=1 AND table_name='$table' ";
$arr_from_search_format = format_sql_from_search($sql, $_POST, 'ORDER BY tracking_made_actions.id DESC', "GROUP BY tracking_made_actions.id");
$search_arr=$arr_from_search_format["search_arr"];
$items = mfa_kaip_array($mysqli, $arr_from_search_format["sql"]);
$kiek_viso_irasu=gor($mysqli,"SELECT COUNT(id) FROM tracking_made_actions WHERE 1=1 AND table_name='$table' $arr_from_search_format[sql_where]");
?>
<!DOCTYPE html>
<html>

<head>
    <?php require($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/inc/head.inc.php"); ?>
    <title>InfoTeam - Komandos</title>
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
                <li class="breadcrumb-item active">Veiksmų istorija</li>
            </ol>
            <hr>
            <form name="form" id="form" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <input type="hidden" name="page" id="page" value="<?php echo $page;?>">
                <input type="hidden" name="table" id="table" value="<?php echo $table;?>">
                <input class="btn btn-block search_btn" style="display:none" type="submit" value="Vykdyti paiešką">
            </form>
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Veiksmai su lentele <b><?php echo $table ?></b> <a onclick="print_table('data_in_table')"><img src="<?php echo $GLOBALS['url_path'] . "images/printer.png"; ?>"></a>
                </div>
                <div class="card-body div_for_responsive_table" id="data_in_table">
                    <?php echo return_actions_table($items, $kiek_viso_irasu, $arr_from_search_format["limit_key"], $arr_from_search_format["page"]); ?>
                </div>

            </div>

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

