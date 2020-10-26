<!-- Main Sidebar -->
        <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
          <div class="main-navbar">
            <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
              <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
                <div class="d-table m-auto">
                  <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;" src="images/shards-dashboards-logo.svg" alt="Shards Dashboard">
                  <span class="d-none d-md-inline ml-1">Netis.cz - administrace stránek</span>
                </div>
              </a>
              <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                <i class="material-icons">&#xE5C4;</i>
              </a>
            </nav>
          </div>
          <div class="nav-wrapper">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link <?php if (stripos($_SERVER['REQUEST_URI'],'/uvod') !== false) {echo 'active';} ?>" href="uvod">
                  <i class="fas fa-th-list"></i>
                  <span>Nástěnka</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if (stripos($_SERVER['REQUEST_URI'],'/stranky') !== false) {echo 'active';} ?>" href="stranky">
                  <i class="fas fa-globe-africa"></i>
                  <span>Stránky</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if (stripos($_SERVER['REQUEST_URI'],'/clanky') !== false) {echo 'active';} ?>" href="clanky">
                  <i class="fas fa-edit"></i>
                  <span>Články</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if (stripos($_SERVER['REQUEST_URI'],'/galerie') !== false) {echo 'active';} ?>" href="galerie">
                  <i class="fas fa-image"></i>
                  <span>Galerie</span>
                </a>
              </li>
              <!------Dropdown menu nastaveni------->
              <!-------------------------->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                  <i class="fas fa-cogs"></i>
                  <span>Nastavení</span>
                </a>
                <div class="dropdown-menu dropdown-menu-small">
                  <a class="dropdown-item" href="uzivatele">Správa uživatelů</a>
                  <a class="dropdown-item" href="top-lista">Vyskakovací box na homepage</a>
                </div>
              </li>
              <!------------End-------------->
              <!----------------------------->  
              <li class="nav-item">
                <a class="nav-link <?php if (stripos($_SERVER['REQUEST_URI'],'/help') !== false) {echo 'active';} ?>" href="help">
                  <i class="fas fa-question"></i>
                  <span>Nápověda</span>
                </a>
              </li>         
            </ul>
          </div>
        </aside>
        <!-- End Main Sidebar -->