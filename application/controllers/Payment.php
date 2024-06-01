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

        public function payment_proses(){
            //$create_by = $this->input->post('create_by');
            $user_id = $this->input->post('user_id');

            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['payment_image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/img/data/';

                $this->load->library('upload', $config);

                $file_type = pathinfo($upload_image, PATHINFO_EXTENSION);
                $allowed_types = ['gif', 'jpg', 'png'];
                $check = 0;
                if (!in_array($file_type, $allowed_types)) {
                    $check = 1;
                    // echo '<script>alert("Format file tidak sesuai. Hanya diperbolehkan mengupload file dengan format gif, jpg, atau png.");</script>';
                    // // redirect('payment');
                    // return false;
                    // $this->form_validation->set_message('username_check', '<div class="alert alert-danger text-center">User sudah login harap Logout terlebih dahulu</div>');
					// return FALSE;
                    // redirect('payment');
                }else{
                    if ($this->upload->do_upload('payment_image')) {
                        $new_image = $this->upload->data('file_name');
                        $this->db->set('payment_image', $new_image);
                    } else {
                        //$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                    }
                }

                
            }
            if($check != 1){
                if ($this->Room_model->paymentProses($upload_image,$user_id)) {
                    redirect('payment');
                } else {
                    echo print_r("Error Data");
                }
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Format File Upload Todak Sesuai</div>');            }
                redirect('payment');
        }
}
