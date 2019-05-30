<?php
$path = $_SERVER['PHP_SELF'];
$pieces = explode("/", $path);
$folder = $pieces[1];

require_once ($_SERVER['DOCUMENT_ROOT']."/$folder/system/inc/loader.inc.php");

?>
<!DOCTYPE html>
<html>

<head>
    <?php require ($_SERVER['DOCUMENT_ROOT']."/$folder/system/inc/head.inc.php"); ?>
    <title>InfoTeam - Pagrindinis</title>
</head>

<body id="page-top">
    <?php require ($_SERVER['DOCUMENT_ROOT']."/$folder/system/view/header.php"); ?>


<div id="wrapper">
    <?php require ($_SERVER['DOCUMENT_ROOT']."/$folder/system/view/sidebar.php"); ?>

    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?php echo $GLOBALS['url_path']."main"; ?>">InfoTeam</a>
                </li>
                <li class="breadcrumb-item active">Pradinis langas</li>
            </ol>
<?php
if($_GET['redirected']==1){
    echo "<div class='alert alert-danger' role='alert'>Puslapio, kurį bandėte aplankyti, pagal galiojančią teisių sistemą pasiekti negalite! Norėdami pakeisti teisių sistemą susisiekite su sistemos kūrėjais.</div>";
}
?>
            <!-- Page Content -->
            <h1>InfoTeam – pagrindinės funkcijos</h1>
            <hr>
            <div class="card-deck mb-6 text-center">
                <div class="card mb-4 box-shadow">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal">Prašymų valdymo modulis</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>Prašymų pateikimo funkcija</li>
                            <li>Prašymų ataskaitos pagal statusą</li>
                            <li>Prašymų peržiūros ir patvirtinimo funkcija</li>
                            <li>Galimybė sukurti žaidėją pagal prašymo duomenis</li>
                        </ul>
                    </div>
                </div>
                <div class="card mb-4 box-shadow">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal">Vartotojų valdymo modulis</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>Galimybė kurti naujus vartotojus</li>
                            <li>Rolės priskyrimas vartotojams</li>
                            <li>Vartotojų peržiūros ir redagavimo funkcija</li>
                            <li>Vartotojų ataskaita</li>
                        </ul>
                    </div>
                </div>
                <div class="card mb-4 box-shadow">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal">Komandų valdymo modulis</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>Klubo komandų vedimas ir redagavimas</li>
                            <li>Komandų ataskaita</li>
                            <li>Galimybė žaidėjui priskirti klubo komandą</li>
                            <li>Komandų žaidėjų sąrašas</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-deck mb-6 text-center">
                <div class="card mb-4 box-shadow">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal">Žaidėjų valdymo modulis</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>Žaidėjų įvedimas</li>
                            <li>Žaidėjų peržiūrą ir redagavimas</li>
                            <li>Žaidėjų ataskaita</li>
                            <li>Žaidėjų reitingavimo funkcija</li>
                        </ul>
                    </div>
                </div>
                <div class="card mb-4 box-shadow">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal">Buhalterijos valdymo modulis</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>Atliktų ir būsimų pervedimų vedimas, redagavimas ir peržiūrėjimas</li>
                            <li>Pervedimų ataskaita</li>
                            <li>Žaidėjų ir darbuotojų atlyginimų apskaita</li>
                        </ul>
                    </div>
                </div>
                <div class="card mb-4 box-shadow">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal">Papildomos funkcijos</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>Atliktų vartotojų veiksmų sekimas</li>
                            <li>Galimybė prikabinti failus ir pastabas prie žaidėjų, komandų ir pervedimų</li>
                        </ul>
                    </div>
                </div>
            </div>
        <!-- /.container-fluid -->

        <?php require ($_SERVER['DOCUMENT_ROOT']."/$folder/system/view/footer.php"); ?>

    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

    <?php require ($_SERVER['DOCUMENT_ROOT']."/$folder/system/inc/scripts.inc.php"); ?>
</body>

</html>

