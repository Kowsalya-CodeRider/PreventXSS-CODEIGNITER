<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Calcutta");
class BBUsers extends CI_Controller {

	 public function __construct()
	 {
	   parent::__construct();
	   $this->load->model('BBUser_model');
	 }
	 
	public function index()
	{
		$data['url'] = $this->uri->segment(2);
		$this->load->view('Users/Login_header');
		$this->load->view('Users/Login',$data);
	}
	
	public function Register()
	{
		$data['url'] = $this->uri->segment(2);
		$this->load->view('Users/Login_header');
		$this->load->view('Users/Register',$data);
	}
	
	public function ProductList()
	{
		if($this->session->userdata('logged_in')==TRUE)
		{
			$u_id = $this->session->userdata('u_id');
			$data['products'] = $this->BBUser_model->GetProducts($u_id); 
			$this->load->view('Users/header');
			$this->load->view('Users/navbar');
			$this->load->view('Users/Productlist',$data);
			$this->load->view('Users/footer');
		}
		else
		{
			$this->error();
		}
	}
	
	public function AddProduct()
	{
		if($this->session->userdata('logged_in')==TRUE)
		{
			$this->load->view('Users/header');
			$this->load->view('Users/navbar');
			$this->load->view('Users/AddProduct');
			$this->load->view('Users/footer');
		}
		else
		{
			$this->error();
		}
	}
	
	public function EditProduct($p_id)
	{
		if($this->session->userdata('logged_in')==TRUE)
		{
			$data['product'] = $this->BBUser_model->GetInProduct($p_id);
			if(!empty($data['product']))
			{
				$this->load->view('Users/header');
				$this->load->view('Users/navbar');
				$this->load->view('Users/EditProduct',$data);
				$this->load->view('Users/footer');
			}
		}
		else
		{
			$this->error();
		}
	}
	
	public function Addusers()
	{
		$u_name 	= $this->security->xss_clean($this->input->post('u_name'));
		$u_email 	= $this->security->xss_clean($this->input->post('u_email'));
		$u_password = $this->security->xss_clean($this->input->post('u_password'));
		$u_data = array(
						'u_name' 	 => $u_name,
						'u_email' 	 => $u_email,
						'u_password' => md5($u_password)
					);
		$this->db->insert('bbusers',$u_data);
		$data['success'] = 'Registration Successfully Completed!';
		$this->load->view('Users/Login_header');
		$this->load->view('Users/Register',$data);
	}
	
	public function Userlogincheck()
	{
		$u_email 	= $this->security->xss_clean($this->input->post('u_email'));
		$u_password = $this->security->xss_clean($this->input->post('u_password'));
		$u_data = array(
						'u_email' 	 => $u_email,
						'u_password' => md5($u_password)
					);
		$is_user = $this->BBUser_model->BBuserlogin($u_data);
		$rowdata = $is_user->row();
		if($is_user->num_rows()>0)
		{
			$sessiondata = array(
									'u_name'	  => $rowdata->u_name,
									'u_email'  	  => $rowdata->u_email,
									'u_password'  => $rowdata->u_password,
									'u_id'		  => $rowdata->u_id,
									'logged_in'   => TRUE
								);
			$this->session->set_userdata($sessiondata);
			redirect('BBUsers/ProductList');
		}
		else
		{
			$data['error'] = 'Invalid Login Credentials';
			$this->load->view('Users/Login_header');
			$this->load->view('Users/Login',$data);
		}
	}
	
	public function Userlogout()
	{
		$this->session->sess_destroy();
		redirect('BBUsers/index');
	}
	
