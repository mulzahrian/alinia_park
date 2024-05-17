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
    }

    public function getPackageDetailById($id_package_master)
    {
        $query = $this->db->query("SELECT a.id_package_detail, a.name_detail_pack, b.name FROM tbl_package_detail a, USER b WHERE a.create_by = b.id and a.id_package_master = ?", array($id_package_master));
        return $query->result_array();
    }

    public function insert_package_detail($data) {
        $this->db->insert('tbl_package_detail', $data);
        if ($this->db->affected_rows() > 0) {
            return true; // Insert successful
        } else {
            return false; // Insert failed
        }
    }

    public function getTypeData()
    {
        $query = $this->db->query("SELECT a.Id_type_package, a.type_name, b.name FROM tbl_package_type a, USER b WHERE a.create_by = b.id");
        return $query->result_array();
    }

    public function getHotelData()
    {
        $query = $this->db->query("SELECT a.Id_hotel, a.hotel_name,a.price,b.name FROM tbl_hotel a, USER b WHERE a.create_by = b.id");
        return $query->result_array();
    }

    public function getImageById($id_hotel)
    {
        $query = $this->db->query("SELECT a.image_hotel FROM tbl_hotel a WHERE a.Id_hotel = ?", array($id_hotel));
        return $query->result_array();
    }

    public function getHotelDetailById($id_hotel)
    {
        $query = $this->db->query("SELECT a.id_hotel_detail, a.hotel_detail, b.name FROM tbl_hotel_detail a, USER b WHERE a.create_by = b.id and a.id_hotel = ?", array($id_hotel));
        return $query->result_array();
    }

    public function getHotelManageById($id_hotel)
    {
        $query = $this->db->query("SELECT a.id_hotel_manage, a.room_avail,a.people, b.name FROM tbl_hotel_manage a, USER b WHERE a.create_by = b.id and a.id_hotel = ?", array($id_hotel));
        return $query->result_array();
    }

    public function getHotelTypeData()
    {
        $query = $this->db->query("SELECT a.Id_hotel_type, a.hotel_type, b.name FROM tbl_hotel_type a, USER b WHERE a.create_by = b.id");
        return $query->result_array();
    }

    public function get_hotel_types() {
        return $this->db->get('tbl_hotel_type')->result_array();
    }
    
    public function get_hotels_by_type($type_id) {
        return $this->db->get_where('tbl_hotel', ['hotel_type' => $type_id])->result_array();
    }

    public function insert_order_package($data) {
        $this->db->insert('tbl_order', $data);
        if ($this->db->affected_rows() > 0) {
            return true; // Insert successful
        } else {
            return false; // Insert failed
        }
    }

    public function getPackageDetailorder($id_package_mas)
    {
        $query = $this->db->query("SELECT * FROM tbl_package_master WHERE Id_package_master = ?", array($id_package_mas));
        return $query->result_array();
    }

    public function getHotelDetailorder($id_hotel)
    {
        $query = $this->db->query("SELECT * FROM tbl_hotel WHERE Id_hotel = ?", array($id_hotel));
        return $query->result_array();
    }

    public function check_has_order($create_by)
    {
        $query = $this->db->query("SELECT COUNT(1) as total FROM `tbl_order` a WHERE a.status = 1 AND a.create_by = ?",array($create_by));
        return $query->result_array();
    }

    public function getOrderStatusActive($create_by)
    {
        $query = $this->db->query("SELECT * FROM `tbl_order` a WHERE a.status = 1 AND a.create_by = ?",array($create_by));
        return $query->result_array();
    }

    public function insert_order_detail($data) {
        $this->db->insert('tbl_order_detail', $data);
        if ($this->db->affected_rows() > 0) {
            return true; // Insert successful
        } else {
            return false; // Insert failed
        }
    }

    public function getAllPackageMaster()
    {
        $query = $this->db->query("SELECT * FROM tbl_package_master k where k.status = 1");
        return $query->result_array();
    }
    
}
