<?php
$path = $_SERVER['PHP_SELF'];
$pieces = explode("/", $path);
$folder = $pieces[1];

require_once($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/inc/loader.inc.php");
$patvirtinti_prasymai = mfa_kaip_array($mysqli, "SELECT * from applications_to_club where status='1' LIMIT 0, 30");
?>
<!DOCTYPE html>
<html>

<head>
    <?php require($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/inc/head.inc.php"); ?>
    <title>InfoTeam - Patvirtinti prašymai</title>
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
                <li class="breadcrumb-item">Prašymai</li>
                <li class="breadcrumb-item active">Patvirtinti prašymai</li>
            </ol>

            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Patvirtinti prašymai <a onclick="print_table('data_in_table')"><img
                                src="<?php echo $GLOBALS['url_path'] . "images/printer.png"; ?>"></a>
                </div>
                <div class="card-body" id="data_in_table">
                    <form name="form" id="form" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="search_div">
                        <b>PAIEŠKA PAGAL LAUKUS</b><br>
                        <div style="height:1px; background-color:white"></div>

                            <div class="form-row">
                                <div class="col-md-2">
                                    Vardas
                                    <input type="text" class="form-control" name="name" id="name">
                                </div>
                                <div class="col-md-2">
                                    Pavardė
                                    <input type="text" class="form-control" name="surname" id="surname">
                                </div>
                                <div class="col-md-2">
                                    Asmens kodas
                                    <input type="text" class="form-control" name="personal_code" id="personal_code">
                                </div>
                                <div class="col-md-2">
                                   Šalis
                                    <select name="country" id="country" form="form"
                                            class="form-control"><?php echo countries_list(NULL); ?></select>
                                </div>
                                <div class="col-md-2">
                                   Gimimo data
                                    <input type="text" id="datepicker" name="birth_date" class="form-control">
                                </div>
                                <div class="col-md-2">
                                   Pozicija
                                    <select name="position_in_field" id="position_in_field" form="form"
                                            class="form-control"><?php echo positions_list(NULL); ?></select>
                                </div>
                                <div class="col-md-2">
                                   El. paštas:
                                    <input type="text" class="form-control" id="email" name="email">
                                </div>
                                <div class="col-md-2">
                                    Mob. nr:
                                    <input type="text" class="form-control" id="mob_number" name="mob_number">
                                </div>
                                <div class="col-md-2">
                                    Prašymo data
                                    <input type="text" id="datepicker" name="created_date" class="form-control">
                                </div>
                            </div>
                    </div>
                   <input class="btn btn-outline-info btn-block" type="submit" value="Vykdyti paiešką">
                    </form>
                    <hr>
                    <?php echo return_applications_table($patvirtinti_prasymai); ?>
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

