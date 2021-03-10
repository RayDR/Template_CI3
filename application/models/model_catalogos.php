<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_catalogos extends CI_Model {

	/**
		* Devuelve el listado de opciones del menú
		*
		* <b>Nota:</b> Requiere que se envie el filtro
		* de nivel de acceso para controlar los permisos
		*
		* @access public
		* @param  array   $filtros 			filtros a iterar
		* @param  boolean $tipo_retorno 	Modo de retonro: 
		*								 		TRUE - Objeto
		*								 		FALSE - Array
		* @return menus
	*/
	public function get_menus($filtros = NULL, $tipo_retorno = TRUE){
		try {			
			if ( is_array($filtros) ){
				foreach ($filtros as $key => $filtro) {
					$this->db->where($key, $filtro);
				}
			}
			$menus = $this->db->get('vw_menu');
			if ( $tipo_retorno )
				return $menus->result();
			else
				return $menus->result_array();
		} catch (Exception $e) {
			return [];
		}
	}

	/**
		* Devuelve el catalogo de unidades de medida
		*
		* @access public
		* @param  array   $filtros 			filtros a iterar
		* @param  boolean $tipo_retorno 	Modo de retonro: 
		*								 		TRUE - Objeto
		*								 		FALSE - Array
		* @return menus
	*/
	public function get_unidades_medida($filtros = NULL, $tipo_retorno = TRUE){
		try {			
			if ( is_array($filtros) ){
				foreach ($filtros as $key => $filtro) {
					$this->db->where($key, $filtro);
				}
			} else
				$this->db->where('estatus', 1);
			$menus = $this->db->get('unidades_medida');
			if ( $tipo_retorno )
				return $menus->result();
			else
				return $menus->result_array();
		} catch (Exception $e) {
			return [];
		}
	}
}

/* End of file model_catalogos.php */
/* Location: ./application/models/model_catalogos.php */