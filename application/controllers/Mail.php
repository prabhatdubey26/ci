<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mail extends CI_Controller {

		function __construct()
	{
		parent::__construct();
		
		$this->load->model('fetch_model');
	}
	

	public function index(){

		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' =>'smtp.gmail.com',
			'smtp_port' => 465,
			'smtp_user' =>'prabhatdubey994@gmail.com',
			'smtp_pass' =>'prabhat8896',
			'mailtype' =>'html',
			'charset' =>'180-8859-1',
			'wordwrap'=> TRUE
		);
		$this->load->library('email',$config);
		$this->email->from('prabhatdubey994@gmail.com', 'admin');
		$this->email->to('prabhatdubey994@gmail.com');
		$this->email->subject('Email Test');
		$this->email->message('Testing The Email Class');
		$this->email->set_newline("\r\n");

		$result = $this->email->send();
		if ($result) {
			print_r("mail Send Success");
		}
		else{
			print_r("something went wrong");
		}
		$this->email->print_debugger();


	}
}