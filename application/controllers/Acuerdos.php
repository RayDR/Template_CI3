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

    public function detalles_acuerdo(){
        $json           = array('exito' => TRUE);

        $acuerdo_id     = $this->input->post('acuerdo');
        $data = array(
            'titulo'    =>  'Seguimiento de Acuerdo',
            'acuerdos'  =>  $this->model_acuerdos->get_acuerdos_detalle($acuerdo_id),
            'view'      => 'acuerdos/ajax/detalles_acuerdo'
        );
        $json['html'] = $this->load->view( $data['view'], $data, TRUE );
        return print(json_encode( $json ));
    }

    public function seguimiento_detallado(){
        $json           = array('exito' => TRUE);

        $acuerdo_id     = $this->input->post('acuerdo');
        $data = array(
            'titulo'       =>  'Seguimiento de Acuerdo',
            'acuerdo'      =>  $this->model_acuerdos->get_acuerdos([ 'acuerdo_id' => $acuerdo_id ]),
            'seguimiento'  =>  $this->model_acuerdos->get_acuerdos_detalle($acuerdo_id),
            'view'         => 'acuerdos/ajax/seguimiento_detallado'
        );
        $json['html'] = $this->load->view( $data['view'], $data, TRUE );
        return print(json_encode( $json ));
    }

    // -------------- DATOS

    public function datatable_acuerdos(){
        $datos = $this->model_acuerdos->get_acuerdos_master();
        $aux   = [];
        foreach ($datos as $key => $dato) {
            $dato->seguimiento = json_decode($dato->seguimiento);
            foreach ($dato->seguimiento as $idx => $seguimiento) {
                foreach ($seguimiento as $campo => $valor) {
                    $datos[$key]->$campo = $valor;
                }
            }
        }
            
        return print(json_encode( $datos ));
    }

    public function registrar_acuerdo(){
        $json           = array('exito' => TRUE);

        $area_origen    = $this->input->post('area_origen');
        $area_destino   = $this->input->post('area_destino');
        $acuerdos       = $this->input->post('acuerdos');

        if ( ! $area_origen || ! $area_destino || ! $acuerdos ){
            $json['exito']   = FALSE;
            $json['mensaje'] = 'Falló al recibir los datos del acuerdo';
        } else {
            if ( is_string($area_destino) ){                
                $datos_acuerdo  = array(
                    'area_origen'   => explode(',', $area_origen),
                    'area_destino'  => explode(',', $area_destino),
                    'acuerdos'      => $acuerdos,
                    'ejercicio'     => 2021,
                    'usuario_id'    => 1
                );
                $resultado     = $this->model_acuerdos->set_nuevo_acuerdo($datos_acuerdo);
                $json['exito'] = $resultado['exito'];
                if ( $json['exito'] == FALSE )
                    $json['mensaje'] = $resultado['error'];
            } else {
                $json['exito']   = FALSE;
                $json['mensaje'] = 'Configuración incorrecta en <b>Área a Turnar</b>.';
            }
        }

        return print(json_encode($json));
    }

}

/* End of file Acuerdos.php */
/* Location: ./application/controllers/Acuerdos.php */