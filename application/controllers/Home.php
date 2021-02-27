<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
        $data = array(
            'titulo'    => 'Home ' . APLICACION  . ' | ' . EMPRESA,
            'view'      => 'index'
        );
        $this->load->view( RUTA_TEMA . 'body', $data, FALSE );
    }
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */