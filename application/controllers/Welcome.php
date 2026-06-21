<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(['url']);
        $this->load->library(['session']);
    }

	public function index()
	{
        if ($this->session->userdata('logged_in')) {
            $role = $this->session->userdata('role_name');
            if ($role === 'admin') {
                redirect('dashboard');
            } else {
                redirect('pengajuan');
            }
        }

        $data['title'] = 'Selamat Datang - Sistem Pengajuan Surat Mahasiswa';
        $this->load->view('welcome/index', $data);
	}
}