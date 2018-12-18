<?php
$path = $_SERVER['PHP_SELF'];
$pieces = explode("/", $path);
$folder = $pieces[1];

if (!isset($_SESSION['is_started']) && !isset($do_not_start_session)) {
    session_name("$folder");
    session_start();
    $_SESSION['is_started']=1;
}

require $_SERVER['DOCUMENT_ROOT'] . '/' . $folder . '/system/inc/setup_mysql.inc.php';
require $_SERVER['DOCUMENT_ROOT'] . '/' . $folder . '/system/inc/config.inc.php';
require $_SERVER['DOCUMENT_ROOT'] . '/' . $folder . '/config.php';

if (!$GLOBALS['folder']) {
    $pieces = explode("/", $_SERVER['PHP_SELF']);
    $GLOBALS['folder'] = $pieces[1];
}

$mysqli = mysqli_connect($host, $mysql_user, $pass) or die(mysqli_error($mysqli));;
if (!$mysqli) {
    exit;
}

mysqli_select_db($mysqli, 'infoteam') or die(mysqli_error($mysqli));
if (!isset($GLOBALS['html_charset']))
    $GLOBALS['html_charset'] = 'windows-1257';
mysqli_query($mysqli,"SET NAMES utf8");


$GLOBALS['url_path'] = 'http://' . $_SERVER['SERVER_NAME'] . '/' . $folder . '/';
$GLOBALS['mysql_db_name'] = $db_name;

if(!isset($do_not_start_session))
    require_once $_SERVER['DOCUMENT_ROOT'] . '/' . $folder . '/system/auth/auth_main.php';

require $_SERVER['DOCUMENT_ROOT'] . '/' . $folder . '/system/functions/global_functions.php';
require $_SERVER['DOCUMENT_ROOT'] . '/' . $folder . '/functions/lists.php';
require $_SERVER['DOCUMENT_ROOT'] . '/' . $folder . '/functions/other_functions.php';
