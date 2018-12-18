<?php
$path = $_SERVER['PHP_SELF'];
$pieces = explode("/", $path);
$folder = $pieces[1];

$do_not_start_session=1;
require_once ($_SERVER['DOCUMENT_ROOT']."/$folder/system/inc/loader.inc.php");

if ($_SERVER['SERVER_NAME'] == "localhost") {
    header('Location: http://127.0.0.1/' . $folder);
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>

    <?php require ($_SERVER['DOCUMENT_ROOT']."/$folder/system/inc/head.inc.php"); ?>
    <title>InfoTeam - Teikti prašymą</title>

</head>

<body class="bg-dark">

<div class="container">
    <div class="card card-register mx-auto mt-5">
        <div class="card-header">InfoTeam – inovatyvus klubo valdymas!</div>
        <div class="card-body">
            <a class="btn btn-primary btn-block" href="<?php echo $GLOBALS['url_path']."main/index.php"; ?>">Darbuotojams</a>
            <a class="btn btn-primary btn-block" href="<?php echo $GLOBALS['url_path']."applications/request.php"; ?>">Teikti prašymą į klubą</a>
        </div>
    </div>
</div>

<?php require ($_SERVER['DOCUMENT_ROOT']."/$folder/system/inc/scripts.inc.php"); ?>

</body>

</html>

