<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payment extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //is_logged_in();
        $this->load->model('Room_model');
    }
        public function index()
        {
            $data['title'] = 'Payment';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $id_user = $data['user']['id'];
            
            $data['payments'] = $this->Room_model->getPaymentOrder($id_user);

            $this->load->view('templates/header2', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('payment/index',$data);
            $this->load->view('templates/footer2');
        }
}
