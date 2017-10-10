<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends CI_Controller {

	function __contstruct() {
		parent:: __contstruct();
		$this->load->model('questions_model');
		$this->load->database();
		$this->load->helper('url_helper');
	}

	public function add_new_question()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('question', 'Question','trim');
		$this->form_validation->set_rules('choice1', 'Choice 1','trim');
		$this->form_validation->set_rules('choice2', 'Choice 2','trim');
		$this->form_validation->set_rules('choice3', 'Choice 3','trim');
		$this->form_validation->set_rules('answer', 'Answer','trim');

		if ($this->form_validation->run() == FALSE) 
		{

			$this->load->view('includes/header');
			$this->load->view('includes/navbar');
			$this->load->view('add_question_view');
			$this->load->view('includes/footer');

		} else {

			$this->load->model('questions_model');

			if ($query = $this->questions_model->insert_new_question())/* this will be true of false*/ 
			{

				$data['question_added'] = 'new questions and choices are added';
	
				$this->load->view('includes/header');
				$this->load->view('includes/navbar');
				$this->load->view('add_success_view');
				$this->load->view('add_question_view', $data);
				$this->load->view('includes/footer');

			} else {

				$data['question_not_added'] = 'new questions and choices are added';
	
				$this->load->view('includes/header');
				$this->load->view('includes/navbar');
				$this->load->view('add_question_view', $data);
				$this->load->view('includes/footer');
				
			}
		}
	}

	public function get_question_list()
	{
		$this->load->model('questions_model');

		$this->data['questions'] = $this->questions_model->get_questions();

		//for pagination
		$this->load->library('pagination');
		$query = $this->db->get('quiz','2',$this->uri->segment(3));
		$data['quiz'] = $query->result();

		$query2 = $this->db->get('quiz');

		$config['base_url'] = 'get_question_list';
		$config['total_rows'] = $query2->num_rows();
		$config['per_page'] = 2;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';

		$config['first_tag_open'] = '<li>';
		$config['last_tag_open'] = '<li>';

		$config['next_tag_open'] = '<li>';
		$config['prev_tag_open'] = '<li>';

		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$config['first_tag_close'] = '</li>';
		$config['last_tag_close'] = '</li>';

		$config['next_tag_close'] = '</li>';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = "<li class=\"active\"><span><b>";
		$config['cur_tag_close'] = "</b></span></li>";

		$this->pagination->initialize($config);

		$this->load->view('includes/header');
		$this->load->view('includes/navbar');
		$this->load->view('question_list_view', $this->data);
		$this->load->view('includes/pagination', $data);
		$this->load->view('includes/footer');

	}

	public function edit()
    {
        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            show_404();
        }
        
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('questions_model');
        
        $data['title'] = 'Edit a question items';        
        $data['questions'] = $this->questions_model->get_question_by_id($id);

        $this->form_validation->set_rules('question', 'Question', 'required');
        $this->form_validation->set_rules('choice1', 'Choice1', 'required');
        $this->form_validation->set_rules('choice2', 'Choice2', 'required');
        $this->form_validation->set_rules('choice3', 'Choice3', 'required');
        $this->form_validation->set_rules('answer', 'Answer', 'required');
 
 
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('includes/header', $data);
            $this->load->view('includes/navbar', $data);
            $this->load->view('edit_question_view', $data);
            $this->load->view('includes/footer');
 
        }
        else
        {
            $this->questions_model->set_question($id);
            redirect('question/get_question_list');
        }
    }

    public function delete()
    {
        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            show_404();
        }

        $this->load->model('questions_model');
                
        $news_item = $this->questions_model->get_question_by_id($id);
        
        $this->questions_model->delete_question($id);        
        redirect('question/get_question_list');        
    }

    public function play_quiz() 
    {
		$this->load->model('questions_model');

		$this->data['questions'] = $this->questions_model->get_questions();

		$this->load->view('includes/header');
		$this->load->view('includes/navbar_student');
		$this->load->view('play_quiz_view', $this->data);
		$this->load->view('includes/footer');
		
	}

	/*public function read()
	{
		$this->load->library('pagination');
		$this->load->model('questions_model');
		$query = $this->db->get('quiz', '2', $this->uri->segment(3));
		$data['questions'] = $query->result();

		$query2 = $this->db->get('quiz');

		$config['base_url'] =
		$config['total_rows'] = $query2->num_rows();
		$config['per_page'] = 2;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';

		$config['first_tag_open'] = '<li>';
		$config['last_tag_open'] = '<li>';

		$config['next_tag_open'] = '<li>';
		$config['prev_tag_open'] = '<li>';

		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$config['first_tag_close'] = '</li>';
		$config['last_tag_close'] = '</li>';

		$config['next_tag_close'] = '</li>';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = "<li class=\"active\"><span><b>";
		$config['cur_tag_close'] = "</b></span></li>";

		$this->pagination->initialize($config);

		$this->load->view('includes/header');
		$this->load->view('includes/navbar');
		$this->load->view('includes/pagination', $data);
		$this->load->view('includes/footer');
	}
	*/


}
