<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller {

    function  __construct() {
        parent::__construct();
        $this->load->model('wmodels');
        $this->load->library('upload', 'image_lib', 'session', 'cart'); //load library upload
        $this->load->helper('form', 'url');
    }

    public function index()
    {
        $data['footercontent'] = $this->modelproduct->GetFooterMenuContent();
        $data['contacts'] = $this->modelproduct->addContact();
        $data['ongkir'] = $this->modelproduct->GetOngkir();
        $data['kategori'] = $this->modelproduct->GetBackendKategori();
        $this->load->view('orderplace', $data);
    }

    public function add()
    {

        if($this->input->post())
        {
            $insert_data = array( 
                'id'                => $this->input->post('id'),
                'id_unique'         => $this->input->post('id_unique'),
                'name'              => $this->input->post('nama_produk'),
                'price'             => $this->input->post('harga'),
                'qty'               => $this->input->post('qty'),
                'kategori'          => $this->input->post('kategori')
            );

            $this->cart->insert($insert_data);
        }

        redirect ('website/checkout', 'refresh');

    }

    public function update_cart(){
        // foreach($_POST['cart'] as $id => $cart)
        // {           
        //     $harga = $cart['harga'];
        //     $amount = $harga * $cart['qty'];
            
        //     $this->cartmodel->update_cart($cart['rowid'], $cart['qty'], $harga, $amount);
        // }

        $data = array(
            'rowid' => $rowid,
            'qty'   => $this->input->post('qty')
        );

        $this->cartmodel->update_cart;
        
        redirect('website/checkout');
    }   

    public function remove($rowid) {
        if ($rowid=="all"){
            $this->cart->destroy();
        }else{
            $data = array(
                'rowid'   => $rowid,
                'qty'     => 0
            );

            $this->cart->update($data);
        }
        
        redirect('cart');
    }   

    public function empty_cart()
    {
        $this->cart->destroy();
        $res = $this->cartmodel->DeleteOrderTemp();
        redirect ('cart', 'refresh');
    }

    public function save_order()
    {
        $customer = array(
            'customerid'    => $this->input->post('customerid', TRUE),
            'username'      => $this->input->post('username', TRUE),
            'email'         => $this->input->post('email', TRUE),
            'address'       => $this->input->post('address', TRUE),
            'mobile'        => $this->input->post('mobile', TRUE)
        );      

        $id_pelanggan = $this->cartmodel->insert_customer($customer);

        $order = array(
            'customerid'        => $this->input->post('customerid', TRUE),
            'id_pelanggan'      => $id_pelanggan,
            'total'             => $this->cart->total() * 10 / 100 + $this->cart->total(),
            'ongkir'            => $this->input->post('ongkir', TRUE),
            'tanggal'           => date('Y-m-d'),
            'addressto'         => $this->input->post('addressto', TRUE),
            'provinsi'          => $this->input->post('provinsi', TRUE),
            'kota'              => $this->input->post('kota', TRUE),
            'kurir'             => $this->input->post('kurir', TRUE),
            'payment'           => $this->input->post('payment', TRUE),
            'status'            => '1'
        );      

        $id_order = $this->cartmodel->insert_order($order);
        
        if ($cart = $this->cart->contents()):
            foreach ($cart as $item):
                $now = date("Y-m-d H:i:s");
                $nilai = $item['weight'] * 1 / 1000;
                $nilaiongkir = $item['qty'] * $nilai;
                $order_detail = array(
                    'id_order'      => $id_order,
                    'customerid'    => $this->input->post('customerid', TRUE),
                    'prodid'        => $item['prodid'],
                    'name'          => $item['name'],
                    'qty'           => $item['qty'],
                    'price'         => $item['price'],
                    'weight'        => $item['weight'],
                    'ongkir'        => $this->input->post('ongkir', TRUE),
                    'status'        => '1',
                    'tanggal'       => $now
                );      

                $id_pelanggan = $this->cartmodel->insert_order_detail($order_detail);
            
            endforeach;
        endif;

        //Load email library
        $this->load->library('email', 'encrypt');

        $username = $this->session->userdata('username');
        $email = $this->session->userdata('email');
        $ongkir = $this->input->post('ongkir');
        
        $data['ports'] = $this->modelproduct->getport();
        $port = $data['ports'][0]->port;

        //SMTP & mail configuration
        $config = array(
            'protocol'  => 'smtp',
            'smtp_host' => '172.16.0.18',
            'smtp_port' => $port,
            'smtp_user' => 'intermart@interbat.co.id',
            'smtp_pass' => 'Intermart@123',
            'mailtype'  => 'html',
            'charset'   => 'utf-8'
        );
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");

        $data = array(
            'username'      => $this->input->post('name'),
            'email'         => $this->input->post('email'),
            'id_order'      => $id_order,
            'price'         => $item['price'],
            'name'          => $item['name'],
            'qty'           => $item['qty'],
            'ongkir'        => $this->input->post('ongkir'),
            'product'       => $this->cartmodel->email_orderform($id_order),
            'tanggal'       => $now,
            'payment'        => $this->input->post('payment'),
            'kurir'        => $this->input->post('kurir'),
        );

        //Email content
        $this->email->to($email);
        $this->email->cc('intermart@interbat.co.id');
        $this->email->from('intermart@interbat.co.id',$username);
        // $this->email->subject('Mustela.com - Order #', $id_order);
        $this->email->subject('Mustela.com - Order');
        $message = $this->load->view('email/email_template_1',$data,TRUE);
        $this->email->message($message); 

        //Send email
        $this->email->send();
        $this->session->set_flashdata('msg', 'Success');

        $this->cart->destroy();

        $this->load->helper('url');
        redirect('cart/success');
    }

    public function success()
    {
        $customerid = $this->session->userdata('customerid');
        $data['contacts'] = $this->modelproduct->addContact();
        $data['lastorder'] = $this->cartmodel->getlastorder();
        $data['kategori'] = $this->modelproduct->GetBackendKategori();
        $this->load->view('order_success', $data);
    }
    

}