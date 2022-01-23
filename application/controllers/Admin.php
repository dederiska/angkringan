<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('username')) {
			notif('Silahkan Untuk Melakukan Login', false);
			redirect(base_url("Auth"));
		}
	}

	public function index()
	{
		$data['judul'] = "Dashboard";
		manggil_view('Admin/index', $data);
	}
	public function angkringan()	//MANAGE DATA ANGRINGAN
	{
		$data['judul'] = "ANGKRINGAN";
		$data['tampil'] = $this->db->get('angkringan')->result_array();
		manggil_view('Admin/angkringan', $data);
	}
	public function accepted($status)
	{
		$id_angkringan = $this->uri->segment('4');
		$where = ['id_angkringan' => $id_angkringan];
		$data = ['accept' => $status];
		//cek dt ankringn aya hnte
		$cek_angkringan = $this->db->get_where('angkringan', $where);
		if ($cek_angkringan->num_rows() > 0) {
			//cek status
			if ($status == '1') {
				notif('Angkringan Di Aktifkan', true);
			} else {
				notif('Angkringan Di Non Aktifkan', false);
			}
			$this->mydb->update_dt($where, $data, 'angkringan');
		} else {
			notif('Data angkringan tidak ditemukan', false);
		}
		redirect(base_url('Admin/angkringan'));
	}
	public function hapus_angkringan($id)
	{
		$this->mydb->del(['id_angkringan' => $id], 'angkringan');
		notif('Berhasil menghapus data angkringan', true);
		redirect(base_url('Admin/angkringan'));
	}

	public function i_angkringan()
	{
		$this->form_validation->set_rules('nama_angkringan', 'Nama Angkringan', 'trim|required', ['required' => "Harus diisi"]);
		$this->form_validation->set_rules('nama_pemilik', 'Nama Pemilik', 'trim|required', ['required' => "Harus diisi"]);
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required', ['required' => "Harus diisi"]);
		$this->form_validation->set_rules('jam_buka_tutup', 'Jam Buka Tutup', 'trim|required', ['required' => "Harus diisi"]);
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required', ['required' => "Harus diisi"]);
		if ($this->form_validation->run() == false) {
			$data['judul'] = "Tambah Angkringan";
			manggil_view('Admin/i_angkringan', $data);
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
					redirect(base_url('Admin/i_angkringan'));
				}
			}
			$kolom = [
				"nama_angkringan" => data_post('nama_angkringan'),
				"nama_pemilik" => data_post('nama_pemilik'),
				"phone" => data_post('phone'),
				"jam_buka_tutup" => data_post('jam_buka_tutup'),
				"alamat" => data_post('alamat'),
				"cover" => $cover,
				"accept" => data_post('accept')
			];
			$this->mydb->input_dt($kolom, 'angkringan');
			notif('Berhasil menyimpan data angkringan', true);
			redirect(base_url('Admin/angkringan'));
		}
	}
	public function edit_angkringan($id)
	{
		$where = ['id_angkringan' => $id];
		$data['col'] = $this->db->get_where('angkringan', $where)->row_array();
		$this->form_validation->set_rules('nama_angkringan', 'Nama Angkringan', 'trim|required', ['required' => "Harus diisi"]);
		$this->form_validation->set_rules('nama_pemilik', 'Nama Pemilik', 'trim|required', ['required' => "Harus diisi"]);
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required', ['required' => "Harus diisi"]);
		$this->form_validation->set_rules('jam_buka_tutup', 'Jam Buka Tutup', 'trim|required', ['required' => "Harus diisi"]);
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required', ['required' => "Harus diisi"]);
		if ($this->form_validation->run() == false) {
			$data['judul'] = "Edit Angkringan";
			manggil_view('Pembisnis/e_angkringan', $data);
		} else {
			$up_image = $_FILES['image']['name'];
			if ($up_image) {
				$config['upload_path'] = './cover/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size'] = '7000';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('image')) {
					$cover = $this->upload->data('file_name');
					$set = ['cover' => $cover];
					$this->mydb->update_dt($where, $set, 'angkringan');
				} else {
					notif($this->upload->display_errors(), false);
					redirect(base_url('Admin/i_angkringan'));
				}
			}
			$kolom = [
				"nama_angkringan" => data_post('nama_angkringan'),
				"nama_pemilik" => data_post('nama_pemilik'),
				"phone" => data_post('phone'),
				"jam_buka_tutup" => data_post('jam_buka_tutup'),
				"alamat" => data_post('alamat')
			];

			$this->mydb->update_dt($where, $kolom, 'angkringan');
			notif('Berhasil memperbarui data angkringan', true);
			redirect(base_url('Admin/angkringan'));
		}
	}


	public function role()
	{
		// $this->load->view('welcome_message');
		echo "INI ADALAH HALAMAN ROLE";
	}
}
