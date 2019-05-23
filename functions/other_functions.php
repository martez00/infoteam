<?php
function return_transactions_table($items, $kiek_viso_irasu, $limit_key, $page)
{
    $text = "";
    $text = "
                        <table class=\"table-simple\">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Suma</th>
                                <th>Debetas/Kreditas</th>
                                <th>Tipas</th>
                                <th>Užbaigti iki</th>
                                <th>Statusas</th>
                            </tr>
                            </thead>
                            <tbody>";

    if (is_array($items) || is_object($items)) {
        foreach ($items as $item) {
            $text .= "<tr>
<td><a href='" . $GLOBALS['url_path'] . "transactions/transaction.php?id=" . $item['id'] . "' target='_blank'><b>" . $item['id'] . "</b></a></td>
<td>" . $item['amount']  . "</td>
<td>" . debet_credit_list($item['debit_credit'], true) . "</td>
<td>" . transaction_assigned_to($item['type'], true) . "</td>
<td>" . $item['due_date']  . "</td>
<td>" . transactions_status_list($item['status'], true) . "</td>
</tr>";
        }
        if ($kiek_viso_irasu > $limit_key) {
            $text .= "<tr><td colspan='7' style='padding: 5px;'>";
            $viso_puslapiu = ceil($kiek_viso_irasu / $limit_key);
            for ($i = 1; $i <= $viso_puslapiu; $i++) {
                if ($i == $page) $class = "btn_active_page";
                else $class = "btn_page";
                $text .= "<a class='btn $class' onclick='set_page($i)'>$i</a>";
            }
            $text .= "</td></tr>";
        }
    } else $text .= "<tr><td colspan='7'>Tinkamų atvaizduoti duomenų nėra!</td></tr>";
    $text .= " </tbody>
                        </table>
                   ";
    return $text;
}

function return_players_table($items, $kiek_viso_irasu, $limit_key, $page)
{
    global $mysqli;
    $text = "";
    $text = "
                        <table class=\"table-simple\">
                            <thead>
                            <tr>
                                <th>Vardas Pavardė</th>
                                <th>Komanda</th>
                                <th>Stebėti?</th>
                                <th>Šalis</th>
                                <th>Pozicija</th>
                                <th>Gimimo data</th>
                                <th>El. paštas</th>
                                <th>Mob. nr.</th>
                            </tr>
                            </thead>
                            <tbody>";

    if (is_array($items) || is_object($items)) {
        foreach ($items as $item) {
            $text .= "<tr>
<td><a href='" . $GLOBALS['url_path'] . "players/player.php?id=" . $item['id'] . "' target='_blank'><b>" . $item['name'] . " " . $item['surname'] . "</b></a></td>
<td>" . teams_list($item['team_id'], true, $mysqli) . "</td>
<td>" . taip_ne_list($item['need_to_scout'], true, NULL) . "</td>
<td>" . $item['country'] . "</td>
<td>" . positions_list($item['position_in_field'], true) . "</td>
<td>" . $item['birth_date'] . "</td>
<td>" . $item['email'] . "</td>
<td>" . $item['mob_number'] . "</td>
</tr>";
        }
        if ($kiek_viso_irasu > $limit_key) {
            $text .= "<tr><td colspan='8' style='padding: 5px;'>";
            $viso_puslapiu = ceil($kiek_viso_irasu / $limit_key);
            for ($i = 1; $i <= $viso_puslapiu; $i++) {
                if ($i == $page) $class = "btn_active_page";
                else $class = "btn_page";
                $text .= "<a class='btn $class' onclick='set_page($i)'>$i</a>";
            }
            $text .= "</td></tr>";
        }
    } else $text .= "<tr><td colspan='8'>Tinkamų atvaizduoti duomenų nėra!</td></tr>";
    $text .= " </tbody>
                        </table>
                   ";
    return $text;
}

