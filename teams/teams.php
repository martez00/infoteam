<?php
$path = $_SERVER['PHP_SELF'];
$pieces = explode("/", $path);
$folder = $pieces[1];

require_once($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/inc/loader.inc.php");
$rights=check_teams_rights();
if($rights['leisti_perziureti']!=1) header("Location: $GLOBALS[url_path]main/index.php?redirected=1");
$sql = "SELECT * from teams WHERE 1=1 ";
$arr_from_search_format = format_sql_from_search($sql, $_POST, NULL, "GROUP BY teams.id");
$search_arr=$arr_from_search_format["search_arr"];
$items = mfa_kaip_array($mysqli, $arr_from_search_format["sql"]);
$kiek_viso_irasu=gor($mysqli,"SELECT COUNT(id) FROM teams WHERE 1=1 $arr_from_search_format[sql_where]");
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
                <li class="breadcrumb-item active">Komandos</li>
            </ol>
            <a class='btn btn-outline-secondary' href="<?php echo $GLOBALS['url_path'] . "teams/team.php"; ?>" target="_blank">[+] Pridėti naują komandą</a>
            <?php if($_SESSION['user_is_admin']==1) { ?>
            <a class='btn btn-outline-secondary' href="<?php echo $GLOBALS['url_path'] . "main/history.php?table=teams"; ?>">Veiksmų su komandomis istorija</a>
            <?php } ?>
            <hr>
            <form name="form" id="form" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <input type="hidden" name="page" id="page" value="<?php echo $page;?>">
                <div id="search_div" class="search_div">
                    <div class="form-row">
                        <div class="col-md-2">
                            Pavadinimas
                            <input type="text" class="form-control" name="search[name]" id="name" value="<?php echo $search_arr['name'] ?>">
                        </div>
                        <div class="col-md-2">
                            Trumpas pavadinimas
                            <input type="text" class="form-control" name="search[short_name]" id="short_name" value="<?php echo $search_arr['short_name'] ?>">
                        </div>
                        <div class="col-md-2">
                            Pagrindinė komanda?
                            <select name="search[main_team]" id="main_team" form="form"
                                    class="form-control"><?php echo taip_ne_list($search_arr['main_team'], NULL, 1); ?></select>
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
                        Komandos <a onclick="print_table('data_in_table')"><img src="<?php echo $GLOBALS['url_path'] . "images/printer.png"; ?>"></a>
                    </div>
                    <div class="card-body div_for_responsive_table" id="data_in_table">
                        <?php echo return_teams_table($items, $kiek_viso_irasu, $arr_from_search_format["limit_key"], $arr_from_search_format["page"]); ?>
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

