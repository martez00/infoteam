<?php
if ((isset($_POST['username']) && isset($_POST['password']))) {
        $auth_query = "SELECT * FROM `users` WHERE `user`='" .
            str_replace("'", "", stripslashes($_POST['username'])) .
            "' AND `password`= '" .
            str_replace("'", "", stripslashes($_POST['password']))
            . "'";

    $auth_query .= " LIMIT 0,1";
    $user_res = mysql_fetch_array(send_mysql_query($auth_query), MYSQL_ASSOC);

    if ($user_res) {
        //gerai prisijunge
    } else {
        $error_string = "<p>Prisijungti nepavyko! Neteisingi prisijungimo duomenys.</p>";
        $error_string .= "<p>Authentication failed! You entered an incorrect username or password!</p>";
        $error_string .= "<p>Неверный логин или пароль!</p>";
        echo "<div class='error'>$error_string</div>";
        unset($error_string);
    }
}
if (!isset($_SESSION['user']) || $_SESSION[user_id] < 1 || $_SESSION['mysql_db_name'] !== "$db_name") {
    session_unset();
    $_SESSION = array();
    require $_SERVER['DOCUMENT_ROOT'] . "/" . $folder . '/login.php';
    exit;
}