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
    $ticket = $this->db->query("SELECT DATE_FORMAT(CURDATE(), '%d') AS current_month, b.package_name, a.master_package_name, a.package_price FROM tbl_package_master a, tbl_package b WHERE a.id_package = b.Id_package AND b.Id_package = 1");
    $data['tickets'] = $ticket->result_array();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('order/index',$data);
    $this->load->view('modal/order_modal');
    $this->load->view('templates/footer2');
}

        public function order()
        {
            $data['title'] = 'Order';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            // Menambahkan pengambilan data dari tabel tbl_order
            $data['orders'] = $this->db->get_where('tbl_order', ['create_by' => $data['user']['id']])->result_array();

            $this->load->view('templates/header2', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('order/order',$data);
            $this->load->view('modal/order_modal');
            $this->load->view('templates/footer2');
        }

        public function add_order_package() {
            // Assuming you're getting data from a form post
            $data = array(
                'order_type' => $this->input->post('order_type'),
                'type' => $this->input->post('type'),
                'start_date' => $this->input->post('date'),
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



}
