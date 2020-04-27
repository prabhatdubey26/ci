<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

		function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('fetch_model');
		$this->load->model('admin/manage_blog_model');

		 $this->load->library("pagination");
	}
	

	public function index()
	{

		$config = array();
        $config["total_rows"] = $this->fetch_model->get_count();
        $config["per_page"] = 2;
        $config["uri_segment"] = 3;
        $config["base_url"] = base_url('dashboard/index');
        $config['per_page'] = 2;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tagl_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tagl_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item disabled">';
        $config['first_tagl_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tagl_close'] = '</a></li>';
        $config['attributes'] = array('class' => 'page-link');
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['title'] = 'Dashboard';
		$data['site_data'] = $this->fetch_model->get_record_row('tbl_site_setting',array('id'=>1));
		$data['blog']=$this->fetch_model->fetch_all_blog($config["per_page"], $page);
		$this->load->view('dashboard',$data);
	}
	public function contact()
	{

		$post = $this->input->post();
	    if (isset($post) && !empty($post)) {
	    	$name = $this->input->post('name');
	    	$email = $this->input->post('email');
	    	$mobile = $this->input->post('mobile');
	    	$address = $this->input->post('address');
	    	$message = $this->input->post('message');

	    	$data = array(
					'name' => $name, 
					'email' => $email, 
					'mobile' => $mobile, 
					'address' => $address, 
					'message' =>$message,
				);
	    	$row = $this->fetch_model->insert_data('contact',$data);
	    	if ($row) {
	    		$this->session->set_flashdata("class","success");
		    	$this->session->set_flashdata('msg', 'Thank you for Contacting . I will Respose as soon as posible.');
		    	redirect(base_url('dashboard/contact'));
	    	}

	    }
		$data['site_data'] = $this->fetch_model->get_record_row('tbl_site_setting',array('id'=>1));
		$data['title'] = 'Contact Us';
		$this->load->view('contact',$data);
	}
	public function about()
	{
		$data['site_data'] = $this->fetch_model->get_record_row('tbl_site_setting',array('id'=>1));
		$data['title'] = 'About Us';
		$this->load->view('about',$data);
	}

	public function fetch_user_list()
	{
		$results['site_data'] = $this->fetch_model->get_record_row('tbl_site_setting',array('id'=>1));
		$results['status'] = 'active';
		$results['title'] = 'Fetch Users List';
		$results['data']=$this->fetch_model->fetch_all_user();
		$this->load->view('userlist',$results);
	}

	public function view_profile($id='')
	{

		$data['site_data'] = $this->fetch_model->get_record_row('tbl_site_setting',array('id'=>1));
		$data['title'] = 'View Profile';
		$data['data'] = $this->fetch_model->fetch_single_user($id);
		$this->load->view('view_profile',$data);
	}

	public function blog($slug='')
	{

		$data['site_data'] = $this->fetch_model->get_record_row('tbl_site_setting',array('id'=>1));
		$data['title'] = 'View Blog';
		$data['blog'] = $this->fetch_model->get_record_blog('tbl_blog',array('slug'=>$slug));
		$blog_id = $data['blog']['id'];
		$data['comment'] = $this->fetch_model->fetch_all_comment('comment',$blog_id);
		$this->load->view('single_blog',$data);
	}

	public function change_password()
	{
		$post = $this->input->post();
	    if (isset($post) && !empty($post)) {
	    	$old_password = md5($this->input->post('old_pass'));
	    	$new_password = md5($this->input->post('new_pass'));
	    	$confirm_password = md5($this->input->post('confirm_pass'));
	    	$id = $this->input->post('id');
	    	$row = $this->fetch_model->fetch_single_user($id);

	    	if (!empty($row) && $row->password==$old_password) {
	    		if ($new_password==$confirm_password) {
	    			$update = $this->fetch_model->update_passwd($id,$new_password);
	    			if ($update) {
	    			$this->session->set_flashdata("class","success");
		    		$this->session->set_flashdata('msg', 'Password Updated Successfully');
		    		redirect(base_url('dashboard/change_password'));	
	    			}
	    		}
	    		else{
		    		$this->session->set_flashdata("class","danger");
		    		$this->session->set_flashdata('msg', 'Confirm Password Does not Match.');
		    		redirect(base_url('dashboard/change_password'));	
	    		}
	    	}
	    	else {
	    		$this->session->set_flashdata("class","danger");
	    		$this->session->set_flashdata('msg', 'Invalid Old Password.');
	    		redirect(base_url('dashboard/change_password'));	
	    	}

	    }
		$data['site_data'] = $this->fetch_model->get_record_row('tbl_site_setting',array('id'=>1));
		$data['title'] = 'Change Password';
		$this->load->view('change_password',$data);
	}

	 public function addcomment($slug='')
	{
		$post = $this->input->post();
	    if (isset($post) && !empty($post)) {
	    	$data = array(
					'comment' => $this->input->post('comment'), 
					'user_id' => $this->input->post('user_id'), 
					'blog_id' => $this->input->post('blog_id'), 	
					);
	    		if (!empty($this->input->post('parent_id'))) {
						$data['parent_id'] =$this->input->post('parent_id'); 
				}
	    	$row = $this->fetch_model->insert_data('comment',$data);
	    	if ($row) {
	    		$this->session->set_flashdata("class","success");
		    	$this->session->set_flashdata('msg', 'Your Comment has been post successfully.');
		    	redirect(base_url('dashboard/blog/'.$slug));
	    	}
	    }
	}
	 public function add_blog()
	{
		$post = $this->input->post();
			if (isset($post) && !empty($post)) {

				$image = '';

					$config['upload_path']          = 'assets/admin/image/blog/';
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
					'title' => $this->input->post('title'), 
					'slug' => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $this->input->post('title')))),
                    'status' => trim($this->input->post('status')),
                    'description' => trim($this->input->post('description')),
                    'created_by' => 'User', 
                    'created_id' => $this->input->post('created_id')
				);

				if (!empty($image))
				{
						$data['image'] =$image; 
				}	

                $row = $this->manage_blog_model->add_blog($data);

                if ($row) {
                	$arrayName = array('message' => "Record added Successfully.",'status' =>'success');
                }else{
                	$arrayName = array('message' => "Record not Added.",'status' =>'error');
                }
                
                	echo json_encode($arrayName);exit();
		}
	    $data['site_data'] = $this->fetch_model->get_record_row('tbl_site_setting',array('id'=>1));
		$data['title'] = 'Add Blog';
		$this->load->view('add_blog',$data);
	}
}