<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->form_validation->set_rules('username', 'username', 'trim|required', ['required' => "Harus diisi"]);
		$this->form_validation->set_rules('password', 'password', 'trim|required', ['required' => "Harus diisi"]);
		if ($this->form_validation->run() == false) {
			$this->load->view('Auth/login');
		} else {
			$username = data_post('username');
			$password = data_post('password');

			$cek_user = $this->db->get_where('user', ['username' => $username, 'password' => md5($password)]);
			if ($cek_user->num_rows() > 0) {
				$user = $cek_user->row_array();

				//cek admin atau bukan
				if ($user['id_role'] == '1') {
					$_SESSION['title'] = 'admin';
					$_SESSION['username'] = $user['username'];
					$_SESSION['id_role'] = $user['id_role'];
					$home = 'Admin';
				} else {
					//jika bukan maka pembisnis
					$cek_angkringan = $this->db->get_where('angkringan', ['id_user' => $user['id_user'], 'accept' => '1']);
					if ($cek_angkringan->num_rows() > 0) {
						$angkringan = $cek_angkringan->row_array();
						$_SESSION['title'] = $angkringan['nama_angkringan'];
						$_SESSION['id_angkringan'] = $angkringan['id_angkringan'];
						$_SESSION['username'] = $user['username'];
						$_SESSION['id_role'] = $user['id_role'];
						$home = 'Pembisnis';
					} else {
						notif('Maaf akun anda belum di validasi admin!', false);
						$home = 'Auth';
					}
				}
			} else {
				$home = 'Auth';
				notif('Username atau Password Salah!', false);
			}
			redirect(base_url($home));
		}
	}
	public function register()
	{
		$this->form_validation->set_rules('nama_angkringan', 'Nama Angkringan', 'trim|required', ['required' => "Harus diisi"]);
		$this->form_validation->set_rules('nama_pemilik', 'Nama Pemilik', 'trim|required', ['required' => "Harus diisi"]);
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required', ['required' => "Harus diisi"]);
		$this->form_validation->set_rules('jam_buka_tutup', 'Jam Buka Tutup', 'trim|required', ['required' => "Harus diisi"]);
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required', ['required' => "Harus diisi"]);
		if ($this->form_validation->run() == false) {
			$data['judul'] = "Tambah Angkringan";
			$this->load->view('Auth/register');
		} else {
			$up_image = $_FILES['image']['name'];
			if ($up_image) {
				$config['upload_path'] = './cover/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size'] = '7000';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('image')) {
					$cover = $this->upload->data('file_name');
				} else {
					notif($this->upload->display_errors(), false);
					redirect(base_url('Auth/register'));
				}
			}
			$user = [
				"username" => data_post('username'),
				"password" => md5(data_post('password')),
				"id_role" => 2,
				"email" => data_post('email')
			];
			$this->mydb->input_dt($user, 'user');
			$id_user = $this->db->insert_id();
			$kolom = [
				"id_user" => $id_user,
				"nama_angkringan" => data_post('nama_angkringan'),
				"nama_pemilik" => data_post('nama_pemilik'),
				"phone" => data_post('phone'),
				"jam_buka_tutup" => data_post('jam_buka_tutup'),
				"alamat" => data_post('alamat'),
				"cover" => $cover
			];
			$this->mydb->input_dt($kolom, 'angkringan');
			notif('Berhasil daftar, tunggu di validasi admin', true);
			redirect(base_url('Auth'));
		}
	}


	// VIEW FORGOT PASSWORD
	public function forgotPassword()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		if ($this->form_validation->run() == false) {
			$data['title'] = "Lupa Password";
			// $this->load->view('auth/forgot');
			$this->load->view('Auth/v_lupa_password');
		} else {
			$email = $this->input->post('email');
			$user = $this->db->get_where('user', ['email' => $email])->row_array();

			if ($user) {
				//INPUT TOKEN
				$token = base64_encode(random_bytes(32));
				$user_token = [
					'email' => $email,
					'token' => $token,
					'date_created' => time()
				];
				$this->db->insert('tokens', $user_token);
				$this->_setEmail($token, 'forgot');
				notif('Please check email to reset your password', false);
				redirect(base_url('Auth/forgotPassword'));
			} else {
				notif('Email is not registered or activated!', false);
				redirect(base_url('Auth/forgotPassword'));
			}
		}
	}
	//CONFIGURASI EMAIL
	private function _setEmail($token, $type)
	{
		$this->load->library('encrypt');
		$config = [
			'charset' => 'utf-8',
			'useragent' => 'Codeigniter',
			'protocol' => "smtp",
			'mailtype' => "html",
			'smtp_host' => "smtp.gmail.com", //pengaturan smtp -> ssl://smtp.gmail.com
			'smtp_port' => "465",
			'smtp_timeout' => "5",
			'smtp_user' => "cresyensianaangel@gmail.com", // isi dengan email kamu
			'smtp_pass' => "Majalengka767", // isi dengan password kamu
			'crlf' => "\r\n",
			'newline' => "\r\n",
			'wordwrap' => TRUE
		];

		$this->load->library('email', $config);
		$this->email->from('cresyensianaangel@gmail.com', 'Angkringan Majalengka');
		$this->email->to($this->input->post('email'));

		if ($type == 'forgot') {
			$this->email->subject('Reset Password');
			$this->email->message('Kepada Yth. Click this link to reset your password : <a href="' . base_url() . 'Auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activated</a>');
		}

		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}
	// LOGIKA RESET PASSWORD
	public function resetpassword()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if ($user) {
			$user_token = $this->db->get_where('tokens', ['token' => $token])->row_array();
			if ($user_token) {
				$this->session->set_userdata('reset_email', $email);
				$this->changePassword();
			} else {
				notif('Reset password failed! Wrong token!', false);
				redirect(base_url('Auth'));
			}
		} else {
			notif('Reset password failed! Wrong email!', false);
			redirect(base_url('Auth'));
		}
	}
	// VIEW UBAH PASSWORD
	public function changePassword()
	{
		// $this->session->set_userdata('reset_email', 'Andialfi90@gmail.com');
		if (!$this->session->userdata('reset_email')) {
			redirect(base_url("Auth"));
		}
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]');
		$this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|min_length[6]|matches[password1]');

		if ($this->form_validation->run() == false) {
			$data['title'] = "Ubah Password";
			$this->load->view('Auth/v_reset_password');
		} else {
			$pass = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
			$email = $this->session->userdata('reset_email');

			$this->db->set('password', $pass);
			$this->db->where('email', $email);
			$this->db->update('user');

			$this->session->unset_userdata('reset_email');
			notif('Password has been changed! Please login!', false);
			redirect(base_url('Auth'));
		}
		// $this->session->unset_userdata('reset_email');
	}








	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('id_role');
		$this->session->unset_userdata('title');
		$this->session->unset_userdata('id_angkringan');

		notif('Berhasil Logout!', true);
		redirect(base_url('Auth'));
	}
}
