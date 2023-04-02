<?php

class Notfound extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_default');
        $this->load->library('session');
    }

    function index()
    {
        $this->load->view('auth/error');
    }
}