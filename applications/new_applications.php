<?php
$path = $_SERVER['PHP_SELF'];
$pieces = explode("/", $path);
$folder = $pieces[1];

require_once($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/inc/loader.inc.php");
$nauji_prasymai = mfa_kaip_array($mysqli, "SELECT * from applications_to_club where status='0'");
?>
<!DOCTYPE html>
<html>

<head>
    <?php require($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/inc/head.inc.php"); ?>
    <title>InfoTeam - Nauji prašymai</title>
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
                <li class="breadcrumb-item active">Nauji prašymai</li>
            </ol>

            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Nauji prašymai
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Vardas</th>
                                <th>Pavardė</th>
                                <th>Šalis</th>
                                <th>Pozicija</th>
                                <th>Gimimo data</th>
                                <th>Prašymo data</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($nauji_prasymai as $prasymas) {
                                echo "<tr>
<td><a class='btn btn-block btn-danger' href='".$GLOBALS['url_path']."index.php'>REDAGUOTI</a></td>
<td>" . $prasymas['name'] . "</td>
<td>" . $prasymas['surname'] . "</td>
<td>" . $prasymas['personal_code'] . "</td>
<td>" . $prasymas['position_in_field'] . "</td>
<td>" . $prasymas['birth_date'] . "</td>
<td>" . $prasymas['created_date'] . "</td>
</tr>";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
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