function return_players_ratings_table($items, $kiek_viso_irasu, $limit_key, $page)
{
    global $mysqli;
    $text = "";
    $text = "
                        <table class=\"table-simple\">
                            <thead>
                            <tr>
                                <th>Vardas Pavardė</th>
                                <th>Komanda</th>
                                <th>Vid. reitingas</th>
                            </tr>
                            </thead>
                            <tbody>";

    if (is_array($items) || is_object($items)) {
        foreach ($items as $item) {
            $text .= "<tr>
<td><a href='" . $GLOBALS['url_path'] . "players/rating.php?id=" . $item['id'] . "' target='_blank'><b>" . $item['name'] . " " . $item['surname'] . "</b></a></td>
<td>" . teams_list($item['team_id'], true, $mysqli) . "</td>
<td>" . $item['rtg'] . "</td>
</tr>";
        }
        if ($kiek_viso_irasu > $limit_key) {
            $text .= "<tr><td colspan='3' style='padding: 5px;'>";
            $viso_puslapiu = ceil($kiek_viso_irasu / $limit_key);
            for ($i = 1; $i <= $viso_puslapiu; $i++) {
                if ($i == $page) $class = "btn_active_page";
                else $class = "btn_page";
                $text .= "<a class='btn $class' onclick='set_page($i)'>$i</a>";
            }
            $text .= "</td></tr>";
        }
    } else $text .= "<tr><td colspan='3'>Tinkamų atvaizduoti duomenų nėra!</td></tr>";
    $text .= " </tbody>
                        </table>
                   ";
    return $text;
}

function return_players_salaries_table($items, $kiek_viso_irasu, $limit_key, $page)
{
    global $mysqli;
    $text = "";
    $text = "
                        <table class=\"table-simple\">
                            <thead>
                            <tr>
                                <th>Vardas Pavardė</th>
                                <th>Komanda</th>
                                <th>Atlyginimas</th>
                            </tr>
                            </thead>
                            <tbody>";

    if (is_array($items) || is_object($items)) {
        foreach ($items as $item) {
            $text .= "<tr>
<td><a href='" . $GLOBALS['url_path'] . "main/salary.php?player_id=" . $item['id'] . "' target='_blank'><b>" . $item['name'] . " " . $item['surname'] . "</b></a></td>
<td>" . teams_list($item['team_id'], true, $mysqli) . "</td>
<td>" . $item['salary'] . "</td>
</tr>";
        }
        if ($kiek_viso_irasu > $limit_key) {
            $text .= "<tr><td colspan='3' style='padding: 5px;'>";
            $viso_puslapiu = ceil($kiek_viso_irasu / $limit_key);
            for ($i = 1; $i <= $viso_puslapiu; $i++) {
                if ($i == $page) $class = "btn_active_page";
                else $class = "btn_page";
                $text .= "<a class='btn $class' onclick='set_page($i)'>$i</a>";
            }
            $text .= "</td></tr>";
        }
    } else $text .= "<tr><td colspan='3'>Tinkamų atvaizduoti duomenų nėra!</td></tr>";
    $text .= " </tbody>
                        </table>
                   ";
    return $text;
}

function return_users_table($users, $kiek_viso_irasu, $limit_key, $page)
{
    global $rights;
    $text = "";
    $text = "
                        <table class='table-simple'>
                            <thead>
                            <tr>";
    $text .= " <th>Slapyvardis</th>
                                <th>Vardas</th>
                                <th>Pavardė</th>
                                <th>Rolė</th>
                                <th>El. paštas</th>
                                <th>Tel. nr.</th>
                                <th>Ar dirba?</th>
                            </tr>
                            </thead>
                            <tbody>";

    if (is_array($users) || is_object($users)) {
        foreach ($users as $user) {
            $text .= "<tr>";
            if ($rights['leisti_perziureti']==1) $text .= "<td><a href='" . $GLOBALS['url_path'] . "users/user.php?id=" . $user['id'] . "' target='_blank'><b>" . $user['user_name'] . "</b></a></td>";
            else $text .= "<td>" . $user['user_name'] . "</td>";
            $text .= "<td>" . $user['name'] . "</td>
                    <td>" . $user['surname'] . "</td>
                    <td>" . positions_in_club_list($user['role_id'], true) . "</td>
                    <td>" . $user['email'] . "</td>
                    <td>" . $user['mob_number'] . "</td>
                    <td>" . taip_ne_list($user['working'], true, NULL) . "</td>
                    </tr>";
        }
        if ($kiek_viso_irasu > $limit_key) {
            $text .= "<tr><td colspan='7' style='padding: 5px;'>";
            $viso_puslapiu = ceil($kiek_viso_irasu / $limit_key);
            for ($i = 1; $i <= $viso_puslapiu; $i++) {
                if ($i == $page) $class = "btn_active_page";
                else $class = "btn_page";
                $text .= "<a class='btn $class' onclick='set_page($i)'>$i</a>";
            }
            $text .= "</td></tr>";
        }
    } else $text .= "<tr><td colspan='7'>Tinkamų atvaizduoti duomenų nėra!</td></tr>";
    $text .= " </tbody>";
    $text .= "</table>";
    return $text;
}

