<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="<?php echo $GLOBALS['url_path']."main"; ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Pradinis</span>
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
</ul>