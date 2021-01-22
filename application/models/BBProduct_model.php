<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BBProduct_model extends CI_Model {

	public function GetProducts($start)
	{
		return $this->db->where('p_publish','on')->join('bbusers', 'bbproducts.u_id =bbusers.u_id', 'left')->limit(2,$start)->get('bbproducts');
	}
	
	public function Productdata($p_id)
	{
		return $this->db->where('p_id',$p_id)->join('bbusers', 'bbproducts.u_id =bbusers.u_id', 'left')->get('bbproducts')->row();
	}
}
