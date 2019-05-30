<?php
$file = end($pieces);
$not_reviewed_applications=gor($mysqli, "SELECT COUNT(id) from applications_to_club where status='0'");
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
    <li class="nav-item">
        <a class="nav-link" href="<?php echo $GLOBALS['url_path']."users/users.php"; ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Vartotojai</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo $GLOBALS['url_path']."players/players.php"; ?>">
            <i class="fas fa-fw fa-user-friends"></i>
            <span>Žaidėjai</span>
        </a>
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
