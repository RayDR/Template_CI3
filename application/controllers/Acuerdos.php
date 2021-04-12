 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acuerdos extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('model_catalogos');
        $this->load->model('model_acuerdos');

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
            'titulo'    => 'Registro de Acuerdo',
            'view'      => 'acuerdos/registrar',
            'temas'     => $this->model_catalogos->get_temas(['estatus' => 1])
        );
        $json['html'] = $this->load->view( $data['view'], $data, TRUE );
        return print(json_encode($json));
    }

    public function editar($acuerdo_id)
    {
        $json = array('exito' => TRUE);
        // Validar que la edición este permitida
        if ( $acuerdo_id ){
            $historial = $this->model_acuerdos->get_acuerdos_detalle($acuerdo_id);
            if ( $historial[0]->estatus_seguimiento == 'Nuevo' ){                
                $data = array(
                    'titulo'    => 'Edición Acuerdo',
                    'view'      => 'acuerdos/editar',
                    'archivos'  => $this->model_acuerdos->get_archivos_acuerdo($acuerdo_id),
                    'temas'     => $this->model_catalogos->get_temas(['estatus' => 1]),
                    'historial' => $historial[0]
                );
                $json['html'] = $this->load->view( $data['view'], $data, TRUE );
            } else {
                $json['exito'] = FALSE;
                $json['error'] = 'No es posible editar este acuerdo, debido a que este proceso ya ha iniciado.';
            }
        } else {
            $json['exito'] = FALSE;
            $json['error'] = 'No se recibió el número de acuerdo';
        }

        return print(json_encode($json));
    }

    public function seguimiento($acuerdo_id)
    {
        $json = array('exito' => TRUE);
        if ( $acuerdo_id ){
            $historial = $this->model_acuerdos->get_acuerdos_detalle($acuerdo_id);
            if ( $historial ){
                if ( $historial[0]->estatus_seguimiento != 'Terminado' ){
                    $data = array(
                        'titulo'        => 'Nuevo Seguimiento',
                        'view'          => 'acuerdos/seguimiento',
                        'archivos'      => $this->model_acuerdos->get_archivos_acuerdo($acuerdo_id),
                        'acuerdo_id'    =>  $acuerdo_id,
                        'historial'     =>  $historial
                    );
                    $json['html'] = $this->load->view( $data['view'], $data, TRUE );
                } else {
                    $json['exito'] = FALSE;
                    $json['error'] = 'El acuerdo ya ha finalizado.';
                }
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

    public function finalizar($acuerdo_id)
    {
        $json = array('exito' => TRUE);
        if ( $acuerdo_id ){
            $historial = $this->model_acuerdos->get_acuerdos_detalle($acuerdo_id);
            if ( $historial ){
                if ( $historial[0]->estatus_seguimiento != 'Terminado' ){
                    $data = array(
                        'titulo'        => 'Finalizar Acuerdo',
                        'view'          => 'acuerdos/finalizar',
                        'archivos'      => $this->model_acuerdos->get_archivos_acuerdo($acuerdo_id),
                        'acuerdo_id'    =>  $acuerdo_id,
                        'historial'     =>  $historial
                    );
                    $json['html'] = $this->load->view( $data['view'], $data, TRUE );
                } else {
                    $json['exito'] = FALSE;
                    $json['error'] = 'El acuerdo ya ha finalizado.';
                }
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
            'titulo'    => 'Seguimiento de Acuerdo',
            'acuerdos'  => $this->model_acuerdos->get_acuerdos_detalle($acuerdo_id),
            'view'      => 'acuerdos/ajax/detalles_acuerdo'
        );
        $json['html'] = $this->load->view( $data['view'], $data, TRUE );
        return print(json_encode( $json ));
    }

    public function seguimiento_detallado(){
        $this->load->model('model_usuarios');
        $json           = array('exito' => TRUE);

        $acuerdo_id     = $this->input->post('acuerdo');
        $area_usuario   = array('combinacion_area_id' => $this->session->userdata('combinacion_area'));
        if ( $area_usuario ){
            $combinacion = $this->model_catalogos->get_areas( $area_usuario );
            if ( $combinacion ){
                $direccion = ( $this->session->userdata('tuser') == 1 )? NULL : 
                                array( 'direccion_id' => $combinacion->direccion_id );
                $usuarios  = $this->model_usuarios->get_usuarios( $direccion );
            }
        }

        $data = array(
            'titulo'       => 'Seguimiento de Acuerdo',
            'acuerdo_id'   => $acuerdo_id,
            'acuerdo'      => $this->model_acuerdos->get_acuerdos([ 'acuerdo_id' => $acuerdo_id ]),
            'seguimiento'  => $this->model_acuerdos->get_acuerdos_detalle($acuerdo_id),
            'combinacion'  => ( $combinacion )? $combinacion : NULL,
            'area_usuarios'=> ( $usuarios )? $usuarios : NULL,
            'view'         => 'acuerdos/ajax/seguimiento_detallado'
        );
        if ( $data['acuerdo'] && $data['seguimiento'] )
            $json['html']   = $this->load->view( $data['view'], $data, TRUE );
        else
            $json['exito']  = FALSE;
        return print(json_encode( $json ));
    }

    public function historial_acuerdo(){
        $json           = array('exito' => TRUE);

        $acuerdo_id     = $this->input->post('acuerdo');
        $data = array(
            'historial'    => $this->model_acuerdos->get_acuerdos_detalle($acuerdo_id),
            'view'         => 'acuerdos/ajax/historial'
        );
        $json['html'] = $this->load->view( $data['view'], $data, TRUE );
        return print(json_encode( $json ));
    }

    public function planificador(){
        $json = array('exito' => TRUE);

        $usuario_id         = $this->session->userdata('uid');
        $acuerdos           = $this->model_acuerdos->get_acuerdos_planificador($usuario_id);

        $data = array(
            'titulo'    => 'Planificador de Acuerdos',
            'acuerdos'  => $acuerdos,
            'view'      => 'acuerdos/ajax/scheduler'
        );
        $json['html'] = $this->load->view( $data['view'], $data, TRUE );
        return print(json_encode( $json ));
    }

    // -------------- DATOS

    public function datatable_acuerdos(){
        $condicion = array();
        if ( $this->session->userdata('tuser') != 1 ){
            $where       = array('combinacion_area_id' => $this->session->userdata('combinacion_area')); 
            $combinacion = $this->model_catalogos->get_areas( $where );
            if ( $combinacion ){
                $condicion  = "    direccion_id_acuerdo     = {$combinacion->direccion_id} ";
                $condicion .= "OR direccion_id_seguimiento  = {$combinacion->direccion_id} ";
                if ( $combinacion->subdireccion_id != 1 ){
                    $condicion = "subdireccion_id_acuerdo         = {$combinacion->subdireccion_id} ";
                    $condicion .= "OR subdireccion_id_seguimiento = {$combinacion->subdireccion_id} ";
                }
                if ( $combinacion->departamento_id != 1 ){
                    $condicion = "departamento_id_acuerdo         = {$combinacion->departamento_id} ";
                    $condicion .= "OR departamento_id_seguimiento = {$combinacion->departamento_id} ";
                }
                if ( $combinacion->area_id != 1 ){
                    $condicion = "area_id_acuerdo         = {$combinacion->area_id} ";
                    $condicion .= "OR area_id_seguimiento = {$combinacion->area_id} ";
                }
                $condicion .= "OR usuario_id_recibe  = {$this->session->userdata('uid')} ";
            } else
                return print(json_encode([]));
        } 
        return print(json_encode( $this->model_acuerdos->get_acuerdos_master($condicion) ));
    }

    public function registrar_acuerdo(){
        $json           = array('exito' => TRUE);

        $area_origen    = $this->input->post('area_origen');
        $area_destino   = $this->input->post('area_destino');
        $acuerdos       = $this->input->post('acuerdos');
        $tema           = $this->input->post('tema');
        $ejercicio      = date('Y');

        if ( ! $area_origen || ! $area_destino || ! $acuerdos || ! $tema ){
            $json['exito']   = FALSE;
            $json['mensaje'] = 'Falló al recibir los datos del acuerdo';
        } else {               
            $datos_acuerdo  = array(
                'area_origen'   => $area_origen,
                'area_destino'  => $area_destino,
                'acuerdos'      => $acuerdos,
                'tema'          => $tema,
                'ejercicio'     => $ejercicio,
                'usuario_id'    => $this->session->userdata('uid')
            );
            $resultado     = $this->model_acuerdos->set_nuevo_acuerdo($datos_acuerdo);
            $json['exito'] = $resultado['exito'];

            $json['acuerdo_id']     = ( isset($resultado['acuerdo_id']) )? $resultado['acuerdo_id'] : NULL;
            $json['seguimiento_id'] = ( isset($resultado['seguimiento_id']) )? $resultado['seguimiento_id'] : NULL;

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
        $ejercicio      = date('Y');

        if ( ! $acuerdo_id || ! $area_destino || ! $acuerdos ){
            $json['exito']   = FALSE;
            $json['mensaje'] = 'Falló al recibir los datos para seguimiento al acuerdo';
        } else {               
            $datos_seguimiento  = array(
                'area_destino'      => $area_destino,
                'acuerdos'          => $acuerdos,
                'ejercicio'         => $ejercicio,
                'usuario_id'        => $this->session->userdata('uid'),
                'estatus_acuerdo'   => 2
            );
            $resultado = $this->model_acuerdos->set_seguimiento_acuerdo($acuerdo_id, $datos_seguimiento);
            $json['exito'] = $resultado['exito'];

            $json['acuerdo_id']     = ( isset($resultado['acuerdo_id']) )? $resultado['acuerdo_id'] : NULL;
            $json['seguimiento_id'] = ( isset($resultado['seguimiento_id']) )? $resultado['seguimiento_id'] : NULL;

            if ( $json['exito'] == FALSE )
                $json['mensaje'] = $resultado['error'];
        }

        return print(json_encode($json));
    }


    public function edicion_acuerdo()
    {
        $json = array('exito' => TRUE);
        
        $seguimiento_id = $this->input->post('seguimiento_id');
        $destino        = $this->input->post('area_destino');
        $acuerdo_id     = $this->input->post('acuerdo_id');
        $acuerdos       = $this->input->post('acuerdos');
        $tema           = $this->input->post('tema');
        $ejercicio      = date('Y');

        if ( ! $seguimiento_id || ! $acuerdo_id || ! $acuerdos || ! $destino || ! $tema ){
            $json['exito']   = FALSE;
            $json['mensaje'] = 'Falló al recibir los datos para seguimiento al acuerdo';
        } else {               
            $datos_seguimiento  = array(
                'seguimiento_id'=> $seguimiento_id,
                'acuerdo_id'    => $acuerdo_id,
                'area_destino'  => $destino,
                'acuerdos'      => $acuerdos,
                'tema'          => $tema,
                'ejercicio'     => $ejercicio,
                'estatus_acuerdo'   => 1,
                'usuario_id'        => $this->session->userdata('uid')
            );
            $resultado     = $this->model_acuerdos->update_acuerdo($datos_seguimiento);
            $json['exito'] = $resultado['exito'];
            if ( $json['exito'] == FALSE )
                $json['mensaje'] = $resultado['error'];
        }
        return print(json_encode($json));
    }

    public function finalizar_acuerdo(){
        $json           = array('exito' => TRUE);

        $acuerdo_id     = $this->input->post('acuerdo_id');
        $area_destino   = $this->input->post('destino');
        $acuerdos       = $this->input->post('acuerdos');
        $ejercicio      = date('Y');

        if ( ! $acuerdo_id || ! $area_destino || ! $acuerdos ){
            $json['exito']   = FALSE;
            $json['mensaje'] = 'Falló al recibir los datos para seguimiento al acuerdo';
        } else {
            // Validación de que este acuerdo puede ser finalizado por el usuario solicitante
            if ( true ){
                $datos_seguimiento  = array(
                    'area_destino'      => $area_destino,
                    'acuerdos'          => $acuerdos,
                    'ejercicio'         => $ejercicio,
                    'usuario_id'        => $this->session->userdata('uid'),
                    'estatus_acuerdo'   => 3
                );
                $resultado = $this->model_acuerdos->set_seguimiento_acuerdo($acuerdo_id, $datos_seguimiento);
                $json['exito'] = $resultado['exito'];
                if ( $json['exito'] == FALSE )
                    $json['mensaje'] = $resultado['error'];
            } else {
                $json['exito']   = FALSE;
                $json['mensaje'] = 'No tiene permisos para finalizar este acuerdo.';
            }
        }

        return print(json_encode($json));
    }

    // Función ajax para cargar documentos
    public function anexar_documento(){
        $json           = array('exito' => TRUE, 'error' => '');
        $acuerdo_id     = $this->input->post('acuerdo');
        $seguimiento_id = $this->input->post('seguimiento');
        $ejercicio      = date('Y');

        if ( !empty($_FILES) ) {
            // Carga de documentos
            $rootUF        = 'C:/SvrArchivos/sieval/Acuerdos/';
            $rootUL        = FCPATH . 'uploads/Acuerdos/';
            $uploadFolder  = "{$rootUF}/{$ejercicio}/{$acuerdo_id}/";
            $localUploads  = "{$rootUL}/{$ejercicio}/{$acuerdo_id}/";

            // Configuración de Libreriía CI Upload
            $config['upload_path']   = $uploadFolder; 
            $config['allowed_types'] = '*';
            $config['overwrite']     = 1; 

            // Checar directorios Raiz y sus configuraciones
            if ( !file_exists($rootUF) && !is_dir($rootUF) )
                mkdir( $rootUF, 0777 ); // Crear directorio si no existe
            if ( !file_exists($rootUL) && !is_dir($rootUL) )
                mkdir( $rootUL, 0777 ); // Crear directorio si no existe

            if ( !file_exists($rootUF . "{$ejercicio}/") && !is_dir($rootUF . "{$ejercicio}/") )
                mkdir( $rootUF . "{$ejercicio}/", 0777 ); // Crear directorio si no existe
            if ( !file_exists($rootUL . "{$ejercicio}/") && !is_dir($rootUL . "{$ejercicio}/") )
                mkdir( $rootUL . "{$ejercicio}/", 0777 ); // Crear directorio si no existe

            if ( !file_exists($uploadFolder) && !is_dir($uploadFolder) )
                mkdir( $uploadFolder, 0777 ); // Crear directorio si no existe
            if ( !file_exists($localUploads) && !is_dir($localUploads) )
                mkdir( $localUploads, 0777 ); // Crear directorio si no existe
             
            // Subir el archivo al servidor 
                // Modo Múltiple
            foreach($_FILES['file']['tmp_name'] as $key => $file) {
                $tempFile = $_FILES['file']['tmp_name'][$key];
                $targetFile =  $uploadFolder. $_FILES['file']['name'][$key];
                if ( move_uploaded_file($tempFile,$targetFile) ){
                    // Mover el archivo a Uploads
                    $previsualizador            = $localUploads . $_FILES['file']['name'][$key];
                    $json['previsualizador']    = '';
                    if ( !copy($targetFile, $previsualizador) )
                        $json['previsualizador'] .= $_FILES['file']['name'][$key] . ',';
                    // Guardar info en BD
                    $this->model_acuerdos->anexos_acuerdos_seguimiento( $seguimiento_id, $_FILES['file']['name'][$key] );
                }
                else
                    $json['fallidos'] .= $_FILES['file']['name'][$key] . ',';
            }
        } else {
            $json['exito'] = FALSE;
            $json['error'] = 'No se recibió ningún archivo.';
        }
        return print(json_encode( $json ));
    }

    // Función de directores y administradores de asignar el acuerdo a un usuario segun su área
    public function asignar_usuario(){
        $json           = array('exito' => TRUE);

        $usuario_id     = $this->input->post('usuario');
        $acuerdo_id     = $this->input->post('acuerdo');
        $seguimiento    = $this->input->post('seguimiento');

        if ( $usuario_id ){
            $condicion  = array('usuario_id' => $usuario_id, 'estatus' => 1);
            $db_usuario = $this->model_usuarios->get_usuarios($condicion);
            $condicion  = array('acuerdo_id' => $acuerdo_id, 'estatus' => 1);
            $db_acuerdo = $this->model_acuerdos->get_acuerdos_master($condicion);
            if ( $db_usuario && $db_acuerdo ){
                if (  $db_usuario->direccion_id == $db_acuerdo[0]->direccion_id_seguimiento ){
                    $respuesta  = $this->model_acuerdos->asignar_usuario_seguimiento($seguimiento, $usuario_id);
                    $json['exito'] = $respuesta['exito'];
                    if ( ! $respuesta['exito'] )
                        $json['error'] = $respuesta['error'];
                } else {
                    $json['exito'] = FALSE;
                    $json['error'] = 'El usuario asignado no pertenece a la misma Dirección.';
                }
            } else {
                $json['exito'] = FALSE;
                $json['error'] = 'El usuario asignado no existe o esta inactivo';
            }
        } else {
            $json['exito'] = FALSE;
            $json['error'] = 'No fue posible realizar la asignación del usuario. Intente más tarde';
        }
        return print(json_encode( $json ));
    }

}

/* End of file Acuerdos.php */
/* Location: ./application/controllers/Acuerdos.php */