function return_users_salaries_table($users, $kiek_viso_irasu, $limit_key, $page)
{
    global $rights;
    $text = "";
    $text = "
                        <table class='table-simple'>
                            <thead>
                            <tr>";
    $text .= "<th>Vardas Pavardė</th>
                                <th>Rolė</th>
                                <th>Atlyginimas</th>
                            </tr>
                            </thead>
                            <tbody>";

    if (is_array($users) || is_object($users)) {
        foreach ($users as $user) {
            if($user['name'] || $user['surname'])
                $username=$user['name']." ".$user['surname'];
            else $username=$user['user_name'];
            $text .= "<tr>";
            $text .= "<td><a href='" . $GLOBALS['url_path'] . "main/salary.php?user_id=" . $user['id'] . "' target='_blank'><b>" . $username . "</b></a></td>";
            $text .= "<td>" . positions_in_club_list($user['role_id'], true) . "</td>
                    <td>" . $user['salary'] . "</td>
                    </tr>";
        }
        if ($kiek_viso_irasu > $limit_key) {
            $text .= "<tr><td colspan='3' style='padding: 5px;'>";
            $viso_puslapiu = ceil($kiek_viso_irasu / $limit_key);
            for ($i = 1; $i <= $viso_puslapiu; $i++) {
                if ($i == $page) $class = "btn_active_page";
                else $class = "btn_page";
                $text .= "<a class='btn $class' onclick='set_page($i)'>$i</a>";
            }
            $text .= "</td></tr>";
        }
    } else $text .= "<tr><td colspan='3'>Tinkamų atvaizduoti duomenų nėra!</td></tr>";
    $text .= " </tbody>";
    $text .= "</table>";
    return $text;
}

function return_teams_table($items, $kiek_viso_irasu, $limit_key, $page)
{
    $text = "";
    $text = "
                        <table class='table-simple'>
                            <thead>
                            <tr>
                                <th>Pavadinimas</th>
                                <th>Trumpas pavadinimas</th>
                                <th>Pagrindinė komanda?</th>
                            </tr>
                            </thead>
                            <tbody>";

    if (is_array($items) || is_object($items)) {
        foreach ($items as $item) {
            $text .= "<tr>
<td><a href='" . $GLOBALS['url_path'] . "teams/team.php?id=" . $item['id'] . "' target='_blank'><b>" . $item['name'] . "</b></a></td>
<td>" . $item['short_name'] . "</td>
<td>" . taip_ne_list($item['main_team'], true, NULL) . "</td>
</tr>";
        }
        if ($kiek_viso_irasu > $limit_key) {
            $text .= "<tr><td colspan='3' style='padding: 5px;'>";
            $viso_puslapiu = ceil($kiek_viso_irasu / $limit_key);
            for ($i = 1; $i <= $viso_puslapiu; $i++) {
                if ($i == $page) $class = "btn_active_page";
                else $class = "btn_page";
                $text .= "<a class='btn $class' onclick='set_page($i)'>$i</a>";
            }
            $text .= "</td></tr>";
        }
    } else $text .= "<tr><td colspan='3'>Tinkamų atvaizduoti duomenų nėra!</td></tr>";
    $text .= " </tbody></table>";
    return $text;
}

