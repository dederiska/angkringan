<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('user')) {
        redirect(base_url("Auth"));
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment('1');

        $queryMenu = $ci->db->get_where('t_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['id_menu'];

        $userAccess = $ci->db->get_where('t_menu_access', [
            'level' => $role_id,
            'id_menu' => $menu_id
        ]);
        if ($userAccess->num_rows() < 1) {
            redirect(base_url("Auth/blocked"));
        }
    }
}
function page_sid($base_url, $jml)
{
    $ieu = get_instance();
    $config['base_url'] = $base_url; //site url
    $config['total_rows'] = $jml; //total row
    $choice = $config["total_rows"] / 6;
    $config["num_links"] = floor($choice);
    $ieu->pagination->initialize($config);
}
