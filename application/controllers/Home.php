<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


/*
|--------------------------------------------------------------------------
| VISTAS 
|--------------------------------------------------------------------------
*/
    public function index()
    {
        $data = array(
            'titulo'    => 'Home ' . APLICACION  . ' | ' . EMPRESA,
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
| VISTAS AJAX
|--------------------------------------------------------------------------
*/

    // Función para verificar usuario y contraseña del login
    public function lVerificar(){

    }

    // Función para verificar que el usuario y contrato matcheen para el recovery
    public function rVerificar(){

    }
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */