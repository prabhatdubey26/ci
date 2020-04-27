<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Login_model extends CI_Model
{
	
	public function check_user($email)
	{
		$this->db->where("email",$email);
		$query = $this->db->get('register');
		if($query->num_rows() > 0)
		{
		  	
		  $data = $query->row_array();
		   return $data;
		}
		else
		{	
		   return false;
		}
		
	}
}