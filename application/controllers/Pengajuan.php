<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Pengajuan_model', 'Jenis_surat_model']);
        $this->load->library(['session', 'form_validation']);
        $this->load->helper(['url', 'form']);

        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
        if ($this->session->userdata('role_name') !== 'mahasiswa') {
            redirect('dashboard');
        }
    }

    public function index()
    {
        $user_id = $this->session->userdata('user_id');
        $data['title']      = 'Riwayat Pengajuan Surat';
        $data['pengajuan']  = $this->Pengajuan_model->get_by_user($user_id);
        $this->load->view('pengajuan/riwayat', $data);
    }

    public function buat()
    {
        $data['title']       = 'Ajukan Surat Baru';
        $data['jenis_surat'] = $this->Jenis_surat_model->get_all_aktif();
        $this->load->view('pengajuan/form', $data);
    }
}