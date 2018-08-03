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
		$no = 0;
		foreach ($data['checklist'] as $checklist ) {
			
			//Menyimpan PIC Pengganti jika ada
			if ($checklist['NIKP'] == '0') {
				$picPengganti[$no]['NIKP'] = '0';
				$picPengganti[$no]['NamaP'] = '0';	
			}
			else{
				$picP = $this->mPIC->getDaftarPIC($checklist['NIKP']);
				// var_dump($picP)
				$picPengganti[$no]['NIKP'] = $checklist['NIKP'];
				$picPengganti[$no]['NamaP'] = $picP['NamaPIC'];	
			}
			$no = $no+1; //Akhir Menyimpan pengganti

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
		$data['picPengganti'] = $picPengganti;
		// $data['nomor'] = $nJumlah;
		$this->load->view('vPIC/vTemplate/vHeaderPIC', $data);
		$this->load->view('vPIC/vLihatChecklist');
		$this->load->view('vPIC/vTemplate/vFooterPIC');
	}

	public function jChecklist()
	{
		$data = $this->mPIC->getChecklist();
		header("Content-type:application/json");
		echo json_encode($data);
	}

	public function doChecklist()
	{
		// // header("Content-type:application/json");
		// // $data['log']= $this->mAdmin->getLog();
		// // echo json_encode($data);

		date_default_timezone_set('Asia/Jakarta');

		$NIK = $this->input->post('NIK');
		$IDChecklist = $this->input->post('IDChecklist');
		$namaPIC = $this->input->post('NamaPIC');
		$namaChecklist = $this->input->post('NamaChecklist');
		$namaPICSebenarnya = $this->input->post('NamaPICSebenarnya');
		$jam = $this->input->post('Jam');
		$info = $this->input->post('Info');
		$status = $this->input->post('Status');
		$keterangan = $this->input->post('Keterangan');
		$hari = $this->input->post('Hari');

		$lihat = array(
			'Hari' => $hari,
			'Jam' => $jam,
			'NamaChecklist' => $namaChecklist
		);

		$lihatData = $this->mPIC->lihatDataLog('log', $lihat);
		if ($lihatData != NULL) {
			$tanggal = date("Y-m-d");
			if (count($lihatData)== 1) {
				// echo $tanggal;
				// echo substr($lihatData[0]['Waktu'],0,10);
				if ($tanggal != substr($lihatData[0]['Waktu'],0,10)) {
					$data = array(
						'NamaPIC' => $namaPIC,
						'NamaChecklist' => $namaChecklist,
						'PICCek' => $namaPICSebenarnya,
						'Jam' => $jam,
						'Info' => $info,
						'Status' => $status,
						'Keterangan' => $keterangan,
						'Hari' => $hari
					);
					$hasil = $this->mPIC->doChecklist('log', $data);
					//mengubah status checklist menjadi 1 supaya tidak bisa mengecek ulang
					$this->mPIC->ubahStatusCheck($IDChecklist, "1");
					// echo "JIKA DISINI MAKA DATANYA == 1 DAN DATANYA GA KEMBAR";
				}
			}
			else{
				$jumlah = 0;
				foreach ($lihatData as $data) {
					if ($tanggal == substr($lihatData[0]['Waktu'],0,10)) {
						$jumlah = $jumlah + 1;
					}
				}
				if ($jumlah == 0) {
					$data = array(
						'NamaPIC' => $namaPIC,
						'NamaChecklist' => $namaChecklist,
						'PICCek' => $namaPICSebenarnya,
						'Jam' => $jam,
						'Info' => $info,
						'Status' => $status,
						'Keterangan' => $keterangan,
						'Hari' => $hari
					);
					$hasil = $this->mPIC->doChecklist('log', $data);
					//mengubah status checklist menjadi 1 supaya tidak bisa mengecek ulang
					$this->mPIC->ubahStatusCheck($IDChecklist, "1");
				}
				// echo "DATA LEBIH DARI 1, MAKA DATA AKAN DI CEK APAKAH ADA YANG SAMA";
			}
		}
		else{
			$data = array(
				'NamaPIC' => $namaPIC,
				'NamaChecklist' => $namaChecklist,
				'PICCek' => $namaPICSebenarnya,
				'Jam' => $jam,
				'Info' => $info,
				'Status' => $status,
				'Keterangan' => $keterangan,
				'Hari' => $hari
			);
			$hasil = $this->mPIC->doChecklist('log', $data);
			//mengubah status checklist menjadi 1 supaya tidak bisa mengecek ulang
			$this->mPIC->ubahStatusCheck($IDChecklist, "1");
			echo "NULL COY";
		}
		
		// Menyimpan di notifikasi
		$notif = array(
			'ForN' => 'admin',
			'Waktu' => date("l, d-m-Y h:i:s a"),
			'Isi' => $namaPICSebenarnya .' telah mengecek ' . $namaChecklist,
			'Status' => 'Belum'
		);
		$this->mPIC->notifikasi('notifikasi', $notif);

		//Menambahkan jumlah pengecekan pada PIC
		$this->mPIC->tambahJumlah($NIK);

		echo "<script type='text/javascript'>
		alert('Sukses Melakukan Pengecekan.');
		window.location.href = '" . base_url() . "pic/checklist';
		</script>";
	}

	public function noChecklist()
	{
		// // header("Content-type:application/json");
		// // $data['log']= $this->mAdmin->getLog();
		// // echo json_encode($data);
		$statusCheck = $this->input->post('statusCheck');
		if ($statusCheck != '2') {
			date_default_timezone_set('Asia/Jakarta');

			$NIK = "-";
			$IDChecklist = $this->input->post('IDChecklist');
			$namaPIC = "-";
			$namaChecklist = $this->input->post('NamaChecklist');
			$namaPICSebenarnya = "-";
			$jam = $this->input->post('Jam');
			$info = $this->input->post('Info');
			$status = "Not Checked";
			$keterangan = "-";
			$hari = $this->input->post('Hari');

			$lihat = array(
				'Hari' => $hari,
				'Jam' => $jam,
				'NamaChecklist' => $namaChecklist
			);

			$lihatData = $this->mPIC->lihatDataLog('log', $lihat);
			
			if ($lihatData != NULL) {
				$tanggal = date("Y-m-d");
				if (count($lihatData)== 1) {
				// echo $tanggal;
				// echo substr($lihatData[0]['Waktu'],0,10);
					if ($tanggal != substr($lihatData[0]['Waktu'],0,10)) {
						$data = array(
							'NamaPIC' => $namaPIC,
							'NamaChecklist' => $namaChecklist,
							'PICCek' => $namaPICSebenarnya,
							'Jam' => $jam,
							'Info' => $info,
							'Status' => $status,
							'Keterangan' => $keterangan,
							'Hari' => $hari
						);
						$hasil = $this->mPIC->doChecklist('log', $data);
					// echo "JIKA DISINI MAKA DATANYA == 1 DAN DATANYA GA KEMBAR";
					}
				}
				else{
					$jumlah = 0;
					foreach ($lihatData as $data) {
						if ($tanggal == substr($lihatData[0]['Waktu'],0,10)) {
							$jumlah = $jumlah + 1;
						}
					}
					if ($jumlah == 0) {
						$data = array(
							'NamaPIC' => $namaPIC,
							'NamaChecklist' => $namaChecklist,
							'PICCek' => $namaPICSebenarnya,
							'Jam' => $jam,
							'Info' => $info,
							'Status' => $status,
							'Keterangan' => $keterangan,
							'Hari' => $hari
						);
						$hasil = $this->mPIC->doChecklist('log', $data);
						
					}
				// echo "DATA LEBIH DARI 1, MAKA DATA AKAN DI CEK APAKAH ADA YANG SAMA";
				}
			}
			else{
				$data = array(
					'NamaPIC' => $namaPIC,
					'NamaChecklist' => $namaChecklist,
					'PICCek' => $namaPICSebenarnya,
					'Jam' => $jam,
					'Info' => $info,
					'Status' => $status,
					'Keterangan' => $keterangan,
					'Hari' => $hari
				);
				$hasil = $this->mPIC->doChecklist('log', $data);

				// echo "NULL COY";
			}

			//mengubah status checklist menjadi 2 supaya tidak bisa mengecek ulang
			$this->mPIC->ubahStatusCheck($IDChecklist, "2");

			//Menyimpan di notifikasi
			$notif = array(
				'ForN' => 'admin',
				'Waktu' => date("l, d-m-Y h:i:s a"),
				'Isi' => $namaChecklist. "Tidak Dicek",
				'Status' => 'Belum'
			);
			$this->mPIC->notifikasi('notifikasi', $notif);

			echo "2";
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
		$NIK = $this->input->post('NIK');
		$data['pic'] = $this->mPIC->ubahPassword('pic', $NIK);

		$this->load->view('vPIC/vTemplate/vHeaderPIC', $data);
		$this->load->view('vPIC/vUbahPassword');
		$this->load->view('vPIC/vTemplate/vFooterPIC');
	}

	public function validasiUbahPassword(){
		$NIK = $this->input->post('NIK');
		$password = $this->input->post('password');
		$data = array(
			'password' => md5($password)
		);
		$this->mPIC->validasiUbahPassword('pic', $data, $NIK);

		echo "<script type='text/javascript'>
		alert('Sukses Mengubah Password');
		window.location.href = '" . base_url() . "pic/beranda';
		</script>";
	}
}
