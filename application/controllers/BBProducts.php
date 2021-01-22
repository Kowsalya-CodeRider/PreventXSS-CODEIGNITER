<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BBProducts extends CI_Controller {

	public function __construct()
	{
	   parent::__construct();
	   $this->load->model('BBProduct_model');
	}
	 
	public function index()
	{
		$start = 0;
		$data['product'] = $this->BBProduct_model->GetProducts($start);
		$this->load->view('Products/header');
		$this->load->view('Products/index',$data);
		$this->load->view('Products/footer');
	}
	
	public function productdetails($p_id)
	{
		$data['productdata'] = $this->BBProduct_model->Productdata($p_id);
		$this->load->view('Products/header');
		$this->load->view('Products/productdetails',$data);
		$this->load->view('Products/footer');
	}
	
	public function loadajax()
	{
		$start = $this->input->post('start');
		$product = $this->BBProduct_model->GetProducts($start);
		$data = $product->result_array();
		print_r(json_encode($data));die;
	}
	
}
