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
        $query = $this->db->query("SELECT COUNT(1) as total FROM `tbl_order` a WHERE a.status IN(1,2) AND a.create_by = ?",array($create_by));
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

    public function updateOrder($create_by, $bank_code)
    {
        $this->db->query("UPDATE tbl_order a SET a.status = 2, a.bank_code = ? WHERE a.status = 1 AND a.create_by = ?", array($bank_code, $create_by));
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getPaymentOrder($create_by)
    {
        $query = $this->db->query("SELECT a.*,b.account_no,b.bank_name FROM tbl_order a,tbl_bank b WHERE a.status IN(2,3,4)  AND a.bank_code = b.account_no AND a.create_by = ?",array($create_by));
        return $query->result_array();
    }

    public function paymentProses($upload_image,$create_by)
    {
        $this->db->query("UPDATE tbl_order a SET a.status = 4,a.image_order = ? WHERE a.status = 2 AND a.create_by = ?", array($upload_image,$create_by));
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getApprovalData()
    {
        $query = $this->db->query("SELECT a.id_order,d.name,a.type,a.image_order,c.bank_name,c.account_no,d.phone,d.email FROM tbl_order a,tbl_bank c,user d  WHERE a.bank_code = c.account_no
        AND a.create_by = d.id
        AND a.status = 4
        AND c.status = 1
        AND d.is_active = 1
        ORDER BY a.id_order ASC;");
        return $query->result_array();
    }

    public function updateOrderFlag($id_order)
    {
        $this->db->query("UPDATE tbl_order a SET a.status = 5 WHERE a.status = 4 AND a.id_order = ?", array($id_order));
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function checkOrderDone($create_by)
    {
        $query = $this->db->query("SELECT COUNT(1) as total FROM `tbl_order` a WHERE a.status = 5 AND a.create_by = ?",array($create_by));
        return $query->result_array();
    }

    public function get_total_orders_by_status_and_user($status, $user_id) {
        $this->db->select('COUNT(1) AS TOTAL');
        $this->db->from('tbl_order');
        $this->db->where('status', $status);
        $this->db->where('create_by', $user_id);
        $query = $this->db->get();
        return $query->row()->TOTAL;
    }
    
    public function finalProses($create_by)
    {
        $this->db->query("UPDATE tbl_order a SET a.status = 6 WHERE a.status = 5 AND a.create_by = ?", array($create_by));

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function checkHasComment($create_by)
    {
        $query = $this->db->query("SELECT COUNT(1) as total FROM `tbl_rate` a WHERE a.status = 1 AND a.created_by = ?",array($create_by));
        return $query->result_array();
    }

    public function insert_rate($data) {
        $this->db->insert('tbl_rate', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getHistoryData($create_by)
    {
        $query = $this->db->query("SELECT
        a.id_order,
        b.account_no,
        b.bank_name,
        a.type,
        a.orderId,
        CASE
            WHEN a.end_date < CURDATE() THEN 1
            ELSE 0
        END AS status,
        CASE
            WHEN a.order_type = 1 THEN 'Personal'
            ELSE 'Group'
        END AS status_order,
        SUM(c.total_price) AS total_order
    FROM 
        tbl_order a
        JOIN tbl_bank b ON a.bank_code = b.account_no
        JOIN tbl_order_detail c ON a.id_order = c.id_order
    WHERE 
        a.status = 6
        a.create_by = ?
    GROUP BY 
        b.account_no, 
        b.bank_name, 
        a.type, 
        a.orderId, 
        status, 
        status_order",array($create_by));
        return $query->result_array();
    }

    public function get_orders_by_date($id_user) {
        $this->db->select('a.id_order, b.account_no, b.bank_name, a.type, a.orderId, 
            CASE
                WHEN a.end_date < CURDATE() THEN 1
                ELSE 0
            END AS status,
            CASE
                WHEN a.order_type = 1 THEN \'Personal\'
                ELSE \'Group\'
            END AS status_order,
            DATE_FORMAT(a.create_date, \'%d %b,%Y,%H:%i:%s\') AS formatted_create_date,
            SUM(c.total_price) AS total_order');
        $this->db->from('tbl_order a');
        $this->db->join('tbl_bank b', 'a.bank_code = b.account_no');
        $this->db->join('tbl_order_detail c', 'a.id_order = c.id_order');
        $this->db->where('a.create_by', $id_user);
        $this->db->where('a.status', 6);
        $this->db->order_by('a.id_order', 'DESC');
        $this->db->group_by('a.id_order, b.account_no, b.bank_name, a.type, a.orderId, status, status_order');

        $query = $this->db->get();
        return $query->result();
    }

    public function getDetailHistory($id_order,$create_by)
    {
        $query = $this->db->query("SELECT * FROM tbl_order k WHERE k.id_order = ? and k.status = 6 and k.create_by = ?",array($id_order,$create_by));
        return $query->result_array();
    }

}
