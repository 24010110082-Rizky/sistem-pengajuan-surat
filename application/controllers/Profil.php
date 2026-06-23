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

    public function update()
    {
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'valid_email');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('profil');
        }

        $user_id = $this->session->userdata('user_id');

        $data = [
            'name'     => $this->input->post('name'),
            'email'    => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'username' => $this->input->post('username'),
        ];

        if ($this->User_model->update_profil($user_id, $data)) {
            // Update session name
            $this->session->set_userdata('name', $data['name']);
            $this->session->set_flashdata('success', 'Profil berhasil diperbarui!');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui profil!');
        }
        redirect('profil');
    }
}