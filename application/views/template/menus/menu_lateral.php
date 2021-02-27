<nav id="sidebarMenu" class="sidebar d-md-block bg-dark text-white collapse" data-simplebar>
   <div class="sidebar-inner px-4 pt-3">
      <div class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
         <div class="d-flex align-items-center">
            <div class="user-avatar lg-avatar me-4">
               <img src="<?= base_url('assets/img/team/profile-picture-3.jpg') ?>" class="card-img-top rounded-circle border-white"
               alt="Raymundo Dominguez">
            </div>
            <div class="d-block">
               <h2 class="h6">Hi, Marco</h2>
               <a href="<?= base_url('html&css/pages/examples/sign-in.html') ?>" class="btn btn-secondary text-dark btn-xs"><span
                  class="me-2"><span class="fas fa-sign-out-alt"></span></span>Sign Out</a>
            </div>
         </div>
         <div class="collapse-close d-md-none">
            <a href="#sidebarMenu" class="fas fa-times" data-bs-toggle="collapse" data-bs-target="#sidebarMenu"
            aria-controls="sidebarMenu" aria-expanded="true" aria-label="Toggle navigation"></a>
         </div>
      </div>
      <ul class="nav flex-column pt-3 pt-md-0">
         <li class="nav-item active">
            <a href="<?= base_url() ?>" class="nav-link">
               <span class="sidebar-icon"><span class="fas fa-chart-pie"></span></span>
               <span class="sidebar-text">Dashboard</span>
            </a>
         </li>
         <li class="nav-item">
            <a href="<?= base_url('index.php/Programas') ?>" class="nav-link">
               <span class="sidebar-icon"><span class="fas fa-chart-pie"></span></span>
               <span class="sidebar-text">Programas</span>
            </a>
         </li>
         <li class="nav-item">
            <a href="<?= base_url('index.php/Actividades') ?>" class="nav-link">
               <span class="sidebar-icon"><span class="fas fa-chart-pie"></span></span>
               <span class="sidebar-text">Actividades</span>
            </a>
         </li>
         <li role="separator" class="dropdown-divider mt-4 mb-3 border-black"></li>
         <li class="nav-item ">
            <a href="#Configurador" class="nav-link">
               <span class="sidebar-icon"><span class="fas fa-cog"></span></span>
               <span class="sidebar-text">Configuración</span>
            </a>
         </li>
      </ul>
   </div>
</nav>