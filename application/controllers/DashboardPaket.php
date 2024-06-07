<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardPaket extends CI_Controller
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

        $data['package_tbls'] = $this->db->get('tbl_package')->result_array();

        $data['packages'] = [];
        foreach ($data['package_tbls'] as $package_tbl) {
            $query_master = $this->db->query("SELECT * FROM tbl_package_master WHERE id_package = ?", array($package_tbl['Id_package']));
            if ($query_master) {
                $packages_master = $query_master->result_array();
                foreach ($packages_master as $package_master) {
                    $query_detail = $this->db->query("SELECT * FROM tbl_package_detail WHERE id_package_master = ?", array($package_master['Id_package_master']));
                    if ($query_detail) {
                        $package_details = $query_detail->result_array();
                        // Menyimpan data detail paket ke dalam array dengan key berdasarkan nama paket
                        $data['packages'][$package_tbl['package_name']][$package_master['Id_package_master']] = [
                            'master' => $package_master,
                            'details' => $package_details
                        ];
                    }
                }
            }
        }
        $this->load->view('dashboard/das_paket',$data);
    }
    
}
