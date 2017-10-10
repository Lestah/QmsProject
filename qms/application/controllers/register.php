<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function create_user() 
	{

		$this->load->library('form_validation');

		//validation rules
		$this->form_validation->set_rules(
        'username', 'Username',
        'required|min_length[5]|max_length[12]|is_unique[users.username]',
        array(
                'required'      => 'You have not provided %s.',
                'is_unique'     => 'This %s already exists.'
        	 )
		);

		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');

		$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required|matches[password]');

		if ($this->form_validation->run() == FALSE) {

			$this->load->view('signup_view');

		} else {

			$this->load->model('users_model');

			if ($query = $this->users_model->add_user())/* this will be true of false*/ {

				$data['account_created'] = 'Your account has been created you can now login';
				$this->load->view('signup_view', $data);

			} else {
				$this->load->view('signup_view');
			}
		}

	}
}
