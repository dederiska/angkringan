<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Desa extends CI_Controller
{
    public function index()
    {
        $data['sid'] = $this->mydb->sid();
        $data['title'] = "Home";
        $data['npost'] = $this->mydb->newpost();
        $data['posts'] = $this->mydb->posts5();
        $data['sosmed'] = $this->mydb->ms();
        $data['galeri'] = $this->mydb->galery4();

        $data['umkm'] = $this->mydb->umkm3();
        $this->load->view('template/header', $data);
        $this->load->view('public/index', $data);
        $this->load->view('template/footer', $data);
    }
    public function sejarah()
    {
        $data['title'] = "Sejarah";
        $data['sid'] = $this->mydb->sid();
        $data['galeri'] = $this->mydb->galery4();
        $data['sosmed'] = $this->mydb->ms();
        $data['info'] = $this->mydb->info_desa('Sejarah');
        $this->load->view('template/header', $data);
        $this->load->view('Public/sejarah', $data);
        $this->load->view('template/footer', $data);
    }
    public function profil()
    {
        $data['title'] = "Profil Desa";
        $data['sid'] = $this->mydb->sid();
        $data['profil'] = $this->mydb->info_desa('Profil');
        $data['galeri'] = $this->mydb->galery4();
        $data['sosmed'] = $this->mydb->ms();
        $this->load->view('template/header', $data);
        $this->load->view('Public/profile', $data);
        $this->load->view('template/footer', $data);
    }
    public function visimisi()
    {
        $data['title'] = "Visi dan Misi Desa";
        $data['sid'] = $this->mydb->sid();
        $data['visimisi'] = $this->mydb->info_desa('Visi Misi');
        $data['galeri'] = $this->mydb->galery4();
        $data['sosmed'] = $this->mydb->ms();
        $this->load->view('template/header', $data);
        $this->load->view('Public/visimisi', $data);
        $this->load->view('template/footer', $data);
    }
    public function potensi()
    {
        $data['title'] = "Potensi Desa";
        $data['sid'] = $this->mydb->sid();
        $data['potensi'] = $this->mydb->info_desa('Potensi');
        $data['galeri'] = $this->mydb->galery4();
        $data['sosmed'] = $this->mydb->ms();
        $data['umkm'] = $this->mydb->umkm3();
        $this->load->view('template/header', $data);
        $this->load->view('Public/potensi', $data);
        $this->load->view('template/footer', $data);
    }
    //POST
    public function posts()
    {
        $data['title'] = "Semua Kegiatan";
        $data['sid'] = $this->mydb->sid();
        $jml = $this->db->get('post')->num_rows();
        page_sid(site_url('Desa/posts'), $jml);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['posts'] = $this->mydb->all_posts($data['page']);
        $data['pagination'] = $this->pagination->create_links();
        $data['sosmed'] = $this->mydb->ms();
        $data['galeri'] = $this->mydb->galery4();
        $this->load->view('Template/header', $data);
        $this->load->view('Public/posts', $data);
        $this->load->view('Template/footer', $data);
    }
    public function post($slug)
    {
        $post = $this->mydb->select_post($slug);
        if ($post > 0) {
            $data['post'] = $post;
            $data['title'] = $post['judul'];
            $page = 'post';
        } else {
            $data['title'] = "Postingan Tidak Ditemukan";
            $data['posts'] = $this->mydb->posts5();
            $page = 'notfound';
        }
        $data['sid'] = $this->mydb->sid();
        $data['sosmed'] = $this->mydb->ms();
        $data['galeri'] = $this->mydb->galery4();
        $this->load->view('template/header', $data);
        $this->load->view('public/' . $page, $data);
        $this->load->view('template/footer', $data);
    }
    public function find()
    {
        $keyword = $this->input->post('search');
        $post = $this->mydb->count_find($keyword);
        if ($post->num_rows() > 0) {
            $data['title'] = "Pencarian : " . $keyword;
            $jml = $post->num_rows();
            page_sid(site_url('Desa/find'), $jml);
            $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data['posts'] = $this->mydb->find_post($keyword, $data['page'])->result_array();
            $data['pagination'] = $this->pagination->create_links();
            $page = 'posts';
        } else {
            $data['title'] = "Pencarian Tidak Ditemukan !!!";
            $data['posts'] = $this->mydb->posts5();
            $page = 'notfound';
        }
        $data['sid'] = $this->mydb->sid();
        $data['sosmed'] = $this->mydb->ms();
        $data['galeri'] = $this->mydb->galery4();
        $this->load->view('template/header', $data);
        $this->load->view('public/' . $page, $data);
        $this->load->view('Template/footer', $data);
    }
    public function category()
    {
        $id = $this->uri->segment('3');
        $ctgr = $this->db->get_where('kategori', ['id' => $id]);
        if ($ctgr->num_rows() > 0) {
            $categori = $ctgr->row_array();
            $data['title'] = $categori['nama_kategori'];
            $jml = $this->db->get_where('post', ['id_kategori' => $categori['id']])->num_rows();
            page_sid(site_url('Desa/category/' . $id), $jml);
            $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
            $data['posts'] = $this->mydb->all_posts_category($data['page'], $id);
            $data['pagination'] = $this->pagination->create_links();
            $page = 'posts';
        } else {
            $data['title'] = "Kategori Tidak Ditemukan";
            $data['posts'] = $this->mydb->posts5();
            $page = 'notfound';
        }
        $data['sid'] = $this->mydb->sid();
        $data['sosmed'] = $this->mydb->ms();
        $data['galeri'] = $this->mydb->galery4();
        $this->load->view('template/header', $data);
        $this->load->view('public/' . $page, $data);
        $this->load->view('template/footer', $data);
    }
    //UMKM
    public function umkm()
    {
        $data['sid'] = $this->mydb->sid();
        $data['title'] = "UMKM " . $data['sid']['nama_desa'];
        $jml = $this->db->get('pedagang')->num_rows();
        page_sid(site_url('Desa/umkm'), $jml);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['umkm'] = $this->mydb->all_umkm($data['page']);
        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('Template/header', $data);
        $this->load->view('Public/umkm', $data);
        $this->load->view('Template/footer', $data);
    }
    public function show_umkm($id)
    {
        $pedagang = $this->db->get_where('pedagang', ['id' => $id]);
        if ($pedagang->num_rows() > 0) {
            $data['pedagang'] = $pedagang->row_array();
            $data['title'] = $data['pedagang']['nama_penjualan'];
            $data['galeri'] = $this->db->get_Where('galeri2', ['id_pedagang' => $data['pedagang']['id']])->result_array();
            $page = 'show_umkm';
        } else {
            $data['title'] = "UMKM Tidak Ditemukan";
            $data['posts'] = $this->mydb->posts5();
            $data['sosmed'] = $this->mydb->ms();
            $data['galeri'] = $this->mydb->galery4();
            $page = 'notfound';
        }
        $data['sid'] = $this->mydb->sid();
        $this->load->view('template/header', $data);
        $this->load->view('public/' . $page, $data);
        $this->load->view('template/footer', $data);
    }
}
