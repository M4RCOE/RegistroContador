<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model
{
    
    public function login($username, $password)
    {
        $query = $this->db->get_where('users', array('username' => $username, 'password' => $password));
        return $query->row_array();
    }

}