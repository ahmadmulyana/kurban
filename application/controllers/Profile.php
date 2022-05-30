<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller {

	public function detail()
	{
        $this->load->view('frontend/template/header');
        $id_unique = $this->session->userdata('id_unique');
        $data['getProfile'] = $this->wmodels->getProfiledata(" WHERE id_unique = '$id_unique'");
        $this->load->view('frontend/pages/profile', $data);
        $this->load->view('frontend/template/footer');

		// $email = $data['getProfile'][0]->email;
		// $data['getHistory'] = $this->models->getHistorydata(" WHERE email = '$email'");
		// $count_alls = $this->models->getHistorycountdata(" WHERE email = '$email'");	

		// $this->load->library('pagination');
		// //konfigurasi pagination
  //       $config['base_url'] = site_url('profile/index'); //site url
  //       $config['total_rows'] = $this->db->count_all('trial'); //total row
  //       $config['per_page'] = 10;  //show record per halaman
  //       $config["uri_segment"] = 3;  // uri parameter
  //       $choice = $config["total_rows"] / $config["per_page"];
  //       $config["num_links"] = floor($choice);
 
  //       // Membuat Style pagination untuk BootStrap v4
  //     	$config['first_link']       = 'First';
  //       $config['last_link']        = 'Last';
  //       $config['next_link']        = 'Next';
  //       $config['prev_link']        = 'Prev';
  //       $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
  //       $config['full_tag_close']   = '</ul></nav></div>';
  //       $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
  //       $config['num_tag_close']    = '</span></li>';
  //       $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
  //       $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
  //       $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
  //       $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
  //       $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
  //       $config['prev_tagl_close']  = '</span>Next</li>';
  //       $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
  //       $config['first_tagl_close'] = '</span></li>';
  //       $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
  //       $config['last_tagl_close']  = '</span></li>';
 
  //       $this->pagination->initialize($config);
  //       $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
 
        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
        // $data['data'] = $this->models->getlist($config["per_page"], $data['page']);           
 
        // $data['pagination'] = $this->pagination->create_links();

	}

    public function update_profile()
    {

        $this->form_validation->set_rules('no_telp','no_telp','required','trim|required');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

        $no_telp        = $this->input->post('no_telp');
        $cek_customer   = $this->wmodels->getAllUsers($no_telp);        

        if ($this->form_validation->run() == FALSE ){
            $this->session->set_flashdata('error', 'Pengisian Data Salah');
                redirect('profile/detail');
        } else {

            if($cek_customer > 0) {
                echo "<script>window.location.href='" . base_url() . "profile/detail';alert('Nomor Telepon telah terdaftar di Akun lain, Silahkan ulang kembali');</script>";
            } else {

                $id_unique      = $this->session->userdata('id_unique');
                $nama_klien     = $this->input->post('nama_klien');
                $no_telp        = $this->input->post('no_telp');
                $email          = $this->input->post('email');
                $alamat         = $this->input->post('alamat');

                // var_dump($id_unique);
                // exit();

                $data_update    = array(
                    'nama_klien'    => $nama_klien,
                    'no_telp'       => $no_telp,
                    'email'         => $email,
                    'alamat'        => $alamat
                );

                $where          = array('id_unique' => $id_unique);
                $res            = $this->db->update('user',$data_update,$where);
                redirect('profile/detail');

            }
            
        }

        // Batas

        
    }

}
