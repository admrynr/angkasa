<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
public function __construct()
{
	parent::__construct();
	$this->load->model('m_query');
	$this->load->library('pdf_report');
}
	public function index()
	{
		// kita ambil data mahasiswa
		$data = $this->m_query->dataMahasiswa();
		$this->load->view('laporan/v_report' , ['data'=>$data]);
	}

}

/* End of file report.php */
/* Location: ./application/controllers/report.php */