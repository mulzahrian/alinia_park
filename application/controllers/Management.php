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

    public function hotel()
    {
        $data['title'] = 'Hotel Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->form_validation->set_rules('hotel_name', 'Hotel_name', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('management/hotel',$data);
            $this->load->view('templates/footer');
        }
    }
    
    public function get_hotel_data(){
		$result['Data'] = $this->Room_model->getHotelData();
		$this->output->set_output(json_encode($result));
	}

    public function insertHotel()
    {
        
        $hotel_name = $this->input->post('hotel_name');
        $hotel_price = $this->input->post('hotel_price');
        $hotel_type = $this->input->post('hotel_price');
        $user_id = $this->input->post('user_id_hotel');
            // cek jika ada gambar yang akan diupload
        $upload_image = $_FILES['image_hotel']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image_hotel')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image_hotel', $new_image);
                } else {
                    echo $this->upload->dispay_errors();
                }
            }
            $data = [
                'hotel_name' => $hotel_name,
                'price' => $hotel_price,
                'type_hotel' => $hotel_type,
                'image_hotel' => $upload_image,
                'create_by' => $user_id
            ];
            $this->db->insert('tbl_hotel', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data baru telah di upload</div>');
            redirect('management/hotel');
        
    }

    public function get_image_hotel(){
        $Id_hotel = $this->input->post('Id_hotel');
        $query = $this->db->query("SELECT a.image_hotel FROM tbl_hotel a WHERE a.Id_hotel = ?", array($Id_hotel));
        $result = $query->row_array();
        echo base_url('assets/img/profile/') . $result['image_hotel'];
    }

    public function get_hotel_detail(){
        $id_hotel = $this->input->post('id_hotel');
        $result['Data'] = $this->Room_model->getHotelDetailById($id_hotel);
		$this->output->set_output(json_encode($result));
    }

    public function get_hotel_manage(){
        $id_hotel = $this->input->post('id_hotel');
        $result['Data'] = $this->Room_model->getHotelManageById($id_hotel);
		$this->output->set_output(json_encode($result));
    }

    public function type_hotel(){
        $data['title'] = 'Type Hotel';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('management/hotel_type');
            $this->load->view('templates/footer');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Master Package Added!</div>');
        } 
    }

    public function get_type_hotel(){
		$result['Data'] = $this->Room_model->getHotelTypeData();
		$this->output->set_output(json_encode($result));
	}

    public function approval(){
        $data['title'] = 'Approval';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('management/approval');
            $this->load->view('templates/footer');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Master Package Added!</div>');
        } 
    }

    public function get_approval(){
		$result['Data'] = $this->Room_model->getApprovalData();
		$this->output->set_output(json_encode($result));
	}

    public function update_flag_app(){;
        $id_order = $this->input->post('id_order');
        if ($this->Room_model->updateOrderFlag($id_order)) {
            $this->output->set_status_header(200);
            $this->output->set_output(json_encode(array('status' => '200')));
        } else {
            $this->output->set_status_header(500);
            $this->output->set_output(json_encode(array('status' => '500')));
        }
    }

    public function update_type(){;
        $Id_type_package = $this->input->post('Id_type_package');
        $type_name = $this->input->post('type_name');
        $create_by = $this->input->post('create_by');
        if ($this->Room_model->updateType($Id_type_package,$type_name,$create_by)) {
            $this->output->set_status_header(200);
            $this->output->set_output(json_encode(array('status' => '200')));
        } else {
            $this->output->set_status_header(500);
            $this->output->set_output(json_encode(array('status' => '500')));
        }
    }

    public function delete_type(){;
        $Id_type_package = $this->input->post('Id_type_package');
        if ($this->Room_model->deleteType($Id_type_package)) {
            $this->output->set_status_header(200);
            $this->output->set_output(json_encode(array('status' => '200')));
        } else {
            $this->output->set_status_header(500);
            $this->output->set_output(json_encode(array('status' => '500')));
        }
    }

    public function add_type_package() {
        // Assuming you're getting data from a form post
        $data = array(
            'type_name' => $this->input->post('input_type_package'),
            'create_by' => $this->input->post('create_by'),
            'status' => $this->input->post('status'),
            // Add other fields as needed
        );
        // Call the insert function
        if ($this->Room_model->insert_package_type($data)) {
            // Insert successful
            $this->output->set_status_header(200);
            $this->output->set_output(json_encode(array('status' => '200')));
        } else {
            // Insert failed
            $this->output->set_status_header(500);
            $this->output->set_output(json_encode(array('status' => '500')));
        }
    }

    public function room_type(){
        $data['title'] = 'Type Hotel';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('management/room_type');
            $this->load->view('templates/footer');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Master Package Added!</div>');
        } 
    }

}
