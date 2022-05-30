<?php 
class Wmodels extends CI_Model{
    
    public function getKategori($kategori)
    {
        $q = "SELECT * FROM kategori";
        $res = $this->db->query($q . $kategori);
        return $res->result();
    }
    
    public function getProduk($kategori)
    {
        $q = "SELECT * FROM produk";
        $res = $this->db->query($q . $kategori);
        return $res->result();
    }

    public function getKategorihome()
    {
        $q = "SELECT * FROM kategori";
        $res = $this->db->query($q);
        return $res->result();
    }

    public function cek_login_home($no_telp,$password){
        $this->db->where('no_telp', $no_telp);
        $this->db->where('password', $password);
        $query = $this->db->get('user');
        if ($query->num_rows()>0) {
            foreach ($query->result() as $row) {
                $sess = array (
                    'nama_klien'    => $row->nama_klien,
                    'id_unique'     => $row->id_unique,
                    'password'      => md5($row->password),
                    'email'         => $row->email,
                    'no_telp'       => $row->no_telp,
                    'alamat'        => $row->alamat,
                    'status'        => $row->status
                );
            }
            $this->session->set_userdata($sess);
            redirect('profile/detail');
        } else {
            $this->session->set_flashdata('info', 'Maaf email dan password Anda salah!');
            redirect('website/login');
        }
    }

    public function getAllUsers($no_telp){
        $this->db->where('no_telp', $no_telp);
        $res = $this->db->get('user');
        return $res->num_rows(); 
    }

    public function saveUser($data) {
        $this->db->insert("user", $data);
        return true;
    }

    public function getProfiledata($id_unique)
    {
        $q = "SELECT * FROM user";
        $res = $this->db->query($q . $id_unique);
        return $res->result();
    }

    // public function getCartItems()
    // {
    //     $q = "SELECT * FROM user";
    //     return $this->db->query($q)->result_array();
    // }

    // public function insertToCart($data)
    // {
    //     $item = array(
    //         'id'                => $row->id,
    //         'id_unique'         => $row->id_unique,
    //         'qty'               => 1,
    //         'nama_produk'       => $row->nama_produk,
    //         'harga'             => $row->harga,
    //         'kategori'          => $row->kategori,
    //     );
    //     $this->db->insert('orders',$item);
    //     return $this->db->insert_id();
    // }

}
?>