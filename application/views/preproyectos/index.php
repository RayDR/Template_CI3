<div class="py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>"><span class="fas fa-home"></span></a></li>
            <li class="breadcrumb-item active" aria-current="page">Preproyectos</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Detalle de Preproyectos</h1>
        </div>
    </div>
    <?php if ( $this->session->userdata('tuser') != 2 ): //No consultores ?> 
    <div class="btn-toolbar dropdown">
      <a id="nueva_actividad" href="#registrar" class="btn btn-dark btn-sm me-2 dropdown-toggle">
        <span class="fas fa-plus me-2"></span>Nueva Preproyecto
      </a>
    </div>
    <?php endif; ?>
</div>
<div class="card border-light shadow-sm mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table id="dtPreproyectos" class="table table-hover table-centered table-nowrap mb-0 rounded w-100">
                <thead class="thead-light">
                    <tr>
                        <th class="">#</th>
                        <th class="">Preproyecto General</th>
                        <th class="">Programado Físico</th>
                        <th class="">Realizado Físico</th>
                        <th class="">Progreso Físico</th>
                        <th class="">Programado Financiero</th>
                        <th class="">Realizado Financiero</th>
                        <th class="">Progreso Financiero</th>
                        <th class="">Beneficiario</th>
                        <th class="">Cantidad Beneficiados</th>
                        <th class="">Unidad de Medida</th>
                        <th class="">Línea de Acción</th>
                        <th class="">Objetivo</th>
                        <th class="">Estrategia</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/js/preproyectos/preproyectos.js') ?>?V1" type="text/javascript" charset="utf-8" async defer></script>