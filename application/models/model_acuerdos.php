<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_acuerdos extends CI_Model {

	/**
		* Obtener el listado de acuerdos
		*
		* @access public
		* @param  array   $filtros 			filtros a iterar
		* @param  boolean $tipo_retorno 	Modo de retonro: 
		*								 		TRUE - Objeto
		*								 		FALSE - Array
		* @return acuerdos
	*/
	public function get_acuerdos($filtros = NULL, $tipo_retorno = TRUE){
		try {			
			if ( is_array($filtros) ){
				foreach ($filtros as $key => $filtro) {
					$this->db->where($key, $filtro);
				}
			}

			$acuerdos = $this->db->get('vw_seguimiento_acuerdos');

			if ( $tipo_retorno )
				return $acuerdos->result();
			else
				return $acuerdos->result_array();
		} catch (Exception $e) {
			return [];
		}
	}

}

/* End of file model_acuerdos.php */
/* Location: ./application/models/model_acuerdos.php */