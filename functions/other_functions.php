<?php
function return_positions_in_club_table($positions_in_club)
{
    $text = "";
    $text = "<div class=\"table-responsive\">
                        <table class=\"table table-bordered\" id=\"dataTable\" width=\"100%\" cellspacing=\"0\">
                            <thead>
                            <tr>
                                <th></th>
                                <th>ID</th>
                                <th>Pavadinimas</th>
                                <th>Globali rolė</th>
                            </tr>
                            </thead>
                            <tbody>";

    if (is_array($positions_in_club) || is_object($positions_in_club)) {
        foreach ($positions_in_club as $position) {
            $text .= "<tr>
<td><a class='btn btn-block btn-danger' href='" . $GLOBALS['url_path'] . "users/role.php?id=".$position['id']."'>REDAGUOTI</a></td>
<td>" . $position['id'] . "</td>
<td>" . $position['position_name'] . "</td>
<td>" . positions_in_club_list($position['global_position'], true) . "</td>
</tr>";
        }
    }
    $text .= " </tbody>
                        </table>
                    </div>";
    return $text;
}
function return_applications_table($prasymai)
{
    $text = "";
    $text = "<div class=\"table-responsive\">
                        <table class=\"table table-bordered\" id=\"dataTable\" width=\"100%\" cellspacing=\"0\">
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
                            <tbody>";

    if (is_array($prasymai) || is_object($prasymai)) {
        foreach ($prasymai as $prasymas) {
            $text .= "<tr>
<td><a class='btn btn-block btn-danger' href='" . $GLOBALS['url_path'] . "applications/edit_application.php?id=".$prasymas['id']."'>REDAGUOTI</a></td>
<td>" . $prasymas['name'] . "</td>
<td>" . $prasymas['surname'] . "</td>
<td>" . $prasymas['country'] . "</td>
<td>" . positions_list($prasymas['position_in_field'], true) . "</td>
<td>" . $prasymas['birth_date'] . "</td>
<td>" . $prasymas['created_date'] . "</td>
</tr>";
        }
    }
    $text .= " </tbody>
                        </table>
                    </div>";
    return $text;
}

function format_applications_notes($mysqli, $id){
    $prasymo_notes_arr=mfa_kaip_array($mysqli, "SELECT applications_notes.*, users.name, users.surname, tracking_made_actions.action_date  from applications_notes LEFT JOIN tracking_made_actions ON tracking_made_actions.table_name='applications_notes' AND tracking_made_actions.record_id=applications_notes.id AND tracking_made_actions.action='I' LEFT JOIN users ON users.id=tracking_made_actions.made_by where applications_to_club_id='$id' GROUP BY applications_notes.id ORDER BY tracking_made_actions.action_date DESC ");
    $text="";
    if(is_array($prasymo_notes_arr)){
        foreach($prasymo_notes_arr as $note){
            $note_id=$note['id'];
            $text .= "<div class='form-row' style='margin-top:5px;'><div class='col-md-11'>• <a data-toggle=\"modal\" data-target=\"#edit_application_note\" data-whatever='".$note['note']."'><img src='".$GLOBALS['url_path']."images/edit.png'></button> <a onclick='delete_application_note(\"$note_id\", \"$id\")'><img src='".$GLOBALS['url_path']."images/delete.png'></a> <small><i>".date("Y-m-d", strtotime($note['action_date']))." ".$note['name']." ".$note['surname'].":</i></small> ".$note['note']."</div></div>";
        }
    }
    return $text;
}