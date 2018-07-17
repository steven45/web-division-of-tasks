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
}