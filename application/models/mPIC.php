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
            $query = $this->db->select('p.NamaPIC, c.IDChecklist, c.Hari,c.NIK, c.Info, c.NamaChecklist, c.Jam, c.Status, c.BatasPengecekan, c.StatusCheck');
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
        // $nJam = substr($jam, 0,2);
        // $query = "SELECT * FROM $table WHERE `Hari` = '$hari' AND `NamaChecklist` = '$namaChecklist' AND `NamaPIC` = '$namaPIC'  AND `Jam` = $nJam ";
        // $hasil =  $this->db->query($query)->row_array();
            $this->db->insert($table,$data);
            return '1';
    }

    public function ubahStatusCheck($IDChecklist)
    {
        $statusCheck = array(
                'StatusCheck' => '1'
            );
            
        $query = "UPDATE `checklist` SET `StatusCheck` = '1' WHERE `checklist`.`IDChecklist` = $IDChecklist;";
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

}