<?php
function gor($mysqli, $sql)
{
    if (!preg_match('/LIMIT\s+\d/i', $sql) && stripos($sql, 'SELECT') !== false) {
        $kabliataskis = strpos($sql, ";");
        if ($kabliataskis > 0)
            $sql = substr_replace($sql, ' LIMIT 1 ;', $kabliataskis, 1);
        else
            $sql = "$sql LIMIT 1";
    }
    $r = mysqli_query($mysqli, $sql);
    if ($e = mysqli_error($mysqli))
        echo "<div class='error'>$e<p><pre>$sql</pre></p></div>";
    return mysqli_fetch_row($r)[0];
}

function mfa($mysqli, $sql)
{
    if (mysqli_num_rows($res = mysqli_query($mysqli, $sql)) > 1) {
        $ret = false;
        while ($r = mysqli_fetch_assoc($res)) {
            $ret[] = $r;
        }
        return $ret;
    } else {
        if ($e = mysqli_error($mysqli)) {
            echo "<div class='error'>$e<pre>$sql</pre></div>";
            return;
        }
        return mysqli_fetch_assoc($res);
    }
}

function mfa_kaip_array($mysqli, $sql)
{
    $res = mysqli_query($mysqli, $sql);
    $ret = false;
    while ($r = mysqli_fetch_assoc($res)) {
        $ret[] = $r;
    }
    if ($e = mysqli_error($mysqli)) {
        echo "<div class='error'>$e<pre>$sql</pre></div>";
        return;
    }
    return $ret;
}

function send_mysqli_query($mysqli, $sql, $return_insert_id = false, $do_not_echo_error = false)
{
    $sql = str_ireplace("TYPE=HEAP", " ", $sql);
    $rezultatas = mysqli_query($mysqli, $sql);
    $e = mysqli_error($mysqli);

    if ($e && $do_not_echo_error==false) {
           echo "<div>Klaida dirbant programa. Patikrinkite programos nustatymus, vedamą informaciją. Jei problema išlieka, rašykite susisiekita su programos kūrėjais.<br>Vykdant SQL užklausą:" . trim($sql) . "<br><b>Gauta klaida:$e</div>";
    }

    if ($return_insert_id==true && $rezultatas) {
        $insert_id = mysqli_insert_id($mysqli);
        $rezultatas = $insert_id;
    }

    return $rezultatas;
}

function InsertField($mysqli, $insert_arr, $table, $register_for_tracking = false, $return_insert_id = false){
    $columns="";
    $values="";
    foreach ($insert_arr as $key => $value){
        $columns .= " `$key`,";
        $values .= " '" . trim($value) . "',";
    }
    $sql = "INSERT INTO $table (" . substr($columns, 0, -1) . ") VALUES (" . substr($values, 0, -1) . ")";
    $insert_id = send_mysqli_query($mysqli, $sql, true);
    if($register_for_tracking==true){
        if(isset($_SESSION['user_id'])) {
            $who_made['value'] = ", '".$_SESSION['user_id']."'";
            $who_made['name'] = ", `made_by`";
        }
        else {
            $who_made['value'] = "";
            $who_made['name'] = "";
        }
        $sql_tracking = "INSERT INTO tracking_made_actions (`action`, `action_date`, `table_name`, `record_id` ".$who_made['name'].") VALUES ('I', '".date("Y-m-d H:i:s", strtotime("now"))."', '$table', '$insert_id' ".$who_made['value'].")";
        send_mysqli_query($mysqli, $sql_tracking);
    }
    if($return_insert_id==true)
        return $insert_id;
}

function UpdateField($mysqli, $update_arr, $table, $register_for_tracking = false, $update_id){
    $update_text="";
    foreach ($update_arr as $key => $value){
       $update_text .="`$key`='$value',";
    }
    $sql = "UPDATE $table SET ".substr($update_text, 0, -1)." WHERE id='$update_id'";
    send_mysqli_query($mysqli, $sql);
    if($register_for_tracking==true){
        if(isset($_SESSION['user_id'])) {
            $who_made['value'] = ", '".$_SESSION['user_id']."'";
            $who_made['name'] = ", `made_by`";
        }
        else {
            $who_made['value'] = "";
            $who_made['name'] = "";
        }
        $sql_tracking = "INSERT INTO tracking_made_actions (`action`, `action_date`, `table_name`, `record_id` ".$who_made['name'].") VALUES ('U', '".date("Y-m-d H:i:s", strtotime("now"))."', '$table', '$update_id' ".$who_made['value'].")";
        send_mysqli_query($mysqli, $sql_tracking);
    }
}

function DeleteField($mysqli, $delete_id, $table, $register_for_tracking = false){
    $delete_text="";
    $sql = "DELETE FROM $table WHERE id='$delete_id'";
    send_mysqli_query($mysqli, $sql);
    if($register_for_tracking==true){
        if(isset($_SESSION['user_id'])) {
            $who_made['value'] = ", '".$_SESSION['user_id']."'";
            $who_made['name'] = ", `made_by`";
        }
        else {
            $who_made['value'] = "";
            $who_made['name'] = "";
        }
        $sql_tracking = "INSERT INTO tracking_made_actions (`action`, `action_date`, `table_name`, `record_id` ".$who_made['name'].") VALUES ('U', '".date("Y-m-d H:i:s", strtotime("now"))."', '$table', '$delete_id' ".$who_made['value'].")";
        send_mysqli_query($mysqli, $sql_tracking);
    }
}