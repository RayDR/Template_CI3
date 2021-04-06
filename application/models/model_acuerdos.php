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
			$acuerdos = $this->db->get('vw_acuerdos');

			if ( $tipo_retorno )
				return $acuerdos->result();
			else
				return $acuerdos->result_array();
		} catch (Exception $e) {
			return [];
		}
	}

	/**
		* Obtener el listado de acuerdos maestros
		*
		* @access public
		* @param  array   $filtros 			filtros a iterar
		* @param  boolean $tipo_retorno 	Modo de retonro: 
		*								 		TRUE - Objeto
		*								 		FALSE - Array
		* @return acuerdos
	*/
	public function get_acuerdos_master($filtros = NULL, $tipo_retorno = TRUE){
		try {
			if ( is_array($filtros) ){
				foreach ($filtros as $key => $filtro) {
					$this->db->where($key, $filtro);
				}
			} else if ( is_string( $filtros ) )
				$this->db->where($filtros);
			
			$acuerdos = $this->db->get('vw_ultimo_seguimiento');

			if ( $tipo_retorno )
				return $acuerdos->result();
			else
				return $acuerdos->result_array();
		} catch (Exception $e) {
			return [];
		}
	}

	/**
		* Obtener el listado de acuerdos detallados
		*
		* @access public
		* @param  array   $filtros 			filtros a iterar
		* @param  boolean $tipo_retorno 	Modo de retonro: 
		*								 		TRUE - Objeto
		*								 		FALSE - Array
		* @return acuerdos
	*/
	public function get_acuerdos_detalle($acuerdo_id, $filtros = NULL, $tipo_retorno = TRUE){
		try {
			if ( is_array($filtros) ){
				foreach ($filtros as $key => $filtro) {
					$this->db->where($key, $filtro);
				}
			}
			$this->db->where('acuerdo_id', $acuerdo_id);

			$acuerdos = $this->db->get('vw_seguimiento_acuerdo_ag');

			if ( $tipo_retorno )
				return $acuerdos->result();
			else
				return $acuerdos->result_array();
		} catch (Exception $e) {
			return [];
		}
	}


	/**
		* Registrar un nuevo acuerdo
		*
		* @access public
		* @param  array   $datos 		Datos a almacenar en acuerdos
		*
		* @return resultado[]
	*/
	public function set_nuevo_acuerdo($datos){
		$resultado = array('exito' => TRUE);
		try {
			$this->db->trans_begin();

			if ( is_array($datos) ){
				$datos_db = array(
					'asunto' 					=> $datos['acuerdos'],
					'combinacion_area_id' 		=> $datos['area_origen'],
					'usuario_registra_id' 		=> $datos['usuario_id'],
					'tema_id' 					=> $datos['tema'],
					'ejercicio' 				=> $datos['ejercicio'],
					'estatus' 					=> 1
				);
				$this->db->insert('acuerdos', $datos_db);

				$acuerdo_id = $this->db->insert_id();

				$datos_db = array(
					'acuerdo_id'				=> $acuerdo_id,
					'seguimiento' 				=> $datos['acuerdos'],
					'combinacion_area_id' 		=> $datos['area_destino'],
					'usuario_acuerda_id' 		=> $datos['usuario_id'],
					'ejercicio' 				=> $datos['ejercicio'],
					'estatus_acuerdo_id' 		=> 1
				);

				$this->db->insert('seguimientos_acuerdos', $datos_db);

			} else
				throw new Exception('La estructura de los datos es incorrecta.');

			$this->db->trans_commit();
		} catch (Exception $e) {
			$this->db->trans_rollback();
			$resultado['exito'] = FALSE;
			$resultado['error'] = $e->getMessage();
		}
		return $resultado;
	}


	/**
		* Registrar el seguimiento del acuerdo
		*
		* @access public
		* @param  array   $datos 		Datos a almacenar en acuerdos
		*
		* @return resultado[]
	*/
	public function set_seguimiento_acuerdo($acuerdo_id, $datos){
		$resultado = array('exito' => TRUE);
		try {
			$this->db->trans_begin();
			if ( $acuerdo_id ){
				$folio = $this->db->get_where('seguimientos_acuerdos', ['acuerdo_id' => $acuerdo_id]);
				if ( is_array($datos) ){
					$datos_db = array(
						'acuerdo_id'				=> $acuerdo_id,
						'seguimiento' 				=> $datos['acuerdos'],
						'combinacion_area_id' 		=> $datos['area_destino'],
						'usuario_acuerda_id' 		=> $datos['usuario_id'],
						'ejercicio' 				=> $datos['ejercicio'],
						'estatus_acuerdo_id' 		=> $datos['estatus_acuerdo'],
						'folio'						=> ( $folio->num_rows() > 0 )? 
														 $folio->num_rows() + 1 : 1
					);

					$this->db->insert('seguimientos_acuerdos', $datos_db);
				} else 
					throw new Exception('La estructura de los datos es incorrecta.');
			} else 
				throw new Exception('No se recibió el número del acuerdo.');

			$this->db->trans_commit();
		} catch (Exception $e) {
			$this->db->trans_rollback();
			$resultado['exito'] = FALSE;
			$resultado['error'] = $e->getMessage();
		}
		return $resultado;
	}
	

	/**
		* Actualizar el acuerdo y su seguimiento
		*
		* @access public
		* @param  array   $datos 		Datos a iterar para actualizar
		*
		* @return resultado[]
	*/
	public function update_acuerdo($datos){
		$resultado = array('exito' => TRUE);
		try {
			$this->db->trans_begin();

			if ( is_array($datos) ){
				$datos_db = array(
					'asunto' 					=> $datos['acuerdos'],
					'usuario_registra_id' 		=> $datos['usuario_id'],
					'tema_id' 					=> $datos['tema']
				);
				$this->db->where('acuerdo_id', $datos['acuerdo_id']);
				$this->db->update('acuerdos', $datos_db);

				$datos_db = array(
					'acuerdo_id'				=> $datos['acuerdo_id'],
					'seguimiento' 				=> $datos['acuerdos'],
					'combinacion_area_id' 		=> $datos['area_destino'],
					'usuario_acuerda_id' 		=> $datos['usuario_id'],
					'ejercicio' 				=> $datos['ejercicio'],
					'estatus_acuerdo_id' 		=> $datos['estatus_acuerdo']
				);
				$this->db->where('seguimiento_acuerdo_id', $datos['seguimiento_id']);
				$this->db->update('seguimientos_acuerdos', $datos_db);
			} else 
				throw new Exception('La estructura de los datos es incorrecta.');

			$this->db->trans_commit();
		} catch (Exception $e) {
			$this->db->trans_rollback();
			$resultado['exito'] = FALSE;
			$resultado['error'] = $e->getMessage();
		}
		return $resultado;
	}

}

/* End of file model_acuerdos.php */
/* Location: ./application/models/model_acuerdos.php */