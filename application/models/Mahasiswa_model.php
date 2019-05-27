<?php
class Mahasiswa_model extends CI_Model{

	function get_all_mahasiswa(){
		$hasil=$this->db->get('tb_mahasiswa');
		return $hasil;
	}
	
	function simpan_mahasiswa($nim,$nama,$prodi,$image_name){
		$data = array(
			'nim' 		=> $nim,
			'nama' 		=> $nama,
			'alamat' 	=> $prodi, 
			'qr_code' 	=> $image_name
		);
		$this->db->insert('tb_mahasiswa',$data);
	}
}