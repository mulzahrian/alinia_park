<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardHotel extends CI_Controller
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
        $data['hotels2'] = $this->Room_model->getHotelDashboardCheap();
        $data['hotels3'] = $this->Room_model->getHotelDashboardBest();
        $data['reviews'] = $this->Room_model->getReviewDashboard();
        //$this->load->view('user/index', $data);
        //$this->load->view('welcome_message');
        $this->load->view('dashboard/das_hotel',$data);
    }
    
}