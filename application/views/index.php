  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="btn-toolbar dropdown">
      <button class="btn btn-dark btn-sm me-2 dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <span class="fas fa-plus me-2"></span>Tareas
      </button>
      <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-0">
        <a class="dropdown-item fw-normal rounded-top" href="#"><span class="fas fa-tasks"></span>Nuevo Programa</a>
        <a class="dropdown-item fw-normal" href="#"><span class="fas fa-cloud-upload-alt"></span>Nueva Actividad</a>
        <div role="separator" class="dropdown-divider my-0"></div>
        <a class="dropdown-item fw-normal rounded-bottom" href="#"><span class="fas fa-rocket text-danger"></span>Reportes</a>
      </div>
    </div>
    <div class="btn-group">
      <button type="button" class="btn btn-sm btn-outline-primary">Exportar</button>
    </div>
  </div>
  <div class="row justify-content-md-center">
    <div class="col-12 mb-4">
      <div class="card bg-secondary-alt shadow-sm">
        <div class="card-header d-sm-flex flex-row align-items-center flex-0">
          <div class="d-block mb-3 mb-sm-0">
            <div class="h5 fw-normal mb-2">Finanzas</div>
            <h2 class="h3">$10,567</h2>
            <div class="small mt-2">
              <span class="fw-bold me-2">Ayer</span>
              <span class="fas fa-angle-up text-success"></span>
              <span class="text-success fw-bold">10.57%</span>
            </div>
          </div>
          <div class="d-flex ms-auto">
            <a href="#" class="btn btn-secondary text-dark btn-sm me-2">Mes</a>
            <a href="#" class="btn btn-dark btn-sm me-3">Semana</a>
          </div>
        </div>
        <div class="card-body p-2">
          <div class="ct-chart-sales-value ct-double-octave ct-series-g"></div>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-4 mb-4">
      <div class="card border-light shadow-sm">
        <div class="card-body">
          <div class="row d-block d-xl-flex align-items-center">
            <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
              <div class="icon icon-shape icon-md icon-shape-primary rounded me-4 me-sm-0"><span class="fas fa-chart-line"></span></div>
              <div class="d-sm-none">
                <h2 class="h5">Indicador 1</h2>
                <h3 class="mb-1">345,678</h3>
              </div>
            </div>
            <div class="col-12 col-xl-7 px-xl-0">
              <div class="d-none d-sm-block">
                <h2 class="h5">Programas</h2>
                <h3 class="mb-1">345k</h3>
              </div>
              <small>Feb 1 - Mar 1,  <span class="icon icon-small"></span> </small>
              <div class="small mt-2">
                <span class="fas fa-angle-up text-success"></span>
                <span class="text-success fw-bold">18.2%</span> El último mes
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-4 mb-4">
      <div class="card border-light shadow-sm">
        <div class="card-body">
          <div class="row d-block d-xl-flex align-items-center">
            <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
              <div class="icon icon-shape icon-md icon-shape-secondary rounded me-4"><span class="fas fa-cash-register"></span></div>
              <div class="d-sm-none">
                <h2 class="h5">Finanzas</h2>
                <h3 class="mb-1">$43,594</h3>
              </div>
            </div>
            <div class="col-12 col-xl-7 px-xl-0">
              <div class="d-none d-sm-block">
                <h2 class="h5">Finanzas</h2>
                <h3 class="mb-1">$43,594</h3>
              </div>
              <small>Feb 1 - Abr 1,  <span class="icon icon-small"><span class="fas fa-globe-europe"></span></span> Worldwide</small>
              <div class="small mt-2">
                <span class="fas fa-angle-up text-success"></span>
                <span class="text-success fw-bold">28.2%</span> El último mes
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-4 mb-4">
      <div class="card border-light shadow-sm">
        <div class="card-body">
          <div class="row d-block d-xl-flex align-items-center">
            <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
              <div class="ct-chart-traffic-share ct-golden-section ct-series-a"></div>
            </div>
            <div class="col-12 col-xl-7 px-xl-0">
              <h2 class="h5 mb-3">Actividades</h2>
              <h6 class="fw-normal text-gray"><span class="icon w-20 icon-xs icon-secondary me-1"><span class="fas fa-desktop"></span></span> Indicador 1 <a href="#" class="h6">60%</a></h6>
              <h6 class="fw-normal text-gray"><span class="icon w-20 icon-xs icon-primary me-1"><span class="fas fa-mobile-alt"></span></span> Indicador 2 <a href="#" class="h6">30%</a></h6>
              <h6 class="fw-normal text-gray"><span class="icon w-20 icon-xs icon-tertiary me-1"><span class="fas fa-tablet-alt"></span></span> Indicador 3 <a href="#" class="h6">10%</a></h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <?php $this->load->view(BASE_TEMA . 'footer'); ?>