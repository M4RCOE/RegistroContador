<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contador_model extends CI_Model {

	public function get_contadores()
	{
		$query = $this->db->get('contador');
		return $query->result_array();  
	}

	public function guarda_contador($datos){
		$this->db->insert('contador',$datos);
	}

	public function elimina_contador($id){
        $this->db->delete('contador',array('id' => $id));
	}

	public function modifica_contador($id, $datos){
		$this->db->update('contador', $datos, array('id' => $id));
	}
}
