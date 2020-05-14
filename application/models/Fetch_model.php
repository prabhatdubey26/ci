<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */


class Fetch_model extends CI_Model
{
	protected $table = 'tbl_blog';

	public function __construct() {
        parent::__construct();
    }
	public function fetch_all_user(){

		$query = $this->db->get('register');
		return $query->result();

	}

	 public function get_count() {
        return $this->db->count_all($this->table);
    }

	public function fetch_all_blog($limit, $start){
		$this->db->select('register.name,register.image,tbl_blog.*');
		$this->db->from('register');
		$this->db->join('tbl_blog','tbl_blog.created_id=register.id');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
		
	}

	public function get_record_blog($table,$where)
	{
		
		$this->db->select('register.name,register.image,tbl_blog.*');
		$this->db->from('register');
		$this->db->join('tbl_blog','tbl_blog.created_id=register.id');
		$this->db->where($where);
		return $this->db->get()->row_array();

	}

	public function fetch_single_user($id){
		$this->db->where('id',$id);
		$query = $this->db->get('register');
		return $query->row();

	}
	public function update_passwd($id,$password){
		$this->db->where('id', $id);
		$this->db->set('password',$password);
    	$row = $this->db->update('register');
    	if ($row) {
    		return true;
    	}
    	else {
    		return false;
    	}

	}

	// Admin Manage User Function Here 
	public function get_record_row($table,$where)
	{
		$this->db->select("*");
		$this->db->from($table);
		$this->db->where($where);
		return $this->db->get()->row_array();
	}

	public function update_user($data=array(),$id)
	{
		$this->db->where("id",$id);
		$row = $this->db->update("register",$data);

		if($row){
			return true;
		}else{
			return false;
		}
	}
	public function insert_user($data=array())
	{
		$row = $this->db->insert("register",$data);

		if($row){
			return true;
		}else{
			return false;
		}
	}
	public function delete_record($table,$id)
	{
		$this->db->where("id",$id);
		$row = $this->db->delete($table);

		if($row){
			return true;
		}else{
			return false;
		}
	}
	public function insert_data($table,$data)
	{
		$row = $this->db->insert($table,$data);
		
		if($row){
			return true;
		}else{
			return false;
		}
	}
	public function fetch_all_comment($table,$id)
	{
		$this->db->select('register.name,register.image,comment.*');
		$this->db->from('register');
		$this->db->join($table,'comment.user_id=register.id');
		$this->db->where("blog_id",$id,'parent_id','');
		$query = $this->db->get();
		return $query->result();
	}
	public function fetch_all_profile()
	{
		$query = $this->db->get('imageupload');
		return $query->result();
	}

}