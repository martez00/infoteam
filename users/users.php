<?php
$path = $_SERVER['PHP_SELF'];
$pieces = explode("/", $path);
$folder = $pieces[1];

require_once($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/inc/loader.inc.php");

$rights=check_user_rights();
if($rights['leisti_perziureti']!=1) header("Location: $GLOBALS[url_path]main/index.php?redirected=1");
$sql="SELECT users.* from users WHERE 1=1 ";
$arr_from_search_format = format_sql_from_search($sql, $_POST, "ORDER BY users.id DESC", "GROUP BY users.id");
$search_arr=$arr_from_search_format["search_arr"];
$users = mfa_kaip_array($mysqli, $arr_from_search_format["sql"]);
$kiek_viso_irasu=gor($mysqli,"SELECT COUNT(id) FROM users WHERE 1=1 $arr_from_search_format[sql_where]");
?>
<!DOCTYPE html>
<html>

<head>
    <?php require($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/inc/head.inc.php"); ?>
    <title>InfoTeam - Vartotojai</title>
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
                <li class="breadcrumb-item active">Vartotojai</li>
            </ol>
            <?php if($rights['leisti_kurti']==1) { ?>
            <a class='btn btn-outline-secondary' href="<?php echo $GLOBALS['url_path'] . "users/user.php"; ?>" target="_blank">[+] Pridėti naują vartotoją</a>
            <hr>
            <?php } ?>
            <form name="form" id="form" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <input type="hidden" name="page" id="page" value="<?php echo $page;?>">
                <div id="search_div" class="search_div">
                    <div class="form-row">
                        <div class="col-md-2">
                            Slapyvardis
                            <input type="text" class="form-control" name="search[user_name]" id="user_name" value="<?php echo $search_arr['user_name'] ?>">
                        </div>
                        <div class="col-md-2">
                            Vardas
                            <input type="text" class="form-control" name="search[name]" id="name" value="<?php echo $search_arr['name'] ?>">
                        </div>
                        <div class="col-md-2">
                            Pavardė
                            <input type="text" class="form-control" name="search[surname]" id="surname" value="<?php echo $search_arr['surname'] ?>">
                        </div>
                        <div class="col-md-2">
                            Šalis
                            <select name="search[country]" id="country" form="form"
                                    class="form-control"><?php echo countries_list($search_arr['country']); ?></select>
                        </div>
                        <div class="col-md-2">
                            Gimimo data
                            <input type="text" name="search[birth_date]" class="form-control datepicker" value="<?php echo $search_arr['birth_date'] ?>">
                        </div>
                        <div class="col-md-2">
                            Asmens kodas
                            <input type="text" class="form-control" name="search[personal_code]" id="personal_code" value="<?php echo $search_arr['personal_code'] ?>">
                        </div>
                        <div class="col-md-2">
                            El. paštas:
                            <input type="text" class="form-control" id="email" name="search[email]" value="<?php echo $search_arr['email'] ?>">
                        </div>
                        <div class="col-md-2">
                            Mob. nr:
                            <input type="text" class="form-control" id="mob_number" name="search[mob_number]" value="<?php echo $search_arr['mob_number'] ?>">
                        </div>
                        <div class="col-md-2">
                            Ar dirba?
                            <select name="search[working]" id="country" form="form"
                                    class="form-control"><?php echo taip_ne_list($search_arr['working'], NULL, 1); ?></select>
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
                    Vartotojai <a onclick="print_table('data_in_table')"><img src="<?php echo $GLOBALS['url_path'] . "images/printer.png"; ?>"></a>
                </div>
                <div class="card-body div_for_responsive_table" id="data_in_table">
                    <?php echo return_users_table($users, $kiek_viso_irasu, $arr_from_search_format["limit_key"], $arr_from_search_format["page"]); ?>
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

