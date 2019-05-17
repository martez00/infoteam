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
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="<?php echo $GLOBALS['url_path']."users/users.php"; ?>" id="pagesDropdownUsers" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-user"></i>
            <span>Vartotojai</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdownUsers">
            <a class="dropdown-item <?php if($file=="users.php") echo "active"; ?>" href="<?php echo $GLOBALS['url_path']."users/users.php"; ?>">Vartotojų sąrašas</a>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo $GLOBALS['url_path']."players/players.php"; ?>">
            <i class="fas fa-fw fa-user-friends"></i>
            <span>Žaidėjai</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo $GLOBALS['url_path']."transactions/transactions.php"; ?>">
            <i class="fas fa-fw fa-money-bill"></i>
            <span>Pervedimai</span>
        </a>
    </li>
</ul>
