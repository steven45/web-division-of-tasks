<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cPIC extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mPIC');
		$this->load->helper('url_helper');
		$this->load->library('session');
	}

	public function index()
	{

		$this->load->view('vPIC/vHomePIC');
		$this->load->view('vPIC/vFooterHomePIC');
	}

	public function validation()
	{
		$NIK = $this->input->post('NIK');
		$password = $this->input->post('password');

		$where = array(
			'NIK' => $NIK,
			'Password' => md5($password)
			);
		$cek = $this->mPIC->getPIC("pic",$where)->num_rows();

		if($cek > 0){
			$data_session = array(
				'nik' => $NIK,
				'status' => "login"
				);

			$this->session->set_userdata($data_session);
		 	redirect(base_url("pic/beranda"));
		}
		else{
			$this->load->view('vPIC/vHomePIC.php');
			$this->load->view('vPIC/vError');
			$this->load->view('vPIC/vFooterHomePIC.php');
		}
	}

	public function lihatLog()
	{
		echo "HALOO";
		// // header("Content-type:application/json");
		$data['judul'] = "Beranda PIC";
		// // $data['log']= $this->mAdmin->getLog();

		// // echo json_encode($data);
		$this->load->view('vPIC/vTemplate/vHeaderPIC', $data);
		$this->load->view('vPIC/vBerandaPIC');
		$this->load->view('vPIC/vTemplate/vFooterPIC');
	}

	public function lihatChecklist()
	{
		// // header("Content-type:application/json");
		$data['judul'] = "Checklist";
		// // $data['log']= $this->mAdmin->getLog();

		// // echo json_encode($data);
		$this->load->view('vPIC/vTemplate/vHeaderPIC', $data);
		$this->load->view('vPIC/vLihatChecklist');
		$this->load->view('vPIC/vTemplate/vFooterPIC');
	}

	public function doChecklist()
	{
		// // header("Content-type:application/json");
		$data['judul'] = "Pengecekan";
		// // $data['log']= $this->mAdmin->getLog();

		// // echo json_encode($data);
		$this->load->view('vPIC/vTemplate/vHeaderPIC', $data);
		$this->load->view('vPIC/vDoChecklist');
		$this->load->view('vPIC/vTemplate/vFooterPIC');
	}
}
