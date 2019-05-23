<?php
$path = $_SERVER['PHP_SELF'];
$pieces = explode("/", $path);
$folder = $pieces[1];

require_once($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/inc/loader.inc.php");

$rights = check_transactions_rights();
if ($rights['leisti_perziureti'] != 1) header("Location: $GLOBALS[url_path]main/index.php?redirected=1");

if (isset($_GET['id'])) $id = $_GET['id'];
else if (isset($_POST['id'])) $id = $_POST['id'];
if (isset($id) && $id != 0) {
    if (!empty($_POST)) {
        if ($_POST['delete'] == 1) {
            DeleteField($mysqli, $id, "transactions", true);
            ?>
            <script>
                window.location = "<?php echo $GLOBALS['url_path'] . "transactions/transactions.php"; ?>";
            </script>
            <?php
        } else {
            unset($_POST['id']);
            unset($_POST['delete']);
            unset($_POST['hidden_note_id']);
            unset($_POST['edit_note_content']);
            unset($_POST['item_id']);
            $item_arr = $_POST;
            if ($item_arr[type] == 1) {
                $item_arr["assigned_to_player_id"] = "NULL";
                $item_arr["assigned_to_other"] = "NULL";
                if (!isset($item_arr["assigned_to_user_id"]) || $item_arr["assigned_to_user_id"] == "") $item_arr["assigned_to_user_id"] = "NULL";
            } else if ($item_arr[type] == 2) {
                $item_arr["assigned_to_user_id"] = "NULL";
                $item_arr["assigned_to_other"] = "NULL";
                if (!isset($item_arr["assigned_to_player_id"]) || $item_arr["assigned_to_player_id"] == "") $item_arr["assigned_to_player_id"] = "NULL";
            } else if ($item_arr[type] == 3) {
                $item_arr["assigned_to_user_id"] = "NULL";
                $item_arr["assigned_to_player_id"] = "NULL";
                if (!isset($item_arr["assigned_to_other"]) || $item_arr["assigned_to_other"] == "") $item_arr["assigned_to_other"] = "NULL";
            } else {
                $item_arr["assigned_to_user_id"] = "NULL";
                $item_arr["assigned_to_player_id"] = "NULL";
                $item_arr["assigned_to_other"] = "NULL";
            }
            UpdateField($mysqli, $item_arr, "transactions", true, $id, true);
        }
    }
} else {
    if (!empty($_POST)) {
        unset($_POST['hidden_note_id']);
        unset($_POST['edit_note_content']);
        unset($_POST['item_id']);
        unset($_POST['id']);
        unset($_POST['delete']);
        $item_arr = $_POST;
        $id = InsertField($mysqli, $item_arr, "transactions", true, true);
        if(isset($id) && $id!="" && $id!="0")
            header("Location: $GLOBALS[url_path]transactions/transaction.php?id=$id");
    }
}
if (isset($id))
    $item_arr = mfa($mysqli, "SELECT * from transactions where id='$id'");
if (isset($item_arr)) $item_exists = 1;
else $item_exists = 0;
if (isset($_FILES[file][name]) && $_FILES[file][name] != "") {
    $file_arr = $_FILES[file];
    $response = insert_file("transactions_files", "transactions_id", $id, $file_arr);
    if ($response == "success") $file_message = "Jūsų failas sėkmingai įkeltas.";
    else if ($response == "duplicate") $file_message = "Jūsų keliamas failas su tokiu pavadinimu jau egzistuoja.";
    else if ($response == "too_large") $file_message = "Jūsų keliamas failas per didelis!";
    else if ($response == "error_uploading") $file_message = "Įkeliant Jūsų failą į serverį įvyko klaida!";
}
$files = mfa_kaip_array($mysqli, "SELECT * from transactions_files where transactions_id='$id'");
?>

<!DOCTYPE html>
<html>
<head>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/inc/head.inc.php"); ?>
    <title>InfoTeam - Pervedimo informacija</title>
    <style>
        .toast {
            opacity: 1 !important;
        }
    </style>
    <script>
        function add_transaction_note(id) {
            var pastaba;
            pastaba = document.getElementById("add_note").value;
            if (!pastaba || pastaba == "") {
                toastr.error("Neįvedėte pastabos!");
            }
            else {
                $.post("<?= $GLOBALS['url_path'] ?>/ajax/ajax_functions_return.php", {
                        'do': "add_transaction_note_ajax",
                        'id': id,
                        'note': pastaba
                    }
                    , function (data) {
                        data = JSON.parse(data);
                        $('#pastabos_content').html(data.text);
                        document.getElementById("add_note").value = "";
                        toastr.success("Pastaba įvesta!");
                    });
            }
        }

        function delete_transaction_note(note_id, id) {
            $.post("<?= $GLOBALS['url_path'] ?>/ajax/ajax_functions_return.php", {
                    'do': "delete_transaction_note_ajax",
                    'id': id,
                    'note_id': note_id
                }
                , function (data) {
                    data = JSON.parse(data);
                    $('#pastabos_content').html(data.text);
                    document.getElementById("add_note").value = "";
                    toastr.success("Pastaba ištrinta!");
                });
        }

        function edit_transaction_note() {
            var note_content = $('#edit_note_content').val();
            var note_id = $('#hidden_note_id').val();
            var item_id = $('#item_id').val();
            $.post("<?= $GLOBALS['url_path'] ?>/ajax/ajax_functions_return.php", {
                    'do': "edit_transaction_note_ajax",
                    'note_id': note_id,
                    'id': item_id,
                    'note_content': note_content
                }
                , function (data) {
                    data = JSON.parse(data);
                    $('#pastabos_content').html(data.text);
                    document.getElementById("add_note").value = "";
                    toastr.success("Pastaba pakeista!");
                });
        }
    </script>
</head>
<body id="page-top">
<?php require($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/view/header.php"); ?>
</body>
<form name="form" id="form" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <input type="hidden" name="id" id="id" value="<?php if (isset($id)) echo $id; ?>">
    <div id="wrapper">
        <?php require($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/view/sidebar.php"); ?>
        <?php if (isset($id)) echo "<input type=\"hidden\" name=\"id\" id=\"id\" value=\"$id\"> <input type='hidden' name='delete' id='delete' value='0'>"; ?>
        <div id="content-wrapper">

            <div class="container-fluid">

                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?php echo $GLOBALS['url_path'] . "main"; ?>">InfoTeam</a>
                    </li>
                    <li class="breadcrumb-item">Pervedimai</li>
                    <?php if ($item_exists) { ?>
                        <li class="breadcrumb-item active"><?php echo $item_arr['id']; ?></li>
                    <?php } else echo "<li class=\"breadcrumb-item active\">Kurti naują pervedimą</li>"; ?>
                </ol>
                <?php
                if (isset($file_message)) {
                    echo "<div class='alert alert-primary' role='alert'>$file_message</div>";
                }
                if (isset($error_message)) {
                    echo "<div class='alert alert-danger' role='alert'>$error_message</div>";
                }
                ?>
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        <?php if ($item_exists) { ?> Pervedimo ID: <b><?php echo $item_arr['id']; ?></b>
                        <?php } else echo "Naujo pervedimo kūrimas"; ?>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <h5><span class="group_name">Pagrindinė informacija</span></h5>
                            <hr>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-2">
                                    <label for="debit_credit">Kreditas/Debetas:</label>
                                    <select name="debit_credit" id="debit_credit" form="form"
                                            class="form-control"
                                            required><?php echo debet_credit_list($item_arr['debit_credit']); ?></select>
                                </div>
                                <div class="col-md-2">
                                    <label for="amount">Suma:</label>
                                    <input type="text" class="form-control" id="amount" name="amount"
                                           value="<?php echo $item_arr['amount']; ?>">
                                </div>
                                <div class="col-md-2">
                                    <label for="type">Tipas:</label>
                                    <select name="type" id="type" form="form"
                                            class="form-control"
                                            required><?php echo transaction_assigned_to($item_arr['type']); ?></select>
                                </div>
                                <?php if (isset($item_arr)) { ?>
                                    <div class="col-md-2">
                                        <?php if (isset($item_exists) && $item_arr['type'] == 1) { ?>
                                            <label for="assigned_to_user_id">Vartotojas:</label>
                                            <select name="assigned_to_user_id" id="assigned_to_user_id" form="form"
                                                    class="form-control"><?php echo users_list($item_arr['assigned_to_user_id'], false, $mysqli); ?></select>
                                        <?php } ?>
                                        <?php if (isset($item_exists) && $item_arr['type'] == 2) { ?>
                                            <label for="assigned_to_player_id">Žaidėjas:</label>
                                            <select name="assigned_to_player_id" id="assigned_to_player_id" form="form"
                                                    class="form-control"><?php echo players_list($item_arr['assigned_to_player_id'], false, $mysqli); ?></select>
                                        <?php } ?>
                                        <?php if (isset($item_exists) && $item_arr['type'] == 3) { ?>
                                            <label for="assigned_to_other">Kam priskirta:</label>
                                            <input type="text" class="form-control" id="assigned_to_other"
                                                   name="assigned_to_other"
                                                   value="<?php echo $item_arr['assigned_to_other']; ?>">
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                                <div class="col-md-2">
                                    <label for="due_date">Užbaigti iki:</label>
                                    <input type="text" name="due_date" class="form-control datepicker"
                                           value="<?php echo $item_arr['due_date']; ?>">
                                </div>
                                <div class="col-md-2">
                                    <label for="status">Statusas:</label>
                                    <select name="status" id="status" form="form"
                                            class="form-control"><?php echo transactions_status_list($item_arr['status']); ?></select>
                                </div>
                            </div>
                        </div>
                        <?php if (isset($item_arr)) { ?>
                            <div class="form-group space_before_group">
                                <h5><span class="group_name">Pastabos</span></h5>
                                <hr>
                            </div>
                            <div class="form-group">
                                <div class='form-row'>
                                    <div class="col-md-8">
                                        <input type="text" id="add_note" class="form-control"
                                               placeholder="Jūsų pastaba...">
                                    </div>
                                    <div class="col-md-4">
                                        <a class="btn btn-primary btn-block" style="color:white"
                                           onclick='add_transaction_note("<?php echo $id; ?>")'>PRIDĖTI PASTABĄ</a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div id="pastabos_content">
                                        <?php echo format_transactions_notes($mysqli, $id); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group space_before_group">
                                <h5><span class="group_name">Failai</span></h5>
                                <hr>
                            </div>
                            <div class="form-group">
                                <div class='form-row'>
                                    <b style="margin-left:5px;">Prisegti failai: </b>
                                    <?php
                                    foreach ($files as $file) {
                                        $file_name = str_replace("uploads/", "", $file[file_path]);
                                        echo "<a href='$GLOBALS[url_path]$file[file_path]' target='_blank' style='float:left; margin-left:5px;'>$file_name</a>";
                                    }
                                    ?>
                                </div>
                                <div class='form-row'>
                                    <div class="col-md-8">
                                        <b>Pasirinkite norimą prisegti failą:</b>
                                        <input type="file" name="file" id="file">
                                    </div>
                                    <div class="col-md-4">
                                        <input type='submit' class='btn btn-primary btn-block' value='Pridėti failą'>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <hr>
                        <input class='btn btn-primary btn-block' id="saveButton" type='submit' value='Išsaugoti'>
                        <?php if (isset($item_arr)) { ?> <a class='btn btn-primary btn-block btn-danger'
                                                            onclick="document.getElementById('delete').value=1; document.getElementById('saveButton').click();"
                                                            style="color:white">Trinti pervedimą</a> <?php } ?>
                    </div>
                    <!-- /.content-wrapper -->
                    <div class="modal fade" id="edit_transaction_note" tabindex="-1" role="dialog"
                         aria-labelledby="edit_item_noteLabel" aria-hidden="true">
                        <input type="hidden" id="hidden_note_id" name="hidden_note_id">
                        <input type="hidden" id="item_id" name="item_id">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="edit_item_noteLabel">Redaguoti pastabą</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="edit_note_content" class="col-form-label">Pastaba:</label>
                                        <input type="text" class="form-control" id="edit_note_content">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Uždaryti
                                    </button>
                                    <button onclick="edit_transaction_note()" type="button" class="btn btn-primary"
                                            data-dismiss="modal">Išsaugoti
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
</form>
</div>
<?php require($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/view/footer.php"); ?>
<!-- /#wrapper -->
<?php require($_SERVER['DOCUMENT_ROOT'] . "/$folder/system/inc/scripts.inc.php"); ?>
<script>
    $('#edit_transaction_note').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var notes = button.data('notes') // Extract info from data-* attributes
        var id = button.data('id') // Extract info from data-* attributes
        var item_id = button.data('item_id') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('input[id="hidden_note_id"]').val(id);
        modal.find('input[id="edit_note_content"]').val(notes);
        modal.find('input[id="item_id"]').val(item_id);
    })
</script>
</body>

</html>

