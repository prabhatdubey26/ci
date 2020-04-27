<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Login extends CI_Controller
{
	
	function __construct()
	{

		parent::__construct();
		if($this->session->userdata('is_login'))
		{
		   redirect(base_url('admin/dashboard'));
		}
		$this->load->model('admin/login_model');
		
	}
	public function index()
	{   
		$post = $this->input->post();

	    if (isset($post) && !empty($post)) {
	    	//print_r($post);die();
	    	$username = $this->input->post('email');
	    	$password = $this->input->post('password');
	    	$row = $this->login_model->check_user($username);
	    	if (!empty($row) && $row['password']==md5($password) && $row['role']=='Admin')
	    	{   
	    		//$user_type = $this->login_model->get_user_type($row['id']);
	    		$data = array(

	    				'id' => $row['id'],
	    				'name' =>$row['full_name'],
	    				'is_login'=> true
	    		);
	    		//print_r($data);die();
	    		$this->session->set_userdata($data);
	    		redirect(base_url('admin/dashboard'));
	    			
	    	}else{
	    		$this->session->set_flashdata("class","error");
	    		$this->session->set_flashdata('msg', 'Invalid email and password!');
	    		redirect(base_url('admin/login'));	
	    	}		
	    	
	       }   

		$this->load->view('admin/login');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('admin/login'));

	}

	public function email()
	{
		$this->load->library('email');
        $config = array(
		    'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
		    'smtp_host' => 'smtp.gmail.com', 
		    'smtp_port' => 465,
		    'smtp_user' => 'brijesh.seoxprts@gmail.com',
		    'smtp_pass' => 'brijesh@1992',
		    'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
		    'mailtype' => 'text', //plaintext 'text' mails or 'html'
		    'smtp_timeout' => '4', //in seconds
		    'charset' => 'iso-8859-1',
		    'wordwrap' => TRUE
		);

		$this->email->initialize($config);  

        $this->email->set_newline("\r\n");
        $this->email->from('brijesh.seoxprts@gmail.com');
        $this->email->to('bk399aaa@gmail.com');
        $this->email->subject('password');
        $this->email->message('new password');

        if ($this->email->send()) {
            echo 'Your Email has successfully been sent.';
        } else {
            show_error($this->email->print_debugger());
        }
	}
}