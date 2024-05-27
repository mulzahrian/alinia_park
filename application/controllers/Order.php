<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //is_logged_in();
        $this->load->model('Room_model');
    }
    public function index()
    {
    $data['title'] = 'My Profile';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    
    // Mengambil data hotel_types dari model
    $data['hotel_types'] = $this->db->get('tbl_hotel_type')->result_array();

    // Mengambil data hotel berdasarkan type_hotel
    $data['hotels'] = [];
    foreach ($data['hotel_types'] as $hotel_type) {
        $query = $this->db->query("SELECT a.*,b.* FROM tbl_hotel a,tbl_hotel_manage b WHERE a.Id_hotel = b.id_hotel and a.type_hotel = ?", array($hotel_type['Id_hotel_type']));
        if ($query) {
            $hotels = $query->result_array();
            $data['hotels'][$hotel_type['hotel_type']] = $hotels;
        }
    }

    // Mengambil data package
    // Mengambil data package
$data['package_tbls'] = $this->db->get('tbl_package')->result_array();

$data['packages'] = [];
foreach ($data['package_tbls'] as $package_tbl) {
    $query_master = $this->db->query("SELECT * FROM tbl_package_master WHERE id_package = ?", array($package_tbl['Id_package']));
    if ($query_master) {
        $packages_master = $query_master->result_array();
        foreach ($packages_master as $package_master) {
            $query_detail = $this->db->query("SELECT * FROM tbl_package_detail WHERE id_package_master = ?", array($package_master['Id_package_master']));
            if ($query_detail) {
                $package_details = $query_detail->result_array();
                // Menyimpan data detail paket ke dalam array dengan key berdasarkan nama paket
                $data['packages'][$package_tbl['package_name']][$package_master['Id_package_master']] = [
                    'master' => $package_master,
                    'details' => $package_details
                ];
            }
        }
    }
}
    $ticket = $this->db->query("SELECT DATE_FORMAT(CURDATE(), '%d') AS current_month, a.Id_package_master, b.package_name, a.master_package_name, a.package_price FROM tbl_package_master a, tbl_package b WHERE a.id_package = b.Id_package AND b.Id_package = 1");
    $data['tickets'] = $ticket->result_array();

    $status = 5;
    $user_id = $data['user']['id']; // Sesuaikan dengan user_id yang diperlukan

    $total_orders = $this->Room_model->get_total_orders_by_status_and_user($status, $user_id);
    $data['show_modal'] = ($total_orders == 1) ? true : false;
    
    $this->load->view('templates/header', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('order/index',$data);
    $this->load->view('modal/order_modal');
    $this->load->view('modal/check_order');
    $this->load->view('modal/order_done');
    $this->load->view('modal/rate_modal');
    $this->load->view('templates/footer2');
}

        public function order()
        {
            $data['title'] = 'Order';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            // Ambil nilai type dari tbl_order_detail terlebih dahulu
            $this->db->select('b.type');
            $this->db->from('tbl_order_detail a');
            $this->db->join('tbl_order b', 'a.id_order = b.id_order');
            $this->db->where('b.create_by', $data['user']['id']);
            $this->db->where('b.status', 1);
            $this->db->limit(1); // Asumsikan kita hanya perlu satu nilai type untuk pengecekan
            $query = $this->db->get();
            $row = $query->row();
            // var_dump($row);
            // print_r($row);
            if ($row) {
                $type = $row->type;
                // Membuat query utama berdasarkan nilai type
                $this->db->select('b.id_order, b.type, b.order_type, a.total_price');
                if ($type == 'Paket') {
                    $this->db->select('a.id_package_mas,c.master_package_name');
                    $this->db->from('tbl_order_detail a');
                    $this->db->join('tbl_order b', 'a.id_order = b.id_order');
                    $this->db->join('tbl_package_master c', 'a.id_package_mas = c.Id_package_master');
                } elseif ($type == 'Hotel') {
                    $this->db->select('a.id_hotel, c.hotel_name');
                    $this->db->from('tbl_order_detail a');
                    $this->db->join('tbl_order b', 'a.id_order = b.id_order');
                    $this->db->join('tbl_hotel c', 'a.id_hotel = c.Id_hotel');
                }
                $this->db->where('a.status', 1);
                $this->db->where('b.status', 1);
                $this->db->where('b.create_by', $data['user']['id']);
                $data['orders'] = $this->db->get()->result_array();
                // var_dump($data['orders']);
                // print_r($data['orders']);
            } else {
                $data['orders'] = []; // Tidak ada data jika tidak ditemukan type
            }


            $this->load->view('templates/header2', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('order/order',$data);
            $this->load->view('modal/order_modal');
            $this->load->view('modal/detail_order_modal');
            $this->load->view('modal/check_order');
            $this->load->view('modal/modal_all_package');
            $this->load->view('templates/footer2');
        }

        public function add_order_package() {
            // Assuming you're getting data from a form post
            $data = array(
                'order_type' => $this->input->post('order_type'),
                'type' => $this->input->post('type'),
                'end_date' => $this->input->post('date'),
                'orderId' => $this->input->post('orderId'),
                'create_by' => $this->input->post('create_by'),
                'status' => $this->input->post('status'),
                // Add other fields as needed
            );
            // Call the insert function
            if ($this->Room_model->insert_order_package($data)) {
                // Insert successful
                $this->output->set_status_header(200);
                $this->output->set_output(json_encode(array('status' => '200')));
            } else {
                // Insert failed
                $this->output->set_status_header(500);
                $this->output->set_output(json_encode(array('status' => '500')));
            }
        }

        public function add_order_hotel() {
            // Assuming you're getting data from a form post
            $data = array(
                'order_type' => $this->input->post('order_type'),
                'type' => $this->input->post('type'),
                'start_date' => $this->input->post('date'),
                'end_date' => $this->input->post('end_date'),
                'create_by' => $this->input->post('create_by'),
                'orderId' => $this->input->post('orderId'),
                'status' => $this->input->post('status'),
                // Add other fields as needed
            );
            // Call the insert function
            if ($this->Room_model->insert_order_package($data)) {
                // Insert successful
                $this->output->set_status_header(200);
                $this->output->set_output(json_encode(array('status' => '200')));
            } else {
                // Insert failed
                $this->output->set_status_header(500);
                $this->output->set_output(json_encode(array('status' => '500')));
            }
        }

        public function get_detail_package(){
            $id_master_package = $this->input->post('id_master_package');
            $result['Data'] = $this->Room_model->getPackageDetailorder($id_master_package);
            $this->output->set_output(json_encode($result));
            
        }

        public function get_detail_hotel(){
            $id_hotel = $this->input->post('id_hotel');
            $result['Data'] = $this->Room_model->getHotelDetailorder($id_hotel);
            $this->output->set_output(json_encode($result));
            
        }

        public function get_order_status_active(){
            $create_by = $this->input->post('create_by');
            $result['Data'] = $this->Room_model->getOrderStatusActive($create_by);
            $this->output->set_output(json_encode($result));
            
        }

        public function check_has_order(){
            $create_by = $this->input->post('create_by');
            $result['Data'] = $this->Room_model->check_has_order($create_by);
            $this->output->set_output(json_encode($result));
            
        }

        public function insertOrderDetailPackage() {
            // Assuming you're getting data from a form post
            $data = array(
                'order_number' => $this->input->post('order_total'),
                'order_price' => $this->input->post('harga_order'),
                'total_price' => $this->input->post('total_order'),
                'id_package_mas' => $this->input->post('id_package_mas'),
                'id_order' => $this->input->post('id_order'),
                'create_by' => $this->input->post('create_by'),
                'status' => $this->input->post('status'),
                // Add other fields as needed
            );
            // Call the insert function
            if ($this->Room_model->insert_order_detail($data)) {
                // Insert successful
                $this->output->set_status_header(200);
                $this->output->set_output(json_encode(array('status' => '200')));
            } else {
                // Insert failed
                $this->output->set_status_header(500);
                $this->output->set_output(json_encode(array('status' => '500')));
            }
        }

        public function insertOrderDetailHotel() {
            // Assuming you're getting data from a form post
            $data = array(
                'order_number' => $this->input->post('order_total'),
                'order_price' => $this->input->post('harga_order'),
                'total_price' => $this->input->post('total_order'),
                'id_hotel' => $this->input->post('id_hotel_mas'),
                'id_order' => $this->input->post('id_order'),
                'create_by' => $this->input->post('create_by'),
                'status' => $this->input->post('status'),
                // Add other fields as needed
            );
            // Call the insert function
            if ($this->Room_model->insert_order_detail($data)) {
                // Insert successful
                $this->output->set_status_header(200);
                $this->output->set_output(json_encode(array('status' => '200')));
            } else {
                // Insert failed
                $this->output->set_status_header(500);
                $this->output->set_output(json_encode(array('status' => '500')));
            }
        }

        public function getAllMasterPackage(){
            $result['Data'] = $this->Room_model->getAllPackageMaster();
            $this->output->set_output(json_encode($result));
            
        }

        public function update_order(){
            $create_by = $this->input->post('create_by');
            $bank_code = $this->input->post('bank_code');
            if ($this->Room_model->updateOrder($create_by,$bank_code)) {
                $this->output->set_status_header(200);
                $this->output->set_output(json_encode(array('status' => '200')));
            } else {
                $this->output->set_status_header(500);
                $this->output->set_output(json_encode(array('status' => '500')));
            }
        }

        public function payment()
        {
            $data['title'] = 'Payment';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $id_user = $data['user']['id'];
            $data['payments'] = $this->Room_model->getPaymentOrder($id_user);

            $this->load->view('templates/header2', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('order/payment',$data);
            $this->load->view('templates/footer2');
        }

        public function check_order(){
            $create_by = $this->input->post('create_by');
            $data['Data'] = $this->Room_model->checkOrderDone($create_by);
            $this->output->set_output(json_encode($data));
        }

        public function finalProses(){
            $create_by = $this->input->post('create_by');
            if ($this->Room_model->finalProses($create_by)) {
                $this->output->set_status_header(200);
                $this->output->set_output(json_encode(array('status' => '200')));
            } else {
                $this->output->set_status_header(500);
                $this->output->set_output(json_encode(array('status' => '500')));
            }
        }

        public function check_comment(){
            $create_by = $this->input->post('create_by');
            $data['Data'] = $this->Room_model->checkHasComment($create_by);
            $this->output->set_output(json_encode($data));
        }

        public function insetRate() {
            $data = array(
                'comment' => $this->input->post('comment'),
                'start' => $this->input->post('start'),
                'created_by' => $this->input->post('created_by'),
                'status' => $this->input->post('status')
            );
            if ($this->Room_model->insert_rate($data)) {
                $this->output->set_status_header(200);
                $this->output->set_output(json_encode(array('status' => '200')));
            } else {
                $this->output->set_status_header(500);
                $this->output->set_output(json_encode(array('status' => '500')));
            }
        }

        public function history()
        {
            $data['title'] = 'History';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $id_user = $data['user']['id'];
            $data['payments'] = $this->Room_model->get_orders_by_date($id_user);

            $this->load->view('templates/header2', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('order/history',$data);
            $this->load->view('modal/detail_history');
            $this->load->view('templates/footer2');
        }

        public function getDetailHistory(){
            $create_by = $this->input->post('create_by');
            $id_order = $this->input->post('id_order');
            $data['Data'] = $this->Room_model->getDetailHistory($id_order,$create_by);
            $this->output->set_output(json_encode($data));
        }
        
}
