<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Questions_model extends CI_Model {

	public function insert_new_question()
	{
		$new_question_insert_data = array(
			'question' => $this->input->post('question'),
			'choice1' => $this->input->post('choice1'),
			'choice2' => $this->input->post('choice2'),
			'choice3' => $this->input->post('choice3'),
			'answer' => $this->input->post('answer')
			);

		$insert = $this->db->insert('quiz', $new_question_insert_data); //if this is success this $insert will return true
		return $insert; //if this is succesfull insert will return true
	}

	public function get_questions() 
	{
		$this->db->select("quiz_id, question, choice1, choice2, choice3, answer");
		$this->db->from("quiz");

		$query = $this->db->get();

		return $query->result();

		$num_data_returned = $query->num_rows;

		if ($num_data_returned < 1) {
			echo "There are no data in the database";
			exit();
		}
	}

	public function get_question_by_id($id = 0)
    {
        if ($id === 0)
        {
            $query = $this->db->get('quiz');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('quiz', array('quiz_id' => $id));
        return $query->row_array();
    }

    public function set_question($id = 0)
    {
        $this->load->helper('url');
 
        $data = array(
            'question' => $this->input->post('question'),
            'choice1' => $this->input->post('choice1'),
            'choice2' => $this->input->post('choice2'),
            'choice3' => $this->input->post('choice3'),
            'answer' => $this->input->post('answer')
        );
        
        if ($id == 0) {
            return $this->db->insert('quiz', $data);
        } else {
            $this->db->where('quiz_id', $id);
            return $this->db->update('quiz', $data);
        }
    }

    public function delete_question($id)
    {
        $this->db->where('quiz_id', $id);
        return $this->db->delete('quiz');
    }

    public function total_question() 
    {
        $table_row_count = $this->db->count_all('quiz');
        return $table_row_count;
    }

   

}
