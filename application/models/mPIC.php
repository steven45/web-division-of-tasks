<?php
class mPIC extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getPIC($NIK, $password)
    {
    	$query = "SELECT * FROM `pic` WHERE `NIK` = $NIK AND `Password` = '$password'";
        return $this->db->query($query)->row_array();
    }

    public function getChecklist($IDChecklist =  false)
    {
        if ($IDChecklist == null) {
            $query = $this->db->order_by('c.Hari','ASC');
            $query = $this->db->order_by('c.NamaChecklist','ASC');
            $query = $this->db->order_by('c.Jam','ASC');
            $query = $this->db->select('p.NamaPIC, c.IDChecklist, c.Hari,c.NIK, c.Info, c.NamaChecklist, c.Jam, c.Status, c.BatasPengecekan, c.StatusCheck, c.NIKP');
             $query = $this->db->from('checklist c');
             $query = $this->db->join('pic p','p.NIK=c.NIK');
             $query = $this->db->get();
             return $query->result_array();
        }
        else
        {
            $query = "SELECT * FROM `checklist` WHERE `IDChecklist` = $IDChecklist";
            return $this->db->query($query)->row_array();
        }
    }

    public function getDaftarPIC($NIK = false)
    {
    	if ($NIK == FALSE) {
    		$query = "SELECT * FROM `pic`";
    		return $this->db->query($query)->result_array();
    	}
    	else{
            $query = "SELECT * FROM `pic` WHERE `NIK` = $NIK";
            return $this->db->query($query)->row_array();
    	}
    }

    public function getAbsensiPIC($IDHarian = false)
    {
        if ($IDHarian == NULL) {
            $query = $this->db->order_by('j.Shift','ASC');
            $query = $this->db->order_by('h.Hari','ASC');
            $this->db->select('h.IDHarian, h.NIK, h.IDJadwal, h.Hari, h.Kehadiran, p.NamaPIC, j.Shift, j.Jam, p.Status');
             $this->db->from('harian h');
             $this->db->join('pic p','p.NIK=h.NIK');
             $this->db->join('jadwal j','j.IDJadwal=h.IDJadwal');
             $query = $this->db->get();
             return $query->result_array();
        }
        else{
            $query = $this->db->order_by('j.Shift','ASC');
            $this->db->select('h.IDHarian, h.NIK, h.IDJadwal, h.Hari, h.Kehadiran, p.NamaPIC, j.Shift, j.Jam');
             $this->db->from('harian h');
             $this->db->join('pic p','p.NIK=h.NIK');
             $this->db->join('jadwal j','j.IDJadwal=h.IDJadwal');
             $this->db->where(array('IDHarian' => $IDHarian));
             $query = $this->db->get();
             return $query->result_array();
        }
    }

    public function doChecklist($table, $data)
    {   
        $this->db->insert($table,$data);
        return '1';
    }

    public function ubahStatusCheck($IDChecklist, $status)
    {
        $statusCheck = array(
                'StatusCheck' => $status
            );
            
        $query = "UPDATE `checklist` SET `StatusCheck` = $status WHERE `checklist`.`IDChecklist` = $IDChecklist;";
        $this->db->query($query);
    }

    public function getLog($IDLog = FALSE)
    {
        if ($IDLog == null) {
            // $query = $this->db->get('log');
            // return $query->result_array();

            $this->db->select('*');
             $this->db->from('log l');
             $query = $this->db->get();
             return $query->result_array();
        }
        else
        {
            $query = "SELECT * FROM `log` WHERE `IDLog` = $IDLog";
            return $this->db->query($query)->row_array();
        }
    }

    public function notifikasi($table, $data)
    {
        $this->db->insert($table,$data);
    }

    public function ubahPassword($table, $NIK){
        $query = "SELECT * FROM $table WHERE `NIK` = $NIK";
        return $this->db->query($query)->row_array();
    }

    public function validasiUbahPassword($table, $data, $NIK){
        $this->db->where('NIK', $NIK);
        $this->db->update($table, $data);
    }

    public function tambahJumlah($NIK, $IDChecklist)
    {
        $query = "SELECT * FROM `pic` WHERE `NIK` = $NIK";
        $hasilP = $this->db->query($query)->row_array();
        $jumlahP = $hasilP['JumlahPengecekan'] + 1;

        $hasilC = $this->db->query("SELECT * FROM `checklist` WHERE `IDChecklist` = $IDChecklist")->row_array();
        if ($hasilC['TingkatPengecekan'] == 'Mudah') {
            $jumlahT = $hasilP['JMudah'] +1;
            $this->db->query("UPDATE `pic` SET `JMudah` = $jumlahT WHERE `pic`.`NIK` = $NIK;");
        }
        else if ($hasilC['TingkatPengecekan'] == 'Sedang'){
            $jumlahT = $hasilP['JSedang'] +1;   
            $this->db->query("UPDATE `pic` SET `JSedang` = $jumlahT WHERE `pic`.`NIK` = $NIK;");
        }
        else if ($hasilC['TingkatPengecekan'] == 'Sulit'){
            $jumlahT = $hasilP['JSulit'] +1;   
            $this->db->query("UPDATE `pic` SET `JSulit` = $jumlahT WHERE `pic`.`NIK` = $NIK;");
        }

        $query1 = "UPDATE `pic` SET `JumlahPengecekan` = $jumlahP WHERE `pic`.`NIK` = $NIK;";
        $this->db->query($query1);
    }

    public function lihatDataLog($table, $data)
    {
        return $this->db->get_where($table, $data)->result_array();
    }

}