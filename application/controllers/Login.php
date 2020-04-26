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
		$this->load->model('login_model');
		$this->load->model('fetch_model');
		
	}

	public function index()
	{   
		$post = $this->input->post();
	    if (isset($post) && !empty($post)) {

	    	$email = $this->input->post('email');
	    	$password = $this->input->post('password');
	    	$row = $this->login_model->check_user($email);
	    	//print_r($row);
	    	if (!empty($row) && $row['password']==(md5($password)))
	    	{  
	    		$data = array(

	    				'id' => $row['id'],
	    				'name' =>$row['name'],
	    				'email'=>$row['email'],
	    				'password'=>$row['password'],
	    				'is_login'=>true,
	    		);

	    		$this->session->set_userdata($data);
	    		redirect(base_url('dashboard'));
	    			
	    	}else{
				$this->session->set_flashdata("class","danger");
	    		$this->session->set_flashdata('msg', 'Invalid email and password!');
	    		redirect(base_url('login'));	
	    	}		
	    	
	       }   
		$data['site_data'] = $this->fetch_model->get_record_row('tbl_site_setting',array('id'=>1));
	      $data['title'] = 'Login';
		$this->load->view('login',$data);
	}

	public function logout()
	{
		//print_r('logout');die();
		$this->session->sess_destroy();
		  $data['title'] = 'Login';
		redirect(base_url('login'),$data['title']);

	}
}