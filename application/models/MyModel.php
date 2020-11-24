<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyModel extends CI_Model
{

	public function Reg()
	{
		//$this->load->view('reg');
	}
	function insert_data($data)  
	{  
		 $this->db->insert("tbl_insert", $data);  
	} 
	function FetchtblData()
	{
	  $query = $this->db->query("SELECT * FROM tbl_insert ORDER BY id DESC");  
	  return $query;

	} 
	function delete_data($id){  
		$this->db->where("id", $id);  
		$this->db->delete("tbl_insert");  
   }  
   function update_data($data, $id)  
   {  
		$this->db->where("id", $id);  
		$this->db->update("tbl_insert", $data);  
   }  
   function fetch_single_data($id)  
   {  
		$this->db->where("id", $id);  
		$query = $this->db->get("tbl_insert");  
		return $query;  
   }  



}
