<?php
class Area_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }
	//function mengambil data area
	function getarea()
    {
		$query=$this->db->query("select area.*,nama_subarea from area,subarea where subarea.id_subarea=area.id_subarea");
		foreach ($query->result_array() as $row) {$array[] = $row;}
		if (!isset($array)) { $array='';}
		$query->free_result();
		return $array;
	}
	//function menampilkan data area yang akan di Update ke Form
	function getAreaUpdate($kode)
    {
		$query=$this->db->query("select area.*,subarea.nama_subarea from area, subarea where area.id_subarea=subarea.id_subarea and id_area='$kode'");
		foreach ($query->result_array() as $row) {$array[] = $row;}
		if (!isset($array)) { $array='';}
		$query->free_result();
		return $array;
	}

	//function hapus data area
	function hapus($kode)
    {
		 $sql = "delete from area  WHERE id_area ='$kode'"; 
		 $this->db->query($sql);
		 return true;
    }
	/*
	//tambah
	function simpanArea()
    {
		$CI =& get_instance();
		$CI->load->database('default');
		//insert
		if(!empty($_POST['id_area']))
		{
			$id_area		= $_POST['id_area'];
			$nama_area		= $_POST['nama_area'];
			$id_subarea		= $_POST['id_subarea'];
			$qr_code		= $_POST['image_name'];
			$sql = "insert into area(id_area, nama_area, id_subarea, qr_code) values('$id_area','$nama_area','$id_subarea','$image_name')"; 
			$this->db->query($sql);
			return true;
		}
		else
		{
			return false;
		}
    }
    */
	function simpanArea($nama_area,$id_subarea,$image_name){
        $data = array(
            'nama_area'       => $nama_area,
            'id_subarea'      => $id_subarea,
            'qr_code'   => $image_name
        );
        $this->db->insert('area',$data);
    }

	function ubah()
    {
		$CI =& get_instance();
		$CI->load->database('default');
		if(!empty($_POST['id_area']))
		{
			$id_area		= $_POST['id_area'];
			$nama_area		= $_POST['nama_area'];
			$id_subarea		= $_POST['id_subarea'];
			$qr_code		= $_POST['image_name'];
			$sql = "update area set nama_area='$nama_area',id_subarea='$id_subarea', qr_codea='$image_name' where id_area='$id_area'"; 
			$this->db->query($sql);
			return true;
		}
		else
		{
			return false;
		}
    }                                                                                                    
}
?>