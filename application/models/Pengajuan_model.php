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
}