<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Pengajuan_model', 'Jenis_surat_model', 'User_model']);
        $this->load->library(['session', 'form_validation']);
        $this->load->helper(['url', 'form']);

        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
        if ($this->session->userdata('role_name') !== 'admin') {
            redirect('pengajuan');
        }
    }

    public function pengajuan()
    {
        $data['title']     = 'Kelola Pengajuan';
        $data['pengajuan'] = $this->Pengajuan_model->get_all();
        $this->load->view('admin/kelola_pengajuan', $data);
    }

    public function update_pengajuan($id)
    {
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Status wajib dipilih!');
            redirect('admin/pengajuan');
        }

        $data = [
            'status'        => $this->input->post('status'),
            'catatan_admin' => $this->input->post('catatan_admin'),
        ];

        if ($this->Pengajuan_model->update_status($id, $data)) {
            $this->session->set_flashdata('success', 'Status pengajuan berhasil diperbarui!');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui status!');
        }
        redirect('admin/pengajuan');
    }

    public function jenis_surat()
    {
        $data['title']       = 'Kelola Jenis Surat';
        $data['jenis_surat'] = $this->Jenis_surat_model->get_all();
        $this->load->view('admin/kelola_surat', $data);
    }

    public function simpan_jenis_surat()
    {
        $this->form_validation->set_rules('nama_surat', 'Nama Surat', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/jenis-surat');
        }

        $data = [
            'nama_surat' => $this->input->post('nama_surat'),
            'deskripsi'  => $this->input->post('deskripsi'),
            'status'     => 'aktif',
        ];

        if ($this->Jenis_surat_model->tambah($data)) {
            $this->session->set_flashdata('success', 'Jenis surat berhasil ditambahkan!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan jenis surat!');
        }
        redirect('admin/jenis-surat');
    }

    public function edit_jenis_surat($id)
    {
        $this->form_validation->set_rules('nama_surat', 'Nama Surat', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/jenis-surat');
        }

        $data = [
            'nama_surat' => $this->input->post('nama_surat'),
            'deskripsi'  => $this->input->post('deskripsi'),
            'status'     => $this->input->post('status'),
        ];

        if ($this->Jenis_surat_model->update($id, $data)) {
            $this->session->set_flashdata('success', 'Jenis surat berhasil diperbarui!');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui jenis surat!');
        }
        redirect('admin/jenis-surat');
    }

    public function hapus_jenis_surat($id)
    {
        if ($this->Jenis_surat_model->hapus($id)) {
            $this->session->set_flashdata('success', 'Jenis surat berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus jenis surat!');
        }
        redirect('admin/jenis-surat');
    }

    public function mahasiswa()
    {
        $data['title']     = 'Kelola Data Mahasiswa';
        $data['mahasiswa'] = $this->User_model->get_all_mahasiswa();
        $this->load->view('admin/kelola_mahasiswa', $data);
    }

    public function simpan_mahasiswa()
    {
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('nim', 'NIM', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/mahasiswa');
        }

        if ($this->User_model->is_username_exist($this->input->post('username'))) {
            $this->session->set_flashdata('error', 'Username sudah digunakan!');
            redirect('admin/mahasiswa');
        }

        $data = [
            'name'     => $this->input->post('name'),
            'nim'      => $this->input->post('nim'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'email'    => $this->input->post('email'),
        ];

        if ($this->User_model->tambah($data)) {
            $this->session->set_flashdata('success', 'Data mahasiswa berhasil ditambahkan!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan mahasiswa!');
        }
        redirect('admin/mahasiswa');
    }

    public function edit_mahasiswa($id)
    {
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('nim', 'NIM', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/mahasiswa');
        }

        $data = [
            'name'     => $this->input->post('name'),
            'nim'      => $this->input->post('nim'),
            'username' => $this->input->post('username'),
            'email'    => $this->input->post('email'),
            'password' => $this->input->post('password'),
        ];

        if ($this->User_model->update($id, $data)) {
            $this->session->set_flashdata('success', 'Data mahasiswa berhasil diperbarui!');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui data mahasiswa!');
        }
        redirect('admin/mahasiswa');
    }

    public function hapus_mahasiswa($id)
    {
        if ($this->User_model->hapus($id)) {
            $this->session->set_flashdata('success', 'Data mahasiswa berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus mahasiswa!');
        }
        redirect('admin/mahasiswa');
    }
}