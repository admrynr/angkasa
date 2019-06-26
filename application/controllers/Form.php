<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('m_form');
    $this->load->helper('date');
  }

  function index()
  {
    $data['nama_area'] = $this->session->userdata('nama_area');
    $data['nama_subarea'] = $this->session->userdata('nama_subarea');
    $data['attendant']= $this->m_form->get_attendant();
    $this->load->view('tampilan_form',$data);
  }

  function ceksubmit(){
    $nama_area = 1; //$this->session->userdata('nama_area');
    $nama_subarea = 1; //$this->session->userdata('nama_subarea');
    $attendant = $this->input->post('attendant');
    $totalSum = $this->input->post('totalSum');
    $kotin = $this->input->post('kotin');
    $pentin = $this->input->post('pentin');
    $tinlan = $this->input->post('tinlan');
    $penlan = $this->input->post('penlan');
    $data = array(
        'id_area' => 'My title',
        'id_subarea' => 'My Name',
        'date' => 'My date'
      );

  }

}
