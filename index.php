<?php
$path = $_SERVER['PHP_SELF'];
$pieces = explode("/", $path);
$folder = $pieces[1];

require_once ($_SERVER['DOCUMENT_ROOT']."/$folder/system/inc/loader.inc.php");
require 'config.php';

?>
<!DOCTYPE html>
<html>

<head>
    <?php require ($_SERVER['DOCUMENT_ROOT']."/$folder/system/inc/head.inc.php"); ?>
    <title>InfoTeam - Pagrindinis</title>
</head>

<body id="page-top">
    <?php require ($_SERVER['DOCUMENT_ROOT']."/$folder/system/view/header.php"); ?>


<div id="wrapper">
    <?php require ($_SERVER['DOCUMENT_ROOT']."/$folder/system/view/sidebar.php"); ?>

    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Blank Page</li>
            </ol>

            <!-- Page Content -->
            <h1>Blank Page</h1>
            <hr>
            <p>This is a great starting point for new custom pages.</p>

        </div>
        <!-- /.container-fluid -->

        <?php require ($_SERVER['DOCUMENT_ROOT']."/$folder/system/view/footer.php"); ?>

    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

    <?php require ($_SERVER['DOCUMENT_ROOT']."/$folder/system/inc/scripts.inc.php"); ?>
</body>

</html>

