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
        if($value=="NULL") $values .= " " . trim($value) . ",";
        else $values .= " '" . trim($value) . "',";
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
        if($value=="NULL") $update_text .="`$key`=$value,";
        else $update_text .="`$key`='$value',";
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
function do_dump(&$var, $var_name = NULL, $indent = NULL, $reference = NULL)
{
    $do_dump_indent = "<span style='color:#eeeeee;'>|</span> &nbsp;&nbsp; ";
    $reference = $reference . $var_name;
    $keyvar = 'the_do_dump_recursion_protection_scheme';
    $keyname = 'referenced_object_name';
    if (is_array($var) && isset($var[$keyvar])) {
        $real_var = &$var[$keyvar];
        $real_name = &$var[$keyname];
        $type = ucfirst(gettype($real_var));
        echo "$indent$var_name <span style='color:#a2a2a2'>$type</span> = <span style='color:#e87800;'>&amp;$real_name</span><br>";
    } else {
        $var = array($keyvar => $var, $keyname => $reference);
        $avar = &$var[$keyvar];
        $type = ucfirst(gettype($avar));
        if ($type == "String")
            $type_color = "<span style='color:green'>";
        elseif ($type == "Integer")
            $type_color = "<span style='color:red'>";
        elseif ($type == "Double") {
            $type_color = "<span style='color:#0099c5'>";
            $type = "Float";
        } elseif ($type == "Boolean")
            $type_color = "<span style='color:#92008d'>";
        elseif ($type == "NULL")
            $type_color = "<span style='color:black'>";
        if (is_array($avar)) {
            $count = count($avar);
            echo "$indent" . ($var_name ? "$var_name => " : "") . "<span style='color:#a2a2a2'>$type ($count)</span><br>$indent(<br>";
            $keys = array_keys($avar);
            foreach ($keys as $name) {
                $value = &$avar[$name];
                do_dump($value, "['$name']", $indent . $do_dump_indent, $reference);
            }
            echo "$indent)<br>";
        } elseif (is_object($avar)) {
            echo "$indent$var_name <span style='color:#a2a2a2'>$type</span><br>$indent(<br>";
            foreach ($avar as $name => $value)
                do_dump($value, "$name", $indent . $do_dump_indent, $reference);
            echo "$indent)<br>";
        } elseif (is_int($avar))
            echo "$indent$var_name = <span style='color:#a2a2a2'>$type(" . strlen($avar) . ")</span> $type_color$avar</span><br>";
        elseif (is_string($avar))
            echo "$indent$var_name = <span style='color:#a2a2a2'>$type(" . strlen($avar) . ")</span> $type_color\"$avar\"</span><br>";
        elseif (is_float($avar))
            echo "$indent$var_name = <span style='color:#a2a2a2'>$type(" . strlen($avar) . ")</span> $type_color$avar</span><br>";
        elseif (is_bool($avar))
            echo "$indent$var_name = <span style='color:#a2a2a2'>$type(" . strlen($avar) . ")</span> $type_color" . ($avar == 1 ? "TRUE" : "FALSE") . "</span><br>";
        elseif (is_null($avar))
            echo "$indent$var_name = <span style='color:#a2a2a2'>$type(" . strlen($avar) . ")</span> {$type_color}NULL</span><br>";
        else
            echo "$indent$var_name = <span style='color:#a2a2a2'>$type(" . strlen($avar) . ")</span> $avar<br>";
        $var = $var[$keyvar];
    }
}
function dump($var, $info = FALSE)
{
    if (func_num_args() == 0)
        $var = $_POST;
    $scope = false;
    $prefix = 'unique';
    $suffix = 'value';
    if ($scope)
        $vals = $scope;
    else
        $vals = $GLOBALS;
    $old = $var;
    $var = $new = $prefix . rand() . $suffix;
    $vname = FALSE;
    foreach ($vals as $key => $val)
        if ($val === $new)
            $vname = $key;
    $var = $old;
    echo "<pre style='text-align: left; margin: 0px 0px 10px 0px; display: block; background: white; color: black; font-family: Verdana; border: 1px solid #cccccc; padding: 5px; font-size: 10px; line-height: 13px;'>";
    if ($info != FALSE)
        echo "<b style='color: red;'>$info:</b><br>";
    do_dump($var, '$' . $vname);
    echo "</pre>";
}
function insert_file($table, $table_name_key, $id, $file_arr){
    global $folder;
    global $mysqli;
    $target_dir = "uploads/";
    $target_file = $_SERVER['DOCUMENT_ROOT']."/$folder/$target_dir" . basename($file_arr["name"]);
    $file_path=$target_dir.basename($file_arr["name"]);
    $uploadOk = 1;
// Check if file already exists
    if (file_exists($target_file)) {
        $response="duplicate";
        $uploadOk = 0;
    }
// Check file size
    if ($file_arr["size"] > 500000) {
        $response="too_large";
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        //echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($file_arr["tmp_name"], $target_file)) {
            $response="success";
            $insert_arr[$table_name_key]=$id;
            $insert_arr[file_path]=$file_path;
            InsertField($mysqli, $insert_arr, $table, true);
        } else {
            $response="error_uploading";
        }
    }
    return $response;
}
function format_sql_from_search($pradinis_sql, $info_from_post, $order_by, $group_by){
    if(!$order_by){
        $order_by="ORDER BY id DESC";
    }
    if(!$info_from_post['page']) $page=1;
    else $page=$info_from_post['page'];
    $limit_key=10;
    $end_limit=$page*$limit_key;
    $start_limit=$end_limit-$limit_key;
    $sql = $pradinis_sql;
    if($info_from_post['search']){
        $search_arr=$info_from_post['search'];
        $sql_where="";
        foreach($search_arr as $key => $value){
            if(isset($value) && $value!='0' && $value!=''){
                $sql_where .=" AND $key='$value' ";
            }
        }
    }
    $sql .= $sql_where;
    $sql .= " $group_by $order_by LIMIT $start_limit, $end_limit ";
    $arr["sql"]=$sql;
    $arr["sql_where"]=$sql_where;
    $arr["search_arr"]=$search_arr;
    return $arr;
}

?>
