<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('model_catalogos');
        $this->load->model('model_usuarios');
        
        if ( ! $this->session->estatus_usuario_sesion() )
            redirect(base_url('index.php/Home/login'),'refresh');
    }

/*
|--------------------------------------------------------------------------
| VISTAS 
|--------------------------------------------------------------------------
*/

    public function index()
    {
        $mi_usuario = array('usuario_id' => $this->session->userdata('uid'));
        $data = array(
            'titulo'        => 'Mi Perfil | ' . APLICACION,
            'menu'          => $this->model_catalogos->get_menus(),
            'usuario'       => $this->model_usuarios->get_usuarios($mi_usuario),
            'view'          => 'perfil/perfil'
        );
        $this->load->view( RUTA_TEMA . 'body', $data, FALSE );
    }

}

/* End of file Perfil.php */
/* Location: ./application/controllers/Perfil.php */