	public function InsertProduct()
	{
		if($this->session->userdata('logged_in')==TRUE)
		{
			$u_id 		= $this->session->userdata('u_id');
			$p_name 	= $this->input->post('p_name');
			$p_price 	= $this->input->post('p_price');
			$p_color 	= $this->input->post('p_color');
			$p_publish  = $this->input->post('p_publish');
			if(empty($p_publish))
			{
				$p_publish = 'off';
			}
			if(!empty($_FILES['p_file']['name']))
			{
				$_FILES['file']['name']      = $_FILES['p_file']['name']; 
				$_FILES['file']['type']      = $_FILES['p_file']['type']; 
				$_FILES['file']['tmp_name']  = $_FILES['p_file']['tmp_name']; 
				$_FILES['file']['error']     = $_FILES['p_file']['error']; 
				$_FILES['file']['size']      = $_FILES['p_file']['size']; 
				 
				$uploadPath = './Userfiles/'; 
				$config['upload_path'] = $uploadPath; 
				$config['allowed_types'] = 'jpg|png|jpeg|gif'; 
				$this->load->library('upload', $config); 
				$this->upload->initialize($config); 
				  
				
				if ( ! $this->upload->do_upload('file'))
				{
					$error = $this->upload->display_errors();
					$errordata['error'] = strip_tags($error);
					$errordata['output'] = 0;
					print_r(json_encode($errordata));die;
				}
				else
				{
					$fileData = $this->upload->data(); 
					$uploadData['file_name'] = $fileData['file_name']; 				
					$p_file = $uploadData['file_name'];
					
				}
			}
			$data = $this->security->xss_clean(array(
							'p_name' 	=> $p_name,
							'p_price' 	=> $p_price,
							'p_color' 	=> $p_color,
							'p_publish' => $p_publish,
							'p_file'	=> $p_file,
							'u_id'		=> $u_id,
							'created_at'=> date("Y-m-d H:i:s")
						));
			$this->db->insert('bbproducts',$data);
			redirect('BBUsers/ProductList');
		}
		else
		{
			$this->error();
		}
	}
	
	public function UpdateProduct()
	{
		if($this->session->userdata('logged_in')==TRUE)
		{
			$u_id 		= $this->session->userdata('u_id');
			$p_id		= $this->input->post('p_id');
			$p_name 	= $this->input->post('p_name');
			$p_price 	= $this->input->post('p_price');
			$p_color 	= $this->input->post('p_color');
			$p_publish  = $this->input->post('p_publish');
			if(empty($p_publish))
			{
				$p_publish = 'off';
			}
			if(!empty($_FILES['p_file']['name']))
			{
				$_FILES['file']['name']      = $_FILES['p_file']['name']; 
				$_FILES['file']['type']      = $_FILES['p_file']['type']; 
				$_FILES['file']['tmp_name']  = $_FILES['p_file']['tmp_name']; 
				$_FILES['file']['error']     = $_FILES['p_file']['error']; 
				$_FILES['file']['size']      = $_FILES['p_file']['size']; 
				 
				$uploadPath = './Userfiles/'; 
				$config['upload_path'] = $uploadPath; 
				$config['allowed_types'] = 'jpg|png|jpeg|gif'; 
				$this->load->library('upload', $config); 
				$this->upload->initialize($config); 
				  
				
				if ( ! $this->upload->do_upload('file'))
				{
					$error = $this->upload->display_errors();
					$errordata['error'] = strip_tags($error);
					$errordata['output'] = 0;
					print_r(json_encode($errordata));die;
				}
				else
				{
					$fileData = $this->upload->data(); 
					$uploadData['file_name'] = $fileData['file_name']; 				
					$p_file = $uploadData['file_name'];
					
				}
			}
			else
			{
				$p_file = $this->input->post('p_file1');
			}
			$data = $this->security->xss_clean(array(
							'p_name' 	=> $p_name,
							'p_price' 	=> $p_price,
							'p_color' 	=> $p_color,
							'p_publish' => $p_publish,
							'p_file'	=> $p_file,
							'u_id'		=> $u_id
						));
			$this->db->where('p_id',$p_id);
			$this->db->update('bbproducts',$data);
			redirect('BBUsers/ProductList');
		}
		else
		{
			$this->error();
		}
	}
	
	public function error()
	{
		$this->load->view('Users/Login_header');
		$this->load->view('Users/error');
	}
}
