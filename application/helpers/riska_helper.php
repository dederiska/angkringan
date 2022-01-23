<?php defined('BASEPATH') or exit('No direct script access allowed');

function manggil_view($file, $data)
{
    $ieu = get_instance();
    $data['file'] = $file;
    $ieu->load->view('templates/index', $data);
}

function notif($text, $tipe)
{
    $ieu = get_instance();
    if ($tipe == true) {
        $warna = 'success';
    } else {
        $warna = 'danger';
    }
    $ieu->session->set_flashdata('message', '<div class="alert alert-' . $warna . ' alert-dismissable">
<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
' . $text . '</div>');
}

function data_post($data)
{
    $ini = get_instance();
    return $ini->input->post($data);
}

function tampil_session($data)
{
    $ini = get_instance();
    return $ini->session->userdata($data);
}

function halaman($base_url, $total_data)
{
    $ieu = get_instance();
    $config['base_url'] = $base_url; //site url
    $config['total_rows'] = $total_data; //total row
    $config["per_page"] = 6;
    $choice = $config["total_rows"] / $config["per_page"];
    $config["num_links"] = floor($choice);
    //CONFIGURASI TAMPILAN PAGINATION
    $config['full_tag_open'] = '<nav class="mt-2"> <ul class="pagination">';
    $config['full_tag_close'] = '</ul></nav>';
    $config['first_tag_open'] = '<li class="page-item">';
    $config['first_tag_close'] = '</li>';
    $config['last_link'] = '';
    $config['las_tag_open'] = '<li class="page-item">';
    $config['las_tag_close'] = '</li>';
    $config['prev_link'] = 'Sebelumnya';
    $config['prev_tag_open'] = '<li class="page-item">';
    $config['prev_tag_close'] = '</li>';
    $config['next_link'] = 'Selanjutnya';
    $config['next_tag_open'] = '<li class="page-item">';
    $config['next_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
    $config['cur_tag_close'] = '</span></li>';
    $config['num_tag_open'] = '<li class="page-item">';
    $config['num_tag_close'] = '</li>';
    //KIRIM HASIL KONFIGURASI
    $ieu->pagination->initialize($config);
}
