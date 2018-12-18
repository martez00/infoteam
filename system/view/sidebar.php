<?php
$file = end($pieces);
?>
<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="<?php echo $GLOBALS['url_path']."main"; ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Pradinis</span>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Prašymai</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item <?php if($file=="new_applications.php") echo "active"; ?>" href="<?php echo $GLOBALS['url_path']."applications/new_applications.php"; ?>">Nauji prašymai</a>
            <a class="dropdown-item <?php if($file=="accepted_applications.php") echo "active"; ?>" href="<?php echo $GLOBALS['url_path']."applications/accepted_applications.php"; ?>">Patvirtinti prašymai</a>
            <a class="dropdown-item <?php if($file=="postponed_applications.php") echo "active"; ?>" href="<?php echo $GLOBALS['url_path']."applications/postponed_applications.php"; ?>">Atidėti prašymai</a>
            <a class="dropdown-item <?php if($file=="rejected_applications.php") echo "active"; ?>" href="<?php echo $GLOBALS['url_path']."applications/rejected_applications.php"; ?>">Atmesti prašymai</a>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li>
</ul>