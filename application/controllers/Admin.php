<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('url', 'download'));

        if ($this->session->userdata('status') != "Administrator") {
            redirect(base_url("auth"));
        } else {

            $this->load->model('M_default');
            $this->load->helper('url');
        }
    }

    function index()
    {
        $data['title'] = 'Dashboard';
        $this->load->view('templates/sidebar', $data);
        $this->load->view('auth/dashboard', $data);
        $this->load->view('templates/footer');
    }

    function change_password()
    {
        $id = $this->input->post('id');
        $pw_lama = $this->input->post('pw_lama');
        $pw_baru = $this->input->post('pw_baru');
        $pw_baru2 = $this->input->post('pw_baru2');
        $username = $this->session->userdata('nama');

        $where2 = array(
            'id' => $id
        );

        $get_pw = $this->db->get_where('user', ['username' => $username])->row_array();
        $pw = $get_pw['password'];
        if (password_verify($pw_lama, $pw)) {
            if ($pw_baru == $pw_baru2) {
                $data = array(
                    'password' => password_hash($this->input->post('pw_baru'), PASSWORD_DEFAULT),
                );
                $this->M_default->update($where2, $data, 'user');
                $this->session->set_flashdata('message', 'data telah diperbarui kedalam sistem, terima kasih !');
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('message', 'data tidak sesuai, cek kembali password anda');
                redirect('dashboard');
            }
        } else {
            $this->session->set_flashdata('message', 'data tidak sesuai, cek kembali password anda');
            redirect('dashboard');
        }
    }

    function users()
    {
        $data['title'] = 'Users';
        $data['user'] = $this->M_default->getall('user')->result();
        $this->load->view('templates/sidebar', $data);
        $this->load->view('users/akun', $data);
        $this->load->view('templates/footer');
    }

    function add_user()
    {
        $username = htmlspecialchars($this->input->post('username'));
        $password = htmlspecialchars($this->input->post('password'));
        $nama = htmlspecialchars($this->input->post('nama'));
        $level = htmlspecialchars($this->input->post('level'));

        $data = array(
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'nama' => $nama,
            'level' => $level
        );

        $this->M_default->input($data, 'user');
        $this->session->set_flashdata('message', 'data telah ditambahkan kedalam sistem, terima kasih !');
        redirect('users');
    }

    function delete_user($id)
    {
        $where = array('id' => $id);
        $this->M_default->hapus($where, 'user');
        $this->session->set_flashdata('message', 'data telah dihapus dari dalam sistem, terima kasih !');
        redirect('users');
    }

    function update_user()
    {
        $id = $this->input->post('id');
        $username = htmlspecialchars($this->input->post('username'));
        $nama = htmlspecialchars($this->input->post('nama'));
        $level = htmlspecialchars($this->input->post('level'));
        $data = array(
            'username' => $username,
            'level' => $level,
            'nama' => $nama
        );
        $where = array(
            'id' => $id
        );

        $this->M_default->update($where, $data, 'user');
        $this->session->set_flashdata('message', 'data telah diperbarui dari dalam sistem, terima kasih !');
        redirect('users');
    }

    function akun_mahasiswa()
    {
        $data['title'] = 'Akun Mahasiswa';
        $data['query'] = $this->M_default->getall('mahasiswa')->result();
        $this->load->view('templates/sidebar', $data);
        $this->load->view('mahasiswa/akun', $data);
        $this->load->view('templates/footer');
    }

    function add_mahasiswa()
    {
        $nim = htmlspecialchars($this->input->post('nim'));
        $password = htmlspecialchars($this->input->post('password'));
        $nama = htmlspecialchars($this->input->post('nama'));
        $kelas = htmlspecialchars($this->input->post('kelas'));

        $data = array(
            'nim' => $nim,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'nama' => $nama,
            'kelas' => $kelas
        );

        $this->M_default->input($data, 'mahasiswa');
        $this->session->set_flashdata('message', 'data telah ditambahkan kedalam sistem, terima kasih !');
        redirect('akun-mahasiswa');
    }

    function update_mahasiswa()
    {
        $id = $this->input->post('id');
        $kelas = htmlspecialchars($this->input->post('kelas'));
        $nama = htmlspecialchars($this->input->post('nama'));
        $nim = htmlspecialchars($this->input->post('nim'));
        $data = array(
            'kelas' => $kelas,
            'nim' => $nim,
            'nama' => $nama
        );
        $where = array(
            'id' => $id
        );

        $this->M_default->update($where, $data, 'mahasiswa');
        $this->session->set_flashdata('message', 'data telah diperbarui dari dalam sistem, terima kasih !');
        redirect('akun-mahasiswa');
    }

    function delete_mahasiswa($id)
    {
        $where = array('id' => $id);
        $this->M_default->hapus($where, 'mahasiswa');
        $this->session->set_flashdata('message', 'data telah dihapus dari dalam sistem, terima kasih !');
        redirect('akun-mahasiswa');
    }

    private function soal_reading()
    {
        $data['title'] = 'Bank Soal Reading';
        $where = array('jenis_soal' => 'Reading');
        $data['query'] = $this->M_default->edit($where, 'soal')->result();
        $query = $this->db->query("SELECT max(kode_soal) as maxkode FROM soal where jenis_soal='Reading' ");
        foreach ($query->result_array() as $q) {
            $kode = $q['maxkode'];
        }
        $urutan = substr($kode, 3, 3);
        if($urutan != 000)
            {
                $urutan = substr($kode, 3, 3);
                
            } else {
                $urutan = 000;
            };

        $urutan++;
        $kode = sprintf("%03s", $urutan);
        $data['kode'] = $kode;
        $this->load->view('templates/sidebar', $data);
        $this->load->view('soal/reading', $data);
        $this->load->view('templates/footer');
    }

    function add_reading()
    {
        $jenis_soal = htmlspecialchars($this->input->post('jenis_soal'));
        $kode_soal = htmlspecialchars($this->input->post('kode_soal'));
        $deskripsi = htmlspecialchars($this->input->post('deskripsi'));
        $a = htmlspecialchars($this->input->post('a'));
        $b = htmlspecialchars($this->input->post('b'));
        $c = htmlspecialchars($this->input->post('c'));
        $d = htmlspecialchars($this->input->post('d'));
        $e = htmlspecialchars($this->input->post('e'));
        $jawaban = htmlspecialchars($this->input->post('jawaban'));

        $data = array(
            'kode_soal' => $kode_soal,
            'jenis_soal' => $jenis_soal,
            'deskripsi' => $deskripsi,
            'a' => $a,
            'b' => $b,
            'c' => $c,
            'd' => $d,
            'e' => $e,
            'jawaban' => $jawaban

        );

        $this->M_default->input($data, 'soal');
        $this->session->set_flashdata('message', 'data telah ditambahkan kedalam sistem, terima kasih !');
        redirect('reading');
    }

    function update_reading()
    {
        $id = $this->input->post('id');
        $deskripsi = htmlspecialchars($this->input->post('deskripsi'));
        $a = htmlspecialchars($this->input->post('a'));
        $b = htmlspecialchars($this->input->post('b'));
        $c = htmlspecialchars($this->input->post('c'));
        $d = htmlspecialchars($this->input->post('d'));
        $e = htmlspecialchars($this->input->post('e'));
        $jawaban = htmlspecialchars($this->input->post('jawaban'));

        $data = array(
            'deskripsi' => $deskripsi,
            'a' => $a,
            'b' => $b,
            'c' => $c,
            'd' => $d,
            'e' => $e,
            'jawaban' => $jawaban,
        );
        $where = array(
            'id' => $id
        );

        $this->M_default->update($where, $data, 'soal');
        $this->session->set_flashdata('message', 'data telah diperbarui dari dalam sistem, terima kasih !');
        redirect('reading');
    }

    function delete_reading($id)
    {
        $where = array('id' => $id);
        $this->M_default->hapus($where, 'soal');
        $this->session->set_flashdata('message', 'data telah dihapus dari dalam sistem, terima kasih !');
        redirect('reading');
    }

    function soal_listening()
    {
        $data['title'] = 'Bank Soal Listening';
        $where = array('jenis_soal' => 'Listening');
        $data['ws'] = $this->M_default->edit($where, 'soal')->result();
        $query = $this->db->query("SELECT max(kode_soal) as maxkode FROM soal where jenis_soal='Listening' ");
        foreach ($query->result_array() as $q) {
            $kode = $q['maxkode'];
        }
        $urutan = substr($kode, 3, 3);
        if($urutan != 000)
            {
                $urutan = substr($kode, 3, 3);
                
            } else {
                $urutan = 000;
            };

        $urutan++;
        $kode = sprintf("%03s", $urutan);
        $data['kode'] = $kode;

        $this->load->view('templates/sidebar', $data);
        $this->load->view('soal/listening', $data);
        $this->load->view('templates/footer');
    }

    function add_listening()
    {
        $jenis_soal = htmlspecialchars($this->input->post('jenis_soal'));
        $kode_soal = htmlspecialchars($this->input->post('kode_soal'));
        $deskripsi = htmlspecialchars($this->input->post('deskripsi'));
        $a = htmlspecialchars($this->input->post('a'));
        $b = htmlspecialchars($this->input->post('b'));
        $c = htmlspecialchars($this->input->post('c'));
        $d = htmlspecialchars($this->input->post('d'));
        $e = htmlspecialchars($this->input->post('e'));
        $jawaban = htmlspecialchars($this->input->post('jawaban'));

        $file = $_FILES['file'];
        $config['upload_path']          = './assets/uploads/mp3';
        $config['allowed_types']        = 'mp3|MP3|wav|WAV';
        $config['max_size']             = '550';
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            $this->session->set_flashdata('pesan', 'File yang anda masukan terindikasi salah format atau file terlalu besar, gunakan file dengan ekstensi .mp3 dengan ukuran maksimal 500kb');
        } else {
            $mp3 = $this->upload->data('file_name');
            $data = array(
                'kode_soal' => $kode_soal,
                'jenis_soal' => $jenis_soal,
                'deskripsi' => $deskripsi,
                'a' => $a,
                'b' => $b,
                'c' => $c,
                'd' => $d,
                'e' => $e,
                'jawaban' => $jawaban,
                'file' => $mp3
            );

            $this->M_default->input($data, 'soal');
            $this->session->set_flashdata('message', 'data telah ditambahkan kedalam sistem, terima kasih !');
            redirect('listening');
        }
        $this->session->set_flashdata('message', 'File yang anda masukan terindikasi salah format atau file terlalu besar, gunakan file dengan ekstensi .mp3 dengan ukuran maksimal 500Kb');
        redirect('listening');
    }

    function update_listening()
    {
        $id = $this->input->post('id');
        $deskripsi = htmlspecialchars($this->input->post('deskripsi'));
        $a = htmlspecialchars($this->input->post('a'));
        $b = htmlspecialchars($this->input->post('b'));
        $c = htmlspecialchars($this->input->post('c'));
        $d = htmlspecialchars($this->input->post('d'));
        $e = htmlspecialchars($this->input->post('e'));
        $jawaban = htmlspecialchars($this->input->post('jawaban'));
        $file = $_FILES['file'];
        $check = $_FILES['file']['error'];

        if($check !==4){
            $config['upload_path']          = './assets/uploads/mp3';
            $config['allowed_types']        = 'mp3|MP3|wav|WAV';
            $config['max_size']             = '550';
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('file')) {
                $this->session->set_flashdata('pesan', 'File yang anda masukan terindikasi salah format atau file terlalu besar, gunakan file dengan ekstensi .mp3 dengan ukuran maksimal 500kb');
            } else {
                $old_file = $this->input->post('old_file');
                if ($old_file != 'example.mp3') {
                    unlink(FCPATH . 'assets/uploads/mp3/' . $old_file);
                }
                $mp3 = $this->upload->data('file_name');
                $data = array(
                    'deskripsi' => $deskripsi,
                    'a' => $a,
                    'b' => $b,
                    'c' => $c,
                    'd' => $d,
                    'e' => $e,
                    'jawaban' => $jawaban,
                    'file' => $mp3
                );

                $where = array(
                    'id' => $id
                );

                $this->M_default->update($where, $data, 'soal');
                $this->session->set_flashdata('message', 'data telah diperbarui kedalam sistem, terima kasih !');
                redirect('listening');
                }
                
            $this->session->set_flashdata('message', 'File yang anda masukan terindikasi salah format atau file terlalu besar, gunakan file dengan ekstensi .mp3 dengan ukuran maksimal 500Kb');
            redirect('listening');
        } else {
            $data = array(
                'deskripsi' => $deskripsi,
                'a' => $a,
                'b' => $b,
                'c' => $c,
                'd' => $d,
                'e' => $e,
                'jawaban' => $jawaban
            );

            $where = array(
                'id' => $id
            );

            $this->M_default->update($where, $data, 'soal');
            $this->session->set_flashdata('message', 'data telah diperbarui kedalam sistem, terima kasih !');
            redirect('listening');
        }

        
    }

    function delete_listening($id)
    {
        $where = array('id' => $id);
        $query = $this->db->get_where('soal', $where)->row_array();
        $this->M_default->hapus($where, 'soal');
        unlink(FCPATH . 'assets/uploads/mp3/' . $query['file']);
        $this->session->set_flashdata('message', 'data telah dihapus dari dalam sistem, terima kasih !');
        redirect('listening');
    }

    function score()
    {
        $data['title'] = 'Hasil dan Skor';
        $data['query'] = $this->M_default->join('skor','mahasiswa','skor.nim = mahasiswa.nim')->result();
        $this->load->view('templates/sidebar', $data);
        $this->load->view('soal/hasil-skor', $data);
        $this->load->view('templates/footer');
    }

    function details()
    {   
        $kode_test = $this->uri->segment(2);
        $kode_test = base64_decode(urldecode($kode_test));
        $data['title'] = 'Hasil dan Skor';
        $data['subtitle'] = 'View detail '. $kode_test;
        $where = array('kode_test' => $kode_test);

        $data['query'] = $this->M_default->join_where('test','soal','test.kode_soal = soal.kode_soal',$where)->result();
        $this->load->view('templates/sidebar', $data);
        $this->load->view('soal/detail-skor', $data);
        $this->load->view('templates/footer');
    }

    
    
}