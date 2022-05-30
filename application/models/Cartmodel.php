<?php 
class Cartmodel extends CI_Model{
 
	    function get_all_produk(){
	        $hasil=$this->db->get('product');
	        return $hasil->result();
	    }

	    public function update_cart($rowid, $qty, $price, $amount) {
	 		$data = array(
				'rowid'   => $rowid,
				'qty'     => $qty,
				'price'   => $price,
				'amount'   => $amount
			);
			$this->cart->update($data);
		}
		public function insert_customers($data)
		{
			$this->db->insert('temp_order_cust', $data);
			$id = $this->db->insert_id();
			return (isset($id)) ? $id : FALSE;		
		}

		public function insert_orders($data)
		{
			$this->db->insert('temp_o', $data);
			$id = $this->db->insert_id();
			return (isset($id)) ? $id : FALSE;
		}

		public function insert_order($data)
		{
			$this->db->insert('orders', $data);
			$id = $this->db->insert_id();
			return (isset($id)) ? $id : FALSE;
		}

		public function insert_order_details($data)
		{
			$this->db->insert('temp_order', $data);
		}

		public function insert_customer($data)
		{
			$this->db->insert('customer_order', $data);
			$id = $this->db->insert_id();
			return (isset($id)) ? $id : FALSE;		
		}
		
		public function insert_order_detail($data)
		{
			$this->db->insert('orders_temp', $data);
		}

		public function insert_order_detail1()
		{
			$this->db->query('orders_temp');
		}

		public function getlastorder()
		{
			$q = "SELECT * FROM orders WHERE id_order = (SELECT MAX(id_order) FROM orders)";
			$res = $this->db->query($q);
            return $res->result();
		}

		public function getlastordertemp($id_order)
		{
			$q = "SELECT * FROM temp_order" . $id_order;
			$res = $this->db->query($q);
            return $res->result();
		}

		public function email_orderform($id_order)
		{
			$res = $this->db->query('SELECT * FROM orders_temp WHERE id_order =' . $id_order);
			return $res->result();
		}

	    public function posttemp()
	    {
		    $q= "SELECT p.*,(SELECT image_name FROM files WHERE prodid=p.id LIMIT 1) as image_product FROM orders_temp p";
		    $res = $this->db->query($q);
		    return $res->result();
		}

		public function ongkir()
	    {
		    $q= "SELECT p.*,(SELECT provinsi FROM sample_ongkir WHERE provinsi=p.id LIMIT 1) as provinsi FROM customer p";
		    $res = $this->db->query($q);
		    return $res->result();
		}

		public function counttemp($id_customer) {
            $this->db->where('id_customer', $id_customer);
            return $this->db->get('orders_temp')->result();
        }

        public function DeleteOrderTemp()
        { 
			$this->db->query("DELETE FROM orders_temp");
        }

	}
?>