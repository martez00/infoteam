<?php
$path = $_SERVER['PHP_SELF'];
$pieces = explode("/", $path);
$folder = $pieces[1];

$do_not_start_session=1;
require_once ($_SERVER['DOCUMENT_ROOT']."/$folder/system/inc/loader.inc.php");
if(isset($_POST)) {
    $application_arr = $_POST;
    $text="Mielas <b>$application_arr[name] $application_arr[surname]</b>, Jūsų prašymas pateiktas. Apie tolimesnę eigą laukite informacijos iš klubo vadovų!";
}
?>
<!DOCTYPE html>
<html>

<head>

    <?php require ($_SERVER['DOCUMENT_ROOT']."/$folder/system/inc/head.inc.php"); ?>
    <title>InfoTeam - Prašymas pateiktas</title>

</head>

<body class="bg-dark">
<div class="container">
    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Prašymas pateiktas</div>
        <div class="card-body"><?php echo $text; ?>
        </div>
    </div>
</div>

</body>

</html>