<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_actividades extends CI_Model {

	/**
		* Obtener el listado de actividades
		*
		* @access public
		* @param  array   $filtros 			filtros a iterar
		* @param  boolean $tipo_retorno 	Modo de retonro: 
		*								 		TRUE - Objeto
		*								 		FALSE - Array
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
		* @param  array   $filtros 			Filtros a iterar
		* @param  boolean $tipo_retorno 	Modo de retonro: 
		*								 		TRUE - Objeto
		*								 		FALSE - Array
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
		* @param  array   $datos 		Datos a almacenar en actividades
		*
		* @return resultado[]
	*/
	public function set_nueva_actividad($datos){
		$resultado = array('exito' => TRUE);
		try {
			$this->db->trans_begin();

			if ( is_array($datos) ){

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