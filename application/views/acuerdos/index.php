<div class="py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>"><span class="fas fa-home"></span></a></li>
            <li class="breadcrumb-item active" aria-current="page">Acuerdos</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-5 mb-lg-0">
            <h1 class="h4">Seguimiento de Acuerdos</h1>
        </div>
    </div>
    <div class="btn-toolbar dropdown pt-2">
      <a id="nuevo_acuerdo" href="#registrar" class="btn btn-dark btn-sm me-2 dropdown-toggle">
        <span class="fas fa-plus me-2"></span>Nuevo Acuerdo
      </a>
    </div>
</div>
<div class="card border-light shadow-sm mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table id="dtAcuerdos" class="table table-centered table-nowrap mb-0 rounded w-100">
                <thead class="thead-light">
                    <tr>
                        <th class="align-middle">#</th>
                        <th class="align-middle">Acuerdo</th>
                        <th class="align-middle">Origen</th>
                        <th class="align-middle">Destino</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/js/acuerdos/acuerdos.js') ?>" type="text/javascript" charset="utf-8" async defer></script>