<?php
class mAdmin extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getAdmin($table, $where)
    {
    	return $this->db->get_where($table,$where);
    }

    public function getNotifikasi()
    {
        $query = $this->db->get('notifikasi');
        return $query->result_array();
    }

    public function tambahPIC($table, $data, $NIK)
    {
    	$query = "SELECT * FROM `pic` WHERE `NIK` = $NIK";
    	$hasil =  $this->db->query($query)->row_array();

    	if ($hasil['NIK'] == $NIK) 
    	{
    		return "0";
    	}
    	else
    	{
       		$this->db->insert($table,$data);
       		return "1";
    	}
    }

    public function tambahAdmin($table, $data, $username)
    {
        $query = "SELECT * FROM `admin` WHERE `username` = $username";
        $hasil =  $this->db->query($query)->row_array();

        if ($hasil['username'] == $username) 
        {
            return "0";
        }
        else
        {
            $this->db->insert($table,$data);
            return "1";
        }
    }    

    public function getPIC($NIK = false)
    {
        if ($NIK == null) {
            $query = $this->db->get('pic');
            return $query->result_array();
        }
        else
        {
            $query = "SELECT * FROM `pic` WHERE `NIK` = $NIK";
            return $this->db->query($query)->row_array();
        }

    }

    public function editPIC($table, $data, $NIK )
    {

        $this->db->where('NIK', $NIK);
        $this->db->update($table, $data);
    }

    public function hapusPIC($table, $NIK, $data)
    {
        $this->db->where('NIK', $NIK);
        $this->db->update($table, $data);
    }

    public function tambahChecklist($table, $data, $namaChecklist, $jam)
    {
        $query = "SELECT * FROM `checklist` WHERE `NamaChecklist` = '$namaChecklist' AND `Jam` = $jam ";
        $hasil =  $this->db->query($query)->row_array();
        if ($hasil == NULL) {
            $query = $this->db->insert($table,$data); 
            return "_".$data['Jam'];
        }
        else{
            return $hasil['Jam'];
        }
    }

    //Belum Digunakan
    public function tambahChecklist1($table, $data, $namaChecklist, $jam, $hari)
    {
        $query = "SELECT * FROM `checklist` WHERE `NamaChecklist` = '$namaChecklist' AND `Jam` = $jam AND `Hari` = '$hari'";
        $hasil =  $this->db->query($query)->row_array();
        if ($hasil == NULL) {
            $query = $this->db->insert($table,$data); 
            return "_".$data['Jam'];
        }
        else{
            return $hasil['Jam'];
        }
    }

    public function getChecklist($IDChecklist = false)
    {
        if ($IDChecklist == null) {
            $query = $this->db->order_by('Jam','ASC');
            $query = $this->db->select('*');
             $query = $this->db->from('checklist');
             $query = $this->db->get();
             return $query->result_array();
        }
        else
        {
            $query = "SELECT * FROM `checklist` WHERE `IDChecklist` = $IDChecklist";
            return $this->db->query($query)->row_array();
        }
    }

    public function getJChecklist($tanggal)
    {
        $query = $this->db->order_by('c.Jam','ASC');
        $query = $this->db->order_by('c.BatasPengecekan','ASC');
        $query = $this->db->where('c.Status','Enabled');
        $query = $this->db->where('j.Tanggal',$tanggal);
        $query = $this->db->select('p.NamaPIC, j.IDJadwalChecklist, j.NIK, j.NIKP, j.IDChecklist, j.Tanggal, j.StatusCheck, c.Info, c.NamaChecklist, c.Jam, c.BatasPengecekan, c.tingkatPengecekan');
         $query = $this->db->from('jchecklist j');
         $query = $this->db->join('pic p','p.NIK=j.NIK');
         $query = $this->db->join('checklist c','c.IDChecklist=j.IDChecklist');
         $query = $this->db->get();
         return $query->result_array();
    }

    public function getChecklistWhere()
    {
        $query[0] = $this->db->query("SELECT `IDChecklist`,`Jam` FROM checklist WHERE `Status` = 'Enabled' AND (`Jam` = '07:00' OR `Jam` = '08:00' OR `Jam` = '09:00' OR `Jam` = '10:00' OR `Jam` = '11:00' OR `Jam` = '12:00' OR `Jam` = '13:00')")->result_array();
        $query[1] = $this->db->query("SELECT `IDChecklist`,`Jam` FROM checklist WHERE `Status` = 'Enabled' AND (`Jam` = '14:00' OR `Jam` = '15:00' OR `Jam` = '16:00' )")->result_array();
        $query[2] = $this->db->query("SELECT `IDChecklist`,`Jam` FROM checklist WHERE `Status` = 'Enabled' AND (`Jam` = '17:00' OR `Jam` = '18:00' OR `Jam` = '19:00' OR `Jam` = '20:00' OR `Jam` = '21:00')")->result_array();
        $query[3] = $this->db->query("SELECT `IDChecklist`,`Jam`  FROM checklist WHERE `Status` = 'Enabled' AND (`Jam` = '22:00' OR `Jam` = '23:00' OR`Jam` = '00:00' OR `Jam` = '01:00'OR `Jam` = '02:00' OR `Jam` = '03:00' OR `Jam` = '04:00' OR `Jam` = '05:00' OR `Jam` = '06:00')")->result_array();
        return $query;
    }

    public function getInfoChecklist($table, $IDChecklist)
    {
        $query = "SELECT * FROM $table WHERE `IDChecklist` = $IDChecklist";
        return  $this->db->query($query)->row_array();
    }

    public function editChecklist($table, $data, $IDChecklist, $namaChecklist, $jam)
    {
        $nJam = substr($jam, 0,2);
        $query = "SELECT * FROM $table WHERE `NamaChecklist` = '$namaChecklist' AND `Jam` = $nJam ";
        $hasil =  $this->db->query($query)->row_array();

        if ($hasil['IDChecklist'] != $IDChecklist AND $hasil != NULL) {
            return "0";
        }
        elseif ($hasil['IDChecklist'] == $IDChecklist){
            $this->db->where('IDChecklist', $IDChecklist);
            $this->db->update($table, $data);
            return "1";
        }
    }

    public function gantiChecklist($table, $IDChecklist, $data)
    {
        $this->db->where('IDChecklist', $IDChecklist);
        $this->db->update($table, $data);
    }

    public function gantiJChecklist($table, $IDChecklist, $data)
    {
        $this->db->where('IDJadwalChecklist', $IDChecklist);
        $this->db->update($table, $data);
    }

    public function lihatLastIDChecklist()
    {
        $query ="select * from checklist order by IDChecklist DESC limit 1";

        return $this->db->query($query)->row_array();
    }

    public function getAbsensi($IDHarian = FALSE)
    {
        if ($IDHarian == NULL) {
            $query = $this->db->order_by('j.Shift','ASC');
            $this->db->select('h.IDHarian, h.NIK, h.NIKP,h.IDJadwal, h.Hari, h.Kehadiran, p.NamaPIC, j.Shift, j.Jam, p.Status');
             $this->db->from('harian h');
             $this->db->join('pic p','p.NIK=h.NIK');
             $this->db->join('jadwal j','j.IDJadwal=h.IDJadwal');
             $query = $this->db->get();
             return $query->result_array();
        }
        else{
            $this->db->select('h.IDHarian, h.NIK, h.NIKP, h.IDJadwal, h.Hari, h.Kehadiran, p.NamaPIC, j.Shift, j.Jam');
             $this->db->from('harian h');
             $this->db->join('pic p','p.NIK=h.NIK');
             $this->db->join('jadwal j','j.IDJadwal=h.IDJadwal');
             $this->db->where(array('IDHarian' => $IDHarian));
             $query = $this->db->get();
             return $query->result_array();
        }
         
    }

    public function getAbsensiDate($hari)
    {
        $query = $this->db->order_by('j.Shift','ASC');
        $this->db->where('Hari', $hari);
        $this->db->select('h.IDHarian, h.NIK, h.NIKP,h.IDJadwal, h.Hari, h.Kehadiran, p.NamaPIC, j.Shift, j.Jam, p.Status');
         $this->db->from('harian h');
         $this->db->join('pic p','p.NIK=h.NIK');
         $this->db->join('jadwal j','j.IDJadwal=h.IDJadwal');
         $query = $this->db->get();
         return $query->result_array();
    }

    public function tambahAbsensi($table, $data, $NIK, $IDJadwal, $hari)
    {
        $query = "SELECT * FROM $table WHERE `NIK` = '$NIK' AND `IDJadwal` = '$IDJadwal' AND `hari` = '$hari'";
        $hasil =  $this->db->query($query)->row_array();

        if ($hasil == NULL) {
            $this->db->insert($table,$data);
            return "1";
        }
        else{
            return "0";
        }
    }

    public function editAbsensi($table, $IDHarian, $data,$NIK, $IDJadwal, $hari)
    {
        $query = "SELECT * FROM $table WHERE `NIK` = '$NIK' AND `IDJadwal` = $IDJadwal AND `Hari` = '$hari'";
        $hasil =  $this->db->query($query)->row_array();
        if ($hasil == NULL) {
            $this->db->where('IDHarian', $IDHarian);
            $this->db->update($table, $data);
            return "1";
        }
        else{
            return "0";
        }
        
    }

    public function gantiAbsensi($table, $IDHarian, $data)
    {
        $this->db->where('IDHarian', $IDHarian);
        $this->db->update($table, $data);
    }

    public function hapusAbsensi($table, $IDHarian)
    {
        $this->db->delete('harian', array('IDHarian' => $IDHarian));
    }

    public function getJadwal()
    {
        $query = $this->db->get('jadwal');
        return $query->result_array();
    }

    public function getLog($IDLog = FALSE)
    {
        if ($IDLog == null) {
            // $query = $this->db->get('log');
            // return $query->result_array();

            $this->db->select('*');
             $this->db->from('log l');
             $this->db->order_by('Waktu','DESC');
             $this->db->order_by('Jam','DESC');
             $query = $this->db->get();
             return $query->result_array();
        }
        else
        {
            $query = "SELECT * FROM `log` WHERE `IDLog` = $IDLog";
            return $this->db->query($query)->row_array();
        }
    }

    public function penggantiPIC($table, $data)
    {
        $this->db->insert($table,$data);
    }

    public function getPenggantiPIC()
    {
        $query = $this->db->order_by('p.Waktu','ASC');
        $query = $this->db->order_by('c.NamaChecklist','ASC');
        $query = $this->db->select('j.Tanggal, c.Jam, c.NamaChecklist, p.NamaPICS, p.NamaPICP, p.Waktu');
         $query = $this->db->from('penggantipic p');
         $query = $this->db->join('checklist c','c.IDChecklist=p.IDChecklist');
         $query = $this->db->join('jchecklist j','j.IDJadwalChecklist=p.IDJadwalChecklist');
         $query = $this->db->get();
         return $query->result_array();
    }

    public function getKriteria()
    {
        $query = $this->db->get('weightproduct');
        return $query->result_array();
    }

    public function gantiBobotWP($table, $data, $IDParameter )
    {

        $this->db->where('IDParameter', $IDParameter);
        $this->db->update($table, $data);
    }

    public function gantiJadwal($table, $data, $IDJadwal )
    {

        $this->db->where('IDJadwal', $IDJadwal);
        $this->db->update($table, $data);
    }

    public function penjadwalan($IDChecklist, $data, $tanggal)
    {
        $query = "SELECT * FROM `jChecklist` WHERE `IDChecklist` = '$IDChecklist' AND `Tanggal` = '$tanggal'";
        $hasil =  $this->db->query($query)->row_array();

        if ($hasil == NULL) {
            $this->db->insert('jChecklist',$data);
        }
        else{   
            $this->db->where('IDJadwalChecklist', $hasil['IDJadwalChecklist']);
            $this->db->update('jChecklist', $data);
        }
    }

}
