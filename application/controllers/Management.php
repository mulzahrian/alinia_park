<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Management extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Room_model');
    }

    public function index()
    {
        $data['title'] = 'Package Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('management1/index');
            $this->load->view('templates/footer');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Package Added!</div>');
            //redirect('management');
        }
    }

    public function get_room_data(){
      
		$result['Data'] = $this->Room_model->getRoomData();
		$this->output->set_output(json_encode($result));
	}

    public function master_package(){
        $data['title'] = 'Master Package';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('management1/master_package');
            $this->load->view('templates/footer');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Master Package Added!</div>');
            //redirect('management');
        }

        
    }

    public function get_master_package(){
        $id_package = $this->input->post('id_package');
        $result['Data'] = $this->Room_model->getPackageMasterById($id_package);
        //$result['Data'] = $this->Room_model->getRoomData();
		$this->output->set_output(json_encode($result));
        
    }


    


}
