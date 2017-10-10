<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Score extends CI_Controller {

	public function get_user_score()
	{
		$this->load->model('scores_model');
    	$this->data['score'] = $this->scores_model->get_score();
    	$this->load->view('includes/header.php');
    	$this->load->view('includes/navbar.php');

    	$this->load->view('user_score_view', $this->data);
    	$this->load->view('includes/footer.php');
	}

	public function set_prize()
	{
		$this->data['prize'] = $this->input->post('prize');
		$this->load->view('display_score_view.php', $this->data);
	}

	public function display_score() {

		$this->load->model('questions_model');
		$this->data['total_question'] = $this->questions_model->total_question();
		$this->data2['prize'] = $this->input->post('prize');

		/*for (int $i = 1; $i <= $this->data['total_question']; $i++) {
			array_push($this->data['checks'], '$i' => this->input->post('quiz[$i]'));
		}*/

		$this->data['checks'] = array(
			'q1' => $this->input->post('quizid1'),
			'q2' => $this->input->post('quizid2'),
			'q3' => $this->input->post('quizid3'),
			'q4' => $this->input->post('quizid4'),
			'q5' => $this->input->post('quizid5'),
			'q6' => $this->input->post('quizid6'),
			'q7' => $this->input->post('quizid7'),
			'q8' => $this->input->post('quizid8'),
			'q9' => $this->input->post('quizid9'),
			'q10' => $this->input->post('quizid10'),
			'q11' => $this->input->post('quizid11'),
			'q12' => $this->input->post('quizid12'),
			'q13' => $this->input->post('quizid13'),
			'q14' => $this->input->post('quizid14'),
			'q15' => $this->input->post('quizid15'),
			'q16' => $this->input->post('quizid16'),
			);

    	
		
		$this->load->model('users_model');
		$this->data['results'] = $this->questions_model->get_questions();
		

		$data1 = array(
					  'id' => $this->input->post('id'),
					  );
		
		$this->data['score'] = $this->input->post('score');

		$this->load->view('includes/header');
		$this->load->view('includes/navbar_student');
		$this->load->view('display_score_view', $this->data, $data1, $this->data2);
		$this->load->view('includes/footer');
		
	}

	public function thanks() 
	{	
		$this->load->model('scores_model');

		$this->load->model('users_model');
		$data1 = array(/*'score' => $this->input->post('score'),*/
					  'id' => $this->input->post('id'),
					  );
		$this->data['score'] = $this->input->post('score');
		$this->scores_model->update_score($data1, $this->data);

		$this->load->view('includes/header');
		$this->load->view('includes/navbar_student');
		$this->load->view('thanks_view');
		$this->load->view('includes/footer');
	}

}
