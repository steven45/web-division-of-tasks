<?php
class mPIC extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getPIC($table, $where)
    {
    	return $this->db->get_where($table,$where);
    }
}