<?php

class Auth extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('m_default');
    $this->load->library('session');
  }

  function index()
  {
    if ($this->session->userdata('status') != "") {
      redirect(base_url("dashboard"));
    }
    $this->load->view('auth/login');
  }

  function verification()
  {
    if ($this->session->userdata('status') != "") {
      redirect(base_url("dashboard"));
    }
    $username = htmlspecialchars($this->input->post('username'));
    $password = htmlspecialchars($this->input->post('password'));
    $where = array(
      'username' => $username
    );

    $cek = $this->m_default->cek_login('user', $where)->row_array();
    if ($cek) {
      if (password_verify($password, $cek['password'])) {
        if ($cek['level'] == 'Administrator') {
          $data_session = array(
            'nama' => $username,
            'status' => "Administrator"
          );

          $this->session->set_userdata($data_session);
          $this->session->set_flashdata('message', 'verifikasi data sukses, anda dapat berselancar sebagai administrator');
          redirect(base_url("dashboard"));
        } else {
          $data_session = array(
            'nama' => $username,
            'status' => "Mahasiswa"
          );

          $this->session->set_userdata($data_session);
          redirect(base_url("Mahasiswa"));
        }
      } else {

        $this->session->set_flashdata('message', 'Gagal mem-verifikasi data, cek kembali username dan password anda');
        redirect(base_url('/'));
      }
    } else {
      $this->session->set_flashdata('message', 'Gagal mem-verifikasi data, cek kembali username dan password anda');
      redirect(base_url('/'));
    }
  }

  function logout()
  {
    $this->session->sess_destroy();
    redirect(base_url('auth'));
  }

  function info()
  {
    phpinfo();
  }
}