function return_actions_table($items, $kiek_viso_irasu, $limit_key, $page)
{
    $text = "";
    $text = "
                        <table class='table-simple'>
                            <thead>
                            <tr>
                                <th>Veiksmo ID</th>
                                <th>Įrašas</th>
                                <th>Veiksmas</th>
                                <th>Kas atliko</th>
                                <th>Kada atlikta</th>
                            </tr>
                            </thead>
                            <tbody>";

    if (is_array($items) || is_object($items)) {
        foreach ($items as $item) {
            if($item['table_name']=='teams') $href="<a href='$GLOBALS[url_path]teams/team.php?id=$item[record_id]' target='_blank'>$item[record_name]</a>";
            $text .= "<tr>
<td>" . $item['id'] . "</td>
<td>" . $href . "</td>
<td>" . actions_list($item['action'], true) . "</td>
<td>" . get_user_by_id($item['made_by']) . "</td>
<td>" . $item['action_date'] . "</td>
</tr>";
        }
        if ($kiek_viso_irasu > $limit_key) {
            $text .= "<tr><td colspan='5' style='padding: 5px;'>";
            $viso_puslapiu = ceil($kiek_viso_irasu / $limit_key);
            for ($i = 1; $i <= $viso_puslapiu; $i++) {
                if ($i == $page) $class = "btn_active_page";
                else $class = "btn_page";
                $text .= "<a class='btn $class' onclick='set_page($i)'>$i</a>";
            }
            $text .= "</td></tr>";
        }
    } else $text .= "<tr><td colspan='5'>Tinkamų atvaizduoti duomenų nėra!</td></tr>";
    $text .= " </tbody></table>";
    return $text;
}

function return_applications_table($prasymai, $kiek_viso_irasu, $limit_key, $page)
{
    $text = "";
    $text = "
                        <table class=\"table-simple\">
                            <thead>
                            <tr>
                                <th>Vardas Pavardė</th>
                                <th>Šalis</th>
                                <th>Pozicija</th>
                                <th>Gimimo data</th>
                                <th>El. paštas</th>
                                <th>Mob. nr.</th>
                                <th>Prašymo data</th>
                            </tr>
                            </thead>
                            <tbody>";

    if (is_array($prasymai) || is_object($prasymai)) {
        foreach ($prasymai as $prasymas) {
            $text .= "<tr>
<td><a href='" . $GLOBALS['url_path'] . "applications/edit_application.php?id=" . $prasymas['id'] . "' target='_blank'><b>" . $prasymas['name'] . " " . $prasymas['surname'] . "</b></a></td>
<td>" . $prasymas['country'] . "</td>
<td>" . positions_list($prasymas['position_in_field'], true) . "</td>
<td>" . $prasymas['birth_date'] . "</td>
<td>" . $prasymas['email'] . "</td>
<td>" . $prasymas['mob_number'] . "</td>
<td>" . $prasymas['created_date'] . "</td>
</tr>";
        }
        if ($kiek_viso_irasu > $limit_key) {
            $text .= "<tr><td colspan='7' style='padding: 5px;'>";
            $viso_puslapiu = ceil($kiek_viso_irasu / $limit_key);
            for ($i = 1; $i <= $viso_puslapiu; $i++) {
                if ($i == $page) $class = "btn_active_page";
                else $class = "btn_page";
                $text .= "<a class='btn $class' onclick='set_page($i)'>$i</a>";
            }
            $text .= "</td></tr>";
        }
    } else $text .= "<tr><td colspan='7'>Tinkamų atvaizduoti duomenų nėra!</td></tr>";
    $text .= " </tbody>
                        </table>
                   ";
    return $text;
}

