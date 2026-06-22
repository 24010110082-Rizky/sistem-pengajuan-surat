<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_surat_model extends CI_Model {

    protected $table = 'jenis_surat';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_aktif()
    {
        return $this->db->get_where($this->table, ['status' => 'aktif'])->result();
    }

    public function get_all()
    {
        return $this->db->get($this->table)->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    public function tambah($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    public function hapus($id)
    {
        return $this->db->delete($this->table, ['id' => $id]);
    }
}