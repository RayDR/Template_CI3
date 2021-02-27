<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Programas extends CI_Controller {

	public function index()
	{
		$data = array(
            'titulo'    => 'Home ' . APLICACION  . ' | ' . EMPRESA,
            'view'      => 'Programas/index'
        );
        $this->load->view( RUTA_TEMA . 'body', $data, FALSE );
	}

	public function registrar()
    {
        $data = array(
            'titulo'    => 'Nuevo Programa ' . APLICACION  . ' | ' . EMPRESA,
            'view'      => 'Programas/registrar'
        );
        $this->load->view( RUTA_TEMA . 'body', $data, FALSE );
    }

}

/* End of file Programas.php */
/* Location: ./application/controllers/Programas.php */