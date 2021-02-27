<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Actividades extends CI_Controller {

    public function index()
    {
        $data = array(
            'titulo'    => 'Actividades ' . APLICACION  . ' | ' . EMPRESA,
            'view'      => 'Actividades/index'
        );
        $this->load->view( RUTA_TEMA . 'body', $data, FALSE );
    }

    public function registrar()
    {
        $data = array(
            'titulo'    => 'Nueva Actividad ' . APLICACION  . ' | ' . EMPRESA,
            'view'      => 'Actividades/registrar'
        );
        $this->load->view( RUTA_TEMA . 'body', $data, FALSE );
    }

}

/* End of file Actividades.php */
/* Location: ./application/controllers/Actividades.php */