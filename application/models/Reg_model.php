<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Reg_model extends CI_Model
{
	  public function insert_data($table,$data)
	 {
	 	$this->db->insert($table, $data);
	 	return true;
	 }
	  public function update_data($table,$data,$id)
	 {
	 	$this->db->where('id', $id);
		$this->db->set($data);
	 	$this->db->update($table);
	 	return true;
	 }
	 
}