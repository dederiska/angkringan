<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AK extends CI_Controller
{

    public function index()
    {
        redirect(base_url('AK/angkringan'));
    }
    public function angkringan()
    {
        $data['judul'] = "Home";

        $jml = $this->db->get_where('angkringan', ['accept' => '1'])->num_rows();
        halaman(site_url('AK/angkringan'), $jml);
        $data['pagination'] = $this->pagination->create_links();
        $limit = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['tampil'] = $this->mydb->angkringan($limit);

        $data['file'] = 'home';
        $this->load->view('guest/index', $data);
    }
    public function detail_angkringan($id)
    {
        $data['judul'] = "Detail Angkringan";
        $data['tampil'] = $this->db->get_where('angkringan', ['id_angkringan' => $id])->row_array();
        $data['galeri'] = $this->db->get_where('dokumentasi', ['id_angkringan' => $data['tampil']['id_angkringan']])->result_array();
        $data['menu'] = $this->db->get_where('menu', ['status' => '1', 'id_angkringan' => $data['tampil']['id_angkringan']])->result_array();
        $data['file'] = 'detail_angkringan';
        $this->load->view('guest/index', $data);
    }


















    public function block()
    {
        $this->load->view('welcome_message');
    }
}
