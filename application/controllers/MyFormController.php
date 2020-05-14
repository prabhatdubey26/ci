<?php
    
class MyFormController extends CI_Controller {
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->model('fetch_model');

    }
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index()
    {
        $this->load->view('myForm');
    } 
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function post()
    {
        $data = $_POST['image'];
        $name = $_POST['name'];
        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);
        $data = base64_decode($data);
        $imageName = time().'.png';
        file_put_contents('assets/upload/'.$imageName, $data);
        $arr = array('name'=>$name,'image'=>$imageName);
        $row = $this->fetch_model->insert_data('imageupload',$arr);
        if ($row) {
                $this->session->set_flashdata("class","success");
                $this->session->set_flashdata('msg', 'Your File Upload Success.');
            }   
            redirect(base_url('MyFormController'));
    }

    public function ProfileList()
    {
        $results['site_data'] = $this->fetch_model->get_record_row('tbl_site_setting',array('id'=>1));
        $results['status'] = 'active';
        $results['title'] = 'Profile List';
        $results['data']=$this->fetch_model->fetch_all_profile();
        $this->load->view('profileList',$results);
    }

}