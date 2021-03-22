  <nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
    <div class="container-fluid px-0">
      <div class="d-flex justify-content-end w-100" id="menu_usuario">
        <!-- Navbar links -->
        <ul class="navbar-nav align-items-center">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle pt-1 px-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <div class="media d-flex align-items-center">
                <img class="user-avatar md-avatar rounded-circle" alt="Usuario" src="">
                <div class="media-body ms-2 text-dark align-items-center d-none d-lg-block">
                  <span class="mb-0 font-small fw-bold">Nombre del Usuario</span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dashboard-dropdown dropdown-menu-end mt-2 py-0">
              <a class="dropdown-item rounded-top fw-bold" href="#">
                <span class="far fa-user-circle"></span>Mi Perfil
              </a>
              <a class="dropdown-item rounded-bottom fw-bold" href="<?= base_url('index.php/Home/logout') ?>">
                <span class="fas fa-sign-out-alt text-danger"></span>Cerrar Sesión
              </a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>