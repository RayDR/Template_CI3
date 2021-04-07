<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_usuarios extends CI_Model {

	/**
		* Obtener el listado de usuarios
		*
		* @access public
		* @param  array   $filtros 			filtros a iterar
		* @param  boolean $tipo_retorno 	Modo de retonro: 
		*								 		TRUE - Objeto
		*								 		FALSE - Array
		* @return usuarios
	*/
	public function get_usuarios($filtros = NULL, $tipo_retorno = TRUE){
		try {			
			if ( is_array($filtros) ){
				foreach ($filtros as $key => $filtro) {
					$this->db->where($key, $filtro);
				}
			} else 
				$this->db->where('estatus', 1);

			$usuarios = $this->db->get('vw_usuarios');

			if ( $usuarios->num_rows() > 1 ){
				if ( $tipo_retorno )
					return $usuarios->result();
				else
					return $usuarios->result_array();
			}
			else {
				if ( $tipo_retorno )
					return $usuarios->row();
				else
					return $usuarios->row_array();
			}
		} catch (Exception $e) {
			return [];
		}
	}

}

/* End of file model_usuarios.php */
/* Location: ./application/models/model_usuarios.php */