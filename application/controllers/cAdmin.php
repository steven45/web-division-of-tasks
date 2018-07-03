<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cAdmin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mAdmin');
		$this->load->helper('url_helper');
		$this->load->library('session');
	}

	public function index()
	{
		$this->load->view('vAdmin/vHomeAdmin.php');
		$this->load->view('vAdmin/vFooterHomeAdmin.php');
	}

	public function validation()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
		$cek = $this->mAdmin->getAdmin("admin",$where)->num_rows();

		if($cek > 0){
			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);

			$this->session->set_userdata($data_session);
		 	redirect(site_url("admin/beranda"));
		}
		else{
			$this->load->view('vAdmin/vHomeAdmin.php');
			$this->load->view('vAdmin/vError');
			$this->load->view('vAdmin/vFooterHomeAdmin.php');
		}
	}

	public function beranda()
	{
		$this->load->view('vAdmin/vBerandaAdmin.php');
	}

	public function keluar()
	{
		session_destroy();
		redirect(base_url("admin"));
	}

	public function validasiTambahPIC()
	{
			$NIK = $this->input->post('NIK');
			$namaPIC = $this->input->post('NamaPIC');
			$password = $this->input->post('Password');
			$divisi = $this->input->post('Divisi');
			$jabatan = $this->input->post('Jabatan');
			$tahunMasuk = $this->input->post('TahunMasuk');
			$jumlahPengecekan = $this->input->post('JumlahPengecekan');
			// $NIK = '155150200111246';
			// $namaPIC = 'Vriza Wahyu AA';
			// $password = 'Haloo';
			// $divisi = 'IT Operation';
			// $jabatan = 'Bos Besar';
			// $tahunMasuk = '2010';
			// $jumlahPengecekan = '10';
			$data = array(
				'NIK' => $NIK,
				'NamaPIC' => $namaPIC,
				'Divisi' => $divisi,
				'Password' => md5($password),
				'Jabatan' => $jabatan,
				'TahunMasuk' => $tahunMasuk,
				'JumlahPengecekan' => $jumlahPengecekan
			);

			$query = $this->mAdmin->tambahPIC('pic', $data, $NIK);

			if ($query == 1) 
			{
				echo "<script type='text/javascript'>
						alert('Sukses Menambahkan PIC');
						window.location.href = '" . base_url() . "admin/beranda';
					</script>";
			}
			else
			{
				echo "<script type='text/javascript'>
						alert('NIK PIC Sudah Ada !!!');
						window.location.href = '" . base_url() . "admin/tambahpic';
					</script>";
			}
	}

	public function tambahPIC()
	{
		$this->load->view('vAdmin/vTambahPIC');
	}
}
