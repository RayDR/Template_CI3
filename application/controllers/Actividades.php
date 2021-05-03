<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Actividades extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_catalogos');
        $this->load->model('model_actividades');
        
        if ( !$this->session->estatus_usuario_sesion() ){
            print(json_encode(array('estatus' => 'sess_expired', 'mensaje' => 'Su sesión ha caducado. Por favor, recargue la página.')));
            redirect(base_url('index.php/Home/login'),'refresh');
        }
    }

/*
|--------------------------------------------------------------------------
| VISTAS 
|--------------------------------------------------------------------------
*/

    public function index()
    {
        $data = array(
            'titulo'        => 'Actividades ' . APLICACION  . ' | ' . EMPRESA,
            'menu'          => $this->model_catalogos->get_menus(),
            'view'          => 'actividades/index'
        );
        $this->load->view( RUTA_TEMA . 'body', $data, FALSE );
    }

    public function registrar()
    {
        $json = array('exito' => TRUE);

        // Área usuario
        $area_usuario   = array('combinacion_area_id' => $this->session->userdata('combinacion_area'));
        $combinacion    = $this->model_catalogos->get_areas( $area_usuario );

        $condicion = ( $this->session->userdata('tuser') == 1 )? NULL : 
                     array( 'direccion_id' => $combinacion->direccion_id );
                     
        $data = array(
            'titulo'    => 'Registrar',
            'programas' =>  $this->model_catalogos->get_programas(),
            'l_accion'  =>  $this->model_catalogos->get_lineas_accion(),
            'u_medida'  =>  $this->model_catalogos->get_unidades_medida($condicion),
            'view'      => 'actividades/registrar'
        );
        $json['html'] = $this->load->view( $data['view'], $data, TRUE );
        return print(json_encode($json));
    
    }
