<?php
if ((isset($_POST['username']) && isset($_POST['password']))) {
    $auth_query = "SELECT * FROM `users` WHERE `user_name`='" .
            str_replace("'", "", stripslashes($_POST['username'])) .
            "' AND `password`= '" .
            str_replace("'", "", stripslashes($_POST['password']))
            . "'";

    $auth_query .= " LIMIT 0,1";
    $user_res = mysqli_fetch_array(mysqli_query($mysqli, $auth_query), MYSQLI_ASSOC);
    if (isset($user_res)) {
        $_SESSION['user']=strtolower($user_res['user_name']);
        $_SESSION['user_id']=$user_res['id'];
        $_SESSION['name']=$user_res['name'];
        $_SESSION['surname']=$user_res['surname'];
        $_SESSION['birth_date']=$user_res['birth_date'];
        $_SESSION['country']=$user_res['country'];
        $_SESSION['positions_id']=$user_res['positions_id'];
        $_SESSION['positions_id']=$user_res['positions_id'];
        $_SESSION['salary']=$user_res['salary'];
        $_SESSION['created_date']=$user_res['created_date'];
        $_SESSION['created_by']=$user_res['created_by'];
    } else {
        $error_string = "<p>Prisijungti nepavyko! Neteisingi prisijungimo duomenys.</p>";
        $error_string .= "<p>Authentication failed! You entered an incorrect username or password!</p>";
        $error_string .= "<p>Неверный логин или пароль!</p>";
        echo "<div class='error'>$error_string</div>";
        unset($error_string);
    }
}
if (!isset($_SESSION['user']) || $_SESSION['user_id'] < 1) {
    session_unset();
    $_SESSION = array();
    require $_SERVER['DOCUMENT_ROOT'] . "/" . $folder . '/login.php';
    exit;
}