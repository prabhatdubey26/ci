<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {


	function __construct() 
	{
		parent::__construct();
		$this->load->model('Reg_model');
		$this->load->model('fetch_model');
		
	}

	public function index()
	{
		$data['title']="Register";
		$data['site_data'] = $this->fetch_model->get_record_row('tbl_site_setting',array('id'=>1));
		$this->load->view('register',$data);
	}
	public function add($id='')
		{
			
			$post = $this->input->post();
			if (isset($post) && !empty($post)) {

				$image = '';

					$config['upload_path']          = 'assets/img';
	                $config['allowed_types']        = 'gif|jpg|png';
	                $config['max_size']             = 1024000;
	                $config['encrypt_name']         = TRUE;
	                
	                $this->load->library('upload', $config);
	                $this->upload->initialize($config);
	                if (!empty($_FILES['image']['name'])) {


	                	if ( ! $this->upload->do_upload('image')) {
				            $error = array('error' => $this->upload->display_errors()); 
				            print_r($error);die;
				         }
							
				         else{ 
				            $data = $this->upload->data();
				            $image = $data['file_name'];
				           
				         } 
				                	
				    }

					$data = array(
					'name' => $this->input->post('name'), 
					'father_name' => $this->input->post('father_name'), 
					'email' => $this->input->post('email'), 
					'password' => md5($this->input->post('password')), 
					'address' => $this->input->post('address'), 
				);


				if (!empty($image))
				{
						$data['image'] =$image; 
				}	

				$row = $this->Reg_model->insert_data('register',$data);

				if($row){
					
					$this->session->set_flashdata("class","success");
					$this->session->set_flashdata("msg","Register Successfully.");
					redirect(base_url("register"));
				}else{
					$this->session->set_flashdata("class","danger");
					$this->session->set_flashdata("msg","Sorry! some problem record register Fail.");
					redirect(base_url("register"));
				}
				
			}
			$this->load->view('register');
		}

	public function edit($id='')
		{
			
			$post = $this->input->post();
			if (isset($post) && !empty($post)) {

				$image = '';

					$config['upload_path']          = 'assets/img';
	                $config['allowed_types']        = 'gif|jpg|png';
	                $config['max_size']             = 1024000;
	                $config['encrypt_name']         = TRUE;
	                
	                $this->load->library('upload', $config);
	                $this->upload->initialize($config);
	                if (!empty($_FILES['image']['name'])) {


	                	if ( ! $this->upload->do_upload('image')) {
				            $error = array('error' => $this->upload->display_errors()); 
				            print_r($error);die;
				         }
							
				         else{ 
				            $data = $this->upload->data();
				            $image = $data['file_name'];
				           
				         } 
				                	
				    }

					$data = array(
					'name' => $this->input->post('name'), 
					'father_name' => $this->input->post('father_name'), 
					'email' => $this->input->post('email'), 
					'address' => $this->input->post('address'), 
				);


				if (!empty($image))
				{
						$data['image'] =$image; 
				}	

				$row = $this->Reg_model->update_data('register',$data,$id);

				if($row){
					
					$this->session->set_flashdata("class","success");
					$this->session->set_flashdata("msg","Profile updated Successfully.");
					redirect(base_url("dashboard/view_profile/$id"));
				}else{
					$this->session->set_flashdata("class","danger");
					$this->session->set_flashdata("msg","Sorry! something went wrong.");
					redirect(base_url("dashboard/view_profile/$id"));
				}
				
			}
		}
			
}


