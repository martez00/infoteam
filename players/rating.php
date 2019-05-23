<?php
$path = $_SERVER['PHP_SELF'];
$pieces = explode("/", $path);
$folder = $pieces[1];

require_once($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/inc/loader.inc.php");

$rights=check_player_rights();
if (isset($_GET['id'])) $id = $_GET['id'];
else if(isset($_POST['id'])) $id = $_POST['id'];

if(!isset($id) || $rights['leisti_perziureti']!=1 || isset($rights_arr['pagrindiniai_duomenys'])) header("Location: $GLOBALS[url_path]main/index.php?redirected=1");

if (isset($id) && $id!=0) {
    if (!empty($_POST)) {
            unset($_POST['id']);
            unset($_POST['delete']);
            unset($_POST['hidden_note_id']);
            unset($_POST['edit_note_content']);
            unset($_POST['item_id']);
            $item_arr = $_POST;
            UpdateField($mysqli, $item_arr, "players", true, $id, true);
    }
}
if(isset($id))
    $item_arr = mfa($mysqli, "SELECT * from players where id='$id'");
if (isset($item_arr)) $item_exists=1;
else header("Location: $GLOBALS[url_path]main/index.php?redirected=1");
?>

<!DOCTYPE html>
<html>
<head>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/inc/head.inc.php"); ?>
    <title>InfoTeam - Žaidėjo reitingai</title>
    <style>
        .toast {
            opacity: 1 !important;
        }
    </style>
    <script>
        function add_player_rating(id) {
            var rating;
            rating = document.getElementById("add_rating").value;
            if(!rating || rating==""){
                toastr.error("Neįvedėte reitingo!");
            }
            else {
                $.post("<?= $GLOBALS['url_path'] ?>/ajax/ajax_functions_return.php", {
                        'do': "add_player_rating_ajax",
                        'id': id,
                        'rating': rating
                    }
                    , function (data) {
                        data = JSON.parse(data);
                        $('#ratings_content').html(data.text);
                        document.getElementById("add_rating").value="";
                        toastr.success("Reitingas įvestas!");
                    });
            }
        }
        function delete_player_rating(rating_id, id){
            $.post("<?= $GLOBALS['url_path'] ?>/ajax/ajax_functions_return.php", {
                    'do': "delete_player_rating_ajax",
                    'id': id,
                    'rating_id': rating_id
                }
                , function (data) {
                    data = JSON.parse(data);
                    $('#ratings_content').html(data.text);
                    document.getElementById("add_rating").value="";
                    toastr.success("Reitingas ištrintas!");
                });
        }
    </script>
</head>
<body id="page-top">
<?php require($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/view/header.php"); ?>
<div>
        <div id="wrapper">
            <?php require($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/view/sidebar.php"); ?>
            <div id="content-wrapper">

                <div class="container-fluid">

                    <!-- Breadcrumbs-->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo $GLOBALS['url_path'] . "main"; ?>">InfoTeam</a>
                        </li>
                        <li class="breadcrumb-item">Žaidėjų reitingai</li>
                        <?php if($item_exists) {?> <li class="breadcrumb-item active"><?php echo $item_arr['name']." ".$item_arr['surname']?></li>
                        <?php } ?>
                    </ol>
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-table"></i>
                            <?php if($item_exists) {?> Žaidėjas: <b><?php echo $item_arr['name']." ".$item_arr['surname']?></b> <small><?php echo $show_application_text;?></small>
                            <?php } ?>
                        </div>
                        <div class="card-body">
                            <?php if(isset($item_arr)){ ?>
                                <div class="form-group">
                                    <h5><span class="group_name">Reitingų įvedimas</span></h5>
                                    <hr>
                                </div>
                                <div class="form-group">
                                    <div class='form-row'>
                                        <div class="col-md-8">
                                            <input type="text" id="add_rating" class="form-control" placeholder="Įveskite reitingą...">
                                        </div>
                                        <div class="col-md-4">
                                            <a class="btn btn-primary btn-block" style="color:white"
                                               onclick='add_player_rating("<?php echo $id; ?>")'>PRIDĖTI REITINGĄ</a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div id="ratings_content">
                                            <?php echo format_players_ratings($mysqli, $id); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            </div>
                </div>
</div>
<?php require($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/view/footer.php"); ?>
<!-- /#wrapper -->
<?php require($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/inc/scripts.inc.php"); ?>
</body>

</html>

