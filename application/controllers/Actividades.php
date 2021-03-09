<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Actividades extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_catalogos');
    }

/*
|--------------------------------------------------------------------------
| VISTAS 
|--------------------------------------------------------------------------
*/

    public function index()
    {
        $data = array(
            'titulo'    => 'Actividades ' . APLICACION  . ' | ' . EMPRESA,
            'menu'      => $this->model_catalogos->get_menus(),
            'view'      => 'actividades/index'
        );
        $this->load->view( RUTA_TEMA . 'body', $data, FALSE );
    }

    public function registrar()
    {
        $data = array(
            'titulo'    => 'Nueva Actividad ' . APLICACION  . ' | ' . EMPRESA,
            'view'      => 'actividades/registrar'
        );
        $this->load->view( RUTA_TEMA . 'body', $data, FALSE );
    }

}

/* End of file Actividades.php */
/* Location: ./application/controllers/Actividades.php */