<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BBUser_model extends CI_Model {

	public function BBuserlogin($data)
	{
		return $this->db->where('u_email',$data['u_email'],'u_password',$data['u_password'])->get('bbusers');
	}
	
	public function GetProducts($u_id)
	{
		return $this->db->where('u_id',$u_id)->get('bbproducts');
	}
	
	public function GetInProduct($pid)
	{
		return $this->db->where('p_id',$pid)->get('bbproducts')->row();
	}
	
	
}
