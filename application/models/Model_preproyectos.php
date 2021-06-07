<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_preproyectos extends CI_Model {

    /**
        * Obtener el listado de preproyectos
        *
        * @access public
        * @param  array   $filtros          filtros a iterar
        * @param  boolean $tipo_retorno     Modo de retonro: 
        *                                       TRUE - Objeto
        *                                       FALSE - Array
        * @return preproyectos
    */
    public function get_preproyectos($filtros = NULL, $tipo_retorno = TRUE){
        try {           
            if ( is_array($filtros) ){
                foreach ($filtros as $key => $filtro) {
                    $this->db->where($key, $filtro);
                }
            }

            $preproyectos = $this->db->get('preproyectos');

            if ( $tipo_retorno )
                return $preproyectos->result();
            else
                return $preproyectos->result_array();
        } catch (Exception $e) {
            return [];
        }
    }

    /**
        * Obtener preproyecto por id
        *
        * @access public
        * @param  int     $preproyecto_id     ID
        * @param  array   $filtros          filtros a iterar
        * @param  boolean $tipo_retorno     Modo de retonro: 
        *                                       TRUE - Objeto
        *                                       FALSE - Array
        * @return preproyecto
    */
    public function get_preproyecto($preproyecto_id, $filtros = NULL, $tipo_retorno = TRUE){
        try {           
            if ( is_array($filtros) ){
                foreach ($filtros as $key => $filtro) {
                    $this->db->where($key, $filtro);
                }
            }
            $this->db->where('preproyecto_id', $preproyecto_id);
            $preproyectos = $this->db->get('preproyectos');

            if ( $tipo_retorno )
                return $preproyectos->row();
            else
                return $preproyectos->row_array();
        } catch (Exception $e) {
            return [];
        }
    }

    /**
        * Obtener el seguimiento de las preproyectos
        *
        * @access public
        * @param  int     preproyecto_id     Identificador de preproyecto
        * @param  array   $filtros          Filtros a iterar
        * @param  boolean $tipo_retorno     Modo de retonro: 
        *                                       TRUE - Objeto
        *                                       FALSE - Array
        * @return preproyectos
    */
    public function get_seguimiento_preproyectos($preproyecto_id, $filtros = NULL, $tipo_retorno = TRUE){
        try {           
            if ( is_array($filtros) ){
                foreach ($filtros as $key => $filtro) {
                    $this->db->where($key, $filtro);
                }
            }
            $this->db->where('preproyecto_id', $preproyecto_id);

            $preproyectos = $this->db->get('preproyectos');

            if ( $tipo_retorno )
                return $preproyectos->result();
            else
                return $preproyectos->result_array();
        } catch (Exception $e) {
            return [];
        }
    }


    /**
        * Registrar una activiad nueva
        *
        * @access public
        * @param  array   $datos                Datos a almacenar en preproyectos
        * @param  boolean $tipo_preproyecto       Proyecto o Preproyecto
        *
        * @return resultado[]
    */
    public function set_nueva_preproyecto($datos, $tipo_preproyecto = TRUE){
        $resultado = array('exito' => TRUE);
        try {
            $this->db->trans_begin();

            if ( is_array($datos) ){
                if ( !$tipo_preproyecto ){                    
                    // Preproyecto
                    $db_datos = array(
                        'linea_accion_id'               => $datos['linea_accion'],
                        'preproyecto'                     => $datos['detalle_preproyecto'],
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
                    $db_datos['programa_presupuestario_id'] = $datos['programa_presupuestario'];

                $this->db->insert('proyectos_preproyectos', $db_datos);
                $proyecto = $this->db->insert_id();
                $resultado['proyecto'] = $proyecto;
                
                // Creación de preproyecto
                $db_datos = array(
                    'descripcion'           => $datos['detalle_preproyecto'],
                    'proyecto_preproyecto_id' => $proyecto,
                    'unidad_medida_id'      => $datos['unidad_medida'],
                    'medicion_id'           => $datos['tipo_medicion'],
                    'beneficiado_id'        => $datos['grupo_beneficiado'],
                    'cantidad_beneficiario' => $datos['programado_fisico'],
                    'monto_presupuestado'   => $datos['programado_financiero'],
                    'usuario_id'            => $datos['usuario_id'],
                    'unidad_medida_id'      => $datos['unidad_medida']
                );
                $this->db->insert('preproyectos', $db_datos);
                $preproyecto = $this->db->insert_id();
                $resultado['preproyecto'] = $preproyecto;

                // Detalle de preproyecto
                $meses_financieros = $datos['programado_financiero_mensual'];
                foreach ($datos['programado_fisico_mensual'] as $key => $mes_fisico) {
                    $db_datos = array(
                        'preproyecto_id'          => $preproyecto,
                        'descripcion'           => $datos['detalle_preproyecto'],
                        'mes'                   => $key + 1,
                        'programado_fisico'     => $mes_fisico,
                        'programado_financiero' => $meses_financieros[$key],
                        'usuario_id'            => $datos['usuario_id']
                    );
                    $this->db->insert('preproyectos_detalladas', $db_datos);
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

    /**
        * Actualizar reporte
        *
        * @access public
        * @param  integer  preproyecto_detallada_id      ID
        * @param  arrary   $datos                       Datos del documento
        *
        * @return resultado[]
    */
    function actualizar_reporte($preproyecto_detallada_id, $datos){
        $resultado = array('exito' => TRUE);
        try {
            $this->db->trans_begin();

            $this->db->where( 'preproyecto_detallada_id', $preproyecto_detallada_id);
            $this->db->update('preproyectos_detalladas', $datos);

            $this->db->trans_commit();
        } catch (Exception $e) {
            $this->db->trans_rollback();
            $resultado['exito'] = FALSE;
            $resultado['error'] = $e;
        }
        return $resultado;
    }

    /**
        * Registrar documento de preproyecto
        *
        * @access public
        * @param  integer  preproyecto_detallada_id      ID
        * @param  string   $documento                   Nombre del documento
        *
        * @return resultado[]
    */
    function registrar_documento($preproyecto_detallada_id, $documento){
        $resultado = array('exito' => TRUE);
        try {
            $this->db->trans_begin();

            $db_datos = array(
                'documento' => $documento
            );
            $this->db->where('preproyecto_detallada_id', $preproyecto_detallada_id);
            $this->db->update('preproyectos_detalladas', $db_datos);

            $this->db->trans_commit();
        } catch (Exception $e) {
            $this->db->trans_rollback();
            $resultado['exito'] = FALSE;
            $resultado['error'] = $e;
        }
        return $resultado;
    }

}

/* End of file model_preproyectos.php */
/* Location: ./application/models/model_preproyectos.php */