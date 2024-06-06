<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardTiket extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //is_logged_in();
        $this->load->model('Room_model');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $ticket = $this->db->query("SELECT DATE_FORMAT(CURDATE(), '%d') AS current_month, a.Id_package_master, b.package_name, a.master_package_name, a.package_price FROM tbl_package_master a, tbl_package b WHERE a.id_package = b.Id_package AND b.Id_package = 1");
        $data['tickets'] = $ticket->result_array();
        //$this->load->view('user/index', $data);
        //$this->load->view('welcome_message');
        $this->load->view('dashboard/das_tiket',$data);
    }
    
}
