<?php
$path = $_SERVER['PHP_SELF'];
$pieces = explode("/", $path);
$folder = $pieces[1];

$do_not_start_session=1;
require_once ($_SERVER['DOCUMENT_ROOT']."/$folder/system/inc/loader.inc.php");
if(!empty($_POST)) {
    $application_arr = $_POST;
    $check_if_not_exist_with_personal_code=gor($mysqli, "SELECT id from applications_to_club WHERE personal_code='$application_arr[personal_code]'");
    if(!$check_if_not_exist_with_personal_code) {
        $application_arr['created_date']=date("Y-m-d H:i:s", strtotime("now"));
        $id = InsertField($mysqli, $application_arr, "applications_to_club", true, true);
        $text = "Mielas <b>$application_arr[name] $application_arr[surname]</b>, Jūsų prašymas pateiktas. Apie tolimesnę eigą laukite informacijos iš klubo vadovų!";
        $status = "pateiktas";
    }
    else {
        $text = "Mielas <b>$application_arr[name] $application_arr[surname]</b>, su tokiu asmens kodu prašymas jau yra pateiktas. Susisiekite telefonu.";
        $status = "jau yra pateiktas";
    }

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
        <div class="card-header">Prašymas <?php echo $status?></div>
        <div class="card-body"><div class="form-group"><?php echo $text; ?></div>
            <a class="btn btn-primary btn-block" href="<?php echo $GLOBALS['url_path']."index.php"; ?>">Grįžti į pradinį langą</a>
        </div>
    </div>
</div>

</body>

</html>