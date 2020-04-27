<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

		function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('is_login'))
		{
		   redirect(base_url('admin/login'));
		}
		$this->load->model('fetch_model');
		$this->load->model('admin/manage_blog_model');

	}

	public function index()
	{
		$data['site_data'] = $this->fetch_model->get_record_row('tbl_site_setting',array('id'=>1));
		$data['title'] = 'Blog Manage';
		$this->load->view('admin/blog/list',$data);
	}

		public function ajax_list()
    {
        $lists = $this->manage_blog_model->get_page_datatables();
       
        $data = array();
        $no = $_POST['start'];
        foreach ($lists as $list) {
        	 //print_r($list);die();
            $no++;
            $row = array();
            $row['DT_RowId'] = 'row_'.$list->id;
            $row['s_no'] = $no;
            $row['title'] = $list->title;
            $row['image'] = ($list->image!='')?'<img id="pic" src="'.base_url('assets/admin/image/blog/'.$list->image).'">':'<img id="pic" src="'.base_url('assets/admin/image/blog/no-image.png').'"/>';
            $row['status'] = ($list->status==1)?'<span class="badge badge-success">Active</span>':'<span class="badge badge-danger">Deactive</span>';
            $row['action'] = '<a href="'.base_url('admin/blog/edit/'.$list->id).'" class="btn btn-primary btn-xs"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
                <a href="javascript:void(0);" onclick="delete_record('.$list->id.');" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>';
 
            $data[] = $row;
        }
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->manage_blog_model->count_all(),
                        "recordsFiltered" => $this->manage_blog_model->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

	public function add()
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
                    'created_by' => 'Admin', 
                    'created_id' => $this->session->userdata('id')
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
		$data['title'] = 'Blog Add';
		$data['site_data'] = $this->fetch_model->get_record_row('tbl_site_setting',array('id'=>1));
		$this->load->view('admin/blog/add',$data);
	}
	public function edit($id='')
	{
		if ($id=='') {
			show_404();
		}
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
                    
				);


				if (!empty($image))
				{
						$data['image'] =$image; 
				}	

                $row = $this->manage_blog_model->update_blog($data,$id);

                if ($row) {
                	$arrayName = array('message' => "Record Updated Successfully.",'status' =>'success');
                }else{
                	$arrayName = array('message' => "Record not Updated.",'status' =>'error');
                }
                
        echo json_encode($arrayName);exit();
    }
    	$data['site_data'] = $this->fetch_model->get_record_row('tbl_site_setting',array('id'=>1));
        $data['record'] = $this->fetch_model->get_record_row('tbl_blog',array('id'=>$id));
		$data['title'] = 'Blog Edit';
		$this->load->view('admin/blog/add',$data);
	}

	public function delete()
	{ 
		$id = $this->input->post('id');
		$row = $this->fetch_model->delete_record("tbl_blog",$id);
		echo $row;
	}

}