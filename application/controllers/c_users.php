<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_users extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('m_query');
	}

	public function index()
	{
		if (!$this->session->userdata('level')) {
			redirect('c_tutorial','refresh');
		}
		else
		{
			$data = $this->m_query->dataUsers();
			$this->load->view('users/v_dataUsers', ['data'=>$data]);	
		}
			
	}

	public function insertUsers()
	{
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		$this->form_validation->set_rules('level', 'level', 'required');
		$this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');

		$this->load->library('upload');
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']     = '2048';
		$config['max_width'] = '1024';
		$config['max_height'] = '768';
		$nama_file = "gambar_".time();
		$config['file_name'] = $nama_file;

		

		// Alternately you can set preferences by calling the ``initialize()`` method. Useful if you auto-load the class:
		$this->upload->initialize($config);
		if ($_FILES['foto']['name']) 
		{
			
		
			$field_name = "foto";
			if ($this->form_validation->run() &&  $this->upload->do_upload($field_name)) 
			{
				$username = $this->input->post('username');//sesuaikan nama fiednya denagn inputan ok
				$password = $this->input->post('password');
				$this->load->model('m_hashed');
				$passwordx = $this->m_hashed->hash_string($password);
				// $this->load->model('m_hashed');
				// $passwordx = $this->m_hashed->hash_string($password);
				// $passwordx = md5($password);
				$level = $this->input->post('level');//sesuaikan nama fiednya denagn inputan ok

				$gambar = $this->upload->data();
				$user = (['username'=>$username,
						  'password'=>$passwordx,
						  'level'=>$level,
					      'foto'=>$gambar['file_name']]);
				$data = array_merge($user);
				if ($this->m_query->TambahUsers($data) == false) 
					{
						$this->session->set_flashdata('pesan', 'Data Anda Sudah tersimpan di database');
						redirect('c_users','refresh');
					}
					else
					{
						$this->index();
					}
			}
			else
			{
				$this->index();
			}
		}



	}

}

/* End of file c_users.php */
/* Location: ./application/controllers/c_users.php */