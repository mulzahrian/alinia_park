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
        $data['title'] = 'Management Room';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('management/index');
            $this->load->view('templates/footer');
        } else {
            redirect('menu');
        }
    }

    public function get_room_data(){
      
		$result['Data'] = $this->Room_model->getRoomData();
		$this->output->set_output(json_encode($result));
	}


    


}
