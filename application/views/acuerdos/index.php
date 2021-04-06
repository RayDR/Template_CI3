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
    <div class="btn-toolbar dropdown d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <a id="nuevo_acuerdo" href="#registrar" class="btn btn-dark btn-sm me-2 dropdown-toggle">
            <span class="fas fa-plus me-2"></span>Nuevo Acuerdo
        </a>
        <div class="btn-group">
            <button id="vista_calendario" class="btn btn-sm btn-outline-primary" type="button">
                <span class="far fa-calendar me-2"></span>Calendario
            </button>
        </div>
    </div>
</div>
<div class="card border-light shadow-sm mb-4">
    <div class="card-body">
        <div class="table-responsive py-1">
            <table id="dtAcuerdos" class="table table-hover table-centered table-nowrap mb-0 rounded w-100">
                <thead class="thead-light">
                    <tr>
                        <th class="align-middle">#</th>
                        <th class="align-middle">Asunto</th>
                        <th class="align-middle">Tema</th>
                        <th class="align-middle">Origen</th>
                        <th class="align-middle">Usuario Envia</th>
                        <th class="align-middle">Destino</th>
                        <th class="align-middle">Usuario Recibe</th>
                        <th class="align-middle">Folio</th>
                        <th class="align-middle">Último Acuerdo</th>
                        <th class="align-middle">Fecha Creación</th>
                        <th class="align-middle">Última Modificación</th>
                        <th class="align-middle">Estatus</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/js/acuerdos/acuerdos.js') ?>" type="text/javascript" charset="utf-8" async defer></script>