<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
            'view'      => 'index'
        );
        $this->load->view( RUTA_TEMA . 'body', $data, FALSE );
    }

    public function login()
    {
        $data = array(
            'titulo'    => 'Acceso ' . APLICACION  . ' | ' . EMPRESA,
            'view'      => 'login'
        );
        $this->load->view( RUTA_TEMA_ALT . 'body', $data, FALSE );
    }

    public function recovery()
    {
        $data = array(
            'titulo'    => 'Recuperar Contraseña ' . APLICACION  . ' | ' . EMPRESA,
            'view'      => 'recovery'
        );
        $this->load->view( RUTA_TEMA_ALT . 'body', $data, FALSE );
    }


/*
|--------------------------------------------------------------------------
| FUNCIONES AJAX
|--------------------------------------------------------------------------
*/
    // ----------------- VISTAS
    public function modales(){
        $json = array('exito' => TRUE);
        $tipo = $this->input->post('tipo');
        switch ($tipo) {
            case 'login':
                $json['html'] = $this->load->view(RUTA_TEMA_EXTRAS .'/modales/modal_login', NULL, TRUE);
                break;
            case 'notificacion':
                $json['html'] = $this->load->view(RUTA_TEMA_EXTRAS .'/modales/modal_notificacion', NULL, TRUE);
                break;
            default:
                $json['html'] = $this->load->view(RUTA_TEMA_EXTRAS .'/modales/modal_generico', NULL, TRUE);
                break;
        }
        return print(json_encode($json));
    }

    // Función para verificar usuario y contraseña del login
    public function lVerificar(){

    }

    // Función para verificar que el usuario y contrato matcheen para el recovery
    public function rVerificar(){

    }

    // Función de cierre de sesión
    public function logout(){
        session_destroy();
        redirect(base_url('index.php/Home/login'),'refresh');
    }


/*
|--------------------------------------------------------------------------
| FUNCIONES RESERVADAS PARA EL SISTEMA
|--------------------------------------------------------------------------
*/ 

    public function crypt_decrypt($encrypt = 'localhost'){
        $this->load->library('encryption');
        $encriptado =  $this->encryption->encrypt($encrypt);
        echo $encriptado . '<hr>';
    }
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */