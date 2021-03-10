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

			$actividades = $this->db->get('vw_actividades');

			if ( $tipo_retorno )
				return $actividades->result();
			else
				return $actividades->result_array();
		} catch (Exception $e) {
			return [];
		}
	}

}

/* End of file model_actividades.php */
/* Location: ./application/models/model_actividades.php */