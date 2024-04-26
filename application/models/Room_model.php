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
        $query = $this->db->query("SELECT * FROM tbl_package_master WHERE id_package = ?", array($id_package));
        return $query->result_array();
    // return $this->db->get('tbl_package_master', ['id_package' => $id_package])->result();
    }

    public function getPackageDetailById($id_package_master)
    {
        $query = $this->db->query("SELECT a.id_package_detail, a.name_detail_pack, b.name FROM tbl_package_detail a, USER b WHERE a.create_by = b.id and a.id_package_master = ?", array($id_package_master));
        return $query->result_array();
    // return $this->db->get('tbl_package_master', ['id_package' => $id_package])->result();
    }

    public function insert_package_detail($data) {
        $this->db->insert('tbl_package_detail', $data);
        if ($this->db->affected_rows() > 0) {
            return true; // Insert successful
        } else {
            return false; // Insert failed
        }
    }
    
}
