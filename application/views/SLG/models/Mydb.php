<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mydb extends CI_Model
{
	//INPUT,UPDATE,DELETE
	function input_dt($data, $table)
	{
		$this->db->insert($table, $data);
	}
	function update_dt($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
	function del($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}


	//ALL
	function sid()
	{
		return $this->db->get_where('sid', ["id" => "1"])->row_array();
	}
	function info_desa($slug)
	{
		return $this->db->get_where('detail_desa', ["title" => $slug])->row_array();
	}
	//DASHBOARD
	function posts()
	{
		return $this->db->query('SELECT a.*, SUBSTRING(body,6,100) as exc, nama_kategori, c.title as author 
		FROM post a, kategori b, users c
		WHERE a.id_kategori = b.id 
		AND a.id_user = c.id 
		ORDER BY id DESC')->result_array();
	}
	function select_post($slug)
	{
		return $this->db->query('SELECT a.*, nama_kategori, c.title as author 
		FROM post a, kategori b, users c
		WHERE a.id_kategori = b.id
		AND a.id_user = c.id
		AND slug="' . $slug . '"')->row_array();
	}
	function post($id)
	{
		return $this->db->query('SELECT a.*, nama_kategori, c.title as author  
		FROM post a, kategori b, users c
		WHERE a.id_kategori = b.id
		AND a.id_user = c.id
		AND a.id="' . $id . '"')->row_array();
	}

	function category_post($category)
	{
		return $this->db->query('SELECT a.*, nama_kategori, c.title as author  
		FROM post a, kategori b, users c
		WHERE a.id_kategori = b.id
		AND a.id_user = c.id
		AND a.id_kategori = "' . $category . '"
		ORDER BY a.id DESC')->result_array();
	}

	//FRONT END
	function all_posts($start)
	{
		return $this->db->query("SELECT a.*, SUBSTRING(body,6,100) as exc, nama_kategori , c.title as author 
                FROM post a, kategori b, users c
                WHERE a.id_kategori = b.id 
                AND a.id_user = c.id 
                ORDER BY a.id DESC 
                LIMIT " . $start . ", 6")->result_array();
	}
	function all_posts_category($start, $id)
	{
		return $this->db->query("SELECT a.*, SUBSTRING(body,6,100) as exc, nama_kategori , c.title as author 
                FROM post a, kategori b, users c
                WHERE a.id_kategori = b.id 
                AND a.id_user = c.id 
				AND a.id_kategori = '" . $id . "'
                ORDER BY a.id DESC 
                LIMIT " . $start . ", 6")->result_array();
	}
	function count_find($keyword)
	{
		return $this->db->query("SELECT a.*, SUBSTRING(body,6,100) as exc, nama_kategori , c.title as author 
		FROM post a, kategori b, users c
		WHERE a.id_kategori = b.id 
		AND a.id_user = c.id 
		AND judul LIKE '%" . $keyword . "%'");
	}
	function find_post($keyword, $start)
	{
		return $this->db->query("SELECT a.*, SUBSTRING(body,6,100) as exc, nama_kategori , c.title as author 
		FROM post a, kategori b, users c
		WHERE a.id_kategori = b.id 
		AND a.id_user = c.id 
		AND judul LIKE '%" . $keyword . "%' 
		ORDER BY id DESC  
		LIMIT " . $start . ", 6");
	}
	function newpost()
	{
		return $this->db->query('SELECT a.*, nama_kategori, c.title as author
		FROM post a, kategori b, users c
		WHERE a.id_kategori = b.id 
		AND a.id_user = c.id 
		ORDER BY id DESC
		LIMIT 1')->row_array();
	}
	function posts5()
	{
		return $this->db->query('SELECT a.*, SUBSTRING(body,6,100) as exc, nama_kategori, c.title as author 
		FROM post a, kategori b, users c
		WHERE a.id_kategori = b.id
		AND a.id_user = c.id  
		ORDER BY id DESC
		LIMIT 5')->result_array();
	}
	function umkm3()
	{
		return $this->db->query('SELECT * FROM pedagang 
		ORDER BY id DESC
		LIMIT 3')->result_array();
	}
	function all_umkm($start)
	{
		return $this->db->query("SELECT * 
                FROM pedagang
                ORDER BY id DESC 
                LIMIT " . $start . ", 6")->result_array();
	}
	function galery4()
	{
		return $this->db->query("SELECT *,slug FROM galeri a,post b 
			WHERE a.id_post = b.id
			ORDER BY id_foto DESC 
			LIMIT 4")->result_array();
	}
	function ms()
	{	//MEDIA SOSIAL
		return $this->db->get_where('sosial_media', ['status' => '1'])->result_array();
	}
}
