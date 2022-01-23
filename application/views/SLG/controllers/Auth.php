<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata('user')) {
            redirect(base_url("Dashboard"));
        }

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['sid'] = $this->mydb->sid();
            $data['title'] = "Login";
            $this->load->view('Auth/index', $data);
        } else {
            $this->_login();
        }
    }
    private function _login()
    {
        $username = htmlspecialchars($this->input->post('username', true));
        $password = htmlspecialchars($this->input->post('password', true));
        $user = $this->db->get_where('users', ['username' => $username])->row_array();
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'user' => $user['username'],
                    'role_id' => $user['level']
                ];
                $this->session->set_userdata($data);

                if ($user['level'] == '1') {
                    redirect(base_url('Dashboard'));
                } else {
                    redirect(base_url('Auth'));
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda Tidak punya akses ke sistem ini!!</div>');
                    redirect(base_url('Auth'));
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password yang anda masukkan salah!!</div>');
                redirect(base_url('Auth'));
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username tidak terdaftar!</div>');
            redirect(base_url('Auth'));
        }
    }
    public function logout()    //LOGOUT
    {
        $this->session->unset_userdata('user');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
						Kamu telah Logout!</div>');
        redirect(base_url('Auth'));
    }
}
