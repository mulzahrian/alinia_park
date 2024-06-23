<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardPembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //is_logged_in();
        $this->load->model('Room_model');
    }

    public function index()
    {
        $data['title'] = 'Dashboard Pembayaran';
        
        $this->load->view('dashboard/das_pembayaran');
    }
    
}
