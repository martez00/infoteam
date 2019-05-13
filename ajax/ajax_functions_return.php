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
        if (isset($_POST['notes'])) {
            $application_note_arr['notes'] = $_POST['notes'];
        }
        $id=InsertField($mysqli, $application_note_arr, "applications_notes", true, true);
        if(isset($app_id)){
         $div_text=format_applications_notes($mysqli, $app_id);
        }
        echo json_encode(array("text" => "$div_text"));
        break;
    case 'add_user_note_ajax':
        if (isset($_POST['id'])) {
            $item_note_arr['users_id'] = $_POST['id'];
            $item_id=$item_note_arr['users_id'];
        }
        if (isset($_POST['note'])) {
            $item_note_arr['notes'] = $_POST['note'];
        }
        $id=InsertField($mysqli, $item_note_arr, "users_notes", true, true);
        if(isset($item_id)){
            $div_text=format_users_notes($mysqli, $item_id);
        }
        echo json_encode(array("text" => "$div_text"));
        break;
    case 'delete_application_note_ajax':
        if (isset($_POST['id'])) {
            $app_id=$_POST['id'];
        }
        if (isset($_POST['note_id'])) {
            $note_id = $_POST['note_id'];
        }
        DeleteField($mysqli, $_POST['note_id'], "applications_notes", true);
        if(isset($app_id)){
            $div_text=format_applications_notes($mysqli, $app_id);
        }
        echo json_encode(array("text" => "$div_text"));
        break;
    case 'delete_user_note_ajax':
        if (isset($_POST['id'])) {
            $item_id=$_POST['id'];
        }
        if (isset($_POST['note_id'])) {
            $note_id = $_POST['note_id'];
        }
        DeleteField($mysqli, $_POST['note_id'], "users_notes", true);
        if(isset($item_id)){
            $div_text=format_users_notes($mysqli, $item_id);
        }
        echo json_encode(array("text" => "$div_text"));
        break;
    case 'edit_application_note_ajax':
        if (isset($_POST['id'])) {
            $app_id=$_POST['id'];
        }
        if (isset($_POST['note_id'])) {
            $note_id = $_POST['note_id'];
        }
        if (isset($_POST['note_content'])) {
            $note_content = $_POST['note_content'];
        }
        if(!isset($note_content))
            $note_content="";

        $arr["notes"]=$note_content;
        UpdateField($mysqli, $arr, "applications_notes", true, $note_id, true);

        if(isset($app_id)){
            $div_text=format_applications_notes($mysqli, $app_id);
        }
        echo json_encode(array("text" => "$div_text"));
        break;
    case 'edit_user_note_ajax':
        if (isset($_POST['id'])) {
            $item_id=$_POST['id'];
        }
        if (isset($_POST['note_id'])) {
            $note_id = $_POST['note_id'];
        }
        if (isset($_POST['note_content'])) {
            $note_content = $_POST['note_content'];
        }
        if(!isset($note_content))
            $note_content="";

        $arr["notes"]=$note_content;
        UpdateField($mysqli, $arr, "users_notes", true, $note_id, true);

        if(isset($item_id)){
            $div_text=format_users_notes($mysqli, $item_id);
        }
        echo json_encode(array("text" => "$div_text"));
        break;
}
