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
            'view'      => 'acuerdos/index'
        );
        $this->load->view( RUTA_TEMA . 'body', $data, FALSE );
	}

    public function registrar()
    {
        $json = array('exito' => TRUE);
        $data = array(
            'titulo'    =>  'Registrar',
            'areas'     =>  $this->model_catalogos->get_areas(),
            'view'      => 'acuerdos/registrar'
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

    public function datatable_acuerdos(){
        return print(json_encode( $this->model_acuerdos->get_acuerdos() ));
    }

    public function registrar_acuerdo(){
        
    }

}

/* End of file Acuerdos.php */
/* Location: ./application/controllers/Acuerdos.php */