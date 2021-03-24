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

	/**
		* Devuelve el catalogo de áreas ( Dirección, Subdirección , Departamento )
		*
		* @access public
		* @param  array   $filtros 			filtros a iterar
		* @param  boolean $tipo_retorno 	Modo de retonro: 
		*								 		TRUE - Objeto
		*								 		FALSE - Array
		* @return areas
	*/
	public function get_areas($filtros = NULL, $tipo_retorno = TRUE){
		try {			
			if ( is_array($filtros) ){
				foreach ($filtros as $key => $filtro) {
					$this->db->where($key, $filtro);
				}
			}
			$this->db->order_by('cve_direccion', 'asc');
			$areas = $this->db->get('combinaciones_areas');
			if ( $areas->num_rows() > 1 ){
				if ( $tipo_retorno )
					return $areas->result();
				else
					return $areas->result_array();
			} else {
				if ( $tipo_retorno )
					return $areas->row();
				else
					return $areas->row_array();
			}
		} catch (Exception $e) {
			return [];
		}
	}

	/**
		* Devuelve el catalogo de programas
		*
		* @access public
		* @param  array   $filtros 			filtros a iterar
		* @param  boolean $tipo_retorno 	Modo de retonro: 
		*								 		TRUE - Objeto
		*								 		FALSE - Array
		* @return programas
	*/
	public function get_programas($filtros = NULL, $tipo_retorno = TRUE){
		try {			
			if ( is_array($filtros) ){
				foreach ($filtros as $key => $filtro) {
					$this->db->where($key, $filtro);
				}
			}
			$programas = $this->db->get('programas_presupuestarios');
			if ( $tipo_retorno )
				return $programas->result();
			else
				return $programas->result_array();
		} catch (Exception $e) {
			return [];
		}
	}

	/**
		* Devuelve el catalogo de Líneas de Acción
		*
		* @access public
		* @param  array   $filtros 			filtros a iterar
		* @param  boolean $tipo_retorno 	Modo de retonro: 
		*								 		TRUE - Objeto
		*								 		FALSE - Array
		* @return lineas_accion
	*/
	public function get_lineas_accion($filtros = NULL, $tipo_retorno = TRUE){
		try {			
			if ( is_array($filtros) ){
				foreach ($filtros as $key => $filtro) {
					$this->db->where($key, $filtro);
				}
			}
			$lineas_accion = $this->db->get('lineas_accion');
			if ( $tipo_retorno )
				return $lineas_accion->result();
			else
				return $lineas_accion->result_array();
		} catch (Exception $e) {
			return [];
		}
	}
}

/* End of file model_catalogos.php */
/* Location: ./application/models/model_catalogos.php */