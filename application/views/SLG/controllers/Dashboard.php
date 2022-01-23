<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('user')) {
            redirect(base_url("Auth"));
        }
    }
    public function index()
    {
        $data['title'] = "Dashboard";
        $data['sid'] = $this->mydb->sid();
        $this->load->view('Partials/header', $data);
        $this->load->view('Dashboard/index', $data);
        $this->load->view('Partials/footer', $data);
    }
    //KATEGORI KEGIATAN
    public function category()
    {
        $data['title'] = "Kategori Postingan";
        $data['sid'] = $this->mydb->sid();
        $data['category'] = $this->db->get('kategori')->result_array();
        $this->load->view('Partials/header', $data);
        $this->load->view('Dashboard/category', $data);
        $this->load->view('Partials/footer', $data);
    }
    public function create_category()
    {
        $this->form_validation->set_rules(
            'nama_kategori',
            'nama_kategori',
            'required|trim|is_unique[kategori.nama_kategori]',
            [
                'required' => 'Nama Kategori Masih kosong!!!',
                'is_unique' => 'Nama Kategori sudah ada'
            ]
        );
        if ($this->form_validation->run() == false) {
            $data['title'] = "Buat Kategori Baru";
            $data['sid'] = $this->mydb->sid();
            $this->load->view('Partials/header', $data);
            $this->load->view('Dashboard/create_category', $data);
            $this->load->view('Partials/footer', $data);
        } else {
            $data = array(
                'nama_kategori' => $this->input->post('nama_kategori')
            );
            $this->mydb->input_dt($data, 'kategori');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kategori baru berhasil ditambahkan!!!</div>');
            redirect(base_url("Dashboard/category"));
        }
    }
    public function edit_category($id)
    {
        $id = $this->uri->segment('3');
        $where = ['id' => $id];
        $this->form_validation->set_rules('nama_kategori', 'nama_kategori', 'required|trim', ['required' => 'Nama Kategori Masih kosong!!!']);
        if ($this->form_validation->run() == false) {
            $data['title'] = "Edit Kategori";
            $data['sid'] = $this->mydb->sid();
            $data['kategori'] = $this->db->get_where('kategori', $where)->row_array();
            $this->load->view('Partials/header', $data);
            $this->load->view('Dashboard/edit_category', $data);
            $this->load->view('Partials/footer', $data);
        } else {
            $data = array(
                'nama_kategori' => $this->input->post('nama_kategori')
            );
            $this->mydb->update_dt($where, $data, 'kategori');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kategori berhasil diubah!!!</div>');
            redirect(base_url("Dashboard/category"));
        }
    }
    public function del_category($id)
    {
        $where = ['id' => $id];
        $this->mydb->del($where, 'kategori');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kategori berhasil dihapus!!!</div>');
        redirect(base_url("Dashboard/category"));
    }
    public function show_category($id)
    {
        $where = ['id' => $id];
        $data['category'] = $this->db->get_where('kategori', $where)->row_array();
        $data['sid'] = $this->mydb->sid();
        $data['title'] = "Kategori : " . $data['category']['nama_kategori'];
        $data['posts'] = $this->mydb->category_post($data['category']['id']);
        $this->load->view('Partials/header', $data);
        $this->load->view('Dashboard/posts', $data);
        $this->load->view('Partials/footer', $data);
    }
    //POSTING KEGIATAN
    public function posts()
    {
        $data['title'] = "Postingan Kegiatan";
        $data['posts'] = $this->mydb->posts();
        $data['sid'] = $this->mydb->sid();
        $this->load->view('Partials/header', $data);
        $this->load->view('Dashboard/posts', $data);
        $this->load->view('Partials/footer', $data);
    }
    public function post($slug) //SHOW
    {
        $data['post'] = $this->mydb->post($slug);
        $data['title'] = $data['post']['judul'];
        $data['sid'] = $this->mydb->sid();
        $this->load->view('Partials/header', $data);
        $this->load->view('Dashboard/show_post', $data);
        $this->load->view('Partials/footer', $data);
    }
    public function create_post()
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim', ['required' => 'Judul Masih kosong!!!']);
        $this->form_validation->set_rules('body', 'body', 'required|trim', ['required' => 'Deskripsi Masih kosong!!!']);
        if ($this->form_validation->run() == false) {
            $data['title'] = "Buat Postingan Baru";
            $data['category'] = $this->db->get('kategori')->result_array();
            $data['sid'] = $this->mydb->sid();
            $this->load->view('Partials/header', $data);
            $this->load->view('Dashboard/create_post', $data);
            $this->load->view('Partials/footer', $data);
        } else {
            $up_image = $_FILES['image']['name'];
            if ($up_image) {
                $config['upload_path'] = './image/';
                $config['allowed_types'] = 'jpg|png';
                $config['max_size']     = '2048';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $cover = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            }
            date_default_timezone_set('Asia/Jakarta');
            $time = date("Y-m-d H:i:s");
            $data = array(
                'id_kategori' => $this->input->post('kategori'),
                'id_user' => '1',
                'judul' => $this->input->post('judul'),
                'slug' => md5($this->input->post('judul')),
                'image' => $cover,
                // 'excerpt' => $this->input->post('excerpt'),
                'body' => $this->input->post('body'),
                'created_at' => $time,
                'updated_at' => $time
            );
            $this->mydb->input_dt($data, 'post');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Postingan baru berhasil ditambahkan!!!</div>');
            redirect(base_url("Dashboard/posts"));
        }
    }
    public function edit_post($id)
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim', ['required' => 'Judul Masih kosong!!!']);
        $this->form_validation->set_rules('body', 'body', 'required|trim', ['required' => 'Deskripsi Masih kosong!!!']);
        $data['post'] = $this->mydb->post($id);
        if ($this->form_validation->run() == false) {
            $data['title'] = "Edit Postingan";
            $data['sid'] = $this->mydb->sid();
            $data['category'] = $this->db->get('kategori')->result_array();
            $this->load->view('Partials/header', $data);
            $this->load->view('Dashboard/edit_post', $data);
            $this->load->view('Partials/footer', $data);
        } else {
        $where = ['id' => $id];
            $up_image = $_FILES['image']['name'];
            if ($up_image) {
                $config['upload_path'] = './image/';
                $config['allowed_types'] = 'jpg|png';
                $config['max_size']     = '2048';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    unlink(FCPATH . 'image/' . $data['post']['image']);
                    $data1 = array(
                        'image' => $this->upload->data('file_name')
                    );
                    $this->mydb->update_dt($where, $data1, 'post');
					
                } else {
                    $message = '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>';
                    $this->session->set_flashdata('message', $message);
                    redirect(base_url("Dashboard/edit_post/" . $id));
                }
            }
            date_default_timezone_set('Asia/Jakarta');
            $time = date("Y-m-d H:i:s");
            $data = array(
                'id_kategori' => $this->input->post('kategori'),
                'id_user' => '1',
                'judul' => $this->input->post('judul'),
                'slug' => md5($this->input->post('judul')),
                'body' => $this->input->post('body'),
                'updated_at' => $time
            );
            $this->mydb->update_dt($where, $data, 'post');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Postingan berhasil di ubah!!!</div>');
            redirect(base_url("Dashboard/post/" . $id));
        }
    }
    public function del_post($id)
    {
        //HAPUS GALERI
        $where2 = ['id_post' => $id];
        $data2 = $this->db->get_where('galeri', $where2)->result_array();
        foreach ($data2 as $t) {
            unlink(FCPATH . 'galeri/' . $t['foto']);
        }
        $this->mydb->del($where2, 'galeri');
        //HAPUS POST
        $where = ['id' => $id];
        $data = $this->mydb->post($id);
        unlink(FCPATH . 'image/' . $data['image']);
        $this->mydb->del($where, 'post');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Postingan berhasil dihapus!!!</div>');
        redirect(base_url("Dashboard/posts"));
    }
    public function add_galeri()
    {
        $id =  $this->input->post('id_post');
        $up_image = $_FILES['image']['name'];
        if ($up_image) {
            $config['upload_path'] = './galeri/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '2048';
            $config['max_width']     = 2000;
            $config['max_height']     = 2000;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image')) {
                $data = [
                    'foto' => $this->upload->data('file_name'),
                    'id_post' => $id
                ];
                $this->mydb->input_dt($data, 'galeri');
                $message = '<div class="alert alert-success" role="alert">Foto Baru berhasil ditambahkan!!!</div>';
            } else {
                $message = '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>';
            }
        }
        $this->session->set_flashdata('message', $message);
        redirect(base_url("Dashboard/post/" . $id));
    }
    //SOSIAL MEDIA
    public function sosmed()
    {
        $data['title'] = "Sosial Media";
        $data['sid'] = $this->mydb->sid();
        $data['sosmed'] = $this->db->get('sosial_media')->result_array();
        $this->load->view('Partials/header', $data);
        $this->load->view('Dashboard/sosmed', $data);
        $this->load->view('Partials/footer', $data);
    }
    public function p_sosmed($id)
    {
        $data = array(
            'link' => $this->input->post('link'),
            'username' => $this->input->post('username'),
            'title' => $this->input->post('title')
        );
        $where = ['id' => $id];
        $this->mydb->update_dt($where, $data, 'sosial_media');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Sosial Media berhasil di ubah!!!</div>');
        redirect(base_url("Dashboard/sosmed"));
    }
    public function is_active($id)
    {
        $status = $this->uri->segment(4);
        if ($status == '0') {
            $data = array(
                'status' => '0'
            );
            $message = '<div class="alert alert-danger" role="alert">Sosial Media di Non-aktifkan!!!</div>';
        } else {
            $data = array(
                'status' => '1'
            );
            $message = '<div class="alert alert-success" role="alert">Sosial Media di aktifkan!!!</div>';
        }
        $where = ['id' => $id];
        $this->mydb->update_dt($where, $data, 'sosial_media');
        $this->session->set_flashdata('message', $message);
        redirect(base_url("Dashboard/sosmed"));
    }
    //USAHA MIKRO KECIL MENENGAH
    public function pedagang()
    {
        $data['title'] = "Daftar UMKM";
        $data['sid'] = $this->mydb->sid();
        $data['pedagang'] = $this->db->get('pedagang')->result_array();
        $this->load->view('Partials/header', $data);
        $this->load->view('Dashboard/pedagang', $data);
        $this->load->view('Partials/footer', $data);
    }
    public function create_pedagang()
    {
        $data['sid'] = $this->mydb->sid();
        $data['title'] = "Tambah UMKM Baru";
        $this->load->view('Partials/header', $data);
        $this->load->view('Dashboard/create_pedagang', $data);
        $this->load->view('Partials/footer', $data);
    }
    public function p_create_umkm()
    {
        $up_image = $_FILES['image']['name'];
        if ($up_image) {
            $config['upload_path'] = './image2/';
            $config['allowed_types'] = 'jpg|png';
            $config['max_size']     = '5048';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image')) {
                $cover = $this->upload->data('file_name');
                $message = '<div class="alert alert-success" role="alert">Data Pedagang berhasil ditambahkan!!!</div>';
            } else {
                $message = '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>';
                $this->session->set_flashdata('message', $message);
                redirect(base_url("Dashboard/create_pedagang"));
            }
        }
        date_default_timezone_set('Asia/Jakarta');
        $time = date("Y-m-d H:i:s");
        $data = array(
            'nama_penjualan' => $this->input->post('nama_penjualan'),
            'pemilik' => $this->input->post('pemilik'),
            'alamat' => $this->input->post('alamat'),
            'image' => $cover,
            'telp' => $this->input->post('telp'),
            'deskripsi' => $this->input->post('body'),
            'status' => '1',
            'created_at' => $time,
            'updated_at' => $time
        );
        $this->mydb->input_dt($data, 'pedagang');
        $this->session->set_flashdata('message', $message);
        redirect(base_url("Dashboard/pedagang"));
    }
    public function show_pedagang($id)
    {
        $data['pedagang'] = $this->db->get_where('pedagang', ['id' => $id])->row_array();
        $data['title'] = $data['pedagang']['nama_penjualan'];
        $data['sid'] = $this->mydb->sid();
        $data['galeri'] = $this->db->get_where('galeri2', ['id_pedagang' => $data['pedagang']['id']])->result_array();
        $this->load->view('Partials/header', $data);
        $this->load->view('Dashboard/show_pedagang', $data);
        $this->load->view('Partials/footer', $data);
    }
    public function edit_pedagang($id)
    {
        $this->form_validation->set_rules(
            'nama_penjualan',
            'Nama Penjualan',
            'required|trim',
            ['required' => 'Nama Penjualan Masih kosong!!!']
        );
        $this->form_validation->set_rules(
            'pemilik',
            'Nama Pemilik',
            'required|trim',
            ['required' => 'Nama Pemilik Masih kosong!!!']
        );
        $this->form_validation->set_rules(
            'alamat',
            'Alamat',
            'required|trim',
            ['required' => 'Alamat Masih kosong!!!']
        );
        $this->form_validation->set_rules(
            'telp',
            'Telepon',
            'required|trim',
            ['required' => 'Nomor Telepon Masih kosong!!!']
        );
        $this->form_validation->set_rules(
            'body',
            'Deskripsi',
            'required|trim',
            ['required' => 'Deskripsi Masih kosong!!!']
        );
        $where = ['id' => $id];
        $data['pedagang'] = $this->db->get_where('pedagang', $where)->row_array();
        if ($this->form_validation->run() == false) {
            $data['title'] = "Edit Info UMKM";
            $data['sid'] = $this->mydb->sid();
            $this->load->view('Partials/header', $data);
            $this->load->view('Dashboard/edit_pedagang', $data);
            $this->load->view('Partials/footer', $data);
        } else {
            $up_image = $_FILES['image']['name'];
            if ($up_image) {
                $config['upload_path'] = './image2/';
                $config['allowed_types'] = 'jpg|png';
                $config['max_size']     = '5048';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $data2 = ['image' => $this->upload->data('file_name')];
                    $this->mydb->update_dt($where, $data2, 'pedagang');
                } else {
                    echo $this->upload->display_errors();
                }
            }
            date_default_timezone_set('Asia/Jakarta');
            $time = date("Y-m-d H:i:s");
            $data = array(
                'nama_penjualan' => $this->input->post('nama_penjualan'),
                'pemilik' => $this->input->post('pemilik'),
                'alamat' => $this->input->post('alamat'),
                'telp' => $this->input->post('telp'),
                'deskripsi' => $this->input->post('body'),
                'status' => '1',
                'created_at' => $time,
                'updated_at' => $time
            );
            $this->mydb->update_dt($where, $data, 'pedagang');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data UMKM berhasil diupdate!!!</div>');
            redirect(base_url("Dashboard/show_pedagang/" . $id));
        }
    }
    public function del_pedagang($id)
    {
        $where = ['id' => $id];
        $where2 = ['id_pedagang' => $id];
        $data = $this->db->get_where('pedagang', $where)->row_array();
        $data2 = $this->db->get_where('galeri2', $where2)->result_array();
        foreach ($data2 as $t) {
            unlink(FCPATH . 'galeri2/' . $t['foto']);
        }
        unlink(FCPATH . 'image2/' . $data['image']);
        $this->mydb->del($where2, 'galeri2');
        $this->mydb->del($where, 'pedagang');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data UMKM berhasil dihapus!!!</div>');
        redirect(base_url("Dashboard/pedagang"));
    }
    public function add_galeri2()
    {
        $id =  $this->input->post('id_pedagang');
        $up_image = $_FILES['image']['name'];
        if ($up_image) {
            $config['upload_path'] = './galeri2/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '2048';
            $config['max_width']     = 2000;
            $config['max_height']     = 2000;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image')) {
                $data = [
                    'foto' => $this->upload->data('file_name'),
                    'caption' => $this->input->post('caption'),
                    'id_pedagang' => $id
                ];
                $this->mydb->input_dt($data, 'galeri2');
                $message = '<div class="alert alert-success" role="alert">Foto Baru berhasil ditambahkan!!!</div>';
            } else {
                $message = '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>';
            }
        }
        $this->session->set_flashdata('message', $message);
        redirect(base_url("Dashboard/show_pedagang/" . $id));
    }
    //SETTING
    public function setting()
    {
        $data['title'] = "Pengaturan Sistem";
        $data['sid'] = $this->mydb->sid();
        $data['sejarah'] = $this->mydb->info_desa('Sejarah');
        $data['profil'] = $this->mydb->info_desa('Profil');
        $data['potensi'] = $this->mydb->info_desa('Potensi');
        $data['visimisi'] = $this->mydb->info_desa('Visi misi');

        $this->form_validation->set_rules(
            'nama',
            'Nama Desa',
            'required|trim',
            ['required' => 'Nama Desa Masih kosong!!!']
        );
        $this->form_validation->set_rules(
            'alamat',
            'Alamat Desa',
            'required|trim',
            ['required' => 'Alamat Desa Masih kosong!!!']
        );
        $this->form_validation->set_rules(
            'image',
            'Logo',
            'required|trim',
            ['required' => 'Logo Masih kosong!!!']
        );

        $this->load->view('Partials/header', $data);
        $this->load->view('Dashboard/setting', $data);
        $this->load->view('Partials/footer', $data);
    }
    public function e_setting()
    {
        $where = ['id' => '1'];
        $up_image = $_FILES['image']['name'];
        if ($up_image) {
            $config['upload_path'] = './assets/img/';
            $config['allowed_types'] = 'jpg|png';
            $config['max_size']     = '5048';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image')) {
                $query = $this->db->get_where('sid', $where)->row_array();
                unlink(FCPATH . 'assets/img/' . $query['logo']);
                $logo = $this->upload->data('file_name');
                $data2 = ['logo' => $logo];
                $this->mydb->update_dt($where, $data2, 'sid');
            } else {
                echo $this->upload->display_errors();
            }
        }
        $data = array(
            'nama_desa' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat')
        );
        $this->mydb->update_dt($where, $data, 'sid');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Informasi Desa berhasil diubah!!!</div>');
        redirect(base_url("Dashboard/setting"));
    }
    public function e_sejarah()
    {
        $this->form_validation->set_rules(
            'sejarah',
            'Sejarah Desa',
            'required|trim',
            ['required' => 'Sejarah Desa Masih kosong!!!']
        );
        date_default_timezone_set('Asia/Jakarta');
        $time = date("Y-m-d H:i:s");
        $data = array(
            'deskripsi' => $this->input->post('sejarah'),
            'updated_at' => $time
        );
        $where = ['title' => 'Sejarah'];
        $this->mydb->update_dt($where, $data, 'detail_desa');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Deskripsi sejarah berhasil diubah!!!</div>');
        redirect(base_url("Dashboard/setting"));
    }
    public function e_profil()
    {
        $this->form_validation->set_rules(
            'profil',
            'Profil Desa',
            'required|trim',
            ['required' => 'Profil Desa Masih kosong!!!']
        );
        date_default_timezone_set('Asia/Jakarta');
        $time = date("Y-m-d H:i:s");
        $data = array(
            // 'title' => 'Profil',
            'deskripsi' => $this->input->post('profil'),
            // 'created_at' => $time,
            'updated_at' => $time
        );
        $where = ['title' => 'Profil'];
        // $this->mydb->input_dt($data, 'detail_desa');
        $this->mydb->update_dt($where, $data, 'detail_desa');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Deskripsi profil desa berhasil diubah!!!</div>');
        redirect(base_url("Dashboard/setting"));
    }
    public function e_visimisi()
    {
        $this->form_validation->set_rules(
            'visimisi',
            'Visi Misi Desa',
            'required|trim',
            ['required' => 'Visi dan Misi Desa Masih kosong!!!']
        );
        date_default_timezone_set('Asia/Jakarta');
        $time = date("Y-m-d H:i:s");
        $data = array(
            // 'title' => 'Visi Misi',
            'deskripsi' => $this->input->post('visimisi'),
            // 'created_at' => $time,
            'updated_at' => $time
        );
        $where = ['title' => 'Visi Misi'];
        // $this->mydb->input_dt($data, 'detail_desa');
        $this->mydb->update_dt($where, $data, 'detail_desa');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Deskripsi Visi misi desa berhasil diubah!!!</div>');
        redirect(base_url("Dashboard/setting"));
    }
    public function e_potensi()
    {
        $this->form_validation->set_rules(
            'potensi',
            'Potensi Desa',
            'required|trim',
            ['required' => 'Potensi Desa Masih kosong!!!']
        );
        date_default_timezone_set('Asia/Jakarta');
        $time = date("Y-m-d H:i:s");
        $data = array(
            // 'title' => 'Potensi',
            'deskripsi' => $this->input->post('potensi'),
            // 'created_at' => $time,
            'updated_at' => $time
        );
        $where = ['title' => 'Potensi'];
        // $this->mydb->input_dt($data, 'detail_desa');
        $this->mydb->update_dt($where, $data, 'detail_desa');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Deskripsi potensi desa berhasil diubah!!!</div>');
        redirect(base_url("Dashboard/setting"));
    }
    //UBAH PASSWORD
    public function e_password()
    {
        $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('user')])->row_array();
        $data['title'] = "Ubah Password";
        $data['sid'] = $this->mydb->sid();
        $this->form_validation->set_rules('old_password', 'Password Lama', 'required|trim', [
            'required' => 'Password Lama masih kosong'
        ]);
        $this->form_validation->set_rules('new_password', 'Password Baru', 'required|trim|min_length[6]', [
            'min_length' => 'Password Baru terlalu pendek',
            'required' => 'Password Baru masih kosong'
        ]);
        $this->form_validation->set_rules('confirm', 'Konfirmasi', 'required|trim|min_length[6]|matches[new_password]', [
            'min_length' => 'Konfirmasi Password terlalu pendek',
            'required' => 'Konfirmasi Password masih kosong',
            'matches' => 'Password Baru tidak sama dengan Konfirmasi Password'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('Partials/header', $data);
            $this->load->view('Dashboard/e_password', $data);
            $this->load->view('Partials/footer', $data);
        } else {
            $current = $this->input->post('old_password');
            $new = $this->input->post('new_password');
            if (!password_verify($current, $data['user']['new_password'])) {
                $message = '<div class="alert alert-danger" role="alert">Password lama salah!!</div>';
            } else {
                if ($current == $new) {
                    $message = '<div class="alert alert-danger" role="alert">Password baru tidak sama dengan Password Lama!!</div>';
                } else {
                    $password_hash = password_hash($new, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('username', $this->session->userdata('user'));
                    $this->db->update('users');
                    $message = '<div class="alert alert-success" role="alert">Password berhasil diubah!!</div>';
                }
            }
            $this->session->set_flashdata('message', $message);
            redirect(base_url("Dashboard/e_password"));
        }
    }
}
