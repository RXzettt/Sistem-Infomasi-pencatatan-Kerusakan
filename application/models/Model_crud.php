<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_crud extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function create($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    function read($table)
    {
        return $this->db->get($table)->result_array();
    }

    function update($table, $data, $where)
    {
        return $this->db->update($table, $data, $where);
    }

    function delete($table, $where)
    {
        return $this->db->delete($table, $where);
    }

    function count($table)
    {
        return $this->db->get($table)->num_rows();
    }

    function count_where($table, $where)
    {
        return $this->db->get_where($table, $where)->num_rows();
    }
}
