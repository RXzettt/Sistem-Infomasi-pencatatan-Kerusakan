<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_admin extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_laporan()
    {
        $this->db->select('l.*, b.nama_bus, k.kode_koridor, kr.jenis_kerusakan, m.nama_mekanik');
        $this->db->from('laporan l');
        $this->db->join('bus b', 'l.id_bus = b.id_bus');
        $this->db->join('koridor k', 'b.kode_koridor = k.kode_koridor');
        $this->db->join('kerusakan kr', 'l.id_kerusakan = kr.id_kerusakan');
        $this->db->join('mekanik m', 'l.id_mekanik = m.id_mekanik');
        $query = $this->db->get();

        return $query->result_array();
    }
}
