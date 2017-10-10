<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function construct() {
		parent::__construct();
		$this->load->library('session');    
		$this->load->helper('form');    
		$this->load->helper('url');    
		$this->load->helper('security');
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function signin()
	{
		$this->load->view('login_view');
	}

	public function identifying_usertype()
	{	
		$this->load->helper('url');
		$this->load->helper('security');

		$this->load->library('form_validation');

		$this->form_validation->set_rules(
        'username', 'Username',
        'required|min_length[5]|max_length[12]|callback_signin_validation');

        $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run()) {

        	$username = $this->input->post('username'); 

        	$this->load->model('users_model');
        	$query = $this->users_model->does_user_exist($username);

        	if ($query->num_rows() == 1) {

        		foreach ($query->result() as $row) {

        			$data = array(    
        				'id' => $row->id,      
        				'username' => $row->username,    
        				'user_type' => $row->user_type,    
        				'logged_in' => TRUE,
        				'score' => $row->score
        				);

        			$this->session->set_userdata($data);

        			if ($data['user_type'] == 1) {
        				$this->load->view('includes/header');
						$this->load->view('includes/navbar');
						$this->load->view('add_question_view');
						$this->load->view('includes/footer');
        			} else if ($data['score'] != null) {

        				redirect('login/user_already_got_score');

        			} else {
        				
						redirect('question/play_quiz');
        				
        			}
        		}
        	}
        } else {
        	$this->load->view('login_view');
        }

	}

	public function signin_validation()
	{
		$this->load->model('users_model');
		$this->load->helper('security');
		$this->load->library('form_validation');

		if ($this->users_model->can_log_in()) {
			return true;
		} else {
			$this->form_validation->set_message('validate_credentials', 'incorrect username/password');
			return false;
		}
	}

	public function admin()
	{
		$this->load->view('includes/header');
		$this->load->view('includes/navbar');
		$this->load->view('includes/footer');
	}

	public function student() 
	{
		$this->load->view('student_view');
	}

	public function logout() 
	{
		$this->session->sess_destroy();
		redirect('login/signin');	
	}

	public function user_already_got_score()
	{
			$this->load->view('includes/header');
        	$this->load->view('includes/navbar_student');
        	$this->load->view('user_already_got_score_view');
        	$this->load->view('includes/footer');
	}

}//end of class login
