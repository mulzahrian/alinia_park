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
            $this->load->view('management/index');
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
            $this->load->view('management/master_package');
            $this->load->view('templates/footer');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Master Package Added!</div>');
            //redirect('management');
        }

        
    }

    public function get_master_package(){
        $id_package = $this->input->post('id_package');
        $result['Data'] = $this->Room_model->getPackageMasterById($id_package);
		$this->output->set_output(json_encode($result));
        
    }

    public function get_detail_package(){
        $id_master_package = $this->input->post('id_master_package');
        $result['Data'] = $this->Room_model->getPackageDetailById($id_master_package);
		$this->output->set_output(json_encode($result));
    }


    public function add_package_detail() {
        // Assuming you're getting data from a form post
        $data = array(
            'Id_package_master' => $this->input->post('Id_package_master'),
            'name_detail_pack' => $this->input->post('name_detail_pack'),
            'create_by' => $this->input->post('create_by'),
            'status' => $this->input->post('status'),
            // Add other fields as needed
        );
        // Call the insert function
        if ($this->Room_model->insert_package_detail($data)) {
            // Insert successful
            $this->output->set_status_header(200);
            $this->output->set_output(json_encode(array('status' => '200')));
        } else {
            // Insert failed
            $this->output->set_status_header(500);
            $this->output->set_output(json_encode(array('status' => '500')));
        }
    }

    public function type_package(){
        $data['title'] = 'Type Package';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('management/type');
            $this->load->view('templates/footer');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Master Package Added!</div>');
            //redirect('management');
        } 
    }

    public function get_type_data(){
		$result['Data'] = $this->Room_model->getTypeData();
		$this->output->set_output(json_encode($result));
	}
    


    


}
