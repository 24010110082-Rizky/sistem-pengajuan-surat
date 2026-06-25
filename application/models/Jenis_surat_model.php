<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_surat_model extends CI_Model {

    protected $table = 'jenis_surat';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Ambil semua jenis surat aktif
    public function get_all_aktif()
    {
        return $this->db->get_where($this->table, ['status' => 'aktif'])->result();
    }

    // Ambil semua jenis surat (admin)
    public function get_all()
    {
        return $this->db->get($this->table)->result();
    }

    // Ambil by ID
    public function get_by_id($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    // Tambah jenis surat
    public function tambah($data)
    {
        return $this->db->insert($this->table, $data);
    }

    // Update jenis surat
    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    // Hapus jenis surat
    public function hapus($id)
    {
        return $this->db->delete($this->table, ['id' => $id]);
    }
}