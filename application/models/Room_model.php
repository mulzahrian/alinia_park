<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Room_model extends CI_Model
{
    // public function getRoomData()
    // {
    //     $query = "SELECT `tbl_kamar`.* FROM `tbl_kamar`";
    //     return $this->db->query($query)->result_array();
    // }

    public function getRoomData()
    {
        $query = $this->db->query("CALL PRC_GET_PACKAGE()");
        return $query->result();
    }
    
}
