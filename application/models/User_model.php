<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    protected $table = 'users';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function login($username, $password)
    {
        $this->db->select('users.*, roles.name as role_name');
        $this->db->from($this->table);
        $this->db->join('roles', 'roles.id = users.role_id');
        $this->db->where('users.username', $username);
        $this->db->where('users.password', md5($password));
        $this->db->where('users.status', 'aktif');
        $query = $this->db->get();
        return $query->row();
    }

    public function get_all_mahasiswa()
    {
        $this->db->where('role_id', 2);
        return $this->db->get($this->table)->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    public function tambah($data)
    {
        $data['password'] = md5($data['password']);
        $data['role_id']  = 2;
        $data['status']   = 'aktif';
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        if (!empty($data['password'])) {
            $data['password'] = md5($data['password']);
        } else {
            unset($data['password']);
        }
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }
}