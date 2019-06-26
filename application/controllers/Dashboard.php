<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_login');
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $data['username'] = $this->m_login->ambil_username();
    $this->load->view('tampilan_dashboard',$data);
  }

}
