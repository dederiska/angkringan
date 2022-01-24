<?php
defined('BASEPATH') or exit('No direct script access allowed');

$autoload['packages'] = array();
// $autoload['libraries'] = array('email', 'session', 'database', 'form_validation', 'pagination');
$autoload['libraries'] = array('database', 'email', 'session', 'form_validation', 'encrypt', 'pagination');
$autoload['libraries'] = array('database', 'email', 'session', 'form_validation', 'encryption', 'pagination');
//email untuk lupa password 
//session untuk login 
//sebagai penghubung coding ke database
//form validation untuk memvalidasi inputan 
$autoload['drivers'] = array();
$autoload['helper'] = array('url', 'file', 'riska');
//url mengaktifkan fungsi base url
//file untuk mengupload file
$autoload['config'] = array();
$autoload['language'] = array();
$autoload['model'] = array('mydb');
//mydb untuk mengakses file model mydb
