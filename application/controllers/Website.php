<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function index()
	{
		$this->load->view('frontend/template/header');
		$data['getkategoris'] = $this->wmodels->getKategorihome();
		$this->load->view('frontend/pages/index', $data);
		$this->load->view('frontend/template/footer');
	}

	public function detail($kategori)
	{
		$this->load->view('frontend/template/header');
		$data['getkategori'] = $this->wmodels->getKategori(" WHERE kategori = '$kategori'");
		$data['getproduk'] = $this->wmodels->getProduk(" WHERE kategori = '$kategori'");
		$this->load->view('frontend/pages/detail', $data);
		$this->load->view('frontend/template/footer');
	}

	public function checkout()
	{
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/pages/checkout');
		$this->load->view('frontend/template/footer');
	}

	// public function profile()
	// {
	// 	$this->load->view('frontend/template/header');
	// 	$this->load->view('frontend/pages/profile');
	// 	$this->load->view('frontend/template/footer');
	// }

	public function login()
	{
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/pages/login');
		$this->load->view('frontend/template/footer');
	}

	public function register()
	{
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/pages/register');
		$this->load->view('frontend/template/footer');
	}

}
