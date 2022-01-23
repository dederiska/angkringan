<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mydb extends CI_Model
{
    //INPUT, UPDATE, DELETE
    public function input_dt($kolom, $table)
    {
        $this->db->insert($table, $kolom);
    }

    public function update_dt($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function del($where,  $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    function angkringan($limit)
    {
        $this->db->from('angkringan')->where('accept', '1')->order_by('id_angkringan', 'DESC')->limit(6, $limit);
        return $this->db->get()->result_array();
    }
}
