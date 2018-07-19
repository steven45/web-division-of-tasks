<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cPIC extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mPIC');
		$this->load->helper('url_helper');
		$this->load->library('session');

		date_default_timezone_set("Asia/Bangkok");
	}

	public function index()
	{
		$this->load->view('vPIC/vHomePIC');
		$this->load->view('vPIC/vFooterHomePIC');
	}

	public function validation()
	{
		$NIK = $this->input->post('NIK');
		$password = md5($this->input->post('Password'));

		$cek = $this->mPIC->getPIC($NIK, $password);

		if($cek !=NULL){
			$data_session = array(
				'NamaPIC' => $cek['NamaPIC'],
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

	public function keluar()
	{
		session_destroy();
		redirect(base_url("pic"));
	}

	public function lihatLog()
	{
		// // header("Content-type:application/json");
		$data['judul'] = "Beranda PIC";
		$data['judul'] = "Log Checklist";
		$data['log']= $this->mPIC->getLog();
		// // $data['log']= $this->mAdmin->getLog();

		// // echo json_encode($data);
		$this->load->view('vPIC/vTemplate/vHeaderPIC', $data);
		$this->load->view('vPIC/vBerandaPIC');
		$this->load->view('vPIC/vTemplate/vFooterPIC');
	}

	public function lihatChecklist($status = NULL)
	{
		// // header("Content-type:application/json");
		// // $data['log']= $this->mAdmin->getLog();
		// // echo json_encode($data);

		$data['judul'] = "Checklist";
		$data['checklist'] = $this->mPIC->getChecklist();

		// var_dump($data['checklist']);
		$data['status'] = $status;
		if ($data['status'] == NULL) {
			$data['status'] = 'Enabled';
		}

		$date = date("N");
		switch ($date) {
			case '1':
				$hari = 'Senin';
				break;
			case '2':
				$hari = 'Selasa';
				break;
			case '3':
				$hari = 'Rabu';
				break;
			case '4':
				$hari = 'Kamis';
				break;
			case '5':
				$hari = 'Jumat';
				break;
			break;
			case '6':
				$hari = 'Sabtu';
				break;
			break;
			case '7':
				$hari = 'Minggu';
				break;
			break;
		}
		$data['hari'] = $hari;

		// Menyimpan Nomor Per Hari
		foreach ($data['checklist'] as $checklist) {
			$nJumlah[$checklist['Hari']] = 0;
		}
		$key = array_keys($nJumlah);
		foreach ($data['checklist'] as $checklist ) {
			for ($i=0; $i < count($key); $i++) { 
				if ($checklist['Hari'] == $key[$i]) {
					$nJumlah[$checklist['Hari']] = $nJumlah[$checklist['Hari']] +1;
				}
			}	
		}

		$temp = 0;
		foreach ($nJumlah as $jumlah) {
			for ($i=1; $i <= $jumlah; $i++) { 
				$nomor[$temp] = $i;
				$temp = $temp +1;
			}
		}

		$data['nomor'] = $nomor;
		// $data['nomor'] = $nJumlah;
		$this->load->view('vPIC/vTemplate/vHeaderPIC', $data);
		$this->load->view('vPIC/vLihatChecklist');
		$this->load->view('vPIC/vTemplate/vFooterPIC');
	}

	public function doChecklist()
	{
		// // header("Content-type:application/json");
		// // $data['log']= $this->mAdmin->getLog();
		// // echo json_encode($data);

		date_default_timezone_set('Asia/Jakarta');

		$IDChecklist = $this->input->post('IDChecklist');
		$namaPIC = $this->input->post('NamaPIC');
		$namaChecklist = $this->input->post('NamaChecklist');
		$namaChecklistSebenarnya = $this->input->post('NamaChecklistSebenarnya');
		$jam = $this->input->post('Jam');
		$info = $this->input->post('Info');
		$status = $this->input->post('Status');
		$keterangan = $this->input->post('Keterangan');
		$hari = $this->input->post('Hari');

		$data = array(
			'NamaPIC' => $namaPIC,
			'NamaChecklist' => $namaChecklist,
			'PICCek' => $namaChecklistSebenarnya,
			'Jam' => $jam,
			'Info' => $info,
			'Status' => $status,
			'Keterangan' => $keterangan,
			'Hari' => $hari
		);
		$hasil = $this->mPIC->doChecklist('log', $data);

		// var_dump($IDChecklist);
		$this->mPIC->ubahStatusCheck($IDChecklist);
		$notif = array(
			'ForN' => 'admin',
			'Waktu' => date("l, d-m-Y h:i:s a"),
			'Isi' => $namaChecklistSebenarnya .' telah mengecek ' . $namaChecklist,
			'Status' => 'Belum'
		);
		$this->mPIC->notifikasi('notifikasi', $notif);

		if ($hasil == 1) {
			echo "<script type='text/javascript'>
					alert('Sukses Melakukan Pengecekan.');
					window.location.href = '" . base_url() . "pic/checklist';
				</script>";
		}
		else{
			echo "<script type='text/javascript'>
					alert('Sukses Mengupdate Pengecekan. ');
					window.location.href = '" . base_url() . "pic/checklist';
				</script>";
		}
	}

	public function daftarPIC()
	{
		$data['judul'] = "Daftar PIC";
		$data['pic'] = $this->mPIC->getDaftarPIC();

		// header("Content-type:application/json");
		// echo json_encode($data);
		$this->load->view('vPIC/vTemplate/vHeaderPIC', $data);
		$this->load->view('vPIC/vLihatPIC');
		$this->load->view('vPIC/vTemplate/vFooterPIC');

	}

	
	public function lihatAbsensi()
	{
		$data['judul'] = "Lihat Absensi";
		$data['absensi'] = $this->mPIC->getAbsensiPIC();


		$this->load->view('vPIC/vTemplate/vHeaderPIC', $data);
		$this->load->view('vPIC/vAbsensiPIC');
		$this->load->view('vPIC/vTemplate/vFooterPIC');
	}


	public function ranking()
	{
		$data['judul'] = "Ranking PIC";
		$this->load->view('vPIC/vTemplate/vHeaderPIC', $data);
		$this->load->view('vPIC/vRankingPIC');
		$this->load->view('vPIC/vTemplate/vFooterPIC');
	}
	public function ubahPassword(){
		$data['judul'] = "Ubah Password";
		$this->load->view('vPIC/vTemplate/vHeaderPIC', $data);
		$this->load->view('vPIC/vUbahPassword');
		$this->load->view('vPIC/vTemplate/vFooterPIC');
	}
}
