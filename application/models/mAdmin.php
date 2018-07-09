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

    public function hapusPIC($table, $data, $NIK)
    {
        $this->db->where('NIK', $NIK);
        $this->db->update($table, $data);
    }

    public function tambahChecklist($table, $data, $namaChecklist, $jam)
    {
        $query = "SELECT * FROM `checklist` WHERE `NamaChecklist` = '$namaChecklist' AND `Jam` = $jam";
        $hasil =  $this->db->query($query)->row_array();
        if ($hasil == NULL) {
            $this->db->insert($table,$data);
            return "_".$data['Jam'];
        }
        else{
            return $hasil['Jam'];
        }
    }

    public function getChecklist($IDChecklist =  false)
    {
        if ($IDChecklist == null) {
            $query = $this->db->get('checklist');
            return $query->result_array();
        }
        else
        {
            $query = "SELECT * FROM `checklist` WHERE `IDChecklist` = $IDChecklist";
            return $this->db->query($query)->row_array();
        }
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
        else{
            $this->db->where('IDChecklist', $IDChecklist);
            $this->db->update($table, $data);
            return "1";
        }
        
    }

    public function hapusChecklist($table, $data, $IDChecklist)
    {
        $this->db->where('IDChecklist', $IDChecklist);
        $this->db->update($table, $data);
    }

    public function getAbsensi($IDHarian = FALSE)
    {
        if ($IDHarian == NULL) {
            $this->db->select('h.IDHarian, h.NIK, h.IDJadwal, h.Hari, h.Kehadiran, p.NamaPIC, j.Shift, j.Jam');
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

    public function tambahAbsensi($table, $data, $NIK, $IDJadwal, $hari)
    {
        $query = "SELECT * FROM $table WHERE `NIK` = '$NIK' AND `IDJadwal` = $IDJadwal AND `hari` = '$hari'";
        $hasil =  $this->db->query($query)->row_array();

        if ($hasil == NULL) {
            $this->db->insert($table,$data);
            return "1";
        }
        else{
            return "0";
        }
    }

    public function editAbsensi($table, $IDHarian, $data, $NIK, $IDJadwal)
    {

    }

    public function getJadwal()
    {
        $query = $this->db->get('jadwal');
        return $query->result_array();
    }

    public function hapusAbsensi($table, $IDHarian)
    {
        $this->db->delete('harian', array('IDHarian' => $IDHarian));
    }
}
