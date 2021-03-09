<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acuerdos extends CI_Controller {

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
            'titulo'    => 'Home ' . APLICACION  . ' | ' . EMPRESA,
            'menu'      => $this->model_catalogos->get_menus(),
            'view'      => 'acuerdos/index'
        );
        $this->load->view( RUTA_TEMA . 'body', $data, FALSE );
	}

	public function registrar()
    {
        $data = array(
            'titulo'    => 'Nuevo Programa ' . APLICACION  . ' | ' . EMPRESA,
            'view'      => 'acuerdos/registrar'
        );
        $this->load->view( RUTA_TEMA . 'body', $data, FALSE );
    }

}

/* End of file Acuerdos.php */
/* Location: ./application/controllers/Acuerdos.php */