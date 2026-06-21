<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan_model extends CI_Model
{
    protected $table = 'pengajuan';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_by_user($user_id)
    {
        $this->db->select('pengajuan.*, jenis_surat.nama_surat');
        $this->db->from($this->table);
        $this->db->join('jenis_surat', 'jenis_surat.id = pengajuan.jenis_surat_id');
        $this->db->where('pengajuan.user_id', $user_id);
        $this->db->order_by('pengajuan.tanggal_ajuan', 'DESC');
        return $this->db->get()->result();
    }

    public function get_by_id($id)
    {
        $this->db->select('pengajuan.*, jenis_surat.nama_surat, users.name as nama_mahasiswa, users.nim');
        $this->db->from($this->table);
        $this->db->join('jenis_surat', 'jenis_surat.id = pengajuan.jenis_surat_id');
        $this->db->join('users', 'users.id = pengajuan.user_id');
        $this->db->where('pengajuan.id', $id);
        return $this->db->get()->row();
    }
}