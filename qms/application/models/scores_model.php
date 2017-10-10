<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scores_model extends CI_Model {

	public function get_score() 
	{
	 	$this->db->select("id, username, user_type, score");
		$this->db->from("users");
		$this->db->where("user_type", 0);

		$query = $this->db->get();

		return $query->result();
    }

    public function update_score($data1, $data)
    {

        $this->db->set('score', $data['score'] );
        $this->db->where('id', $data1['id']);
        $this->db->update('users');
    }

    
}
