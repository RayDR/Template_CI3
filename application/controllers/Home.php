<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_catalogos');
        $this->load->model('model_usuarios');
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
    public function do_login(){
        $usuario    = $this->input->post('usuario');
        $password   = $this->input->post('password');

        $respuesta = array(
            'exito'     =>  FALSE
        );

        if ( ! $usuario || ! $password )
            $db_usuario = NULL;
        else
            $db_usuario = $this->model_usuarios->get_usuario_acceso( $usuario, $acceso );

        if ( $db_usuario ) 
            {  // Comprobación de usuario
            if ( $db_usuario->estatus != 1 )
            {  // Usuario no Activo
                switch ( $db_usuario->estatus ) 
                {
                    case 2:  // Usuario no inactivo
                        $respuesta["mensaje"] = "<b>El usuario está inactivo.</b><br><small>Pongase en contacto con la administración para reactivar su cuenta.</small>";
                        break;
                    case 3:  // Usuario bloqueado
                        $respuesta["mensaje"] = "<b>El usuario ha sido bloqueado.</b><br><small>Por favor, solicite la ayuda de la administración para desbloquearlo.</small>";
                        break;
                    default:  // Opción no controlada
                        $respuesta["mensaje"] = "<b>No se pudo obtener el estatus de su usuario. </b><br><small>Por favor, solicite asistencia al administrador del sistema.</small>";
                        break;
                }
            } 
            else if ( password_verify( $password, $db_usuario->password ) )
            {  // Todo correcto - Permitir Login
                $array_login = array('ulogin' => TRUE);
                if ($this->session->establecer_sesion($db_usuario->usuario_id, $array_login))
                {
                    $respuesta["exito"]     =   TRUE;
                    $respuesta["usuario"]   =   array(  'value' =>  $db_usuario->usuario_id, 
                                                        'name'  =>  'usuario_id' );
                    $respuesta["mensaje"]   =   "<b>Acceso concedido.</b>";
                } else 
                    $respuesta["mensaje"]   =   "<b>No fue posible crear la sesión del usuario</b>. Intente nuevamente.";
            } 
            else
            {
                $respuesta["mensaje"]   =   "<b>La combinación de usuario y contraseña no son correctas.</b>";                        
                $respuesta["intentos"]  =   $this->session->intentos_conexion($db_usuario->usuario_id);
            }
        } else
            $respuesta["mensaje"]   =   "<b>El usuario ingresado no existe.</b>";
        return print( json_encode($respuesta) );
    }

    // Función para verificar que el usuario y contrato matcheen para el recovery
    public function do_recovery(){

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