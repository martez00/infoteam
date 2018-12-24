<?php
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
            $text .= "<div class='form-row' style='margin-top:5px;'><div class='col-md-11'>• <small><i>".date("Y-m-d", strtotime($note['action_date']))." ".$note['name']." ".$note['surname'].":</i></small> ".$note['note']."</div><div class='col-md-1 text-right'><a class='btn-danger btn-sm' onclick='delete_application_note(\"$note_id\", \"$id\")'>TRINTI</a></div></div>";
        }
    }
    return $text;
}