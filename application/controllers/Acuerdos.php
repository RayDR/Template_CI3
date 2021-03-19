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
            'titulo'    =>  'Registro de Acuerdo',
            'view'      => 'acuerdos/registrar'
        );
        $json['html'] = $this->load->view( $data['view'], $data, TRUE );
        return print(json_encode($json));
    }

    public function editar()
    {
        $json = array('exito' => TRUE);
        $data = array(
            'titulo'    =>  'Edición Acuerdo',
            'view'      => 'acuerdos/editar'
        );
        $json['html'] = $this->load->view( $data['view'], $data, TRUE );
        return print(json_encode($json));
    }

    public function seguimiento($acuerdo_id)
    {
        $json = array('exito' => TRUE);
        if ( $acuerdo_id ){
            $historial = $this->model_acuerdos->get_acuerdos_detalle($acuerdo_id);
            if ( $historial ){
                $data = array(
                    'titulo'        => 'Nuevo Seguimiento',
                    'view'          => 'acuerdos/seguimiento',
                    'acuerdo_id'    =>  $acuerdo_id,
                    'historial'     =>  $historial
                );
                $json['html'] = $this->load->view( $data['view'], $data, TRUE );
            } else {
                $json['exito'] = FALSE;
                $json['error'] = 'El acuerdo no existe.';
            }
        } else {
            $json['exito'] = FALSE;
            $json['error'] = 'No se recibió el número de acuerdo';
        }
        return print(json_encode($json));
    }

    public function editar_seguimiento()
    {
        $json = array('exito' => TRUE);
        $data = array(
            'titulo'    => 'Edición de Seguimiento',
            'view'      => 'acuerdos/seguimiento'
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
            'acuerdo_id'   =>  $acuerdo_id,
            'acuerdo'      =>  $this->model_acuerdos->get_acuerdos([ 'acuerdo_id' => $acuerdo_id ]),
            'seguimiento'  =>  $this->model_acuerdos->get_acuerdos_detalle($acuerdo_id),
            'view'         => 'acuerdos/ajax/seguimiento_detallado'
        );
        $json['html'] = $this->load->view( $data['view'], $data, TRUE );
        return print(json_encode( $json ));
    }

    // -------------- DATOS

    public function datatable_acuerdos(){
        return print(json_encode( $this->model_acuerdos->get_acuerdos_master() ));
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
            $datos_acuerdo  = array(
                'area_origen'   => $area_origen,
                'area_destino'  => $area_destino,
                'acuerdos'      => $acuerdos,
                'tema'          => 1,
                'ejercicio'     => 2021,
                'usuario_id'    => 1
            );
            $resultado     = $this->model_acuerdos->set_nuevo_acuerdo($datos_acuerdo);
            $json['exito'] = $resultado['exito'];
            if ( $json['exito'] == FALSE )
                $json['mensaje'] = $resultado['error'];
        }

        return print(json_encode($json));
    }

    public function registrar_seguimiento(){
        $json           = array('exito' => TRUE);

        $acuerdo_id     = $this->input->post('acuerdo_id');
        $area_destino   = $this->input->post('area_destino');
        $acuerdos       = $this->input->post('acuerdos');

        if ( ! $acuerdo_id || ! $area_destino || ! $acuerdos ){
            $json['exito']   = FALSE;
            $json['mensaje'] = 'Falló al recibir los datos para seguimiento al acuerdo';
        } else {               
            $datos_seguimiento  = array(
                'area_destino'  => $area_destino,
                'acuerdos'      => $acuerdos,
                'ejercicio'     => 2021,
                'usuario_id'    => 1,                
                'estatus_acuerdo' => 2
            );
            $resultado     = $this->model_acuerdos->set_seguimiento_acuerdo($acuerdo_id, $datos_seguimiento);
            $json['exito'] = $resultado['exito'];
            $json['model'] = $resultado;
            if ( $json['exito'] == FALSE )
                $json['mensaje'] = $resultado['error'];
        }

        return print(json_encode($json));
    }

}

/* End of file Acuerdos.php */
/* Location: ./application/controllers/Acuerdos.php */