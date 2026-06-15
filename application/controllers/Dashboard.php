<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library(['session']);
        $this->load->helper(['url']);

        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
    }

    public function index()
    {
        if ($this->session->userdata('role_name') === 'admin') {
            $this->load->model(['Pengajuan_model']);
            $data['title']          = 'Dashboard Admin';
            $data['total']          = $this->Pengajuan_model->count_all();
            $data['menunggu']       = $this->Pengajuan_model->count_by_status('menunggu');
            $data['diproses']       = $this->Pengajuan_model->count_by_status('diproses');
            $data['selesai']        = $this->Pengajuan_model->count_by_status('selesai');
            $data['ditolak']        = $this->Pengajuan_model->count_by_status('ditolak');
        } else {
            redirect('pengajuan');
        }
    }
}