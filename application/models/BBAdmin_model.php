<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BBAdmin_model extends CI_Model {
	
	public function BBAdminlogin($data)
	{
		return $this->db->where('a_email',$data['a_email'],'a_password',$data['a_password'])->get('admin_login');
	}
	
	public function getDashboard()
	{
		$query = "SELECT (SELECT COUNT(bbusers.u_id) FROM bbusers) as ucount,
				  (SELECT COUNT(bbproducts.p_id) FROM bbproducts) as pcount";
		$result = $this->db->query($query);
		return $result->row();
	}
	
	public function GetUsers()
	{
	    $query = $this->db->select('COUNT(bbproducts.p_id) as pcount,bbusers.u_name as username')
			 ->from('bbproducts')
			 ->join('bbusers','bbusers.u_id=bbproducts.u_id','left')
			 ->group_by('bbusers.u_id');
		return $query->get()->result_array();
	}
	
	public function GetProducts()
	{
		return $this->db->from('bbproducts')
						->join('bbusers', 'bbproducts.u_id =bbusers.u_id', 'left')
						->get()
						->result_array();
	}
}
