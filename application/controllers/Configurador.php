<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configurador extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_catalogos');
        
        if ( !$this->session->estatus_usuario_sesion() ){
            print(json_encode(array('estatus' => 'sess_expired', 'mensaje' => 'Su sesión ha caducado. Por favor, recargue la página.')));
            redirect(base_url('index.php/Home/login'),'refresh');
        }
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

    public function usuarios()
    {
        $data = array(
            'titulo'        => 'Configuración - Usuarios '  . ' | ' . EMPRESA,
            'menu'          => $this->model_catalogos->get_menus(),
            'view'          => 'configurador/usuarios/index'
        );
        $this->load->view( RUTA_TEMA . 'body', $data, FALSE );
    }

/*
|--------------------------------------------------------------------------
| AJAX DATOS 
|--------------------------------------------------------------------------
*/

    public function get_areas_select2(){
        $areas = $this->model_catalogos->get_areas();
        $json  = array('exito' => FALSE);

        if ( $areas ){
            $json['exito']  = TRUE;
            $resultados     = [];

            $direccion      = $areas[0]->direccion;
            $children       = [];
            $guardar_dir    = TRUE;
            // Asignar los hijos
            foreach ($areas as $key => $grupos_areas) {
                if ( $direccion != $grupos_areas->direccion ){
                    // Guardar en resultados
                    array_push($resultados, array(
                        'text'      => $direccion,
                        'children'  => $children
                    ));
                    // Reiniciar
                    $children       = [];
                    $direccion      = $grupos_areas->direccion;
                    $guardar_dir    = TRUE;
                }
                // Almacenar el hijo
                if ( $guardar_dir ){
                    array_push($children, array(
                        'id'    => $grupos_areas->combinacion_area_id,
                        'text'  => $grupos_areas->direccion
                    ));
                    $guardar_dir = FALSE;
                } else {
                    array_push($children, array(
                        'id'    => $grupos_areas->combinacion_area_id,
                        'text'  => trim($grupos_areas->subdireccion . ' ' . 
                                   $grupos_areas->departamento . ' ' . 
                                   $grupos_areas->area)
                    ));
                }
            }

            $json['result'] = $resultados;
        }
        return print(json_encode($json));
    }

    public function get_proyectos_select2(){
        $areas = $this->model_catalogos->get_areas();
        $json  = array('exito' => FALSE);

        if ( $areas ){
            $json['exito']  = TRUE;
            $resultados     = [];

            $direccion      = $areas[0]->direccion;
            $children       = [];
            $guardar_dir    = TRUE;
            // Asignar los hijos
            foreach ($areas as $key => $grupos_areas) {
                if ( $direccion != $grupos_areas->direccion ){
                    // Guardar en resultados
                    array_push($resultados, array(
                        'text'      => $direccion,
                        'children'  => $children
                    ));
                    // Reiniciar
                    $children       = [];
                    $direccion      = $grupos_areas->direccion;
                    $guardar_dir    = TRUE;
                }
                // Almacenar el hijo
                if ( $guardar_dir ){
                    array_push($children, array(
                        'id'    => $grupos_areas->combinacion_area_id,
                        'text'  => $grupos_areas->direccion
                    ));
                    $guardar_dir = FALSE;
                } else {
                    array_push($children, array(
                        'id'    => $grupos_areas->combinacion_area_id,
                        'text'  => trim($grupos_areas->subdireccion . ' ' . 
                                   $grupos_areas->departamento . ' ' . 
                                   $grupos_areas->area)
                    ));
                }
            }

            $json['result'] = $resultados;
        }
        return print(json_encode($json));
    }

    // ----------- DATATABLES

    public function datatable_usuarios(){        
        $this->load->model('model_usuarios');
        return print(json_encode($this->model_usuarios->get_usuarios()));
    }

}

/* End of file Configurador.php */
/* Location: ./application/controllers/Configurador.php */