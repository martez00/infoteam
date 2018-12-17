<?php
$path = $_SERVER['PHP_SELF'];
$pieces = explode("/", $path);
$folder = $pieces[1];
require_once($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/inc/loader.inc.php");

switch ($_POST['do']) {
    case 'set_application_status_ajax':
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
        }
        if (isset($_POST['status'])) {
            $status=$_POST['status'];
            $application_arr['status'] = $status;
        }
        UpdateField($mysqli, $application_arr, "applications_to_club", true, $id);
        echo json_encode(array("done" => "1"));
        break;
}