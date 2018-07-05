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
		$this->load->view('vAdmin/vTemplate/vHeaderAdmin');
		$this->load->view('vAdmin/vBerandaAdmin');	
		$this->load->view('vAdmin/vTemplate/vFooterAdmin');
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
		$this->load->view('vAdmin/vTemplate/vHeaderAdmin');
		$this->load->view('vAdmin/vTambahPIC');
		$this->load->view('vAdmin/vTemplate/vFooterAdmin');
	}

	public function lihatPIC()
	{
		$data['pic'] = $this->mAdmin->getPIC();
		$this->load->view('vAdmin/vTemplate/vHeaderAdmin');
		$this->load->view('vAdmin/vLihatPIC', $data);
		$this->load->view('vAdmin/vTemplate/vFooterAdmin');
	}

	public function editPIC()
	{
		$NIK = $this->input->post('NIK');
		$data['pic'] = $this->mAdmin->getPIC($NIK);
		$this->load->view('vAdmin/vTemplate/vHeaderAdmin');
		$this->load->view('vAdmin/vEditPIC');
		$this->load->view('vAdmin/vTemplate/vFooterAdmin');
	}

	public function validasiEditPIC()
	{
		if (isset($_POST['submit'])) 
		{
			$NIK = $this->input->post('NIK');
			$namaPIC = $this->input->post('NamaPIC');
			$password = $this->input->post('Password');
			$divisi = $this->input->post('Divisi');
			$jabatan = $this->input->post('Jabatan');
			$tahunMasuk = $this->input->post('TahunMasuk');
			$jumlahPengecekan = $this->input->post('JumlahPengecekan');

			$data = array(
				'NamaPIC' => $namaPIC,
				'Divisi' => $divisi,
				'Password' => md5($password),
				'Jabatan' => $jabatan,
				'TahunMasuk' => $tahunMasuk,
				'JumlahPengecekan' => $jumlahPengecekan
			);

			$data['pic'] = $this->mAdmin->editPIC('pic', $data, $NIK);

			echo "<script type='text/javascript'>
						alert('Sukses Mengedit PIC');
						window.location.href = '" . base_url() . "admin/lihatPIC';
					</script>";
		}
	}

	public function hapusPIC()
	{

	}

	public function tambahChecklist()
	{
		$this->load->view('vAdmin/vTemplate/vHeaderAdmin');
		$this->load->view('vAdmin/vTambahChecklist');
		$this->load->view('vAdmin/vTemplate/vFooterAdmin');
	}

	public function lihatChecklist()
	{
		$data['checklist'] = $this->mAdmin->getChecklist();
		$this->load->view('vAdmin/vTemplate/vHeaderAdmin');
		$this->load->view('vAdmin/vLihatChecklist', $data);
		$this->load->view('vAdmin/vTemplate/vFooterAdmin');
	}

	public function editChecklist()
	{
		$IDChecklist = $this->input->post('IDChecklist');
		$data['checklist'] = $this->mAdmin->getChecklist($IDChecklist);
		$this->load->view('vAdmin/vTemplate/vHeaderAdmin');
		$this->load->view('vAdmin/vEditChecklist', $data);
		$this->load->view('vAdmin/vTemplate/vFooterAdmin');
	}

	public function validasiEditChecklist()
	{
		if (isset($_POST['submit'])) 
		{
			$IDChecklist = $this->input->post('IDChecklist');
			$jenisChecklist = $this->input->post('JenisChecklist');
			$info = $this->input->post('Info');
			$namaChecklist = $this->input->post('NamaChecklist');
			$jam = $this->input->post('Jam');

			$data = array(
				'JenisChecklist' => $jenisChecklist,
				'Info' => $info,
				'NamaChecklist' => $namaChecklist,
				'Jam' => $jam
			);

			$data['pic'] = $this->mAdmin->editChecklist('checklist', $data, $IDChecklist);

			echo "<script type='text/javascript'>
						alert('Sukses Mengedit Checklist');
						window.location.href = '" . base_url() . "admin/checklist';
					</script>";
		}
	}

	public function lihatInfoChecklist($IDChecklist)
	{
		$hasil = $this->mAdmin->getInfoChecklist('checklist', $IDChecklist);
		
		$data['info'] = $hasil['Info'];
		$this->load->view('vAdmin/vTemplate/vHeaderAdmin');
		$this->load->view('checklist/vTampilInfoChecklist', $data);
		$this->load->view('vAdmin/vTemplate/vFooterAdmin');
	}

	public function hapusChecklist()
	{
		
	}
}
