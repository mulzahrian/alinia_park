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

    public function getPackageMasterById($id_package)
    {
        $query = $this->db->query("SELECT * FROM tbl_package_master WHERE id_package = 1");
        return $query->result_array();
    // return $this->db->get('tbl_package_master', ['id_package' => $id_package])->result();
    }
    
}
