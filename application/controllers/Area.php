<?php
/*
Created By : Meilan Anastasia M. 
Penerbit   : Lokomedia
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Area extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('area_model');
		$this->load->model('subarea_model');
		$this->load->model('login_m');
		if(!$this->session->userdata('username'))
		{
			redirect('Login');
		}
		$this->load->helper(array('form', 'url','download'));
	}

	public function index()
	{
		$data['session']	= $this->session->all_userdata();
		$username				= $this->session->userdata('username');
		$data['level']= $this->login_m->getKodeDivisi($username);
		$data['area'] 	= $this->area_model->getArea(); 
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi',$data);
		$this->load->view('AreaList',$data);
		$this->load->view('right');
		$this->load->view('footer-table');
	}
	//function tambahArea
	public function tambahArea()
	{
		$data['session']	= $this->session->all_userdata();
		$username				= $this->session->userdata('username');
		$data['level']= $this->login_m->getKodeDivisi($username);
		$data['subarea'] 	= $this->subarea_model->getData(); 
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi',$data);
		$this->load->view('AreaForm',$data); 
		$this->load->view('right');
		$this->load->view('footer');
	}
	
	//function input data
	function simpanArea(){
        $nama_area=$this->input->post('nama_area');
        $id_subarea=$this->input->post('id_subarea');
 
        $this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/images/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
 
        $image_name=$nama_area.'.png'; //buat name dari qr code sesuai dengan nim
 
        $params['data'] = 'localhost/ci-tutorial/Penilaian/IsiNilai/'.$nama_area.'/'.$id_subarea; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
 
        $this->area_model->simpanArea($nama_area,$id_subarea,$image_name); //simpan ke database
        redirect('Area'); //redirect ke mahasiswa usai simpan data
    }
	/*
	public function simpanArea()
	{
		$data['session']	= $this->session->all_userdata();
		$username				= $this->session->userdata('username');
		$data['level']= $this->login_m->getKodeDivisi($username);
		$data['subarea'] 	= $this->subarea_model->getData(); 
		
		$this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/images/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
 
        $image_name=$subarea.'.png'; //buat name dari qr code sesuai dengan nim
 
        $params['area'] = $id_area; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

		//query simpan data staff
		if($this->area_model->simpanArea())
		{
			//load notifikasi sukses
			$data['sukses']  = '
					<div class="alert alert-success">
					<p><strong>Input Data Area Sukses</strong></p>
					</div>';
			$this->load->view('head');
			$this->load->view('header');
			$this->load->view('navigasi',$data);
			$this->load->view('AreaForm',$data);
			$this->load->view('right');
			$this->load->view('footer'); 
		}
		else
		{
			//load notifikasi gagal
			$data['error']  = '
							<div class="alert alert-danger">
									<p><strong>Input Data Area  Data Gagal!</strong></p>
								</div>';
			$this->load->view('head');
			$this->load->view('header');
			$this->load->view('navigasi',$data);
			$this->load->view('AreaForm',$data); 
			$this->load->view('right');
			$this->load->view('footer'); 
		}
	}
	*/
	//ubah
	public function ubah()
	{
		$data['session']	= $this->session->all_userdata();
		$username				= $this->session->userdata('username');
		$data['level']= $this->login_m->getKodeDivisi($username);
		$id_area			= $this->input->get('id_area');
		$data['area']	= $this->area_model->getAreaUpdate($id_area);
		$data['subarea'] 	= $this->subarea_model->getData(); 
		$this->subarea_model->getData(); 		
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi',$data);
		$this->load->view('AreaForm',$data);
		$this->load->view('right');
		$this->load->view('footer');				
	}
	public function prosesUbah()
	{
		$data['session']	= $this->session->all_userdata();
		$username				= $this->session->userdata('username');
		$data['level']= $this->login_m->getKodeDivisi($username);
		$id_area			= $this->input->get('id_area');
		$data['subarea'] 	= $this->subarea_model->getData(); 
		//Jika update data sukses
		if($this->area_model->ubah())
		{
			//load notifikasi sukses
			$data['sukses']		= '
								<div class="alert alert-success">
									<p><strong>Update Data Area Sukses</strong></p>
								</div>';
			$data['area']	= $this->area_model->getAreaUpdate($id_area);
			$this->load->view('head');
			$this->load->view('header');
			$this->load->view('navigasi',$data);
			$this->load->view('AreaForm',$data);
			$this->load->view('right');
			$this->load->view('footer');				
		}
		//Jika update data tidak sukses
		else
		{
			//load notifikasi gagal
			$data['error'] = '
								<div class="alert alert-danger"><p><strong>Update Data Area Gagal!</strong></p>
								</div>';
			$data['area']	= $this->area_model->getAreaUpdate($id_area);
			$this->load->view('head');
			$this->load->view('header');
			$this->load->view('navigasi',$data);
			$this->load->view('AreaForm',$data);
			$this->load->view('right');
			$this->load->view('footer');
		}
	}
	
	//function hapus
	public function hapus()
	{
		$data['session']	= $this->session->all_userdata();
		$username				= $this->session->userdata('username');
		$data['level']= $this->login_m->getKodeDivisi($username);
		$id_area	= $this->input->get('id_area');
		$this->area_model->hapus($id_area);
		$data['area'] = $this->area_model->getArea(); 
		redirect('Area');
	}
	/*
	public function stokTipis()
	{
		$data['session']	= $this->session->all_userdata();
		$username				= $this->session->userdata('username');
		$data['level']= $this->login_m->getKodeDivisi($username);
		$data['area'] = $this->area_model->getStok(); 
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi',$data);
		$this->load->view('AreaStok',$data);
		$this->load->view('right');
		$this->load->view('footer-table');
	}
	*/
}

?>