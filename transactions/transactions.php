<?php
$path = $_SERVER['PHP_SELF'];
$pieces = explode("/", $path);
$folder = $pieces[1];

require_once($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/inc/loader.inc.php");

$rights=check_transactions_rights();
if($rights['leisti_perziureti']!=1) header("Location: $GLOBALS[url_path]main/index.php?redirected=1");

$sql = "SELECT * from transactions WHERE 1=1 ";
$arr_from_search_format = format_sql_from_search($sql, $_POST, "ORDER BY transactions.due_date DESC", "GROUP BY transactions.id");
$search_arr=$arr_from_search_format["search_arr"];
$items = mfa_kaip_array($mysqli, $arr_from_search_format["sql"]);
$kiek_viso_irasu=gor($mysqli,"SELECT COUNT(id) FROM transactions WHERE 1=1 $arr_from_search_format[sql_where]");
?>
<!DOCTYPE html>
<html>

<head>
    <?php require($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/inc/head.inc.php"); ?>
    <title>InfoTeam - Pervedimai</title>
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
                <li class="breadcrumb-item active">Pervedimai</li>
            </ol>
            <a class='btn btn-outline-secondary' href="<?php echo $GLOBALS['url_path'] . "transactions/transaction.php"; ?>" target="_blank">[+] Pridėti naują pervedimą</a>
            <?php if($_SESSION['user_is_admin']==1) { ?>
                <a class='btn btn-outline-secondary' href="<?php echo $GLOBALS['url_path'] . "main/history.php?table=transactions"; ?>">Veiksmų su pervedimais istorija</a>
            <?php } ?>
            <hr>
            <form name="form" id="form" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <input type="hidden" name="page" id="page" value="<?php echo $page;?>">
                <div id="search_div" class="search_div">
                    <div class="form-row">
                        <div class="col-md-2">
                            Debetas/Kreditas
                            <select name="search[debit_credit]" id="debit_credit" form="form"
                                    class="form-control"><?php echo debet_credit_list($search_arr['debit_credit']); ?></select>
                        </div>
                        <div class="col-md-2">
                            Suma
                            <input type="text" class="form-control" name="search[amount]" id="amount" value="<?php echo $search_arr['amount'] ?>">
                        </div>
                        <div class="col-md-2">
                            Statusas
                            <select name="search[status]" id="status" form="form"
                                    class="form-control"><?php echo transactions_status_list($search_arr['status']); ?></select>
                        </div>
                        <div class="col-md-2">
                            Tipas
                            <select name="search[type]" id="type" form="form"
                                    class="form-control"><?php echo transaction_assigned_to($search_arr['type']); ?></select>
                        </div>
                        <div class="col-md-2">
                            Priskirta vartotojui
                            <select name="search[assigned_to_user_id]" id="assigned_to_user_id" form="form"
                                    class="form-control"><?php echo users_list($search_arr['assigned_to_user_id'], false, $mysqli); ?></select>
                        </div>
                        <div class="col-md-2">
                            Priskirta žaidėjui
                            <select name="search[assigned_to_player_id]" id="assigned_to_player_id" form="form"
                                    class="form-control"><?php echo players_list($search_arr['assigned_to_player_id'], false, $mysqli); ?></select>
                        </div>
                        <div class="col-md-2">
                            Priskirta kitam
                            <input type="text" class="form-control" name="search[assigned_to_other]" id="assigned_to_other" value="<?php echo $search_arr['assigned_to_other'] ?>">
                        </div>
                        <div class="col-md-2">
                            Užbaigti iki
                            <input type="text" name="search[due_date]" class="form-control datepicker" value="<?php echo $search_arr['due_date'] ?>">
                        </div>
                    </div>
                    <hr>
                    <input class="btn btn-block search_btn" type="submit" value="Vykdyti paiešką">
                </div>
            </form>
            <hr>
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Pervedimai <a onclick="print_table('data_in_table')"><img src="<?php echo $GLOBALS['url_path'] . "images/printer.png"; ?>"></a>
                </div>
                <div class="card-body div_for_responsive_table" id="data_in_table">
                    <?php echo return_transactions_table($items, $kiek_viso_irasu, $limit_key, $page); ?>
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

