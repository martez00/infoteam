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
    case 'add_application_note_ajax':
        if (isset($_POST['id'])) {
            $application_note_arr['applications_to_club_id'] = $_POST['id'];
            $app_id=$application_note_arr['applications_to_club_id'];
        }
        if (isset($_POST['note'])) {
            $application_note_arr['note'] = $_POST['note'];
        }
        $id=InsertField($mysqli, $application_note_arr, "applications_notes", true, true);
        if(isset($app_id)){
            $div_text="<ul>";
            $prasymo_notes_arr=mfa_kaip_array($mysqli, "SELECT * from applications_notes where applications_to_club_id='$app_id'");
            if(is_array($prasymo_notes_arr)) {
                foreach ($prasymo_notes_arr as $note) {
                    $div_text .= "<li>" . $note['note'] . "</li>";
                }
            }
            $div_text .="</ul>";
        }
        echo json_encode(array("text" => "$div_text"));
        break;

}