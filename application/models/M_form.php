<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_form extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    date_default_timezone_set("Asia/Jakarta");
    //Codeigniter : Write Less Do More
  }
  function get_subarea() {

      $this->db->where("nama_subarea", $u);
      $this->db->where("nama_area", $p);
      $this->db->select('
      subarea.nama_subarea, area.nama_area
      ');
      $this->db->join('area', 'area.id_area = subarea.id_area');
      $this->db->from('subarea');
      $query = $this->db->get();
      return $query->result();
        if ($result->num_rows() > 0) {
            foreach ($query->result() as $row) {
            // tentukan value (sebelah kiri) dan labelnya (sebelah kanan)
              $data = array('nama_area' => $row->nama_area,
                            'nama_subarea' => $row->nama_subarea
                          );
              $this->session->set_userdata($data);
            }
        }
  }

  function get_attendant(){
    $value = 'attendant';
    $this->db->where('level', $value);
    $query = $this->db->get('Karyawan');
    return $query->result();
  }
}
