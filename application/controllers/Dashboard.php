<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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

        $id_user = $data['user']['id'];
        $data['hotels'] = $this->Room_model->getHotelDashboard();
        //$this->load->view('user/index', $data);
        //$this->load->view('welcome_message');
        $this->load->view('dashboard/index',$data);
    }


    
}
