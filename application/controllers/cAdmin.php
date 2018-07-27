<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cAdmin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mAdmin');
		$this->load->helper('url_helper');
		$this->load->library('session');
		date_default_timezone_set("Asia/Bangkok");
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

		$data['judul'] = "Beranda Admin";
		$data['active'] = "active";
		$this->load->view('vAdmin/vTemplate/vHeaderAdmin', $data);
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

		$data = array(
			'NIK' => $NIK,
			'NamaPIC' => $namaPIC,
			'Divisi' => $divisi,
			'Password' => md5($password),
			'Jabatan' => $jabatan,
			'TahunMasuk' => $tahunMasuk,
			'JumlahPengecekan' => 0,
			'Status' => 'Enabled'
		);

		$query = $this->mAdmin->tambahPIC('pic', $data, $NIK);

		if ($jabatan == "Chief Leader") {
			$dataA = array(
				'Username' => $NIK,
				'Password' => md5($password)
			);

			$this->mAdmin->tambahAdmin('admin', $dataA, $NIK);
		}

		if ($query == 1) 
		{
			echo "<script type='text/javascript'>
			alert('Sukses Menambahkan PIC');
			window.location.href = '" . base_url() . "admin/pic';
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
		$data['judul'] = "Tambah PIC";
		$this->load->view('vAdmin/vTemplate/vHeaderAdmin', $data);
		$this->load->view('vAdmin/vTambahPIC');
		$this->load->view('vAdmin/vTemplate/vFooterAdmin');
	}

	public function lihatPIC($status = NULL)
	{
		if (!isset($_SESSION['nama'])) {
			redirect(base_url("admin"));
		}

		$data['status'] = $status;
		if ($data['status'] == NULL) {
			$data['status'] = 'Enabled';
		}

		$data['judul'] = "Daftar PIC";
		$data['pic'] = $this->mAdmin->getPIC();
		$this->load->view('vAdmin/vTemplate/vHeaderAdmin', $data);
		$this->load->view('vAdmin/vLihatPIC', $data);
		$this->load->view('vAdmin/vTemplate/vFooterAdmin');
	}

	public function editPIC($NIK = NULL)
	{
		$data['judul'] = "Edit PIC";

		$data['pic'] = $this->mAdmin->getPIC($NIK);
		$this->load->view('vAdmin/vTemplate/vHeaderAdmin', $data);
		$this->load->view('vAdmin/vEditPIC', $data);
		$this->load->view('vAdmin/vTemplate/vFooterAdmin');
	}

	public function validasiEditPIC()
	{
		$NIK = $this->input->post('NIK');
		$namaPIC = $this->input->post('NamaPIC');
		$divisi = $this->input->post('Divisi');
		$jabatan = $this->input->post('Jabatan');
		$tahunMasuk = $this->input->post('TahunMasuk');
		$jumlahPengecekan = $this->input->post('JumlahPengecekan');

		$data = array(
			'NIK' => $NIK,
			'NamaPIC' => $namaPIC,
			'Divisi' => $divisi,
			'Jabatan' => $jabatan,
			'TahunMasuk' => $tahunMasuk
		);

		$data['pic'] = $this->mAdmin->editPIC('pic', $data, $NIK);

		echo "<script type='text/javascript'>
		alert('Sukses Mengedit PIC');
		window.location.href = '" . base_url() . "admin/pic';
		</script>";
	}

	public function hapusPIC()
	{
		$nEnabled = $this->input->post('nEnabled');
		$nDisabled = $this->input->post('nDisabled');
		$nJumlah = $this->input->post('nJumlah');

		for ($i=0; $i < $nJumlah; $i++) { 
			$id[$i] = 'NIK'.$i;
			$nStatus[$i] = 'status'.$i;

		}

		for ($i=0; $i < $nJumlah; $i++) { 
			$NIK = $this->input->post($id[$i]);
			$status = $this->input->post($nStatus[$i]);

			$data = array(
				'Status' => $status
			);
			if ($NIK != NULL AND $status != NULL) {
				$query = $this->mAdmin->hapusPIC('pic',$NIK, $data);
			}
		}	

		// $NIK = $this->input->post('NIK');
		// $data = array(
		// 	'Status' => 'Disabled'
		// );
		// $this->mAdmin->hapusPIC('pic', $data, $NIK);	
		echo "<script type='text/javascript'>
		alert('Sukses Menyimpan Status PIC ');
		window.location.href = '" . base_url() . "admin/pic';
		</script>";
	}

	public function tambahChecklist()
	{
		$data['judul'] = "Tambah Checklist";
		$this->load->view('vAdmin/vTemplate/vHeaderAdmin', $data);
		$this->load->view('vAdmin/vTambahChecklist');
		$this->load->view('vAdmin/vTemplate/vFooterAdmin');
	}

	public function validasiTambahChecklist()
	{
		date_default_timezone_set('Asia/Jakarta');
		$NIK = $this->input->post('NIK');
		$namaChecklist = $this->input->post('NamaChecklist');
		$jam = $this->input->post('Jam');
		$jam1 = $this->input->post('Jam1');
		$batasPengecekan = $this->input->post('BatasPengecekan');

		$hari = array('Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu');
		if ($jam == "Setiap Jam") {
			//Menyimpan target direktori
			$target_dir = "assets/Checklist/";
			$target_file = $target_dir .date('YmdHis').'_'. basename($_FILES["Info"]["name"]);

			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			if ($imageFileType != 'txt') {
				echo "<script type='text/javascript'>

				alert('File yang anda masukkan bukan txt!!!');
				window.location.href = '" . base_url() . "admin/tambahchecklist';
				</script>";
			}

			move_uploaded_file($_FILES["Info"]["tmp_name"], $target_file);
			for ($j=0; $j < 7; $j++) { 
				for ($i=0; $i < 24 ; $i++) { 
					if ($i < 10) {
						$nJam = "0".$i.":00";
					}
					else{
						$nJam = $i.":00";
					}

					$data = array(
						'NIK' => '123456',
						'Hari' => $hari[$j],
						'Info' => $target_file,
						'NamaChecklist' => $namaChecklist,
						'Jam' => $nJam,
						'Status' => 'Enabled',
						'BatasPengecekan' => $batasPengecekan,
						'StatusCheck' => '0'
					);

					$hasil = $this->mAdmin->tambahChecklist('checklist', $data, $namaChecklist, $i, $hari[$j]);
					$hasilJam[$i] = $hasil;		
				}
			}
		}
		elseif ($jam == "Lainnya") {
			if ($jam1 == "") {
				echo "<script type='text/javascript'>
				alert('Jika memilih lainnya maka jam harus diisi.');
				window.location.href = '" . base_url() . "admin/tambahchecklist';
				</script>";
			}
			else{
				$nJam = str_replace(",","",$jam1);
				$nJam = explode(" ",$nJam);
				//Menyimpan target direktori
				$target_dir = "assets/Checklist/";
				$target_file = $target_dir .date('Ymdhis').'_'. basename($_FILES["Info"]["name"]);

				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				if ($imageFileType != 'txt') {
					echo "<script type='text/javascript'>

					alert('File yang anda masukkan bukan txt!!!');
					window.location.href = '" . base_url() . "admin/tambahchecklist';
					</script>";
				}

				move_uploaded_file($_FILES["Info"]["tmp_name"], $target_file);

				for ($j=0; $j < 7; $j++) { 
					for ($i=0; $i < count($nJam); $i++) { 
						$data = array(
							'NIK' => '123456',
							'Hari' => $hari[$j],
							'Info' => $target_file,
							'NamaChecklist' => $namaChecklist,
							'Jam' => $nJam[$i],
							'Status' => 'Enabled',
							'BatasPengecekan' => $batasPengecekan,
							'StatusCheck' => '0'
						);
						$hasil = $this->mAdmin->tambahChecklist('checklist', $data, $namaChecklist, substr($nJam[$i], 0,2), $hari[$j]);
						$hasilJam[$i] = $hasil;
					}
				}
			}
		}
		$tampil1 = "";
		$tampil2 = "";
		for ($i=0; $i < count($hasilJam); $i++) { 
			if (substr($hasilJam[$i], 0,1) == "_") {
				$tampil1= $tampil1." ".str_replace("_","",$hasilJam[$i]); 
			}
			else{
				$tampil2 = $tampil2." ".$hasilJam[$i];
			}
		}

		if ($tampil1 == "") {
			echo "<script type='text/javascript'>
			alert('Jam $tampil2 sudah ada.');
			window.location.href = '" . base_url() . "admin/checklist';
			</script>";
		}
		elseif ($tampil2 == "") {
			echo "<script type='text/javascript'>
			alert('Jam $tampil1 sukses ditambahkan.');
			window.location.href = '" . base_url() . "admin/checklist';
			</script>";
		}
		else{
			echo "<script type='text/javascript'>
			alert('Jam $tampil2 sudah ada. Jam $tampil1 sukses ditambahkan');
			window.location.href = '" . base_url() . "admin/checklist';
			</script>";
		}
	}

	public function lihatChecklist($status = NULL)
	{
		$data['judul'] = "Lihat Checklist";
		$data['checklist']= $this->mAdmin->getChecklist();
		$data['absensi'] = $this->mAdmin->getAbsensi();

		// header("Content-type:application/json");
		// echo json_encode($data['checklist']);

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

		$data['nomor'] = $nomor; //Akhir Menyimpan Nomor

		//Menampilkan select pergantian PIC sesuai dengan jadwal
		$pic = NULL;
		$picPengganti = NULL;
		$no = 0;
		foreach ($data['checklist'] as $checklist) {
			if ($checklist['NIKP'] == '0') {
				$picPengganti[$no]['NIKP'] = '0';
				$picPengganti[$no]['NamaP'] = '0';	
			}
			else{
				$picP = $this->mAdmin->getPIC($checklist['NIKP']);
				// var_dump($picP)
				$picPengganti[$no]['NIKP'] = $checklist['NIKP'];
				$picPengganti[$no]['NamaP'] = $picP['NamaPIC'];	
			}
			$no = $no+1;
			$temp = 0;
			foreach ($data['absensi'] as $absensi) {
				if ($absensi['Shift'] == '3') {
					$hariNext = NULL;
					switch ($absensi['Hari']) {
						case 'Senin':
						$hariNext = 'Selasa';
						break;
						case 'Selasa':
						$hariNext = 'Rabu';
						break;
						case 'Rabu':
						$hariNext = 'Kamis';
						break;
						case 'Kamis':
						$hariNext = 'Jumat';
						break;
						case 'Jumat':
						$hariNext = 'Sabtu';
						break;
						case 'Sabtu':
						$hariNext = 'Minggu';
						break;
						case 'Minggu':
						$hariNext = 'Senin';
						break;
					}

					if (( $checklist['Jam']   == '22:00' OR 
						$checklist['Jam']     == '23:00') AND 
						$checklist['Hari']    == $absensi['Hari'] AND 
						$absensi['Kehadiran'] == 'Hadir' AND 
						$absensi['Status']    == 'Enabled') {
						$pic[$checklist['Hari']][$checklist['Jam']][$temp]['NamaPIC'] = $absensi['NamaPIC'];
						$pic[$checklist['Hari']][$checklist['Jam']][$temp]['NIK'] = $absensi['NIK'];
						$temp = $temp+1;
					}
					else if (( $checklist['Jam']   == '00:00' OR 
						$checklist['Jam']     == '01:00'OR 
						$checklist['Jam']     == '02:00'OR 
						$checklist['Jam']     == '03:00'OR 
						$checklist['Jam']     == '04:00'OR 
						$checklist['Jam']     == '05:00'OR 
						$checklist['Jam']     == '06:00') AND 
						$checklist['Hari']    == $hariNext AND 
						$absensi['Kehadiran'] == 'Hadir' AND 
						$absensi['Status']    == 'Enabled') {
						$pic[$checklist['Hari']][$checklist['Jam']][$temp]['NamaPIC'] = $absensi['NamaPIC'];
						$pic[$checklist['Hari']][$checklist['Jam']][$temp]['NIK'] = $absensi['NIK'];
						$temp = $temp+1;
					}
				}
				else{
					if (($checklist['Jam']    == '07:00' OR 
						$checklist['Jam']     == '08:00' OR 
						$checklist['Jam']     == '09:00' OR 
						$checklist['Jam']     == '10:00' OR 
						$checklist['Jam']     == '11:00' OR 
						$checklist['Jam']     == '12:00' OR 
						$checklist['Jam']     == '13:00' OR 
						$checklist['Jam']     == '14:00' OR 
						$checklist['Jam']     == '15:00' OR
						$checklist['Jam']     == '16:00') AND 
						$absensi['Shift']     == '1' AND 
						$checklist['Hari']    == $absensi['Hari'] AND 
						$absensi['Kehadiran'] == 'Hadir' AND 
						$absensi['Status']    == 'Enabled') {
						$pic[$checklist['Hari']][$checklist['Jam']][$temp]['NamaPIC'] = $absensi['NamaPIC'];
						$pic[$checklist['Hari']][$checklist['Jam']][$temp]['NIK'] = $absensi['NIK'];
						$temp = $temp+1;
					}
					else if (($checklist['Jam'] == '13:00' OR 
						$checklist['Jam']     == '14:00' OR 
						$checklist['Jam']     == '15:00' OR 
						$checklist['Jam']     == '16:00' OR 
						$checklist['Jam']     == '17:00' OR 
						$checklist['Jam']     == '18:00' OR 
						$checklist['Jam']     == '19:00' OR 
						$checklist['Jam']     == '20:00'OR 
						$checklist['Jam']     == '21:00') AND 
						$absensi['Shift']     == '2' AND 
						$checklist['Hari']    == $absensi['Hari'] AND 
						$absensi['Kehadiran'] == 'Hadir' AND 
						$absensi['Status']    == 'Enabled') {
						$pic[$checklist['Hari']][$checklist['Jam']][$temp]['NamaPIC'] = $absensi['NamaPIC'];
						$pic[$checklist['Hari']][$checklist['Jam']][$temp]['NIK'] = $absensi['NIK'];
						$temp = $temp+1;
					}
				}
			}
		}
		// header("Content-type:application/json");
		$data['pic'] = $pic; //Akhir Menampilkan select pergantian PIC sesuai dengan jadwal
		$data['picPengganti'] = $picPengganti;
		// echo json_encode($data['picPengganti']);
		$this->load->view('vAdmin/vTemplate/vHeaderAdmin', $data);
		$this->load->view('vAdmin/vLihatChecklist', $data);
		$this->load->view('vAdmin/vTemplate/vFooterAdmin');
	}

	public function editChecklist($IDChecklist = NULL)
	{
		if (!isset($_SESSION['nama'])) {
			redirect(base_url("admin"));
		}

		$IDChecklist = $IDChecklist;
		$data['checklist'] = $this->mAdmin->getChecklist($IDChecklist);
		$data['judul'] = "Edit Checklist";

		$this->load->view('vAdmin/vTemplate/vHeaderAdmin', $data);
		$this->load->view('vAdmin/vEditChecklist', $data);
		$this->load->view('vAdmin/vTemplate/vFooterAdmin');
	}

	public function validasiEditChecklist()
	{

		date_default_timezone_set('Asia/Jakarta');
		$IDChecklist     = $this->input->post('IDChecklist');
		$namaChecklist   = $this->input->post('NamaChecklist');
		$jam             = $this->input->post('Jam');
		$batasPengecekan = $this->input->post('BatasPengecekan');
		$hari = $this->input->post('Hari');

		if (basename($_FILES["Info"]["name"] == NULL)) {
			$data = array(
				'BatasPengecekan' => $batasPengecekan,
				'NamaChecklist'   => $namaChecklist,
				'Jam'             => $jam.':00'
			);
			$data= $this->mAdmin->editChecklist('checklist', $data, $IDChecklist, $namaChecklist, $jam, $batasPengecekan, $hari);
		}
		else{
			$target_dir = "assets/Checklist/";
			$target_file = $target_dir .date('Ymdhis').'_'. basename($_FILES["Info"]["name"]);
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

			if ($imageFileType != 'txt') {
				echo "<script type='text/javascript'>

				alert('File yang anda masukkan bukan txt!!!');
				window.location.href = '" . base_url() . "admin/checklist';
				</script>";
			}
			else{
				$data = array(
					'BatasPengecekan' => $batasPengecekan,
					'Info' => $target_file,
					'NamaChecklist' => $namaChecklist,
					'Jam' => $jam.':00'
				);

				$data= $this->mAdmin->editChecklist('checklist', $data, $IDChecklist, $namaChecklist, $jam, $batasPengecekan, $hari);

				if ($data == 1) {
					move_uploaded_file($_FILES["Info"]["tmp_name"], $target_file);
				}
			}
		}
		
		if ($data == 1) {
			echo "<script type='text/javascript'>
			alert('Sukses Mengedit Checklist');
			window.location.href = '" . base_url() . "admin/checklist';
			</script>";
		}
		else{
			echo "<script type='text/javascript'>
			alert('Jam $jam:00 sudah ada');
			window.location.href = '" . base_url() . "admin/checklist';
			</script>";
		}
		
	}

	public function lihatInfoChecklist($IDChecklist)
	{
		$hasil = $this->mAdmin->getInfoChecklist('checklist', $IDChecklist);
		$data['judul'] = "Info Checklist";
		$data['info'] = $hasil['Info'];
		$this->load->view('vAdmin/vTemplate/vHeaderAdmin', $data);
		$this->load->view('checklist/vTampilInfoChecklist', $data);
		$this->load->view('vAdmin/vTemplate/vFooterAdmin');
	}

	public function gantiChecklist()
	{
		$nJumlah = $this->input->post('nJumlah');
		$checklist= $this->mAdmin->getChecklist();
		// echo count($data['checklist']);
		// echo '<br>';
		// echo $nJumlah;
		for ($i=0; $i < $nJumlah; $i++) { 
			$nNIK[$i] = 'NIK'.$i;
			$id[$i] = 'IDChecklist'.$i;
			$nStatus[$i] = 'Status'.$i;
			// echo $id[$i]. ' '. $nStatus[$i].' '.$nNIK[$i];
			// echo '<div>';
			// echo '<br>';
		}

		for ($i=0; $i < $nJumlah; $i++) { 
			$IDChecklist = $this->input->post($id[$i]);
			$status      = $this->input->post($nStatus[$i]);
			$NIK         = $this->input->post($nNIK[$i]);

			$data = array(
				'Status' => $status,
				'NIK'    => $NIK
			);

			// echo $id[$i]. ' = '. $IDChecklist.'<br> ';
			// echo $nNIK[$i]. ' = '. $NIK.'<br> ';
			// echo $nStatus[$i]. ' = '. $status .'<br> '	;
			// echo '<br>';
			// echo '<br>';

			for ($j=0; $j < count($checklist); $j++) { 
				if ($checklist[$j]['IDChecklist'] == $IDChecklist) {
					if ($checklist[$j]['NIK'] != $NIK AND $IDChecklist != NULL AND $status != NULL AND $NIK != NULL) {
						// echo $checklist[$j]['NIK'].' = '. $NIK;
						// echo '<br>';

						$picS = $this->mAdmin->getPIC($checklist[$j]['NIK']);
						$picP = $this->mAdmin->getPIC($NIK);

						$pengganti = array(
							'IDChecklist' => $IDChecklist,
							'NamaPICS' => $picS['NamaPIC'],
							'NamaPICP' => $picP['NamaPIC']
						);
						$this->mAdmin->penggantiPIC('penggantipic', $pengganti);
						// var_dump($picP);
					}
				}
			}
			// echo '<br>';
			if ($IDChecklist != NULL AND $status != NULL AND $NIK != NULL) {
				$query = $this->mAdmin->gantiChecklist('checklist',$IDChecklist, $data);
			}
		}


		// $IDChecklist = $this->input->post('IDChecklist');
		// $data = array(
		// 	'Status' => 'Disabled'
		// );
		// $this->mAdmin->hapusChecklist('checklist', $data, $IDChecklist);	
		echo "<script type='text/javascript'>
		alert('Sukses mengganti PIC dan Status');
		window.location.href = '" . base_url() . "admin/checklist';
		</script>";
	}

	public function lihatAbsensi()
	{
		$data['judul'] = "Lihat Absensi";
		$data['absensi']= $this->mAdmin->getAbsensi();

		$pic = NULL;
		$temp1 = 0;
		foreach ($data['absensi'] as $absensi) {
			$temp2 = 0;
			foreach ($data['absensi'] as $cek) {
				if ($absensi['Hari'] == $cek['Hari'] AND $absensi['Shift'] == $cek['Shift'] AND $absensi['NIK'] != $cek['NIK']) {
					$pic[$temp1][$temp2]['NIK'] = $cek['NIK'];
					$pic[$temp1][$temp2]['NamaPIC'] = $cek['NamaPIC'];	
					$temp2 = $temp2 +1;
				}
			}
			$temp1 = $temp1 +1;
		}

		// header("Content-type:application/json");
		// echo json_encode($pic);

		$data['pic'] = $pic;
		$this->load->view('vAdmin/vTemplate/vHeaderAdmin', $data);
		$this->load->view('vAdmin/vAbsensiPIC', $data);
		$this->load->view('vAdmin/vTemplate/vFooterAdmin');
	}

	public function tambahAbsensi()
	{
		$data['judul'] = "Tambah Absensi";
		$data['pic'] = $this->mAdmin->getPIC();
		$data['jadwal'] = $this->mAdmin->getJadwal();
		// var_dump($data['pic']);
		$this->load->view('vAdmin/vTemplate/vHeaderAdmin', $data);
		$this->load->view('vAdmin/vTambahAbsensiPIC', $data);
		$this->load->view('vAdmin/vTemplate/vFooterAdmin');
	}

	public function validasiTambahAbsensi()
	{
		$NIK = $this->input->post('NIK');
		$IDJadwal = $this->input->post('IDJadwal');
		$hari = $this->input->post('Hari');

		$data = array(
			'NIK' => $NIK,
			'IDJadwal' => $IDJadwal,
			'Hari' => $hari,
			'kehadiran' => 'Hadir'
		);

		$query = $this->mAdmin->tambahAbsensi('harian', $data, $NIK, $IDJadwal, $hari);

		if ($query == 1) 
		{
			echo "<script type='text/javascript'>
			alert('Sukses Menambahkan Absensi');
			window.location.href = '" . base_url() . "admin/absensi';
			</script>";
		}
		else
		{
			echo "<script type='text/javascript'>

			alert('Absensi sudah ada!!! ');
			window.location.href = '" . base_url() . "admin/tambahabsensi';
			</script>";
		}
	}

	public function hapusAbsensi($IDHarian)
	{
		if (!isset($_SESSION['nama'])) {
			redirect(base_url("admin"));
		}
		$this->mAdmin->hapusAbsensi('harian', $IDHarian);
		echo "<script type='text/javascript'>
		alert('Sukses menghapus absensi ');
		window.location.href = '" . base_url() . "admin/absensi';
		</script>";
	}

	public function editAbsensi($IDHarian= NULL)
	{
		$data['judul'] = 'Edit Absensi';
		$IDHarian = $IDHarian;
		$data['absensi']= $this->mAdmin->getAbsensi($IDHarian);
		$this->load->view('vAdmin/vTemplate/vHeaderAdmin', $data);
		$this->load->view('vAdmin/vEditAbsensiPIC', $data);
		$this->load->view('vAdmin/vTemplate/vFooterAdmin');		
	}

	public function validasiEditAbsensi()
	{
		$IDHarian = $this->input->post('IDHarian');
		$NIK = $this->input->post('NIK');
		$IDJadwal = $this->input->post('IDJadwal');
		$hari = $this->input->post('Hari');

		$data = array(
			'IDJadwal' => $IDJadwal,
			'Hari' => $hari
		);

		$query = $this->mAdmin->editAbsensi('harian',$IDHarian, $data, $NIK, $IDJadwal, $hari);
		if ($query == '1') {
			echo "<script type='text/javascript'>
			alert('Sukses mengedit absensi. ');
			window.location.href = '" . base_url() . "admin/absensi';
			</script>";
		}
		else{
			echo "<script type='text/javascript'>
			alert('Jadwal sudah ada !!!. ');
			window.location.href = '" . base_url() . "admin/absensi';
			</script>";
		}
	}

	public function gantiAbsensi()
	{
		$jumlahAbsensi= $this->input->post('jumlahAbsensi');

		for ($i=0; $i < $jumlahAbsensi; $i++) { 
			$id[$i]    = 'IDHarian'.$i;
			$hadir[$i] = 'Kehadiran'.$i;
			$NIKP[$i]  = 'NIKPengganti'.$i;
			$NIKS[$i]  = 'NIKSebenarnya'.$i;
			// echo $id[$i];
			// echo $hadir[$i];
			// echo $NIKP[$i];
			// echo $NIKS[$i];
			// echo "<br>";
		}

		for ($i=0; $i < $jumlahAbsensi; $i++) { 
			$IDHarian      = $this->input->post($id[$i]);
			$Kehadiran     = $this->input->post($hadir[$i]);
			$NIKPengganti  = $this->input->post($NIKP[$i]);
			$NIKSebenarnya = $this->input->post($NIKS[$i]);

			// header("Content-type:application/json");
			$data['checklist'] = $this->mAdmin->getChecklist();
			// var_dump($data['checklist']);
			// $pic = $this->mAdmin->getPIC($NIKSebenarnya);
			$absensi = $this->mAdmin->getAbsensi($IDHarian);
			// var_dump($absensi);
			// echo json_encode($data);
			$picSebenarnya = $this->mAdmin->getPIC($NIKSebenarnya);
			$picPengganti = $this->mAdmin->getPIC($NIKPengganti);

			// echo $id[$i]." = ".$IDHarian ."<br>";
			// echo $hadir[$i]." = ".$Kehadiran ."<br>";
			// echo $NIKP[$i]." = ".$NIKPengganti ."<br>";
			// echo $NIKS[$i]." = ".$NIKSebenarnya ."<br><br>";
			$temp = 0;
			foreach ($data['checklist'] as $checklist) {
				if ($absensi[0]['Shift']  == '3' AND $NIKPengganti != NULL) {
					$hariNext = NULL;
					switch ($absensi[0]['Hari']) {
						case 'Senin':
						$hariNext = 'Selasa';
						break;
						case 'Selasa':
						$hariNext = 'Rabu';
						break;
						case 'Rabu':
						$hariNext = 'Kamis';
						break;
						case 'Kamis':
						$hariNext = 'Jumat';
						break;
						case 'Jumat':
						$hariNext = 'Sabtu';
						break;
						case 'Sabtu':
						$hariNext = 'Minggu';
						break;
						case 'Minggu':
						$hariNext = 'Senin';
						break;
					}

					if (($checklist['Jam']     == '22:00' OR
						$checklist['Jam']     == '23:00') AND 
						$checklist['NamaPIC'] == $absensi[0]['NamaPIC'] AND 
						$absensi[0]['Hari']   == $checklist['Hari']) {
						if ($Kehadiran == 'Tidak Hadir') {
							$set = array(
								'NIKP' => $NIKPengganti
							);
							$this->mAdmin->gantiChecklist('checklist', $checklist['IDChecklist'], $set);

							$dataPengganti = array(
								'IDChecklist' => $checklist['IDChecklist'],
								'NamaPICS' => $picSebenarnya['NamaPIC'],
								'NamaPICP' => $picPengganti['NamaPIC']
							);
							$this->mAdmin->penggantiPIC('penggantipic', $dataPengganti);
						}
						else {
							$set = array(
								'NIKP' => '0'
							);
							$this->mAdmin->gantiChecklist('checklist', $checklist['IDChecklist'], $set);

							$dataPengganti = array(
								'IDChecklist' => $checklist['IDChecklist'],
								'NamaPICS' => $picPengganti['NamaPIC'],
								'NamaPICP' => $picSebenarnya['NamaPIC']
							);
							$this->mAdmin->penggantiPIC('penggantipic', $dataPengganti);
						}

					}
					else if(($checklist['Jam']     == '00:00' OR
						$checklist['Jam']     == '01:00'OR
						$checklist['Jam']     == '02:00'OR
						$checklist['Jam']     == '03:00'OR
						$checklist['Jam']     == '04:00'OR
						$checklist['Jam']     == '05:00'OR
						$checklist['Jam']     == '06:00') AND 
						$checklist['NamaPIC'] == $absensi[0]['NamaPIC'] AND 
						$hariNext   == $checklist['Hari']){
						if ($Kehadiran == 'Tidak Hadir') {
							$set = array(
								'NIKP' => $NIKPengganti
							);
							$this->mAdmin->gantiChecklist('checklist', $checklist['IDChecklist'], $set);

							$dataPengganti = array(
								'IDChecklist' => $checklist['IDChecklist'],
								'NamaPICS' => $picSebenarnya['NamaPIC'],
								'NamaPICP' => $picPengganti['NamaPIC']
							);
							$this->mAdmin->penggantiPIC('penggantipic', $dataPengganti);
						}
						else {
							$set = array(
								'NIKP' => '0'
							);
							$this->mAdmin->gantiChecklist('checklist', $checklist['IDChecklist'], $set);

							$dataPengganti = array(
								'IDChecklist' => $checklist['IDChecklist'],
								'NamaPICS' => $picPengganti['NamaPIC'],
								'NamaPICP' => $picSebenarnya['NamaPIC']
							);
							$this->mAdmin->penggantiPIC('penggantipic', $dataPengganti);
						}
					}
				}
				else{
					if (($checklist['Jam'] 	  == '07:00' OR
						$checklist['Jam']     == '08:00' OR
						$checklist['Jam']     == '09:00' OR
						$checklist['Jam']     == '10:00' OR
						$checklist['Jam']     == '11:00' OR
						$checklist['Jam']     == '12:00' OR
						$checklist['Jam']     == '13:00' OR
						$checklist['Jam']     == '14:00' OR
						$checklist['Jam']     == '15:00' OR
						$checklist['Jam']     == '16:00') AND 
						$checklist['NamaPIC'] == $absensi[0]['NamaPIC'] AND 
						$absensi[0]['Shift'] == '1' AND 
						$absensi[0]['Hari']   == $checklist['Hari'] AND 
						$NIKPengganti != NULL) {
						if ($Kehadiran == 'Tidak Hadir') {
							$set = array(
								'NIKP' => $NIKPengganti
							);
							$this->mAdmin->gantiChecklist('checklist', $checklist['IDChecklist'], $set);
						}
						else {
							$set = array(
								'NIKP' => '0'
							);
							$this->mAdmin->gantiChecklist('checklist', $checklist['IDChecklist'], $set);
						}
						
					}
					else if(($checklist['Jam'] 	  == '13:00' OR
						$checklist['Jam']     == '14:00' OR
						$checklist['Jam']     == '15:00' OR
						$checklist['Jam']     == '16:00' OR
						$checklist['Jam']     == '17:00' OR
						$checklist['Jam']     == '18:00' OR
						$checklist['Jam']     == '19:00' OR
						$checklist['Jam']     == '20:00' OR
						$checklist['Jam']     == '21:00') AND 
						$checklist['NamaPIC'] == $absensi[0]['NamaPIC'] AND 
						$absensi[0]['Shift'] == '2' AND 
						$absensi[0]['Hari']   == $checklist['Hari'] AND $NIKPengganti != NULL) {
						if ($Kehadiran == 'Tidak Hadir') {
							$set = array(
								'NIKP' => $NIKPengganti
							);
							$this->mAdmin->gantiChecklist('checklist', $checklist['IDChecklist'], $set);
						}
						else {
							$set = array(
								'NIKP' => '0'
							);
							$this->mAdmin->gantiChecklist('checklist', $checklist['IDChecklist'], $set);
						}

					}
				}
				
			}

			// echo $id[$i]. ' = '. $IDHarian;
			// echo "<br>";
			// echo $hadir[$i].' = '. $Kehadiran;
			// echo "<br>";
			// echo $NIKP[$i].' = '. $NIKPengganti;
			// echo "<br>";
			// echo $NIKS[$i].' = '. $NIKSebenarnya;
			// echo "<br>";
			if ($IDHarian != NULL AND $Kehadiran != NULL) {	
				if ($Kehadiran == "Hadir") {
					$data = array(
						'Kehadiran' => $Kehadiran,
						'NIKP' => "0"
					);
					$query = $this->mAdmin->gantiAbsensi('harian',$IDHarian, $data);
					echo "<script type='text/javascript'>
					alert('Sukses menyimpan kehadiran. ');
					window.location.href = '" . base_url() . "admin/absensi';
					</script>";
				}
				else{
					// $data = $this->mAdmin->getChecklist($NIKSebenarnya);
					// header("Content-type:application/json");
					// echo json_encode($data);
					$data = array(
						'Kehadiran' => $Kehadiran,
						'NIKP' => $NIKPengganti
					);
					$query = $this->mAdmin->gantiAbsensi('harian',$IDHarian, $data);
					echo "<script type='text/javascript'>
					alert('Sukses menyimpan kehadiran dan mengganti PIC. ');
					window.location.href = '" . base_url() . "admin/absensi';
					</script>";
				}

			}
		}

	}
	public function notifikasi()
	{
		$data['notifikasi'] = $this->mAdmin->getNotifikasi();
		$temp = 0;
		foreach ($data['notifikasi'] as $notifikasi) {
			if ($notifikasi['Status'] == 'Belum') {
				$temp = $temp +1;
			}
		}
		return $data['temp'] = $temp;
	}

	public function lihatLog()
	{
		// header("Content-type:application/json");
		$data['judul'] = "Log Checklist";
		$data['log']= $this->mAdmin->getLog();
		
		$data['notifikasi'] = $this->mAdmin->getNotifikasi();
		$data['temp'] = $this->notifikasi();
		// echo json_encode($data);
		$this->load->view('vAdmin/vTemplate/vHeaderAdmin', $data);
		$this->load->view('vAdmin/vBerandaAdmin', $data);
		$this->load->view('vAdmin/vTemplate/vFooterAdmin');
	}

	public function lihatLog1()
	{
		// header("Content-type:application/json");
		$data['judul'] = "Log Checklist";
		$data['log']= $this->mAdmin->getLog();
		
		$data['notifikasi'] = $this->mAdmin->getNotifikasi();
		$data['temp'] = $this->notifikasi();
		// echo json_encode($data);
		$this->load->view('vAdmin/vTemplate/vHeaderAdminPIC', $data);
		$this->load->view('vAdmin/vBerandaAdmin', $data);
		$this->load->view('vAdmin/vTemplate/vFooterAdmin');
	}

	public function ranking()
	{
		$data['judul'] = "Ranking PIC";
		$this->load->view('vAdmin/vTemplate/vHeaderAdmin', $data);
		$this->load->view('vAdmin/vRankingPIC');
		$this->load->view('vAdmin/vTemplate/vFooterAdmin');
	}

	public function pergantian()
	{
		$data['judul'] = "Pergantian PIC";

		$data['penggantiPIC'] = $this->mAdmin->getPenggantiPIC();
		// var_dump($data['penggantiPIC']);
		$this->load->view('vAdmin/vTemplate/vHeaderAdmin', $data);
		$this->load->view('vAdmin/vPergantianPIC');
		$this->load->view('vAdmin/vTemplate/vFooterAdmin');
	}

	public function ubahPassword(){
		$data['judul'] = "Ubah Password";
		$this->load->view('vAdmin/vTemplate/vHeaderAdmin', $data);
		$this->load->view('vAdmin/vUbahPassword');
		$this->load->view('vAdmin/vTemplate/vFooterAdmin');
	}
}