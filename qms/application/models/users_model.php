<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

	public function can_log_in() {
			$this->db->where('username', $this->input->post('username'));
			$this->db->where('password', md5($this->input->post('password')));

			$query = $this->db->get('users');

			if ($query->num_rows() == 1) {
				return true;
			} else {
				return false;
			}
	}

	public function does_user_exist($username) 
	{
		$this->db->where('username', $username);        
	 	$query = $this->db->get('users');        
	 	return $query;
	}

	public function add_user() 
	{

		$username = $this->input->post('username');

		$new_member_insert_data = array(
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password'))
			);

		$insert = $this->db->insert('users', $new_member_insert_data); //if this is success this $insert will return true
		return $insert; //if this is succesfull insert will return true
	}

}
