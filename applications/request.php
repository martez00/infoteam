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
                                <label for="name" class="font-weight-bold">Vardas</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Vardas" required="required" autofocus="autofocus">
                        </div>
                        <div class="col-md-6">
                                <label for="surname" class="font-weight-bold">Pavardė</label>
                                <input type="text" id="surname" name="surname" class="form-control" placeholder="Pavardė" required="required" autofocus="autofocus">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                                <label for="personal_code" class="font-weight-bold">Asmens kodas</label>
                                <input type="text" id="personal_code" name="personal_code" class="form-control" placeholder="Asmens kodas" required="required" autofocus="autofocus">
                        </div>
                        <div class="col-md-6">
                                <label for="country" class="font-weight-bold">Šalis</label>
                                <input type="text" id="country" name="country" class="form-control" placeholder="Šalis">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                                <label for="email" class="font-weight-bold">El. paštas</label>
                                <input type="text" id="email" name="email" class="form-control" placeholder="El. paštas" required="required" autofocus="autofocus">
                        </div>
                        <div class="col-md-6">
                                <label for="mob_number" class="font-weight-bold">Mobilus nr.</label>
                                <input type="text" id="mob_number" name="mob_number" class="form-control" placeholder="Mobilus nr." required="required" autofocus="autofocus">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="birth_date" class="font-weight-bold">Gimimo data</label>
                                <input type="text" id="datepicker" name="birth_date" class="form-control" placeholder="Gimimo data" required="required" autofocus="autofocus">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="position_in_field" class="font-weight-bold">Pozicija</label>
                                <select name="position_in_field" id="position_in_field" form="form" class="form-control"><?php echo positions_list(""); ?></select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="about" class="font-weight-bold">Apie save</label>
                        <textarea name="about" id="about" class="form-control" placeholder="Trumpas prisistatymas" rows="5" size="500"></textarea>
                </div>
                <div class="form-group">
                    <label for="motivation_letter" class="font-weight-bold">Motyvacinis laiškas</label>
                        <textarea name="motivation_letter" id="motivation_letter" class="form-control" placeholder="Kodėl Jūs?" rows="5" size="500"></textarea>
                </div>
                <div class="form-group">
                    <label for="other" class="font-weight-bold">Kita informacija</label>
                        <textarea name="other" id="other" class="form-control" placeholder="Norite dar kažką paminėti?" rows="5" size="500"></textarea>
                </div>
                <input class="btn btn-primary btn-block" type="submit"
                       value="Patvirtinti">
                <a class="btn btn-primary btn-block" href="<?php echo $GLOBALS['url_path']."index.php"; ?>">Grįžti į pradinį langą</a>
            </form>
        </div>
    </div>
</div>

<?php require ($_SERVER['DOCUMENT_ROOT']."/$folder/system/inc/scripts.inc.php"); ?>

</body>

</html>