/*
|--------------------------------------------------------------------------
| AJAX 
|--------------------------------------------------------------------------
*/
    
    // -------------- VISTAS

    private function registro_proyecto(){
        $json = array('exito' => TRUE);
        $data = array(
            'titulo'    => 'Registrar',
            'programas' =>  $this->model_catalogos->get_programas(),
            'l_accion'  =>  $this->model_catalogos->get_lineas_accion(),
            'view'      => 'actividades/tipos_registro/proyecto'
        );
        $json['html']   = $this->load->view( $data['view'], $data, TRUE );
        $json['inputs'] = array(
            [
                'nombre'=> 'area_origen',
                'texto' => 'Área',
                'tipo'  => 'select'
            ],
            [
                'nombre'=> 'programa_presupuestario',
                'texto' => 'Programa Presupuestario',
                'tipo'  => 'select'
            ],
            [
                'nombre'=> 'linea_accion',
                'texto' => 'Línea de Acción',
                'tipo'  => 'select'
            ],
            [
                'nombre'=> 'detalle_actividad',
                'texto' => 'Detalle de la Actividad'
            ],
            [
                'nombre'=> 'unidad_medida',
                'texto' => 'Unidad de Medida',
                'tipo'  => 'select'
            ],
            [
                'nombre'=> 'tipo_medicion',
                'texto' => 'Tipo de Medición',
                'tipo'  => 'select'
            ],
            [
                'nombre'=> 'grupo_beneficiado',
                'texto' => 'Grupo Beneficiado',
                'tipo'  => 'select'
            ],
            [
                'nombre'=> 'fisico_objetivo_anual',
                'texto' => 'Objetivo Anual (Físico)'
            ],
            [
                'nombre'=> 'programado-fisico',
                'texto' => 'Distribución Mensual Ponderada (Físico)'
            ],
            [
                'nombre'=> 'financiero_objetivo_anual',
                'texto' => 'Objetivo Anual (Financiero)'
            ],
            [
                'nombre'=> 'programado-financiero',
                'texto' => 'Distribución Mensual Ponderada (Financiero)'
            ]
        );
        return $json;
    }

    private function registro_preproyecto(){
        $json = array('exito' => TRUE);
        $data = array(
            'titulo'        => 'Registrar',
            'municipios'    =>  $this->model_catalogos->get_municipios(),
            'l_accion'      =>  $this->model_catalogos->get_lineas_accion(),
            'view'          => 'actividades/tipos_registro/preproyecto'
        );
        $json['html']   = $this->load->view( $data['view'], $data, TRUE );
        $json['inputs'] = array(
            [
                'nombre'=> 'area_origen',
                'texto' => 'Área',
                'tipo'  => 'select'
            ],
            [
                'nombre'=> 'municipio',
                'texto' => 'Municipio',
                'tipo'  => 'select'
            ],
            [
                'nombre'=> 'localidad',
                'texto' => 'Localidad',
                'tipo'  => 'select'
            ],
            [
                'nombre'=> 'linea_accion',
                'texto' => 'Línea de Acción',
                'tipo'  => 'select'
            ],
            [
                'nombre'=> 'detalle_actividad',
                'texto' => 'Detalle de la Actividad'
            ],
            [
                'nombre'=> 'unidad_medida',
                'texto' => 'Unidad de Medida',
                'tipo'  => 'select'
            ],
            [
                'nombre'=> 'tipo_medicion',
                'texto' => 'Tipo de Medición',
                'tipo'  => 'select'
            ],
            [
                'nombre'=> 'grupo_beneficiado',
                'texto' => 'Grupo Beneficiado',
                'tipo'  => 'select'
            ],
            [
                'nombre'=> 'fisico_objetivo_anual',
                'texto' => 'Objetivo Anual (Físico)'
            ],
            [
                'nombre'=> 'programado-fisico',
                'texto' => 'Distribución Mensual Ponderada (Físico)'
            ],
            [
                'nombre'=> 'financiero_objetivo_anual',
                'texto' => 'Objetivo Anual (Financiero)'
            ],
            [
                'nombre'=> 'programado-financiero',
                'texto' => 'Distribución Mensual Ponderada (Financiero)'
            ]
        );
        return $json;
    }

    // -------------- DATOS


    public function datatable_actividades(){
        return print(json_encode( $this->model_actividades->get_actividades() ));
    }

    public function guardar(){
        $json = array('exito' => TRUE);
        $area_origen                    = $this->input->post('area_origen');
        $programa_presupuestario        = $this->input->post('programa_presupuestario');
        $linea_accion                   = $this->input->post('linea_accion');
        $detalle_actividad              = $this->input->post('detalle_actividad');
        $unidad_medida                  = $this->input->post('unidad_medida');
        $tipo_medicion                  = $this->input->post('tipo_medicion');
        $grupo_beneficiado              = $this->input->post('grupo_beneficiado');
        $fisico_objetivo_anual          = $this->input->post('fisico_objetivo_anual');
        $programado_fisico              = $this->input->post('programado-fisico');
        $financiero_objetivo_anual      = $this->input->post('financiero_objetivo_anual');
        $programado_financiero          = $this->input->post('programado-financiero');
        $municipio                      = $this->input->post('municipio');
        $localidad                      = $this->input->post('localidad');
        if ( $programa_presupuestario ) // Proyecto
        {

        } else                          // Preproyecto 
        {

        }
        return print(json_encode($json));
    }

    public function select_unidades_medida(){
        $json = array('exito' => TRUE);
        $area_usuario   = array('combinacion_area_id' => $this->input->post('combinacion_area'));
        $combinacion    = $this->model_catalogos->get_areas( $area_usuario );

        $condicion = array( 'direccion_id' => $combinacion->direccion_id );
        $json['unidades_medida'] = $this->model_catalogos->get_unidades_medida($condicion);
        if ( !$json['unidades_medida'] )
            $json['unidades_medida'] = $this->model_catalogos->get_unidades_medida();
        return print(json_encode($json));
    }

    public function select_localidades(){
        $json = array('exito' => TRUE);
        $condicion = array( 'municipio_id' => $this->input->post('municipio') );
        $json['localidades']  = $this->model_catalogos->get_localidades();
        return print(json_encode($json));
    }

    public function tipo_registro(){
        $json = array('exito' => TRUE);
        $tipo = $this->input->post('tipo');
        switch ($tipo) {
            case 'proyecto':
                $json = $this->registro_proyecto();
                break;
            case 'preproyecto':
                $json = $this->registro_preproyecto();
                break;
            default:
                $json = array('exito' => FALSE, 'mensaje' => 'Opción inválida');
                break;
        }
        return print(json_encode($json));
    }

}

/* End of file Actividades.php */
/* Location: ./application/controllers/Actividades.php */