<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

		function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('is_login'))
		{
		   redirect(base_url('admin/login'));
		}
		$this->load->model('fetch_model');
	}


	public function index()
	{
		$data['site_data'] = $this->fetch_model->get_record_row('tbl_site_setting',array('id'=>1));
		$data['title'] = 'Admin Dashboard';
		$this->load->view('admin/dashboard',$data);
	}
	public function logout()
	{
		$this->session->sess_destroy();
		$data['title'] = 'Admin Login';
		redirect(base_url('admin/login'),$data);

	}

	

}