<?php
$pieces = explode("/", $_SERVER['PHP_SELF'], 3);
$folder = $pieces[1];
require ($_SERVER['DOCUMENT_ROOT'].'/'.$folder.'/system/inc/loader.inc.php');
session_unset();
$_SESSION = array();
session_destroy();
?>
<script>
    window.location = "<?php echo $GLOBALS['url_path']; ?>";
</script>