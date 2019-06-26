<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_qrcode extends CI_Model{

  function cek_input($u, $p) {

      $this->db->where("nama_subarea", $u);
      $this->db->where("nama_area", $p);
      $this->db->select('
      subarea.nama_subarea, area.nama_area
      ');
      $this->db->join('area', 'area.id_area = subarea.id_area');
      $this->db->from('subarea');
      $query = $this->db->get();
      $row = $query->row();

if (isset($row)){
            // tentukan value (sebelah kiri) dan labelnya (sebelah kanan)
              $data = array('nama_area' => $row->nama_area,
                            'nama_subarea' => $row->nama_subarea,
                          );
              $this->session->set_userdata($data);
              redirect('form');
            }else
            {
                $this->session->set_flashdata('info', 'Maaf, input salah');
                redirect('qrcode');
            }
}
}
