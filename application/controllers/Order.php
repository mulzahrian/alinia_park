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
    $this->load->view('templates/header', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('order/index',$data);
    $this->load->view('templates/footer2');
}



}
