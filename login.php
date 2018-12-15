<?php
if ($_SERVER['SERVER_NAME'] == "localhost") {
    header('Location: http://127.0.0.1/' . $folder);
    exit;
}
$_SERVER['full_url'] = 'http';
$_SERVER['full_url'] .= '://';
$_SERVER['full_url'] .= $_SERVER['SERVER_NAME'];
$_SERVER['full_url'] .= $_SERVER['SCRIPT_NAME'];

if ($_SERVER['QUERY_STRING'] > ' ') {
    $_SERVER['full_url'] .= '?' . $_SERVER['QUERY_STRING'];
}
$full_urlas = $_SERVER['full_url'];
$tmp = explode("/", $full_urlas);
$url_galas = end($tmp);
$action_url = $full_urlas;
if ($url_galas !== "index.php" && !strpos($full_urlas, ".php"))
    $action_url = $full_urlas . "/index.php";
?>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>InfoTeam - Prisijungimas</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Prisijungimas</div>
        <div class="card-body">
            <form name="form" id="form" action="<?php echo $action_url ?>" method="post">
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="username" name="username" class="form-control" placeholder="Vartotojo vardas" required="required" autofocus="autofocus">
                <label for="inputUsername">Vartotojo vardas</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="password" name="password" class="form-control" placeholder="Slaptažodis" required="required">
                <label for="inputPassword">Slaptažodis</label>
              </div>
            </div>
                <input class="btn btn-primary btn-block" type="submit"
                           name="submit"
                           id="submit"
                           value="Prisijungti">
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>
