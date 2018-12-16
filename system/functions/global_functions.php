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
    return reset(mysqli_fetch_row($r));
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
    if ($e && !$do_not_echo_error) {
           echo "<div class=warning>" . __("Klaida dirbant programa. Patikrinkite programos nustatymus, vedamą informaciją.", "klaida_dirbant_programa", "global_functions") . "<br>" . __("Jei problema išlieka, rašykite į <b>pagalba@infotransport.eu</b>.", "jei_problema_islieka", "global_functions") . "<br><span style='color:red;'><b>* " . __("Jei problemą iššaukė vartotojo veiksmai, jos sprendimas gali būti apmokestinamas.", "jei_problema_issauke", "global_functions") . "</b></span><br><br><b>" . __("Vykdant SQL užklausą:", "vykdant_sql", "global_functions") . "</b><br><span class='found' >" . trim($sql) . "</span><br><br><b>" . __("Gauta klaida:", "erroras", "global_functions") . "</b><br><span class='found' >$e</span></div>";
    }

    if ($return_insert_id && $rezultatas) {
        $insert_id = mysqli_insert_id($mysqli);
        $rezultatas = $insert_id;
    }

    return $rezultatas;
}