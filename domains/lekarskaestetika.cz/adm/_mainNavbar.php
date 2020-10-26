<div class="main-navbar sticky-top bg-white">
            <!-- Main Navbar -->
            <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
              <ul class="navbar-nav border-left flex-row " style="margin-top:10px;">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <span class="d-none d-md-inline-block">Administrátor</span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-small">
                   <a class="dropdown-item" target="_blank" href="<?= $klient_url['value']; ?>">
                      <i class="material-icons">&#xE7FD;</i> Zobrazit web</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="logout">
                      <i class="material-icons text-danger">&#xE879;</i> Odhlásit se </a>
                  </div>
                </li>
                <li class="nav-item" style="padding-top: 0.4rem;padding-right: 0.45rem;padding-bottom: 0.4rem;padding-left: 0.45rem;"><?= $klient_name['value']; ?> | <i class="far fa-calendar-alt"></i> Dnes je  
  
  <?php $datum = Date("j.m.Y ", Time()); echo($datum); ?>
                </li>
              </ul>

              <nav class="nav">
                <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                  <i class="material-icons">&#xE5D2;</i>
                </a>
              </nav>
            </nav>
          </div>
          <!-- / .main-navbar -->