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

    public function getPIC($NIK = null)
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

    public function editPIC($table, $data, $NIK)
    {

        $this->db->where('NIK', $NIK);
        $this->db->update($table, $data);
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

    public function editChecklist($table, $data, $IDChecklist)
    {

        $this->db->where('IDChecklist', $IDChecklist);
        $this->db->update($table, $data);
    }
}
