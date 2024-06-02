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
                    $message = 'Silahkan cek menu approval terdapat user yang telah memesan paket';
                    $this->send_whatsapp($message);
                }else{
                    if ($this->upload->do_upload('payment_image')) {
                        $new_image = $this->upload->data('file_name');
                        $this->db->set('payment_image', $new_image);
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Error Data!</div>');
                        redirect('payment');
                    }
                }
            }
            if($check != 1){
                if ($this->Room_model->paymentProses($upload_image,$user_id)) {
                    redirect('payment');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Error Data!</div>');
                    redirect('payment');
                }
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Format File Upload Todak Sesuai</div>');            }
                redirect('payment');
        }

        function send_whatsapp($message){
            $phone="+6285265711545";  // Enter your phone number here
            $apikey="9264248";       // Enter your personal apikey received in step 3 above
        
            $url='https://api.callmebot.com/whatsapp.php?source=php&phone='.$phone.'&text='.urlencode($message).'&apikey='.$apikey;
        
            if($ch = curl_init($url))
            {
                curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
                $html = curl_exec($ch);
                $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                // echo "Output:".$html;  // you can print the output for troubleshooting
                curl_close($ch);
                return (int) $status;
            }
            else
            {
                return false;
            }
        }
}
