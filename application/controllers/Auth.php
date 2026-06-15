<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library(['session', 'form_validation']);
        $this->load->helper(['url', 'form']);
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

        $data['title'] = 'Login - Sistem Pengajuan Surat';
        $this->load->view('auth/login', $data);
    }

    public function proses_login()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Username dan password wajib diisi!');
            redirect('login');
        }

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->User_model->login($username, $password);

        if ($user) {
            // Simpan data session
            $session_data = [
                'logged_in'  => TRUE,
                'user_id'    => $user->id,
                'username'   => $user->username,
                'name'       => $user->name,
                'nim'        => $user->nim,
                'role_id'    => $user->role_id,
                'role_name'  => $user->role_name,
            ];
            $this->session->set_userdata($session_data);

            // Redirect sesuai role
            if ($user->role_name === 'admin') {
                redirect('dashboard');
            } else {
                redirect('pengajuan');
            }
        } else {
            $this->session->set_flashdata('error', 'Username atau password salah!');
            redirect('login');
        }
    }
}