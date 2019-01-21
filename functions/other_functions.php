<?php
function return_transactions_table($transactions)
{
    $text = "";
    $text = "<div class=\"table-responsive\">
                        <table class=\"table table-bordered\" id=\"dataTable\" width=\"100%\" cellspacing=\"0\">
                            <thead>
                            <tr>";
    $text .= "
                                <th>Suma</th>
                                <th>Debetas/Kreditas</th>
                                <th>Kas atliko</th>
                            </tr>
                            </thead>
                            <tbody>";

    if (is_array($transactions) || is_object($transactions)) {
        foreach ($transactions as $transaction) {
            $text .= "<tr>";
            $text .= "<td>" . $transaction['amount'] . "</td>
<td>" . $transaction['debit_credit'] . "</td>
<td>" . $transaction['made_by'] . "</td>
</tr>";
        }
    }
    $text .= " </tbody>
                        </table>
                    </div>";
    return $text;
}
function return_players_table($players)
{
    $text = "";
    $text = "<div class=\"table-responsive\">
                        <table class=\"table table-bordered\" id=\"dataTable\" width=\"100%\" cellspacing=\"0\">
                            <thead>
                            <tr>";
    $text .= "
                                <th>Vardas</th>
                                <th>Pavardė</th>
                            </tr>
                            </thead>
                            <tbody>";

    if (is_array($players) || is_object($players)) {
        foreach ($players as $player) {
            $text .= "<tr>";
            $text .= "<td>" . $player['name'] . "</td>
<td>" . $player['surname'] . "</td>
</tr>";
        }
    }
    $text .= " </tbody>
                        </table>
                    </div>";
    return $text;
}
function return_users_table($users)
{
    $text = "";
    $text = "<div class=\"table-responsive\">
                        <table class=\"table table-bordered\" id=\"dataTable\" width=\"100%\" cellspacing=\"0\">
                            <thead>
                            <tr>";
    $text .= " <th>Slapyvardis</th>
                                <th>Vardas</th>
                                <th>Pavardė</th>
                                <th>Rolė</th>
                                <th>Atlyginimas</th>
                                <th>Ar dirba?</th>
                            </tr>
                            </thead>
                            <tbody>";

    if (is_array($users) || is_object($users)) {
        foreach ($users as $user) {
            $text .= "<tr>";
            if(isset($_SESSION['user_is_admin']) && $_SESSION['user_is_admin']==1) $text .="<td><a href='" . $GLOBALS['url_path'] . "users/user.php?id=".$user['id']."'>" . $user['user_name'] . "</a></td>";
            else $text .="<td>" . $user['user_name'] . "</td>";
            $text .="<td>" . $user['name'] . "</td>
<td>" . $user['surname'] . "</td>
<td>" . $user['user_role'] . "</td>
<td>" . $user['salary'] . "</td>
<td>" . if_working_list($user['not_working'], true) . "</td>
</tr>";
        }
    }
    $text .= " </tbody>
                        </table>
                    </div>";
    return $text;
}
function return_positions_in_club_table($positions_in_club)
{
    $text = "";
    $text = "<div class=\"table-responsive\">
                        <table class=\"table table-bordered\" id=\"dataTable\" width=\"100%\" cellspacing=\"0\">
                            <thead>
                            <tr>
                             
                                <th>ID</th>
                                <th>Pavadinimas</th>
                                <th>Globali rolė</th>
                            </tr>
                            </thead>
                            <tbody>";

    if (is_array($positions_in_club) || is_object($positions_in_club)) {
        foreach ($positions_in_club as $position) {
            $text .= "<tr>
<td>" . $position['id'] . "</td>
<td><a href='" . $GLOBALS['url_path'] . "users/role.php?id=".$position['id']."'>" . $position['position_name'] . "</a></td>
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
                                <th>Vardas Pavardė</th>
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
<td><a href='" . $GLOBALS['url_path'] . "applications/edit_application.php?id=".$prasymas['id']."'>" . $prasymas['name'] . " " .$prasymas['surname']. "</a></td>
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