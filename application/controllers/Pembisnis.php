<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembisnis extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('username')) {
			notif('Silahkan Untuk Login Terlebih Dahulu', false);
			redirect(base_url("Auth"));
		}
		if ($this->session->userdata('id_role') != '2') {
			notif('Anda Bukan Pembisnis', false);
			redirect(base_url("Admin"));
		}
	}
	public function index()
	{
		$data['judul'] = "Dashboard";

		manggil_view('Pembisnis/index', $data);
	}
	public function produk()
	{
		$data['judul'] = "PRODUK";
		$data['tampil'] = $this->db->get_where('menu', ['id_angkringan' => $_SESSION['id_angkringan']])->result_array();
		manggil_view('Pembisnis/menu', $data);
	}
	public function dokumentasi()
	{
		$data['judul'] = "DOKUMENTASI";
		$data['tampil'] = $this->db->get_where('dokumentasi', ['id_angkringan' => $_SESSION['id_angkringan']])->result_array();
		manggil_view('Pembisnis/dokumentasi', $data);
	}
	public function profil()
	{
		$data['judul'] = "PROFIL ANGKRINGAN";
		$data['tampil'] = $this->db->get_where('angkringan', ['id_angkringan' => $_SESSION['id_angkringan']])->row_array();
		manggil_view('Pembisnis/profil', $data);
	}
	public function i_produk()
	{
		$this->form_validation->set_rules('nama_menu', 'Nama Menu', 'trim|required', ['required' => "Harus diisi"]);
		$this->form_validation->set_rules('harga', 'harga', 'trim|required', ['required' => "Harus diisi"]);
		if ($this->form_validation->run() == false) {
			$data['judul'] = "Tambah Produk";
			manggil_view('Pembisnis/i_produk', $data);
		} else {
			$kolom = [
				"nama_produk" => data_post('nama_menu'),
				"harga" => data_post('harga'),
				"status" => data_post('status'),
				"id_angkringan" => $_SESSION['id_angkringan']
			];
			$this->mydb->input_dt($kolom, 'menu');
			notif('Berhasil menyimpan menu angkringan', true);
			redirect(base_url('Pembisnis/produk'));
		}
	}
	public function edit_produk($id)
	{
		$where = ['id_menu' => $id];
		$data['col'] = $this->db->get_where('menu', $where)->row_array();
		$this->form_validation->set_rules('nama_produk', 'Nama Menu', 'trim|required', ['required' => "Harus diisi"]);
		$this->form_validation->set_rules('harga', 'Harga', 'trim|required', ['required' => "Harus diisi"]);
		if ($this->form_validation->run() == false) {
			$data['judul'] = "Edit Produk";
			manggil_view('Pembisnis/e_produk', $data);
		} else {
			$kolom = [
				"nama_produk" => data_post('nama_produk'),
				"harga" => data_post('harga'),
				"status" => data_post('status')
			];

			$this->mydb->update_dt($where, $kolom, 'menu');
			notif('Berhasil memperbarui menu angkringan', true);
			redirect(base_url('Pembisnis/produk'));
		}
	}


	public function hapus_produk($id)
	{
		$this->mydb->del(['id_menu' => $id], 'menu');
		notif('Berhasil menghapus data produk', true);
		redirect(base_url('Pembisnis/produk'));
	}

	public function i_dokumentasi()
	{
		$this->form_validation->set_rules('ket', 'Keterangan', 'trim|required', ['required' => "Harus diisi"]);
		if ($this->form_validation->run() == false) {
			$data['judul'] = "Tambah Dokumentasi";
			manggil_view('Pembisnis/i_dokumentasi', $data);
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
					redirect(base_url('Pembisnis/i_dokumentasi'));
				}
			}
			$kolom = [
				"ket" => data_post('ket'),
				"cover" => $cover,
				"id_angkringan" => tampil_session('id_angkringan')
			];
			$this->mydb->input_dt($kolom, 'dokumentasi');
			notif('Berhasil menyimpan data angkringan', true);
			redirect(base_url('Pembisnis/dokumentasi'));
		}
	}
	public function hapus_dokumentasi($id)
	{
		$this->mydb->del(['id_dk' => $id], 'dokumentasi');
		notif('Berhasil menghapus data dokumentasi', true);
		redirect(base_url('Pembisnis/dokumentasi'));
	}
	public function ubah_password()
	{
		$this->load->view('welcome_message');
		echo "INI ADALAH HALAMAN UBAH PASSWORD";
	}
}
