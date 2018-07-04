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
}
