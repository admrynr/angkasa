<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_query extends CI_Model {
	var $table = "users";
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function login($username, $password)
	{
		// $this->db->query('select * from users where username='$username'');
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where(['username'=>$username]);// tanda [] ini sama dengan fungsi array
		$return = $this->db->get();
		// memeriksa datanya apakah ada atau tidak
		// jika ada maka akan menampilkan pesan sukses
		if ($return->num_rows() > 0) 
		{
			// result sama funginya dennga mysql fetch array mengambil nilainya kembali
			foreach ($return->result() as $row) 
			{
				$this->load->model('m_hashed');
				if (!$this->m_hashed->hash_verify($password, $row->password)) {
					$this->session->set_flashdata('pesan', 'Usernamae Dan password tidak valid');
					redirect('C_tutorial','refresh');
				}
				else
				{

					if ($row->level=="admin") 
					{
						// sebelumnya kita ambil data usernya dulu untuk bisa kita tampilkan
						// ambil data user dari table users berdasarkan usernamennya
						$dataUsers = $this->db->get_where('users', ['username'=>$username]);
						// result ini fungsinya tampilkan hasilnya dari datanya users kemudian gantikan variabel datausers dengan variabel data
						foreach ($dataUsers->result() as $data) 
						{
							$session = array('level' =>'admin',
											'username'=>$data->username,
											'foto'=>$data->foto);
									$this->session->set_userdata( $session);
						}
						// jika semua fungsi di atas berjalan dengan lancar makka arahkan halaman ke c_mahasiswa
						redirect('c_mahasiswa','refresh');
					}
					elseif ($row->level=="mahasiswa") 
					{
						// sebelumnya kita ambil data usernya dulu untuk bisa kita tampilkan
						// ambil data user dari table users berdasarkan usernamennya
						$dataUsers = $this->db->get_where('users', ['username'=>$username]);
						// result ini fungsinya tampilkan hasilnya dari datanya users kemudian gantikan variabel datausers dengan variabel data
						foreach ($dataUsers->result() as $data) 
						{
							$session = array('level' =>'mahasiswa',
											'username'=>$data->username,
											'foto'=>$data->foto);
									$this->session->set_userdata( $session);
						}
						// jika semua fungsi di atas berjalan dengan lancar makka arahkan halaman ke c_mahasiswa
						redirect('c_mahasiswa','refresh');
					}
					elseif ($row->level=="dosen") 
					{
						// sebelumnya kita ambil data usernya dulu untuk bisa kita tampilkan
						// ambil data user dari table users berdasarkan usernamennya
						$dataUsers = $this->db->get_where('users', ['username'=>$username]);
						// result ini fungsinya tampilkan hasilnya dari datanya users kemudian gantikan variabel datausers dengan variabel data
						foreach ($dataUsers->result() as $data) 
						{
							$session = array('level' =>'dosen',
											'username'=>$data->username,
											'foto'=>$data->foto);
									$this->session->set_userdata( $session);
						}
						// jika semua fungsi di atas berjalan dengan lancar makka arahkan halaman ke c_mahasiswa
						redirect('c_mahasiswa','refresh');
					}

				}
			}
		}
		// jika gagal
		else
		{
			$this->session->set_flashdata('pesan', 'Usernamae Dan password tidak valid');
			redirect('C_tutorial','refresh');
		}

	}
	//untuk menampilkan data mahasiswa
	public function dataMahasiswa()
	{
		$this->db->select('*');
		$this->db->from('tb_mahasiswa');
		$this->db->order_by('nim', 'asc');
		$data = $this->db->get('');
		return $data;
	}

	public function dataUsers()
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->order_by('username', 'asc');
		$data = $this->db->get('');
		return $data;
	}

	public function TambahMahasiswa($data)
	{
		$this->db->insert('tb_mahasiswa',$data);
	}

	public function TambahUsers($data)
	{
		$this->db->insert('users',$data);
	}


	public function AmbilDataMahasiswa($id)
	{
		$data = $this->db->where(['id'=>$id])
				 		 ->get("tb_mahasiswa");
		if ($data->num_rows() > 0) {
			return $data->row();//ambil data berdasarkan id dengan angkanya
		}

	}

	public function M_EditMahasiswa($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('tb_mahasiswa', $data);
	}

	public function M_DeleteMahasiswa($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('tb_mahasiswa');
	}

}

/* End of file m_query.php */
/* Location: ./application/models/m_query.php */