<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardRegulasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //is_logged_in();
        $this->load->model('Room_model');
    }

    public function index()
    {
        $data['title'] = 'Dashboard Regulasi';
        
        $this->load->view('dashboard/das_regulasi');
    }
    
}
