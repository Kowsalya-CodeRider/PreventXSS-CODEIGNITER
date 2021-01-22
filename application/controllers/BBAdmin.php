<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BBAdmin extends CI_Controller {

	public function __construct()
	{
	   parent::__construct();
	   $this->load->model('BBAdmin_model');
	}
	 
	public function index()
	{
		$this->load->view('Admin/Login_header');
		$this->load->view('Admin/Login');
	}
	
	public function Dashboard()
	{
		if($this->session->userdata('logged_in')==TRUE)
		{
			$data['dashboard'] = $this->BBAdmin_model->getDashboard();
			$data1['uri'] = $this->uri->segment(2);
			$this->load->view('Admin/header');
			$this->load->view('Admin/navbar');
			$this->load->view('Admin/leftsidebar',$data1);
			$this->load->view('Admin/dashboard',$data);
			$this->load->view('Admin/footer');
		}
		else
		{
			$this->error();
		}
	}
	
	public function ProductList()
	{
		if($this->session->userdata('logged_in')==TRUE)
		{
			$data['product'] = $this->BBAdmin_model->GetProducts();
			$data1['uri'] = $this->uri->segment(2);
			$this->load->view('Admin/header');
			$this->load->view('Admin/navbar');
			$this->load->view('Admin/leftsidebar',$data1);
			$this->load->view('Admin/ProductList',$data);
			$this->load->view('Admin/footer');
		}
		else
		{
			$this->error();
		}
	}
	
	public function UserList()
	{
		if($this->session->userdata('logged_in')==TRUE)
		{
			$data['users'] = $this->BBAdmin_model->GetUsers();
			$data1['uri'] = $this->uri->segment(2);
			$this->load->view('Admin/header');
			$this->load->view('Admin/navbar');
			$this->load->view('Admin/leftsidebar',$data1);
			$this->load->view('Admin/UserList',$data);
			$this->load->view('Admin/footer');
		}
		else
		{
			$this->error();
		}
	}
	
	public function logincheck()
	{
		$a_email 	= $this->security->xss_clean($this->input->post('a_email'));
		$a_password = $this->security->xss_clean($this->input->post('a_password'));
		$a_data = array(
						'a_email' 	 => $a_email,
						'a_password' => $a_password
					);
		$is_user = $this->BBAdmin_model->BBAdminlogin($a_data);
		$rowdata = $is_user->row();
		if($is_user->num_rows()>0)
		{
			$sessiondata = array(
									'a_name'	  => $rowdata->a_name,
									'a_email'  	  => $rowdata->a_email,
									'a_password'  => $rowdata->a_password,
									'a_id'		  => $rowdata->a_id,
									'logged_in'   => TRUE
								);
			$this->session->set_userdata($sessiondata);
			redirect('BBAdmin/Dashboard');
		}
		else
		{
			$data['error'] = 'Invalid Login Credentials';
			$this->load->view('Admin/Login_header');
			$this->load->view('Admin/Login',$data);
		}
	}
	
	public function Adminlogout()
	{
		$this->session->sess_destroy();
		redirect('BBAdmin/index');
	}
	
	public function error()
	{
		$this->load->view('Admin/Login_header');
		$this->load->view('Admin/error');
	}
}
