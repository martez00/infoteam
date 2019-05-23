<?php
$file = end($pieces);
$not_reviewed_applications=gor($mysqli, "SELECT COUNT(id) from applications_to_club where status is NULL");
if(!isset($not_reviewed_applications) || $not_reviewed_applications==0) $not_reviewed_applications="";
else $not_reviewed_applications="<span class='badge-pill badge-danger' data-toggle='tooltip' title='Nauji prašymai!'>$not_reviewed_applications</span>";
?>
<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="<?php echo $GLOBALS['url_path']."main"; ?>">
            <i class="fas fa-fw fa-home"></i>
            <span>Pradinis</span>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Prašymai <?php echo $not_reviewed_applications; ?></span>

        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item <?php if($file=="new_applications.php") echo "active"; ?>" href="<?php echo $GLOBALS['url_path']."applications/new_applications.php"; ?>">Nauji prašymai</a>
            <a class="dropdown-item <?php if($file=="accepted_applications.php") echo "active"; ?>" href="<?php echo $GLOBALS['url_path']."applications/accepted_applications.php"; ?>">Patvirtinti prašymai</a>
            <a class="dropdown-item <?php if($file=="postponed_applications.php") echo "active"; ?>" href="<?php echo $GLOBALS['url_path']."applications/postponed_applications.php"; ?>">Atidėti prašymai</a>
            <a class="dropdown-item <?php if($file=="rejected_applications.php") echo "active"; ?>" href="<?php echo $GLOBALS['url_path']."applications/rejected_applications.php"; ?>">Atmesti prašymai</a>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo $GLOBALS['url_path']."users/users.php"; ?>">
            <i class="fas fa-fw fa-layer-group"></i>
            <span>Vartotojai</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo $GLOBALS['url_path']."teams/teams.php"; ?>">
            <i class="fas fa-fw fa-layer-group"></i>
            <span>Komandos</span>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="players_dropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-user-friends"></i>
            <span>Žaidėjai</span>

        </a>
        <div class="dropdown-menu" aria-labelledby="players_dropdown">
            <a class="dropdown-item <?php if($file=="players.php") echo "active"; ?>" href="<?php echo $GLOBALS['url_path']."players/players.php"; ?>">Žaidėjų sąrašas</a>
            <a class="dropdown-item <?php if($file=="players_ratings.php") echo "active"; ?>" href="<?php echo $GLOBALS['url_path']."players/players_ratings.php"; ?>">Žaidėjų reitingai</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="buhalterija_dropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-money-bill"></i>
            <span>Buhalterija</span>

        </a>
        <div class="dropdown-menu" aria-labelledby="buhalterija_dropdown">
            <a class="dropdown-item <?php if($file=="transactions.php") echo "active"; ?>" href="<?php echo $GLOBALS['url_path']."transactions/transactions.php"; ?>">Pervedimai</a>
            <a class="dropdown-item <?php if($file=="users_salaries.php") echo "active"; ?>" href="<?php echo $GLOBALS['url_path']."users/users_salaries.php"; ?>">Darbuotojų atlyginimai</a>
            <a class="dropdown-item <?php if($file=="players_salaries.php") echo "active"; ?>" href="<?php echo $GLOBALS['url_path']."players/players_salaries.php"; ?>">Žaidėjų atlyginimai</a>
        </div>
    </li>
</ul>
