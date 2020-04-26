<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Site_setting extends CI_Controller
{
	
	
	function __construct()
    {
        parent::__construct();
        $this->load->model('admin/login_model');
        $this->load->model('admin/site_setting_model');
        $this->load->model('fetch_model');

        if(!$this->session->userdata('is_login'))
        {
           redirect(base_url('admin/login'));
        }
    }

	public function index()
	{
		$data['site_data'] = $this->fetch_model->get_record_row('tbl_site_setting',array('id'=>1));
		$data['title'] = 'Site Setting';
		$this->load->view('admin/site_setting/list',$data);

	}

	public function ajax_list()
    {
        $lists = $this->site_setting_model->get_site_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($lists as $list) {
            $no++;
            $row = array();
            $row['s_no'] = $no;
            $row['site_name'] = $list->site_name;
            $row['site_title'] = $list->site_title;
            $row['site_meta_keyword'] = $list->site_meta_keyword;
            $row['site_meta_description'] = $list->site_meta_description;
            $row['action'] = '<a href="'.base_url('admin/site_setting/edit/'.$list->id).'" class="btn btn-primary btn-xs"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->site_setting_model->count_all(),
                        "recordsFiltered" => $this->site_setting_model->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function edit($id='')
	{   
		if ($id=='') {
			show_404();
		}
		$post = $this->input->post();

		if (isset($post) && !empty($post)) {

                $image = '';

					$config['upload_path']          = 'assets/admin/image/logo/';
	                $config['allowed_types']        = 'gif|jpg|png';
	                $config['max_size']             = 1024000;
	                $config['encrypt_name']         = TRUE;
	                
	                $this->load->library('upload', $config);
	                $this->upload->initialize($config);
	                if (!empty($_FILES['img_file']['name'])) {


	                	if ( ! $this->upload->do_upload('img_file')) {
				            $error = array('error' => $this->upload->display_errors()); 
				            print_r($error);die;
				         }
							
				         else{ 
				            $data = $this->upload->data();
				            $image = $data['file_name'];
				           
				         } 
				                	
				    }

                $arr = array(
                		'site_name'=>$this->input->post('site_name'),
                		'site_title'=>$this->input->post('site_title'),
                		'site_meta_keyword'=>$this->input->post('site_meta_keyword'),
                		'site_meta_description'=>$this->input->post('site_meta_description'),
                		'site_meta_description'=>$this->input->post('site_meta_description'),
                		'smtp_host'=>$this->input->post('smtp_host'),
                		'smtp_username'=>$this->input->post('smtp_username'),
                		'smtp_password'=>$this->input->post('smtp_password'),
                		'smtp_port'=>$this->input->post('smtp_port'),
                		'email'=>$this->input->post('email'),
                		'contact'=>$this->input->post('contact'),
                		'address'=>$this->input->post('address'),
                		'facebook'=>$this->input->post('facebook'),
                		'twitter'=>$this->input->post('twitter'),
                		'youtube'=>$this->input->post('youtube'),
                		'instagram'=>$this->input->post('instagram'),
                		'linkedin'=>$this->input->post('linkedin'),
                );

                if (!empty($image))
				{
						$arr['logo'] =$image; 
				}

                $row = $this->site_setting_model->edit($arr,$id);

                if ($row) {
                    $arrayName = array('message' => 'Record Updated Success.','status' =>'success');
                }else{
                    $arrayName = array('message' => 'Something Went Wrong','status' =>'error');
                }
                
                    echo json_encode($arrayName);exit();
		}
		$data['record'] = $this->fetch_model->get_record_row('tbl_site_setting',array('id'=>$id));
        $data['site_data'] = $this->fetch_model->get_record_row('tbl_site_setting',array('id'=>1));
		$data['title'] = 'Edit Site Setting';
		$this->load->view('admin/site_setting/add',$data);
	}


		
}

?>