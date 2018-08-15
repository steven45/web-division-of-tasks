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
		$tingkatPengecekan = $this->input->post('TingkatPengecekan');

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

				for ($i=0; $i < 24 ; $i++) { 
					if ($i < 10) {
						$nJam = "0".$i.":00";
					}
					else{
						$nJam = $i.":00";
					}

					$data = array(
						'Info' => $target_file,
						'NamaChecklist' => $namaChecklist,
						'Jam' => $nJam,
						'Status' => 'Enabled',
						'BatasPengecekan' => $batasPengecekan,
						'TingkatPengecekan' => $tingkatPengecekan
					);

					$hasil = $this->mAdmin->tambahChecklist('checklist', $data, $namaChecklist, $i);
					$hasilJam[$i] = $hasil;		
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
				$nJam = str_replace(" ","",$jam1);
				$nJam = explode(",",$nJam);
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

					for ($i=0; $i < count($nJam); $i++) { 
						$data = array(
							'Info' => $target_file,
							'NamaChecklist' => $namaChecklist,
							'Jam' => $nJam[$i],
							'Status' => 'Enabled',
							'BatasPengecekan' => $batasPengecekan,
							'TingkatPengecekan' => $tingkatPengecekan
						);
						$hasil = $this->mAdmin->tambahChecklist('checklist', $data, $namaChecklist, substr($nJam[$i], 0,2));
						$hasilJam[$i] = $hasil;
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
		$data['judul'] = "List Checklist";
		$data['checklist']= $this->mAdmin->getChecklist();

		$data['status'] = $status;
		if ($data['status'] == NULL) {
			$data['status'] = 'Enabled';
		}
		$this->load->view('vAdmin/vTemplate/vHeaderAdmin', $data);
		$this->load->view('vAdmin/vLihatChecklist', $data);
		$this->load->view('vAdmin/vTemplate/vFooterAdmin');
	}

	public function lihatJChecklist($status = NULL)
	{
		$tanggal = $this->input->post('tanggal');

		if ($tanggal == NULL) {
			$tanggal = date('20y-m-d');
		}

		$daftar_hari = array(
			'Sunday'    => 'Minggu',
			'Monday'    => 'Senin',
			'Tuesday'   => 'Selasa',
			'Wednesday' => 'Rabu',
			'Thursday'  => 'Kamis',
			'Friday'    => 'Jumat',
			'Saturday'  => 'Sabtu'
		);
		$namahari = date('l', strtotime($tanggal));

		$data['tanggal'] = $tanggal;
		$tanggal = $daftar_hari[$namahari].', '.$tanggal;
		$data['judul'] = "Lihat Checklist";
		$data['checklist']= $this->mAdmin->getJChecklist($tanggal);
		$data['pic'] = $this->mAdmin->getPIC();

		for ($i=0; $i < count($data['checklist']); $i++) { 
			if ($data['checklist'][$i]['NIKP'] != '0' AND $data['checklist'][$i]['NIKP'] != NULL) {
				$picP = $this->mAdmin->getPIC($data['checklist'][$i]['NIKP']);
				$data['picP'][$i]['NamaPIC'] = $picP['NamaPIC'];
				$data['picP'][$i]['NIK'] = $data['checklist'][$i]['NIKP'];
			}
			else{
				$data['picP'][$i]['NamaPIC'] = '0';
				$data['picP'][$i]['NIK'] = '0';
			}
		}
		// var_dump($data['picP']);
		$this->load->view('vAdmin/vTemplate/vHeaderAdmin', $data);
		$this->load->view('vAdmin/vJLihatChecklist', $data);
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
		$tingkatPengecekan = $this->input->post('TingkatPengecekan');

		if (basename($_FILES["Info"]["name"] == NULL)) {
			$data = array(
				'BatasPengecekan' => $batasPengecekan,
				'NamaChecklist'   => $namaChecklist,
				'TingkatPengecekan' => $tingkatPengecekan,
				'Jam'             => $jam.':00'
			);
			$data= $this->mAdmin->editChecklist('checklist', $data, $IDChecklist, $namaChecklist, ($jam.':00'));
		}
		else{
			$target_dir = "assets/Checklist/";
			$target_file = $target_dir .date('Ymdhis').'_'. basename($_FILES["Info"]["name"]);
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

			if ($imageFileType != 'txt') {
				echo "<script type='text/javascript'>

				alert('File yang anda masukkan bukan .txt!');
				window.location.href = '" . base_url() . "admin/checklist';
				</script>";
			}
			else{
				$data = array(
					'BatasPengecekan' => $batasPengecekan,
					'Info' => $target_file,
					'NamaChecklist' => $namaChecklist,
					'TingkatPengecekan' => $tingkatPengecekan,
					'Jam' => $jam.':00'
				);

				$data= $this->mAdmin->editChecklist('checklist', $data, $IDChecklist, $namaChecklist, $jam, $batasPengecekan);

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
			$id[$i] = 'IDChecklist'.$i;
			$nStatus[$i] = 'Status'.$i;
			// echo $id[$i]. ' '. $nStatus[$i].' '.$nNIK[$i];
			// echo '<div>';
			// echo '<br>';
		}

		for ($i=0; $i < $nJumlah; $i++) { 
			$IDChecklist = $this->input->post($id[$i]);
			$status      = $this->input->post($nStatus[$i]);

			$data = array(
				'Status' => $status
			);

			if ($IDChecklist != NULL AND $status != NULL) {
				$query = $this->mAdmin->gantiChecklist('checklist',$IDChecklist, $data);
			}
		}


		echo "<script type='text/javascript'>
		alert('Sukses mengganti Status');
		window.location.href = '" . base_url() . "admin/checklist';
		</script>";
	}

	public function gantiJChecklist()
	{
		$nJumlah = $this->input->post('nJumlah');
		// echo count($data['checklist']);
		// echo '<br>';
		// echo $nJumlah;
		for ($i=0; $i < $nJumlah; $i++) { 
			$nNIK[$i] = 'NIK'.$i;
			$nNIKP[$i] = 'NIKP'.$i;
			$id[$i] = 'IDChecklist'.$i;
			$idJ[$i] = 'IDJadwalChecklist'.$i;
			// echo $id[$i]. ' '. $nStatus[$i].' '.$nNIK[$i];
			// echo '<div>';
			// echo '<br>';
		}

		for ($i=0; $i < $nJumlah; $i++) { 
			$IDChecklist = $this->input->post($id[$i]);
			$IDJadwalChecklist = $this->input->post($idJ[$i]);
			$NIK         = $this->input->post($nNIK[$i]);
			$NIKP 		 = $this->input->post($nNIKP[$i]);
			$data = array(
				'NIKP'    => $NIKP
			);

			// echo $id[$i]. ' = '. $IDChecklist.'<br> ';
			// echo $idJ[$i]. ' = '. $IDJadwalChecklist.'<br> ';
			// echo $nNIK[$i]. ' = '. $NIK.'<br> ';
			// echo $nNIKP[$i]. ' = '. $NIKP.'<br> ';
			// echo '<br>';
			// echo '<br>';

			if ($IDChecklist != NULL AND $NIK != NULL AND $NIKP != NULL) {
				if ($NIK != $NIKP) {
					$picS = $this->mAdmin->getPIC($NIK);
					$picP = $this->mAdmin->getPIC($NIKP);

					$pengganti = array(
						'IDChecklist' => $IDChecklist,
						'IDJadwalChecklist' => $IDJadwalChecklist,
						'NamaPICS' => $picS['NamaPIC'],
						'NamaPICP' => $picP['NamaPIC']
					);
					$this->mAdmin->penggantiPIC('penggantipic', $pengganti);
					$query = $this->mAdmin->gantiJChecklist('jchecklist',$IDJadwalChecklist, $data);
				}
				else{
					$data = array(
						'NIKP'    => '0'
					);
					$query = $this->mAdmin->gantiJChecklist('jchecklist',$IDJadwalChecklist, $data);
				}
			}
		}
	
		echo "<script type='text/javascript'>
		alert('Sukses mengganti PIC');
		window.location.href = '" . base_url() . "admin/jchecklist';
		</script>";
	}

	public function lihatAbsensi()
	{
		$data['judul'] = "Lihat Absensi";
		$tanggal = $this->input->post('tanggal');
		if ($tanggal == NULL) {
			$tanggal = date('20y-m-d');
		}

		$daftar_hari = array(
			'Sunday'    => 'Minggu',
			'Monday'    => 'Senin',
			'Tuesday'   => 'Selasa',
			'Wednesday' => 'Rabu',
			'Thursday'  => 'Kamis',
			'Friday'    => 'Jumat',
			'Saturday'  => 'Sabtu'
		);
		$namahari = date('l', strtotime($tanggal));

		$data['tanggal'] = $tanggal;
		$tanggal = $daftar_hari[$namahari].', '.$tanggal;
		$data['absensi']= $this->mAdmin->getAbsensiWhere($tanggal);

		// var_dump($data['absensi']);
		$temp = 0;
		foreach ($data['absensi'] as $absensi) {
			if ($absensi['NIKP'] != '0') {
				$hasil = $this->mAdmin->getPIC($absensi['NIKP']);
				$picP[$temp]['NIK'] = $hasil['NIK'];
				$picP[$temp]['NamaPIC'] = $hasil['NamaPIC'];
			}
			else{
				$picP[$temp]['NIK'] = '0';
				$picP[$temp]['NamaPIC'] = '0';
			}
			$temp++;
		}
		$data['picP'] = $picP;
		$data['picPengganti'] = $this->mAdmin->getPIC();
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

		$daftar_hari = array(
			'Sunday'    => 'Minggu',
			'Monday'    => 'Senin',
			'Tuesday'   => 'Selasa',
			'Wednesday' => 'Rabu',
			'Thursday'  => 'Kamis',
			'Friday'    => 'Jumat',
			'Saturday'  => 'Sabtu'
		);
		$namahari = date('l', strtotime($hari));

		$data = array(
			'NIK' => $NIK,
			'IDJadwal' => $IDJadwal,
			'Hari' =>  $daftar_hari[$namahari].', '.$hari,
			'kehadiran' => 'Hadir'
		);
		$h = $daftar_hari[$namahari].', '.$hari;
		$query = $this->mAdmin->tambahAbsensi('harian', $data, $NIK, $IDJadwal, $h);

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

		$daftar_hari = array(
			'Sunday'    => 'Minggu',
			'Monday'    => 'Senin',
			'Tuesday'   => 'Selasa',
			'Wednesday' => 'Rabu',
			'Thursday'  => 'Kamis',
			'Friday'    => 'Jumat',
			'Saturday'  => 'Sabtu'
		);
		$namahari = date('l', strtotime($hari));

		$data = array(
			'IDJadwal' => $IDJadwal,
			'Hari' => $daftar_hari[$namahari].', '.$hari
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
			alert('Jadwal sudah ada!. ');
			window.location.href = '" . base_url() . "admin/absensi';
			</script>";
		}
	}

	public function gantiAbsensi()
	{
		$jumlahAbsensi= $this->input->post('jumlahAbsensi');
		for ($i=0; $i < $jumlahAbsensi; $i++) { 
			$IDHarian      = $this->input->post('IDHarian'.$i);
			$Kehadiran     = $this->input->post('Kehadiran'.$i);
			if ($Kehadiran == 'Hadir') {
				$NIKPengganti = '0';
			}
			else{
				$NIKPengganti  = $this->input->post('NIKPengganti'.$i);
			}
			$NIKSebenarnya = $this->input->post('NIKSebenarnya'.$i);
			$shift         = $this->input->post('Shift'.$i);
			$tanggal       = $this->input->post('Hari'.$i);

			// echo "Shift".$i. "        = ".$shift."<br>";
			// echo "Tanggal".$i. "      = ".$tanggal."<br>";
			// echo "Kehadiran".$i."     = ".$Kehadiran ."<br>";
			// echo "NIKPengganti".$i."  = ".$NIKPengganti ."<br>";
			// echo "NIKSebenarnya".$i." = ".$NIKSebenarnya ."<br><br>";

			$dateAj = explode(" ", $tanggal);
			$tanggalNext = new DateTime($dateAj[1]);
			$tanggalNext = $tanggalNext->modify( '+1 day' ); 
			$tanggalNext = $tanggalNext->format("Y-m-d");
			$daftar_hari = array(
				'Sunday'    => 'Minggu',
				'Monday'    => 'Senin',
				'Tuesday'   => 'Selasa',
				'Wednesday' => 'Rabu',
				'Thursday'  => 'Kamis',
				'Friday'    => 'Jumat',
				'Saturday'  => 'Sabtu'
			);
			$namahari = date('l', strtotime($tanggalNext));

			$tanggalNext = $daftar_hari[$namahari].', '.$tanggalNext;

			$data = array(
				'Kehadiran' => $Kehadiran,
				'NIK' => $NIKSebenarnya,
				'NIKP' => $NIKPengganti
			);

			$jam1 = array(7, 8, 9, 10, 11, 12, 13, 14, 15, 16);
			$jam2 = array(13, 14, 15, 16, 17, 18, 19, 20, 21);
			$jam3 = array(22, 23);
			$jam4 = array(0, 1, 2, 3, 5, 6);

			$where = array(
				'j.Tanggal' => $tanggal,
				'j.NIK'     => $NIKSebenarnya
			);

			$check = array(
				'NIKP' => $NIKPengganti
			);

			if ($shift == '1') {
				$this->mAdmin->ubahJChecklist('jchecklist', $check, $where, $jam1);
			}
			elseif ($shift == '2') {
				$this->mAdmin->ubahJChecklist('jchecklist', $check, $where, $jam2);
			}
			elseif ($shift == '3') {
				$where1 = array(
					'j.Tanggal' => $tanggalNext,
					'j.NIK'     => $NIKSebenarnya
				);
				$this->mAdmin->ubahJChecklist('jchecklist', $check, $where, $jam3);
				$this->mAdmin->ubahJChecklist('jchecklist', $check, $where1, $jam4);
			}
			$this->mAdmin->gantiAbsensi('harian', $IDHarian, $data);
		
			echo "<script type='text/javascript'>
			alert('Sukses menyimpan kehadiran dan mengganti PIC. ');
			window.location.href = '" . base_url() . "admin/absensi';
			</script>";
		}

	}


	public function templateAbsensi()
	{
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
		$data['judul'] = "Template Absensi";
		$data['template']= $this->mAdmin->getTemplateAbsensi();
		$this->load->view('vAdmin/vTemplate/vHeaderAdmin', $data);
		$this->load->view('vAdmin/vTemplateAbsensi', $data);
		$this->load->view('vAdmin/vTemplate/vFooterAdmin');
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
		$data['pic'] = $this->mAdmin->getPIC();

		$jumlah = count($data['pic']);
		$temp = 0;

		$maxMudah = $data['pic'][0]['JMudah'];
		$maxSedang = $data['pic'][0]['JSedang'];
		$maxSulit = $data['pic'][0]['JSulit'];	

		foreach ($data['pic'] as $pic) {
			if ($pic['JMudah'] > $maxMudah) {
				$maxMudah = $pic['JMudah'];
			}
			if ($pic['JSedang'] > $maxSedang) {
				$maxSedang = $pic['JSedang'];
			}
			if ($pic['JSulit'] > $maxSulit) {
				$maxSulit = $pic['JSulit'];
			}
		}

		foreach ($data['pic'] as $pic) {
			$nama[$temp] = $pic['NamaPIC'];
			$jumlahCek[$temp] = $pic['JumlahPengecekan'];
			$jabatan[$temp] = $pic['Jabatan'];
			$lamaKerja[$temp] = (date("Y")) - $pic['TahunMasuk'];
			$rataChecklist[$temp] = ($pic['JMudah']/$maxMudah*20)+($pic['JSedang']/$maxSedang*30)+($pic['JSulit']/$maxSulit*50);
			$temp = $temp+1;
		}

		
		for ($i=0; $i < count($rataChecklist) ; $i++) { 
			if ($rataChecklist[$i] < 60) {
				$checklist[$i] = 60;
			}
			elseif ($rataChecklist[$i] >= 60 && $rataChecklist[$i] < 80) {
				$checklist[$i] = 80;
			}
			else{
				$checklist[$i] = 100;
			}
		}

		for ($i=0; $i < count($jabatan) ; $i++) { 
			if($jabatan[$i] == 'Staff'){
				$nilaiJabatan[$i] = 80;
			}
			else if($jabatan[$i] == 'Chief Leader'){
				$nilaiJabatan[$i] = 100;
			}
		}

		for ($j=0; $j < count($lamaKerja); $j++) { 
			if ($lamaKerja[$j] < 4 ){ 
				$nilaiLamaKerja[$j] = 40;
			}
			else if($lamaKerja[$j] < 7){
				$nilaiLamaKerja[$j]= 55;
			}
			else if($lamaKerja[$j] < 10){
				$nilaiLamaKerja[$j] = 70;
			}
			else{
				$nilaiLamaKerja[$j] = 85;
			}
		}

			//kriteria
		$data['kriteria'] = $this->mAdmin->getKriteria();
		for ($i=0; $i < count($data['kriteria']); $i++) { 
			$kriteria[$i] = $data['kriteria'][$i]['NamaParameter'];
			$bobot[$i] = $data['kriteria'][$i]['Bobot'];
		}

		$jumlahS = 0;

		for ($k=0; $k < count($data['pic']) ; $k++) { 
			$hasilS[$k] = pow($jumlahCek[$k],$bobot[0])* pow($nilaiJabatan[$k],$bobot[1])* pow($checklist[$k],$bobot[2])* pow($nilaiLamaKerja[$k],$bobot[3]);

			$jumlahS = $jumlahS + $hasilS[$k];		
		}

		for ($m=0; $m < count($data['pic']) ; $m++) { 
			$hasilV[$m] = $hasilS[$m] / $jumlahS;
		}

		for ($i=0; $i < count($hasilV); $i++) { 
			$hasilAkhir[$i]['nama'] = $nama[$i];
			$hasilAkhir[$i]['hasilV'] = $hasilV[$i];

			$wp[$i]['NIK'] = $data['pic'][$i]['NIK'];
			$wp[$i]['nama'] = $nama[$i];
			$wp[$i]['hasilV'] = $hasilV[$i];
		}
		return $hasilAkhir;
		// echo json_encode($hasilAkhir);

		//MENAMPILKAN HASIL DARI PERHITUNGAN WEIGHT PRODUCT
		// echo "<table border ='1px'>";
		// echo "<tr><td>Nama</td> <td>Jumlah Pengecekan</td><td>Jabatan</td><td>Checklist</td><td>Lama Kerja</td><td>S(i)</td><td>V(i)</td></tr>";
		// for ($i=0; $i < count($data['pic']); $i++) { 
		// 	echo "<tr><td>".$nama[$i] ."</td> <td>". $jumlahCek[$i] ."</td><td>". $nilaiJabatan[$i] ."</td><td>". $checklist[$i] ."</td><td>". $nilaiLamaKerja[$i] ."</td><td>". $hasilS[$i] ."</td><td>".$hasilV[$i] ."</td></tr>";
		// }
		// echo "</table>";
	}

	public function jRanking()
	{
		$wp = $this->ranking();
		echo json_encode($wp);
	}

	public function penjadwalan()
	{
		//MULAI PERHITUNGAN UNTUK PENJADWALAN OTOMATIS
		//1. Mengurutkan hasil dari WP

		$begin = new DateTime($this->input->post('date0'));
		$end = new DateTime($this->input->post('date1'));
		$end = $end->modify( '+1 day' ); 

		$interval = new DateInterval('P1D');
		$daterange = new DatePeriod($begin, $interval ,$end);

		$y = 0;
		foreach($daterange as $date){
			$wp         = $this->ranking(); 
			$data       = $this->mAdmin->getPIC();
			$jChecklist = $this->mAdmin->getChecklistWhere();
			$tanggal0   = $date->format("Y-m-d");
			$tanggal1   = date('Y-m-d', strtotime($tanggal0. ' + 1 days'));

			$daftar_hari = array(
				'Sunday'    => 'Minggu',
				'Monday'    => 'Senin',
				'Tuesday'   => 'Selasa',
				'Wednesday' => 'Rabu',
				'Thursday'  => 'Kamis',
				'Friday'    => 'Jumat',
				'Saturday'  => 'Sabtu'
			);
			$namahari0 = date('l', strtotime($tanggal0));
			$namahari1 = date('l', strtotime($tanggal1));

			$tanggal0 = $daftar_hari[$namahari0].', '.$tanggal0;
			$tanggal1 = $daftar_hari[$namahari1].', '.$tanggal1;

			$absensi = $this->mAdmin->getAbsensiDate($tanggal0);
			if ($absensi == NULL) {
				$alert[$y]['hasil'] = 'gagal';
				$alert[$y]['tanggal'] = $tanggal0;
				$y++;
			}
			else{
				$alert[$y]['hasil'] = 'benar';
				$alert[$y]['tanggal'] = $tanggal0;
				$y++;
				for ($i=0; $i < count($data); $i++) { 
					$wp[$i]['NIK'] = $data[$i]['NIK'];
					$hasilV[$i] = $wp[$i]['hasilV'];
				}

				array_multisort($hasilV,SORT_DESC,$wp); //1. 
				sort($hasilV); //

				$jumlahV = 0;
				for ($i=0; $i < count($data); $i++) { 
					$wp[$i]['hasilVB'] = $hasilV[$i];
					$jumlahV = $jumlahV + $hasilV[$i];
				}

				$t0 = 0; $t1 = 0;$t2 = 0;
				$sWP[0] = 0; $sWP[1] = 0; $sWP[2] = 0; $sWP[3] = 0;
				for ($i = 0; $i < count($absensi); $i++) {
					for ($j=0; $j < count($wp); $j++) { 
						if ($absensi[$i]['Shift'] == '1' AND $absensi[$i]['NIK']==$wp[$j]['NIK']) {
							$pic[0][$t0]['NIK']     = $wp[$j]['NIK'];
							$pic[0][$t0]['NamaPIC'] = $wp[$j]['nama'];
							$pic[0][$t0]['hasilVB'] = $wp[$j]['hasilVB'];
							$sWP[0] = $sWP[0] + $pic[0][$t0]['hasilVB'];

							$pic[1][$t0]['NIK']     = $wp[$j]['NIK'];
							$pic[1][$t0]['NamaPIC'] = $wp[$j]['nama'];
							$pic[1][$t0]['hasilVB'] = $wp[$j]['hasilVB'];
							$sWP[1] = $sWP[1] + $pic[1][$t0]['hasilVB'];

							$t0 = $t0+1;
						}
						elseif ($absensi[$i]['Shift'] == '2' AND $absensi[$i]['NIK']==$wp[$j]['NIK']){
							$bool = true;
							$k = 0;
							while ($bool == true AND $k < $i) {
								if ($pic[1][$k]['NIK'] == $wp[$j]['NIK']) {		
									$bool = false;
								}
								else{
									$bool = true;
								}
								$k = $k+1;
							}
							if ($bool == true) {
								$pic[1][$t0]['NIK'] = $wp[$j]['NIK'];
								$pic[1][$t0]['NamaPIC'] = $wp[$j]['nama'];
								$pic[1][$t0]['hasilVB'] = $wp[$j]['hasilVB'];
								$sWP[1] = $sWP[1] + $pic[1][$t0]['hasilVB'];
							}

							$pic[2][$t1]['NIK'] = $wp[$j]['NIK'];
							$pic[2][$t1]['NamaPIC'] = $wp[$j]['nama'];
							$pic[2][$t1]['hasilVB'] = $wp[$j]['hasilVB'];
							$sWP[2] = $sWP[2] + $pic[2][$t1]['hasilVB'];
							$t1 = $t1+1;
							$t0 = $t0+1;
						}
						elseif ($absensi[$i]['Shift'] == '3'AND $absensi[$i]['NIK']==$wp[$j]['NIK']){
							$pic[3][$t2]['NIK'] = $wp[$j]['NIK'];
							$pic[3][$t2]['NamaPIC'] = $wp[$j]['nama'];
							$pic[3][$t2]['hasilVB'] = $wp[$j]['hasilVB'];
							$sWP[3] = $sWP[3] + $pic[3][$t2]['hasilVB'];
							$t2 = $t2+1;
						}
					}
				}

				//Cari rata-rata pada setiap jumlah pembagian
				for ($i=0; $i < count($pic); $i++) { 
					$rataPembagian[$i] = count($jChecklist[$i])/count($pic[$i]);
				}
				// var_dump($rataPembagian);

				$sRPembagian[0] = 0; $sRPembagian[1] = 0; $sRPembagian[2] = 0; $sRPembagian[3] = 0;
				$sPembagian[0] = 0; $sPembagian[1] = 0; $sPembagian[2] = 0; $sPembagian[3] = 0;
				for ($i=0; $i < count($pic); $i++) { 
					for ($j=0; $j < count($pic[$i]); $j++) { 
						$pic[$i][$j]['jPembagian'] = $pic[$i][$j]['hasilVB']/$sWP[$i]*count($jChecklist[$i]);
						if ($pic[$i][$j]['jPembagian']<$rataPembagian[$i]) {
							$pic[$i][$j]['rPembagian'] = floor($pic[$i][$j]['jPembagian']);
						}
						else{
							$pic[$i][$j]['rPembagian'] = ceil($pic[$i][$j]['jPembagian']);
						}
						$sPembagian[$i] = $sPembagian[$i] + $pic[$i][$j]['jPembagian'];
						$sRPembagian[$i] = $sRPembagian[$i] + $pic[$i][$j]['rPembagian'];
					}
				}

				
				for ($i=0; $i < count($pic); $i++) { 
					(int) $selisih[$i] = (count($jChecklist[$i]) - (int) $sRPembagian[$i] );
					if ($selisih[$i] > 0) {
						for ($j=0; $j < $selisih[$i]; $j++) { 
							$rand = rand(0, (count($pic[$i])-1));
							$pic[$i][$rand]['rPembagian'] = $pic[$i][$rand]['rPembagian'] +1;
						}
					}
					elseif ($selisih[$i] < 0) {
						$j = 0;
						$k = 0;
						while ($j < ($selisih[$i]*-1)) {
							$rand = rand(0, (count($pic[$i])-1));
							if ($pic[$i][$rand]['rPembagian'] > 0) {
								$pic[$i][$rand]['rPembagian'] = $pic[$i][$rand]['rPembagian'] -1;
								$j = $j+1;
							}
						}
					}
				}

				$sRPembagianNew[0] = 0; $sRPembagianNew[1] = 0; $sRPembagianNew[2] = 0; $sRPembagianNew[3] = 0;
				for ($i=0; $i < count($pic); $i++) { 
					for ($j=0; $j < count($pic[$i]); $j++) { 
						$sRPembagianNew[$i] = $sRPembagianNew[$i] + $pic[$i][$j]['rPembagian'];
					}
				}

				// //Menampilkan perhitungan penjadwalan otomatis
				// for ($i=0; $i < count($pic); $i++) { 
				// 	echo "Jumlah Pengecekan : ". count($jChecklist[$i]);
				// 	echo "<table border ='1px'>";
				// 	echo "<tr><td>NIK</td> <td>Nama</td><td>Hasil WP</td><td>Jumlah Pembagian</td><td>Real Pembagian</td></tr>";
				// 	for ($j=0; $j < count($pic[$i]); $j++) { 
				// 		echo "<tr><td>".$pic[$i][$j]['NIK'] ."</td> <td>".$pic[$i][$j]['NamaPIC']."</td> <td>".$pic[$i][$j]['hasilVB']."</td> <td>".$pic[$i][$j]['jPembagian']."</td> <td>".$pic[$i][$j]['rPembagian']."</td></tr>";
				// 	}
				// 	echo "<tr style='background-color:tomato;'><td> Jumlah </td><td>". count($pic[$i])."</td><td>". $sWP[$i] . "</td><td>".$sPembagian[$i]."</td><td>".$sRPembagianNew[$i]. "</td></tr>";
				// 	echo "</table>";
				// 	echo "<br>";
				// }

				//MULAI MENAMBAHKAN KE DATABASE
				for ($i=0; $i < count($pic); $i++) { 
					$temp = 0;
					for ($j=0; $j < count($pic[$i]); $j++) { 
						if ($pic[$i][$j]['rPembagian']>0) {
							for ($k=0; $k < $pic[$i][$j]['rPembagian']; $k++) { 
								// echo $pic[$i][$j]['NamaPIC']." ";
								// echo $jChecklist[$i][$temp]['IDChecklist']."<br>";

								$data0 = array(
									"NIK" => $pic[$i][$j]['NIK'],
									"NIKP" => '0',
									"IDChecklist" => $jChecklist[$i][$temp]['IDChecklist'],
									"StatusCheck" => '0',
									"Tanggal" => $tanggal0
								);

								$data1 = array(
									"NIK" => $pic[$i][$j]['NIK'],
									"NIKP" => '0',
									"IDChecklist" => $jChecklist[$i][$temp]['IDChecklist'],
									"StatusCheck" => '0',
									"Tanggal" => $tanggal1
								);

								if ($i == 3) {
									if (substr($jChecklist[$i][$temp]['Jam'],0,2) == '22' OR substr($jChecklist[$i][$temp]['Jam'],0,2) == '23') {
										$this->mAdmin->penjadwalan($jChecklist[$i][$temp]['IDChecklist'], $data0, $tanggal0);
									}
									else{
										$this->mAdmin->penjadwalan($jChecklist[$i][$temp]['IDChecklist'], $data1, $tanggal1);
									}
								}
								else{
									$this->mAdmin->penjadwalan($jChecklist[$i][$temp]['IDChecklist'], $data0, $tanggal0);
								}
								$temp = $temp+1;
							}
						}
					}
				}
			}
		}
		if ($y == 0) {
			$alert[$y]['hasil'] = 'kosong';
		}
		$data['judul'] = "Ranking PIC";
		$data['alert'] = $alert;
		$this->load->view('vAdmin/vTemplate/vHeaderAdmin', $data);
		$this->load->view('vAdmin/vRankingPIC');
		$this->load->view('vAdmin/vTemplate/vFooterAdmin');
	}

	public function tampilRangking()
	{
		$data['judul'] = "Ranking PIC";
		$data['alert'][0]['hasil'] = '';
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

	public function bobotWP()
	{
		$data['judul'] = "Ubah Bobot Weighted Product";
		$data['wp'] = $this->mAdmin->getKriteria();
		$this->load->view('vAdmin/vTemplate/vHeaderAdmin', $data);
		$this->load->view('vAdmin/vBobotWP');
		$this->load->view('vAdmin/vTemplate/vFooterAdmin');
	}

	public function ubahJadwalShift()
	{
		$data['judul'] = "Ubah Jadwal Shift PIC";
		$data['jadwal'] = $this->mAdmin->getJadwal();
		$this->load->view('vAdmin/vTemplate/vHeaderAdmin', $data);
		$this->load->view('vAdmin/vJadwalShiftPIC');
		$this->load->view('vAdmin/vTemplate/vFooterAdmin');
	}

	public function gantiBobotWP()
	{
		$temp= $this->input->post('temp');

		for ($i=0; $i < $temp ; $i++) { 
			$IDParameter[$i]	= $this->input->post('IDParameter'.$i);
			$bobot[$i]			= $this->input->post('Bobot'.$i);
		}
		for ($i=0; $i < $temp; $i++) { 
			$data = array(
				'Bobot' => $bobot[$i]
			);

			$this->mAdmin->gantiBobotWP('weightproduct',$data, $IDParameter[$i]);
		}

		echo "<script type='text/javascript'>
		alert('Sukses Mengganti Bobot. ');
		window.location.href = '" . base_url() . "admin/ubahbobotwp';
		</script>";
		
	}

	public function gantiJadwal()
	{
		$temp= $this->input->post('temp');

		for ($i=0; $i < $temp ; $i++) { 
			$IDJadwal[$i]	= $this->input->post('IDJadwal'.$i);
			$jam[$i]		= $this->input->post('Jam'.$i);
		}
		for ($i=0; $i < $temp; $i++) { 
			$data = array(
				'Jam' => $jam[$i]
			);

			$this->mAdmin->gantiJadwal('jadwal',$data, $IDJadwal[$i]);
		}

		echo "<script type='text/javascript'>
		alert('Sukses Mengganti Jadwal Shift. ');
		window.location.href = '" . base_url() . "admin/ubahshift';
		</script>";

	}

	public function tambahTemplateAbsensi()
	{
		$data['judul'] = "Tambah Template Absensi";
		$data['pic'] = $this->mAdmin->getPIC();
		$data['jadwal'] = $this->mAdmin->getJadwal();
		// var_dump($data['pic']);
		$this->load->view('vAdmin/vTemplate/vHeaderAdmin', $data);
		$this->load->view('vAdmin/vTambahTemplateAbsensi', $data);
		$this->load->view('vAdmin/vTemplate/vFooterAdmin');
	}

	public function validasiTambahTemplate()
	{
		$NIK = $this->input->post('NIK');
		$IDJadwal = $this->input->post('IDJadwal');
		$hari = $this->input->post('Hari');

		$data = array(
			'NIK' => $NIK,
			'IDJadwal' => $IDJadwal,
			'Hari' =>  $hari,
		);
		$query = $this->mAdmin->tambahTemplateAbsensi('templateabsensi', $data, $NIK, $IDJadwal, $hari);


		if ($query == 1) 
		{
			echo "<script type='text/javascript'>
			alert('Sukses Menambahkan Template');
			window.location.href = '" . base_url() . "admin/templateabsensi';
			</script>";
		}
		else
		{
			echo "<script type='text/javascript'>

			alert('Template sudah ada!!! ');
			window.location.href = '" . base_url() . "admin/tambahtemplateabsensi';
			</script>";
		}
	}

	public function editTemplateAbsensi($IDTHarian= NULL)
	{
		$data['judul'] = 'Edit Template Absensi';
		$IDTHarian = $IDTHarian;
		$data['template']= $this->mAdmin->getTemplateAbsensi($IDTHarian);
		$this->load->view('vAdmin/vTemplate/vHeaderAdmin', $data);
		$this->load->view('vAdmin/vEditTemplateAbsensi', $data);
		$this->load->view('vAdmin/vTemplate/vFooterAdmin');		
	}

	public function validasiTemplateAbsensi()
	{
		$IDTHarian = $this->input->post('IDTHarian');
		$NIK = $this->input->post('NIK');
		$IDJadwal = $this->input->post('IDJadwal');
		$hari = $this->input->post('Hari');

		$data = array(
			'IDJadwal' => $IDJadwal,
			'Hari' => $hari
		);

		$query = $this->mAdmin->editTemplateAbsensi('templateabsensi',$IDTHarian, $data, $NIK, $IDJadwal, $hari);
		if ($query == '1') {
			echo "<script type='text/javascript'>
			alert('Sukses mengedit template absensi. ');
			window.location.href = '" . base_url() . "admin/templateabsensi';
			</script>";
		}
		else{
			echo "<script type='text/javascript'>
			alert('Jadwal sudah ada!. ');
			window.location.href = '" . base_url() . "admin/templateabsensi';
			</script>";
		}
	}

	public function hapusTemplateAbsensi($IDTHarian)
	{
		if (!isset($_SESSION['nama'])) {
			redirect(base_url("admin"));
		}
		$this->mAdmin->hapusTemplateAbsensi('templateabsensi', $IDTHarian);
		echo "<script type='text/javascript'>
		alert('Sukses menghapus template absensi ');
		window.location.href = '" . base_url() . "admin/templateabsensi';
		</script>";
	}

	public function ikutTemplate()
	{
		$daftar_hari = array(
			'Sunday'    => 'Minggu',
			'Monday'    => 'Senin',
			'Tuesday'   => 'Selasa',
			'Wednesday' => 'Rabu',
			'Thursday'  => 'Kamis',
			'Friday'    => 'Jumat',
			'Saturday'  => 'Sabtu'
		);
		// $namahari = date('l', strtotime($tanggal));
		// $data['tanggal'] = $tanggal;
		// $tanggal = $daftar_hari[$namahari].', '.$tanggal;
		$begin = new DateTime($this->input->post('date0'));
		$end = new DateTime($this->input->post('date1'));
		$end = $end->modify( '+1 day' ); 

		$interval = new DateInterval('P1D');
		$daterange = new DatePeriod($begin, $interval ,$end);
		foreach($daterange as $date){
			$tanggal   = $date->format("Y-m-d");
			$namahari = date('l', strtotime($tanggal));
			$hari = $daftar_hari[$namahari];
			$haritanggal = $hari.', '.$tanggal;

			$template = $this->mAdmin->getTemplateAbsensiDate($hari);
			// var_dump($template);
			if ($template == NULL){
				echo "<script type='text/javascript'>
			alert('Template Kosong!');
			window.location.href = '" . base_url() . "admin/absensi';
			</script>";
			
			}
			else{
			foreach ($template as $template) {
				$data = array(
					'NIK' => $template['NIK'],
					'IDJadwal' => $template['IDJadwal'],
					'Hari' => $haritanggal,
					'NIKP' => "0",
					'Kehadiran' => "Hadir"
					
				);
				// var_dump($data);
				$query = $this->mAdmin->tambahAbsensiTemplate('harian', $data, $template['NIK'], $template['IDJadwal'], $haritanggal);
				// var_dump($query);

			}

				if ($query == '1') {
					echo "<script type='text/javascript'>
					alert('Sukses menambahkan absensi. ');
					window.location.href = '" . base_url() . "admin/absensi';
					</script>";
				}
				else{
					echo "<script type='text/javascript'>
					alert('Jadwal Sudah Ada! ');
					window.location.href = '" . base_url() . "admin/absensi';
					</script>";
				}

			}
		}
	}

	public function getStatusJChecklist()
	{
		$tanggal = date('20y-m-d');
		$daftar_hari = array(
			'Sunday'    => 'Minggu',
			'Monday'    => 'Senin',
			'Tuesday'   => 'Selasa',
			'Wednesday' => 'Rabu',
			'Thursday'  => 'Kamis',
			'Friday'    => 'Jumat',
			'Saturday'  => 'Sabtu'
		);
		$namahari = date('l', strtotime($tanggal));
		$hari = $daftar_hari[$namahari];
		$haritanggal = $hari.', '.$tanggal;
		$query = $this->mAdmin->getStatusJChecklist('jchecklist', $haritanggal);
		// echo json_encode($query);
		var_dump($query);
	}

	public function jsonChecklist()
	{
		$tanggal = date('20y-m-d');
		$daftar_hari = array(
			'Sunday'    => 'Minggu',
			'Monday'    => 'Senin',
			'Tuesday'   => 'Selasa',
			'Wednesday' => 'Rabu',
			'Thursday'  => 'Kamis',
			'Friday'    => 'Jumat',
			'Saturday'  => 'Sabtu'
		);
		$namahari = date('l', strtotime($tanggal));
		$hari = $daftar_hari[$namahari];
		$haritanggal = $hari.', '.$tanggal;

		$data = $this->mAdmin->getJChecklist($haritanggal);
		header("Content-type:application/json");
		echo json_encode($data);
	}
}