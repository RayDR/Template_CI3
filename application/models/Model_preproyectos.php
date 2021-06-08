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

            $preproyectos = $this->db->get('vw_preproyectos');

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
            $preproyectos = $this->db->get('vw_preproyectos');

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

            $preproyectos = $this->db->get('vw_proyectos_actividades');

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
        *
        * @return resultado[]
    */
    public function set_nuevo_preproyecto($datos){
        $resultado = array('exito' => TRUE);
        try {
            $this->db->trans_begin();

            if ( is_array($datos) ){
                $db_datos = array(
                    'municipio_id'              => $datos['municipio'],
                    'localidad_id'              => $datos['localidad'],
                    'linea_accion_id'           => $datos['linea_accion'],
                    'actividad'                 => $datos['detalle_preproyecto'],
                    'unidad_medida_id'          => $datos['unidad_medida'],
                    'medicion_id'               => $datos['tipo_medicion'],
                    'beneficiario_id'           => $datos['grupo_beneficiado'],
                    'cantidad_beneficiarios'    => $datos['cantidad_beneficiarios'],
                    'inversion'                 => $datos['inversion'],
                    'fecha_inicio'              => $datos['fecha_inicio'],
                    'fecha_termino'             => $datos['fecha_termino'],
                    'url'                       => $datos['url'],
                    'usuario_id'                => $datos['usuario_id'],
                );
                $this->db->insert('preproyectos', $db_datos);
                $preproyecto = $this->db->insert_id();
                $resultado['preproyecto'] = $preproyecto;
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