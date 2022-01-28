<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Reset_m extends CI_Model
{
    public function update_reset_key($email, $reset_key)
    {
        $this->db->where('email', $email);
        $data = array('reset_password' => $reset_key);
        $this->db->update('user', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
