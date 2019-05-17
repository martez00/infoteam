<?php
if ((isset($_POST['username']) && isset($_POST['password']))) {
    unset($error_login_string);
    $auth_query = "SELECT users.*, positions.global_position FROM `users` LEFT JOIN positions ON positions.id = users.positions_id  WHERE `user_name`='" .
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
        $_SESSION['salary']=$user_res['salary'];
        $_SESSION['created_date']=$user_res['created_date'];
        $_SESSION['created_by']=$user_res['created_by'];
        $_SESSION['global_role']=$user_res['global_position'];
        if($user_res['global_position']==5) $_SESSION['user_is_admin']=1;
    } else {
        $error_login_string = "<p>Prisijungti nepavyko! Neteisingi prisijungimo duomenys.</p>";
        $error_login_string = "<div class='alert alert-danger mx-auto mt-3'>$error_login_string</div>";
    }
}
if (!isset($_SESSION['user']) || $_SESSION['user_id'] < 1) {
    session_unset();
    $_SESSION = array();
    require $_SERVER['DOCUMENT_ROOT'] . "/" . $folder . '/system/auth/login.php';
    exit;
}
