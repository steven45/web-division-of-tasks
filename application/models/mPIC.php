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

    public function getChecklist()
    {

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
            $query = $this->db->order_by('h.Hari','ASC');
            $this->db->select('h.IDHarian, h.NIK, h.IDJadwal, h.Hari, h.Kehadiran, p.NamaPIC, j.Shift, j.Jam, p.Status');
             $this->db->from('harian h');
             $this->db->join('pic p','p.NIK=h.NIK');
             $this->db->join('jadwal j','j.IDJadwal=h.IDJadwal');
             $query = $this->db->get();
             return $query->result_array();
        }
        else{
            $this->db->select('h.IDHarian, h.NIK, h.IDJadwal, h.Hari, h.Kehadiran, p.NamaPIC, j.Shift, j.Jam');
             $this->db->from('harian h');
             $this->db->join('pic p','p.NIK=h.NIK');
             $this->db->join('jadwal j','j.IDJadwal=h.IDJadwal');
             $this->db->where(array('IDHarian' => $IDHarian));
             $query = $this->db->get();
             return $query->result_array();
        }
    }
}