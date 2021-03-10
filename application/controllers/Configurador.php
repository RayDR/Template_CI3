<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configurador extends CI_Controller {

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
	public function programas()
	{
		$data = array(
            'titulo'        => 'Configuración - Programas '  . ' | ' . EMPRESA,
            'menu'          => $this->model_catalogos->get_menus(),
            'view'          => 'configurador/programas/index'
        );
        $this->load->view( RUTA_TEMA . 'body', $data, FALSE );
	}

}

/* End of file Configurador.php */
/* Location: ./application/controllers/Configurador.php */