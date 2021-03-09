<div class="py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>"><span class="fas fa-home"></span></a></li>
            <li class="breadcrumb-item active" aria-current="page">Actividades</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Actividades registradas</h1>
        </div>
    </div>
    <div class="btn-toolbar dropdown">
      <a href="<?= base_url('index.php/Actividades/registrar') ?>" class="btn btn-dark btn-sm me-2 dropdown-toggle">
        <span class="fas fa-plus me-2"></span>Nueva Actividad
      </a>
    </div>
</div>
<div class="card border-light shadow-sm mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-centered table-nowrap mb-0 rounded">
                <thead class="thead-light">
                    <tr>
                        <th class="border-0">#</th>                        
                        <th class="border-0">Programa Presupuestario</th>
                        <th class="border-0">Actividad</th>
                        <th class="border-0">Unidad Administrativa</th>
                        <th class="border-0">Departamento</th>
                        <th class="border-0">Progreso</th>                        
                        <th class="border-0">Porcentaje de Avance</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border-0"><a href="#" class="text-primary fw-bold">1</a> </td>
                        <td class="border-0 fw-bold">Programa 1</td>
                        <td class="border-0">
                            E058 - Prestaciones médicas para la seguridad social
                        </td>
                        <td class="border-0">
                            Departamento de Contabilidad
                        </td>
                        <td class="border-0">
                            UA
                        </td>
                        <td class="border-0">
                            <div class="row d-flex align-items-center">
                                <div class="col-12 col-xl-2 px-0">
                                    <div class="small fw-bold">51%</div>
                                </div>
                                <div class="col-12 col-xl-10 px-0 px-xl-2">
                                    <div class="progress progress-lg mb-0">
                                        <div class="progress-bar bg-dark" role="progressbar" aria-valuenow="51" aria-valuemin="0" aria-valuemax="100" style="width: 51%;"></div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="border-0 text-success">
                            <span class="fas fa-angle-up"></span>
                            <span class="fw-bold">2.45%</span>
                        </td>
                    </tr>
                    <tr>
                        <td><a href="#" class="text-primary fw-bold">2</a> </td>
                        <td class="fw-bold">Programa 2</td>
                        <td>
                           E059 - Prestaciones sociales para servidores públicos
                        </td>
                        <td>
                            Otro Departamento
                        </td>
                        <td>
                            UA
                        </td>
                        <td>
                            <div class="row d-flex align-items-center">
                                <div class="col-12 col-xl-2 px-0">
                                    <div class="small fw-bold">18%</div>
                                </div>
                                <div class="col-12 col-xl-10 px-0 px-xl-1">
                                    <div class="progress progress-lg mb-0">
                                        <div class="progress-bar bg-dark" role="progressbar" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100" style="width: 18%;"></div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="text-success">
                            <span class="fas fa-angle-up"></span>
                            <span class="fw-bold">17.67%</span>
                        </td>
                    </tr>
                    <tr>
                        <td><a href="#" class="text-primary fw-bold">4</a> </td>
                        <td class="fw-bold">Programa 3</td>
                        <td>
                            K013 - Tecnologías de la Información y Comunicación
                        </td>
                        <td>
                           Último Departamento
                        </td>
                        <td>
                           Otro UA
                        </td>
                        <td>
                            <div class="row d-flex align-items-center">
                                <div class="col-12 col-xl-2 px-0">
                                    <div class="small fw-bold">8%</div>
                                </div>
                                <div class="col-12 col-xl-10 px-0 px-xl-1">
                                    <div class="progress progress-lg mb-0">
                                        <div class="progress-bar bg-dark" role="progressbar" aria-valuenow="8" aria-valuemin="0" aria-valuemax="100" style="width: 8%;"></div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="text-danger">
                            <span class="fas fa-angle-down"></span>
                            <span class="fw-bold">9.30%</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>