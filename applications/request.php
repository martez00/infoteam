<?php
$path = $_SERVER['PHP_SELF'];
$pieces = explode("/", $path);
$folder = $pieces[1];

$do_not_start_session=1;
require_once ($_SERVER['DOCUMENT_ROOT']."/$folder/system/inc/loader.inc.php");
?>
<!DOCTYPE html>
<html>

<head>

    <?php require ($_SERVER['DOCUMENT_ROOT']."/$folder/system/inc/head.inc.php"); ?>
    <title>InfoTeam - Teikti prašymą</title>

</head>

<body class="bg-dark">

<div class="container">
    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Teikti prašymą</div>
        <div class="card-body">
            <form name="form" id="form" action="<?php echo $GLOBALS['url_path']."applications/request_sent.php" ?>" method="post">
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <input type="text" id="name" name="name" class="form-control" placeholder="Vardas" required="required" autofocus="autofocus">
                                <label for="name">Vardas</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <input type="text" id="surname" name="surname" class="form-control" placeholder="Pavardė" required="required">
                                <label for="surname">Pavardė</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <input type="text" id="personal_code" name="personal_code" class="form-control" placeholder="Asmens kodas" required="required" autofocus="autofocus">
                                <label for="personal_code">Asmens kodas</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <input type="text" id="country" name="country" class="form-control" placeholder="Šalis">
                                <label for="country">Šalis</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <input type="text" id="email" name="email" class="form-control" placeholder="El. paštas" required="required" autofocus="autofocus">
                                <label for="email">El. paštas</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <input type="text" id="mob_number" name="mob_number" class="form-control" placeholder="Mobilus nr." required="required">
                                <label for="mob_number">Mobilus nr.</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <input type="text" id="datepicker" name="birth_date" class="form-control" placeholder="Asmens kodas" required="required" autofocus="autofocus">
                                <label for="datepicker">Gimimo data</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <input type="text" id="position_in_field" name="position_in_field" class="form-control" placeholder="Šalis">
                                <label for="position_in_field">Pozicija</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <textarea name="about" id="about" class="form-control" placeholder="Apie save" rows="5" size="500"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <textarea name="motivation_letter" id="motivation_letter" class="form-control" placeholder="Motyvacinis laiškas" rows="5" size="500"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <textarea name="other" id="other" class="form-control" placeholder="Kita informacija" rows="5" size="500"></textarea>
                    </div>
                </div>
                <input class="btn btn-primary btn-block" type="submit"
                       name="submit"
                       id="submit"
                       value="Patvirtinti">
            </form>
        </div>
    </div>
</div>

<?php require ($_SERVER['DOCUMENT_ROOT']."/$folder/system/inc/scripts.inc.php"); ?>

</body>

</html>

