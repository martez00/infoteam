<?php
$path = $_SERVER['PHP_SELF'];
$pieces = explode("/", $path);
$folder = $pieces[1];

$do_not_start_session=1;
require_once ($_SERVER['DOCUMENT_ROOT']."/$folder/system/inc/loader.inc.php");

?>
<html lang="en">

  <head>

      <?php require ($_SERVER['DOCUMENT_ROOT']."/$folder/system/inc/head.inc.php"); ?>
      <title>InfoTeam - Darbuotojo prisijungimas</title>

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
          <?php
          if(isset($error_login_string))
              echo $error_login_string;
          ?>
        <div class="card-header">Prisijungimas</div>
        <div class="card-body">
            <form name="form" id="form" action="<?php echo $GLOBALS['url_path']."main/index.php" ?>" method="post">
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="username" name="username" class="form-control" placeholder="Vartotojo vardas" required="required" autofocus="autofocus">
                <label for="username">Vartotojo vardas</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="password" name="password" class="form-control" placeholder="Slaptažodis" required="required">
                <label for="password">Slaptažodis</label>
              </div>
            </div>
                <input class="btn btn-primary btn-block" type="submit"
                           name="submit"
                           id="submit"
                           value="Prisijungti">
                <a class="btn btn-primary btn-block" href="<?php echo $GLOBALS['url_path']."index.php"; ?>">Grįžti į pradinį langą</a>
        </div>
      </div>
    </div>

    <?php require ($_SERVER['DOCUMENT_ROOT']."/$folder/system/inc/scripts.inc.php"); ?>

  </body>

</html>
