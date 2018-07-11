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
			'JumlahPengecekan' => $jumlahPengecekan,
			'Status' => 'Enabled'
		);

		$query = $this->mAdmin->tambahPIC('pic', $data, $NIK);

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

	public function lihatPIC()
	{
		$data['judul'] = "Lihat PIC";
		$data['pic'] = $this->mAdmin->getPIC();
		$this->load->view('vAdmin/vTemplate/vHeaderAdmin', $data);
		$this->load->view('vAdmin/vLihatPIC', $data);
		$this->load->view('vAdmin/vTemplate/vFooterAdmin');
	}

	public function editPIC()
	{
		$data['judul'] = "Edit PIC";
		$NIK = $this->input->post('NIK');
		$data['pic'] = $this->mAdmin->getPIC($NIK);
		$this->load->view('vAdmin/vTemplate/vHeaderAdmin', $data);
		$this->load->view('vAdmin/vEditPIC', $data);
		$this->load->view('vAdmin/vTemplate/vFooterAdmin');
	}

	public function validasiEditPIC()
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

		$data['pic'] = $this->mAdmin->editPIC('pic', $data, $NIK);

		echo "<script type='text/javascript'>
					alert('Sukses Mengedit PIC');
					window.location.href = '" . base_url() . "admin/pic';
				</script>";
	}

	public function hapusPIC()
	{
		$NIK = $this->input->post('NIK');
		$data = array(
			'Status' => 'Disabled'
		);
		$this->mAdmin->hapusPIC('pic', $data, $NIK);	
		echo "<script type='text/javascript'>
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
		$namaChecklist = $this->input->post('NamaChecklist');
		$jam = $this->input->post('Jam');
		$jam1 = $this->input->post('Jam1');
		if ($jam == "Setiap Jam") {
			for ($i=0; $i < 24 ; $i++) { 
				if ($i < 10) {
					$nJam = "0".$i.":00";
				}
				else{
					$nJam = $i.":00";
				}

				//Mengecek ID Terakhir
				// $checklist = $this->mAdmin->lihatLastIDChecklist();
				// $lastID = $checklist['IDChecklist']+1;

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

				$data = array(
				'Info' => $target_file,
				'NamaChecklist' => $namaChecklist,
				'Jam' => $nJam,
				'Status' => 'Enabled'
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
				$nJam = str_replace(",","",$jam1);
				$nJam = explode(" ",$nJam);
				for ($i=0; $i < count($nJam); $i++) { 

					//Mengecek ID Terakhir
					// $checklist = $this->mAdmin->lihatLastIDChecklist();
					// $lastID = $checklist['IDChecklist']+1;

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

					$data = array(
					'Info' => $target_file,
					'NamaChecklist' => $namaChecklist,
					'Jam' => $nJam[$i],
					'Status' => 'Enabled'
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

	public function lihatChecklist()
	{
		$data['judul'] = "Lihat Checklist";
		$data['checklist']= $this->mAdmin->getChecklist();

		// $myFile = $data['checklist'][3]['Info'];
		// $fh = fopen($myFile, 'r');
		// while(!feof($fh)){
		// echo fgets($fh)."<br>";
		// }

		$this->load->view('vAdmin/vTemplate/vHeaderAdmin', $data);
		$this->load->view('vAdmin/vLihatChecklist', $data);
		$this->load->view('vAdmin/vTemplate/vFooterAdmin');
	}

	public function editChecklist()
	{
		$IDChecklist = $this->input->post('IDChecklist');
		$data['checklist'] = $this->mAdmin->getChecklist($IDChecklist);
		$data['judul'] = "Edit Checklist";

		$this->load->view('vAdmin/vTemplate/vHeaderAdmin', $data);
		$this->load->view('vAdmin/vEditChecklist', $data);
		$this->load->view('vAdmin/vTemplate/vFooterAdmin');
	}

	public function validasiEditChecklist()
	{

		date_default_timezone_set('Asia/Jakarta');
		$IDChecklist = $this->input->post('IDChecklist');
		$namaChecklist = $this->input->post('NamaChecklist');
		$jam = $this->input->post('Jam');

		$target_dir = "assets/Checklist/";
		$target_file = $target_dir .date('Ymdhis').'_'. basename($_FILES["Info"]["name"]);

		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		var_dump($target_file);
		// if ($imageFileType != 'txt') {
		// 	echo "<script type='text/javascript'>

		// 			alert('File yang anda masukkan bukan txt!!!');
		// 			window.location.href = '" . base_url() . "admin/vLihatChecklist';
		// 		</script>";
		// }

		// move_uploaded_file($_FILES["Info"]["tmp_name"], $target_file);

		// $data = array(
		// 	'Info' => $target_file,
		// 	'NamaChecklist' => $namaChecklist,
		// 	'Jam' => $jam
		// );

		// $data= $this->mAdmin->editChecklist('checklist', $data, $IDChecklist, $namaChecklist, $jam);
		// if ($data == 1) {
		// 	echo "<script type='text/javascript'>
		// 			alert('Sukses Mengedit Checklist');
		// 			window.location.href = '" . base_url() . "admin/checklist';
		// 		</script>";
		// }
		// else{
		// 	echo "<script type='text/javascript'>
		// 			alert('Jam $jam sudah ada');
		// 			window.location.href = '" . base_url() . "admin/checklist';
		// 		</script>";
		// }
		
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

	public function hapusChecklist()
	{
		$IDChecklist = $this->input->post('IDChecklist');
		$data = array(
			'Status' => 'Disabled'
		);
		$this->mAdmin->hapusChecklist('checklist', $data, $IDChecklist);	
		echo "<script type='text/javascript'>
					window.location.href = '" . base_url() . "admin/checklist';
				</script>";
	}

	public function lihatAbsensi()
	{
		$data['judul'] = "Lihat Absensi";
		$data['absensi']= $this->mAdmin->getAbsensi();

		var_dump($data);
		//cobacoba
		 $this->load->view('coba', $data);

		// $this->load->view('vAdmin/vTemplate/vHeaderAdmin', $data);
		// $this->load->view('vAdmin/vLihatAbsensi', $data);
		// $this->load->view('vAdmin/vTemplate/vFooterAdmin');
	}

	public function tambahAbsensi()
	{
		$data['judul'] = "Tambah Absensi";
		$data['pic'] = $this->mAdmin->getPIC();
		$data['jadwal'] = $this->mAdmin->getJadwal();

		var_dump($data);
		// $this->load->view('vAdmin/vTemplate/vHeaderAdmin', $data);
		// $this->load->view('vAdmin/vLihatAbsensi', $data);
		// $this->load->view('vAdmin/vTemplate/vFooterAdmin');
	}

	public function validasiTambahAbsensi()
	{
		$NIK = $this->input->post('NIK');
		$IDJadwal = $this->input->post('IDJadwal');
		$hari = $this->input->post('Hari');
		$kehadiran = $this->input->post('Kehadiran');

		$data = array(
			'NIK' => $NIK,
			'IDJadwal' => $IDJadwal,
			'Hari' => $hari,
			'kehadiran' => $kehadiran
		);

		$query = $this->mAdmin->tambahAbsensi('harian', $data, $NIK, $IDJadwal, $hari);

		var_dump($query);
		// if ($query == 1) 
		// {
		// 	echo "<script type='text/javascript'>
		// 			alert('Sukses Menambahkan Absensi');
		// 			window.location.href = '" . base_url() . "admin/pic';
		// 		</script>";
		// }
		// else
		// {
		// 	echo "<script type='text/javascript'>

		// 			alert('Absensi sudah ada!!! ');
		// 			window.location.href = '" . base_url() . "admin/tambahpic';
		// 		</script>";
		// }
	}

	public function hapusAbsensi()
	{
		$IDHarian = $this->input->post('IDHarian');
		$this->mAdmin->hapusAbsensi('harian', $IDHarian);
	}

	public function editAbsensi()
	{
		$IDHarian = $this->input->post('IDHarian');
		$data['absensi']= $this->mAdmin->getAbsensi($IDHarian);
		var_dump($data);
	}

	public function validasiEditAbsensi()
	{
		$IDHarian = $this->input->post('IDHarian');
		$NIK = $this->input->post('NIK');
		$IDJadwal = $this->input->post('IDJadwal');

		$data = array(
			'IDJadwal' => $IDJadwal
		);

		$query = $this->mAdmin->editAbsensi('harian',$IDHarian, $data, $NIK, $IDJadwal);
	}

	public function gantiAbsensi()
	{
		$jumlahAbsensi= $this->input->post('jumlahAbsensi');

		for ($i=0; $i < $jumlahAbsensi; $i++) { 
			$id[$i] = 'IDHarian'.$i;
			$hadir[$i] = 'Kehadiran'.$i;
		}

		for ($i=0; $i < $jumlahAbsensi; $i++) { 
			$IDHarian = $this->input->post($id[$i]);
			$Kehadiran = $this->input->post($hadir[$i]);
			
			$data = array(
				'Kehadiran' => $Kehadiran
			);

			$query = $this->mAdmin->gantiAbsensi('harian',$IDHarian, $data);
		}
	}

	public function lihatLog()
	{
		// header("Content-type:application/json");
		$data['judul'] = "Log Checklist";
		$data['log']= $this->mAdmin->getLog();

		// echo json_encode($data);

		$this->load->view('vAdmin/vTemplate/vHeaderAdmin', $data);
		$this->load->view('vAdmin/vBerandaAdmin', $data);
		$this->load->view('vAdmin/vTemplate/vFooterAdmin');
	}

	public function gantiPICLog()
	{
		
	}
}