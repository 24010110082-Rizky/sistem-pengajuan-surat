<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
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
        $user_id        = $this->session->userdata('user_id');
        $data['title']  = 'Profil Saya';
        $data['user']   = $this->User_model->get_by_id($user_id);
        $this->load->view('profil/index', $data);
    }
}