function format_applications_notes($mysqli, $id)
{
    $prasymo_notes_arr = mfa_kaip_array($mysqli, "SELECT applications_notes.*, users.name, users.surname, tracking_made_actions.action_date  from applications_notes LEFT JOIN tracking_made_actions ON tracking_made_actions.table_name='applications_notes' AND tracking_made_actions.record_id=applications_notes.id AND tracking_made_actions.action='I' LEFT JOIN users ON users.id=tracking_made_actions.made_by where applications_to_club_id='$id' GROUP BY applications_notes.id ORDER BY tracking_made_actions.action_date DESC ");
    $text = "";
    if (is_array($prasymo_notes_arr)) {
        foreach ($prasymo_notes_arr as $note) {
            $note_id = $note['id'];
            $text .= "<div class='form-row' style='margin-top:5px;'><div class='col-md-11'>• <a data-toggle=\"modal\" data-target=\"#edit_application_note\" data-id='" . $note['id'] . "' data-appid='$id' data-notes='" . $note['notes'] . "'><img src='" . $GLOBALS['url_path'] . "images/edit.png'></button> <a onclick='delete_application_note(\"$note_id\", \"$id\")'><img src='" . $GLOBALS['url_path'] . "images/delete.png'></a> <small><i>" . date("Y-m-d", strtotime($note['action_date'])) . " " . $note['name'] . " " . $note['surname'] . ":</i></small> " . $note['notes'] . "</div></div>";
        }
    }
    return $text;
}

function format_users_notes($mysqli, $id)
{
    $item_arr = mfa_kaip_array($mysqli, "SELECT users_notes.*, users.name, users.surname, tracking_made_actions.action_date  from users_notes LEFT JOIN tracking_made_actions ON tracking_made_actions.table_name='users_notes' AND tracking_made_actions.record_id=users_notes.id AND tracking_made_actions.action='I' LEFT JOIN users ON users.id=tracking_made_actions.made_by where users_notes.users_id='$id' GROUP BY users_notes.id ORDER BY tracking_made_actions.action_date DESC ");
    $text = "";
    if (is_array($item_arr)) {
        foreach ($item_arr as $note) {
            $note_id = $note['id'];
            $text .= "<div class='form-row' style='margin-top:5px;'><div class='col-md-11'>• <a data-toggle=\"modal\" data-target=\"#edit_user_note\" data-id='" . $note['id'] . "' data-item_id='$id' data-notes='" . $note['notes'] . "'><img src='" . $GLOBALS['url_path'] . "images/edit.png'></button> <a onclick='delete_user_note(\"$note_id\", \"$id\")'><img src='" . $GLOBALS['url_path'] . "images/delete.png'></a> <small><i>" . date("Y-m-d", strtotime($note['action_date'])) . " " . $note['name'] . " " . $note['surname'] . ":</i></small> " . $note['notes'] . "</div></div>";
        }
    }
    return $text;
}

function format_players_notes($mysqli, $id)
{
    $item_arr = mfa_kaip_array($mysqli, "SELECT players_notes.*, users.name, users.surname, tracking_made_actions.action_date  from players_notes LEFT JOIN tracking_made_actions ON tracking_made_actions.table_name='players_notes' AND tracking_made_actions.record_id=players_notes.id AND tracking_made_actions.action='I' LEFT JOIN users ON users.id=tracking_made_actions.made_by where players_notes.players_id='$id' GROUP BY players_notes.id ORDER BY tracking_made_actions.action_date DESC ");
    $text = "";
    if (is_array($item_arr)) {
        foreach ($item_arr as $note) {
            $note_id = $note['id'];
            $text .= "<div class='form-row' style='margin-top:5px;'><div class='col-md-11'>• <a data-toggle=\"modal\" data-target=\"#edit_player_note\" data-id='" . $note['id'] . "' data-item_id='$id' data-notes='" . $note['notes'] . "'><img src='" . $GLOBALS['url_path'] . "images/edit.png'></button> <a onclick='delete_player_note(\"$note_id\", \"$id\")'><img src='" . $GLOBALS['url_path'] . "images/delete.png'></a> <small><i>" . date("Y-m-d", strtotime($note['action_date'])) . " " . $note['name'] . " " . $note['surname'] . ":</i></small> " . $note['notes'] . "</div></div>";
        }
    }
    return $text;
}

