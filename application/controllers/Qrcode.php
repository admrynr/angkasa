<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qrcode extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
      $this->load->model('m_qrcode');
  }

  function index() {
		$this->load->view('tampilan_qrcode');
	}

  function cekin() {
    $u = $this->input->post('subarea');
    $p = $this->input->post('area');
    $this->load->model('m_qrcode');
    $this->m_qrcode->cek_input($u, $p);

  }



}
