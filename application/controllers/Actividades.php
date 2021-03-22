<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Actividades extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_catalogos');
        $this->load->model('model_actividades');
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
        $data = array(
            'titulo'    => 'Registrar',
            'programas' =>  $this->model_catalogos->get_programas(),
            'l_accion'  =>  $this->model_catalogos->get_lineas_accion(),
            'u_medida'  =>  $this->model_catalogos->get_unidades_medida(),
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

    // -------------- DATOS

    public function datatable_actividades(){
        return print(json_encode( $this->model_actividades->get_actividades() ));
    }

}

/* End of file Actividades.php */
/* Location: ./application/controllers/Actividades.php */