function format_players_ratings($mysqli, $id)
{
    $item_arr = mfa_kaip_array($mysqli, "SELECT players_ratings.*, users.name, users.surname, tracking_made_actions.action_date  from players_ratings LEFT JOIN tracking_made_actions ON tracking_made_actions.table_name='players_ratings' AND tracking_made_actions.record_id=players_ratings.id AND tracking_made_actions.action='I' LEFT JOIN users ON users.id=tracking_made_actions.made_by where players_ratings.players_id='$id' GROUP BY players_ratings.id ORDER BY tracking_made_actions.action_date DESC ");
    $text = "";
    if (is_array($item_arr)) {
        foreach ($item_arr as $rating) {
            $rating_id = $rating['id'];
            $text .= "<div class='form-row' style='margin-top:5px;'><div class='col-md-11'>• <a onclick='delete_player_rating(\"$rating_id\", \"$id\")'><img src='" . $GLOBALS['url_path'] . "images/delete.png'></a> <small><i>" . date("Y-m-d H:i", strtotime($rating['action_date'])) . " " . $rating['name'] . " " . $rating['surname'] . ":</i></small> " . $rating['rating'] . "</div></div>";
        }
    }
    return $text;
}

function format_transactions_notes($mysqli, $id)
{
    $item_arr = mfa_kaip_array($mysqli, "SELECT transactions_notes.*, users.name, users.surname, tracking_made_actions.action_date  from transactions_notes LEFT JOIN tracking_made_actions ON tracking_made_actions.table_name='transactions_notes' AND tracking_made_actions.record_id=transactions_notes.id AND tracking_made_actions.action='I' LEFT JOIN users ON users.id=tracking_made_actions.made_by where transactions_notes.transactions_id='$id' GROUP BY transactions_notes.id ORDER BY tracking_made_actions.action_date DESC ");
    $text = "";
    if (is_array($item_arr)) {
        foreach ($item_arr as $note) {
            $note_id = $note['id'];
            $text .= "<div class='form-row' style='margin-top:5px;'><div class='col-md-11'>• <a data-toggle=\"modal\" data-target=\"#edit_transaction_note\" data-id='" . $note['id'] . "' data-item_id='$id' data-notes='" . $note['notes'] . "'><img src='" . $GLOBALS['url_path'] . "images/edit.png'></button> <a onclick='delete_transaction_note(\"$note_id\", \"$id\")'><img src='" . $GLOBALS['url_path'] . "images/delete.png'></a> <small><i>" . date("Y-m-d", strtotime($note['action_date'])) . " " . $note['name'] . " " . $note['surname'] . ":</i></small> " . $note['notes'] . "</div></div>";
        }
    }
    return $text;
}

function check_player_by_personal_code($mysqli, $personal_code){
    $exist_with_personal_code=mfa($mysqli, "SELECT * from players WHERE personal_code='$personal_code'");
    return $exist_with_personal_code;
}

function check_application_by_personal_code($mysqli, $personal_code){
    $exist_with_personal_code=mfa($mysqli, "SELECT * from applications_to_club WHERE personal_code='$personal_code'");
    return $exist_with_personal_code;
}

function create_player_by_application($mysqli, $application_arr){
    $player = check_player_by_personal_code($mysqli, $application_arr[personal_code]);
    if(!isset($player)) {
        unset($application_arr["id"]);
        unset($application_arr["created_date"]);
        unset($application_arr["checked_by"]);
        unset($application_arr["status"]);
        unset($application_arr["other"]);
        unset($application_arr["motivation_letter"]);
        unset($application_arr["about"]);
        $application_arr["need_to_scout"] = -1;
        $id = InsertField($mysqli, $application_arr, "players", true, true);
        $created_player = mfa($mysqli, "SELECT * from players WHERE id='$id'");
        return $created_player;
    }
}

function check_if_exists_main_team($mysqli, $id){
    if(isset($id)) $where=" AND teams.id!='$id' ";
    $exists_main_team=mfa($mysqli,"SELECT * from teams WHERE main_team='1' $where");
    return $exists_main_team;
}

function get_user_by_id($id){
    global $mysqli;
    $user=gor($mysqli, "SELECT user_name from users where id='$id'");
    return $user;
}
