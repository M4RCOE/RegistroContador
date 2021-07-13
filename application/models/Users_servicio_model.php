<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_servicio_model extends CI_Model {
    
    public function obtener_users()
	{
		$query = $this->db->get('users_servicio');
		return $query->result_array();  
	}

	public function guarda_user($datos){
		$this->db->insert('users_servicio',$datos);
	}

	public function elimina_user($id){
        $this->db->delete('users_servicio',array('id' => $id));
	}

	public function get_user($id){
        $this->db->where('id',$id);
		$query = $this->db->get('users_servicio');  
		return $query->row();      
	}

	public function update_user($id, $datos){
		$this->db->update('users_servicio', $datos, array('id' => $id));
	}
	
}