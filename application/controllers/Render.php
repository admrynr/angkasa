<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Render extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->library('Ciqrcode');
    $this->load->database();
  }

  public function index()
  {
    $data['title'] = "Belajar Membuat QRcode dan Barcode di PHP CodeIgniter 3";
    $data['data']  = $this->db->get('tb_mahasiswa')->result();
    // echo "<pre>";
    //  print_r($data['data']);
    //  exit();
    // echo "</pre>";
    $this->load->view('render', $data); 
  }

  public function QRcode($kodenya = 'cobaqr')
  {
    //render  qr code dengan format gambar PNG
    QRcode::png(
      $kodenya,
      $outfile = false,
      $level = QR_ECLEVEL_H,
      $size  = 6,
      $margin = 2
    );
  }

}

/* End of file Render.php */
/* Location: ./application/controllers/Render.php */