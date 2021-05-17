<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_actividades extends CI_Model {

    /**
        * Obtener el listado de actividades
        *
        * @access public
        * @param  array   $filtros          filtros a iterar
        * @param  boolean $tipo_retorno     Modo de retonro: 
        *                                       TRUE - Objeto
        *                                       FALSE - Array
        * @return actividades
    */
    public function get_actividades($filtros = NULL, $tipo_retorno = TRUE){
        try {           
            if ( is_array($filtros) ){
                foreach ($filtros as $key => $filtro) {
                    $this->db->where($key, $filtro);
                }
            }

            $actividades = $this->db->get('vw_proyecto_actividades');

            if ( $tipo_retorno )
                return $actividades->result();
            else
                return $actividades->result_array();
        } catch (Exception $e) {
            return [];
        }
    }

    /**
        * Obtener el seguimiento de las actividades
        *
        * @access public
        * @param  int     $actividad_id     Identificador de actividad
        * @param  array   $filtros          Filtros a iterar
        * @param  boolean $tipo_retorno     Modo de retonro: 
        *                                       TRUE - Objeto
        *                                       FALSE - Array
        * @return actividades
    */
    public function get_seguimiento_actividades($actividad_id, $filtros = NULL, $tipo_retorno = TRUE){
        try {           
            if ( is_array($filtros) ){
                foreach ($filtros as $key => $filtro) {
                    $this->db->where($key, $filtro);
                }
            }
            $this->db->where('actividad_id', $actividad_id);

            $actividades = $this->db->get('vw_seguimiento_acuerdos');

            if ( $tipo_retorno )
                return $actividades->result();
            else
                return $actividades->result_array();
        } catch (Exception $e) {
            return [];
        }
    }


    /**
        * Registrar una activiad nueva
        *
        * @access public
        * @param  array   $datos                Datos a almacenar en actividades
        * @param  boolean $tipo_actividad       Proyecto o Preproyecto
        *
        * @return resultado[]
    */
    public function set_nueva_actividad($datos, $tipo_actividad = TRUE){
        $resultado = array('exito' => TRUE);
        try {
            $this->db->trans_begin();

            if ( is_array($datos) ){
                if ( !$tipo_actividad ){                    
                    // Preproyecto
                    $db_datos = array(
                        'linea_accion_id'               => $datos['linea_accion'],
                        'actividad'                     => $datos['detalle_actividad'],
                        'cantidad_beneficiarios'        => $datos['programado_fisico']
                    );
                    $this->db->insert('preproyectos', $db_datos);
                    $preproyecto = $this->db->insert_id();
                    $resultado['preproyecto'] = $preproyecto;
                }
                // Preproyecto - Actividad
                $db_datos = array(
                    'combinacion_area_id'           => $datos['area_origen'],
                    'linea_accion_id'               => $datos['linea_accion'],
                    'usuario_id'                    => $datos['usuario_id'],
                    'ejercicio'                     => $datos['ejercicio']
                );
                if ( isset($preproyecto) )
                    $db_datos['preproyecto'] = $preproyecto;
                if ( isset($datos['programa_presupuestario']) )
                    $db_datos['programa_presupuestario'] = $programa_presupuestario;

                $this->db->insert('proyectos_actividades', $db_datos);
                $proyecto = $this->db->insert_id();
                $resultado['proyecto'] = $proyecto;
                
                // Creación de actividad
                $db_datos = array(
                    'descripcion'           => $datos['detalle_actividad'],
                    'proyecto_actividad_id' => $proyecto,
                    'unidad_medida_id'      => $datos['unidad_medida'],
                    'medicion_id'           => $datos['tipo_medicion'],
                    'beneficiado_id'        => $datos['grupo_beneficiado'],
                    'cantidad_beneficiario' => $datos['programado_fisico'],
                    'monto_presupuestado'   => $datos['programado_financiero'],
                    'usuario_id'            => $datos['usuario_id'],
                    'unidad_medida_id'      => $datos['unidad_medida']
                );
                $this->db->insert('actividades', $db_datos);
                $actividad = $this->db->insert_id();
                $resultado['actividad'] = $actividad;

                // Detalle de actividad
                $meses_financieros = $datos['programado_financiero_mensual'];
                foreach ($datos['programado_fisico_mensual'] as $key => $mes_fisico) {
                    $db_datos = array(
                        'actividad_id'          => $actividad,
                        'descripcion'           => $datos['detalle_actividad'],
                        'mes'                   => $key + 1,
                        'programado_fisico'     => $mes_fisico,
                        'programado_financiero' => $meses_financieros[$key],
                        'usuario_id'            => $datos['usuario_id']
                    );
                    $this->db->insert('actividades_detalladas', $db_datos);
                }
            } else
                throw new Exception('La estructura de los datos es incorrecta.');

            $this->db->trans_commit();
        } catch (Exception $e) {
            $this->db->trans_rollback();
            $resultado['exito'] = FALSE;
            $resultado['error'] = $e;
        }
        return $resultado;
    }

}

/* End of file model_actividades.php */
/* Location: ./application/models/model_actividades.php */