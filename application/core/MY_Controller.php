<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    // public function __construct(){
    //     parent::__construct();
    //     if($this->session->id."'"== null){
    //             redirect("home/login");
    //     }
    // }

    public function __construct(){
        parent::__construct();
        if($this->session->userdata('email') == null){
                redirect("website/login");
        }
        // $this->id = $this->session->userdata('id');
    }
}    