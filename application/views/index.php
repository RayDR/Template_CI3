<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
  <div class="btn-toolbar dropdown">
    <button class="btn btn-dark btn-sm me-2 dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="fas fa-plus me-2"></span>Acceso rápido
    </button>
    <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-0">
      <a id="nuevo_actividad" class="dropdown-item fw-normal" href="#nueva_actividad"><span class="far fa-calendar-plus"></span>Nueva Actividad</a>
      <a id="nuevo_acuerdo" class="dropdown-item fw-normal rounded-top" href="#nuevo_acuerdo"><span class="fas fa-file-signature"></span>Nuevo Acuerdo</a>
      <div role="separator" class="dropdown-divider my-0"></div>
      <a class="dropdown-item fw-normal rounded-bottom" href="#"><span class="fas fa-file-import"></span>Reportes</a>
    </div>
  </div>
</div>
<div class="row justify-content-md-center">
  <div class="col-12">
    <h1>En construcción</h1>
  </div>

  <div class="col-12">
    <div class="card border-light shadow-sm">
      <div class="card-body d-flex flex-row align-items-center flex-0 border-bottom">
        <div class="d-block">
          <div class="h6 fw-normal text-gray mb-2">Total de progreso</div>
          <h2 class="h3">Corte al mes de marzo</h2>
          <div class="small mt-2">
            <span class="fas fa-angle-up text-success"></span>
            <span class="text-success fw-bold">Avance total: 18.2%</span>
          </div>
        </div>
        <div class="d-block ms-auto">
          <div class="d-flex align-items-center text-right mb-2">
            <span class="shape-xs rounded-circle bg-dark me-2"></span>
            <span class="fw-normal small">Marzo</span>
          </div>
          <div class="d-flex align-items-center text-right">
            <span class="shape-xs rounded-circle bg-secondary me-2"></span>
            <span class="fw-normal small">Febero</span>
          </div>
          <div class="d-flex align-items-center text-right">
            <span class="shape-xs rounded-circle bg-info me-2"></span>
            <span class="fw-normal small">Enero</span>
          </div>
        </div>
      </div>
      <div class="card-body p-2">
        <div class="ct-chart-ranking ct-golden-section ct-series-a"></div>
      </div>
    </div>
  </div>
</div>

<script src="<?= base_url('assets/js/dashboard.js') ?>" type="text/javascript" charset="utf-8" async defer></script>

<?php $this->load->view(BASE_TEMA . 'footer'); ?>