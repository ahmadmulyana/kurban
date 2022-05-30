<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Action extends CI_Controller {

    public function do_loginfront()
    {
        $no_telp = $this->input->post('no_telp');
        $password = md5($this->input->post('password'));
        // var_dump($password);
        // exit();
        $this->load->model('wmodels');
        $this->wmodels->cek_login_home($no_telp,$password);
    }

    public function logout(){
        $this->session->set_userdata('no_telp', FALSE);
        $this->session->sess_destroy();
        redirect();
    }

    public function do_regisfront()
    {
        $this->form_validation->set_rules('no_telp','no_telp','required','trim|required');
        $this->form_validation->set_rules('password','Password','trim|required');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

        $no_telp        = $this->input->post('no_telp');
        $cek_customer   = $this->wmodels->getAllUsers($no_telp);        

        if ($this->form_validation->run() == FALSE ){
            $this->session->set_flashdata('error', 'Pengisian Data Salah');
                redirect('website/register');
        } else {

            if($cek_customer > 0) {
                echo "<script>window.location.href='" . base_url() . "website/register';alert('Nomor Telepon Anda telah terdaftar, Silahkan ulang kembali');</script>";
            } else {

                $this->load->helper('string');
                $id_unique      = random_string('numeric',11);
                $nama_klien     = $this->input->post('nama_klien');
                $no_telp        = $this->input->post('no_telp');
                $email          = $this->input->post('email');
                $password       = $this->input->post('password');
                $status         = 1;

                $data = array(
                    'id_unique'      => $id_unique,
                    'nama_klien'     => $nama_klien,
                    'no_telp'        => $no_telp,
                    'email'          => $email,
                    'password'       => md5($password),
                    'status'         => $status
                );

                $this->session->set_flashdata('success', 'Register Success.');
                $this->wmodels->saveUser($data);
                redirect('website/login');
            }
            
        }
    }

    public function getProfiledata($id_unique)
    {
        $q = "SELECT * FROM user";
        $res = $this->db->query($q . $id_unique);
        return $res->result();
    }

}