<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acuerdos extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('model_catalogos');
        $this->load->model('model_acuerdos');
    }


/*
|--------------------------------------------------------------------------
| VISTAS 
|--------------------------------------------------------------------------
*/

	public function index()
	{
		$data = array(
            'titulo'    => 'Acuerdos ' . APLICACION  . ' | ' . EMPRESA,
            'menu'      => $this->model_catalogos->get_menus(),
            'acuerdos'  => $this->model_acuerdos->get_acuerdos(),
            'view'      => 'acuerdos/index'
        );
        $this->load->view( RUTA_TEMA . 'body', $data, FALSE );
	}

	public function registrar()
    {
        $data = array(
            'titulo'    => 'Nuevo Acuerdo',
            'view'      => 'acuerdos/registrar'
        );
        $this->load->view( $data['view'], $data, FALSE );
    }

}

/* End of file Acuerdos.php */
/* Location: ./application/controllers/Acuerdos.php */