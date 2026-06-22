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
        $data['title'] = 'Riwayat Pengajuan Surat';
        $data['pengajuan'] = $this->Pengajuan_model->get_by_user($user_id);
        $this->load->view('pengajuan/riwayat', $data);
    }

    public function buat()
    {
        $data['title'] = 'Ajukan Surat Baru';
        $data['jenis_surat'] = $this->Jenis_surat_model->get_all_aktif();
        $this->load->view('pengajuan/form', $data);
    }

    public function simpan()
    {
        $this->form_validation->set_rules('jenis_surat_id', 'Jenis Surat', 'required');
        $this->form_validation->set_rules('keperluan', 'Keperluan', 'required|min_length[10]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('pengajuan/buat');
        }

        $data = [
            'user_id' => $this->session->userdata('user_id'),
            'jenis_surat_id' => $this->input->post('jenis_surat_id'),
            'keperluan' => $this->input->post('keperluan'),
        ];

        if ($this->Pengajuan_model->tambah($data)) {
            $this->session->set_flashdata('success', 'Pengajuan surat berhasil dikirim! Silakan tunggu konfirmasi dari admin.');
            redirect('pengajuan');
        } else {
            $this->session->set_flashdata('error', 'Gagal mengirim pengajuan, silakan coba lagi.');
            redirect('pengajuan/buat');
        }
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Pengajuan';
        $data['pengajuan'] = $this->Pengajuan_model->get_by_id($id);

        if (!$data['pengajuan']) {
            show_404();
        }

        $this->load->view('pengajuan/detail', $data);
    }

    public function riwayat()
    {
        $this->index();
    }

    public function cetak($id)
    {
        $data['title'] = 'Cetak Bukti Pengajuan';
        $data['pengajuan'] = $this->Pengajuan_model->get_by_id($id);

        if (!$data['pengajuan']) {
            show_404();
        }

        $this->load->view('pengajuan/cetak', $data);
    }

    public function edit($id)
    {
        $user_id = $this->session->userdata('user_id');
        $data['title'] = 'Edit Pengajuan Surat';
        $data['pengajuan'] = $this->Pengajuan_model->get_by_id($id);
        $data['jenis_surat'] = $this->Jenis_surat_model->get_all_aktif();

        if (!$data['pengajuan'] || $data['pengajuan']->user_id != $user_id) {
            show_404();
        }

        if ($data['pengajuan']->status !== 'menunggu') {
            $this->session->set_flashdata('error', 'Pengajuan tidak dapat diedit karena sudah diproses!');
            redirect('pengajuan');
        }

        $this->load->view('pengajuan/edit', $data);
    }

    public function update($id)
    {
        $user_id = $this->session->userdata('user_id');
        $pengajuan = $this->Pengajuan_model->get_by_id($id);

        if (!$pengajuan || $pengajuan->user_id != $user_id) {
            show_404();
        }

        if ($pengajuan->status !== 'menunggu') {
            $this->session->set_flashdata('error', 'Pengajuan tidak dapat diubah karena sudah diproses!');
            redirect('pengajuan');
        }

        $this->form_validation->set_rules('jenis_surat_id', 'Jenis Surat', 'required');
        $this->form_validation->set_rules('keperluan', 'Keperluan', 'required|min_length[10]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('pengajuan/edit/' . $id);
        }

        $data = [
            'jenis_surat_id' => $this->input->post('jenis_surat_id'),
            'keperluan' => $this->input->post('keperluan'),
        ];

        if ($this->Pengajuan_model->update_pengajuan($id, $data)) {
            $this->session->set_flashdata('success', 'Pengajuan berhasil diperbarui!');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui pengajuan!');
        }
        redirect('pengajuan');
    }
}