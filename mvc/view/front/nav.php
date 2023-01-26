<link rel="stylesheet" href="view/front/styles/nav.css">
<div class="headerr">
    <header class="p-3 mb-3 border-bottom d-none d-lg-block">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <a href="./index.php/home" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
            <img src="view/media/logos/logov1f16-9-snbg.png" alt="Logo Christies & Meta" width="128" height="72">
          </a>

          <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="./index.php/home" class="nav-link px-2 link-dark">Home</a></li>
            <li><a href="./index.php/list" class="nav-link px-2 link-dark">List</a></li>
              <li><a href="./index.php/categories" class="nav-link px-2 link-dark">Categories</a></li>
              <li><a href="./index.php/map" class="nav-link px-2 link-dark">Map</a></li>
              <li><a href="./index.php/contact" class="nav-link px-2 link-dark">Contact</a></li>
          </ul>

          <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3 navbarName" role="search" id="navSearchForm" method="post" action="./index.php/navsearch">
            <input type="search" name="search" id="search" class="form-control searchInputNav" placeholder="Search by name..." aria-label="Search">
          </form>
            <?php
              if (isset($_SESSION['front-login']) && $_SESSION['front-login']==true) {
                 echo '<div class="dropdown text-end">';
                    echo ' <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                          <img src="https://cdn.pixabay.com/photo/2021/06/07/13/45/user-6318003__340.png" alt="mdo" width="32" height="32" class="rounded-circle">
                        </a>';
                        echo '<ul class="dropdown-menu text-small">';
                              echo '<li><a class="dropdown-item" href="./index.php/profile">Profile</a></li>';
                              echo '<li><a class="dropdown-item" href="./index.php/logout">Logout</a></li>';
                        echo '</ul>';
                  echo '</div>';

              }else{
                  echo '<div class="dropdown text-end col-3">';
                  echo '<ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-around mb-md-0 mr-0">';
                      echo '<li><a class="dropdown-item" href="./index.php/login"><button type="button" class="btn " id="loginNavBtn">Login</button></a></li>';
                      echo '<li><a class="dropdown-item" href="./index.php/signup"><button type="button" class="btn" id="signUpNavBtn">Sign up</button></a></li>';
                  echo '</ul>';
                  echo '</div>';
              }
            ?>
        </div>
      </div>
    </header>
    <header class="py-3 mb-3 border-bottom d-lg-none">
      <div class="container-fluid d-grid gap-3 align-items-center" style="grid-template-columns: 1fr 2fr;">
        <div class="dropdown">
          <a href="./index.php/home" class="d-flex align-items-center col-lg-4 mb-2 mb-lg-0 link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="view/media/logos/logov1f16-9-snbg.png" alt="Logo Christies & Meta" width="128" height="72">
          </a>
          <ul class="dropdown-menu text-small shadow ">
            <li><a href="./index.php/home" class="nav-link px-2 link-secondary">Home</a></li>
            <li><a href="./index.php/list" class="nav-link px-2 link-dark">List</a></li>
              <li><a href="./index.php/categories" class="nav-link px-2 link-dark">Categories</a></li>
              <li><a href="./index.php/map" class="nav-link px-2 link-dark">Map</a></li>
              <li><a href="./index.php/contact" class="nav-link px-2 link-dark">Contact</a></li>
          </ul>
        </div>

        <div class="d-flex align-items-center justify-content-end">
          <form class="w-25 me-3 d-none d-sm-block navbarName" method="post" role="search" action="./index.php/navsearch">
            <input type="search" class="form-control searchInputNav" id="search" placeholder="Search by name..." aria-label="Search">
          </form>

            <?php
            if (isset($_SESSION['front-login'])&& $_SESSION['front-login']==true) {
                echo '<div class="dropdown text-end w-75">';
                echo ' <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                          <img src="https://cdn.pixabay.com/photo/2021/06/07/13/45/user-6318003__340.png" alt="mdo" width="32" height="32" class="rounded-circle">
                        </a>';
                    echo '<ul class="dropdown-menu text-small">';
                        echo '<li><a class="dropdown-item" href="./index.php/profile">Profile</a></li>';
                        echo '<li><a class="dropdown-item" href="./index.php/logout">Logout</a></li>';
                    echo '</ul>';
                echo '</div>';

            }else{
                echo '<div class="dropdown text-end w-75">';
                echo '<ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-around mb-md-0 mr-0">';
                echo '<li><a class="dropdown-item" href="./index.php/login"><button type="button" class="btn " id="loginNavBtn">Login</button></a></li>';
                echo '<li><a class="dropdown-item" href="./index.php/signup"><button type="button" class="btn" id="signUpNavBtn">Sign up</button></a></li>';
                echo '</ul>';
                echo '</div>';
            }
            ?>
        </div>
      </div>
    </header>
  </div>
<script type="text/javascript" src="view/front/front-scripts/navSearch.js"></script>