<?php
switch ($_SESSION['global_role']){
    case 1: require_once($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/view/sidebars/sidebar_for_accountant.php"); break;
    case 2: require_once($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/view/sidebars/sidebar_for_trainer.php"); break;
    case 3: require_once($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/view/sidebars/sidebar_for_scout.php"); break;
    case 5: require_once($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/view/sidebars/sidebar_for_admin.php"); break;
    default: require_once($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/view/sidebars/empty_sidebar.php");
}
?>