<?php
    class PaymentModel
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database();
        }
 
        public function getAllCartsByUserId($user_id)
        {
            $this->db->createConnection();

            $result = $this->db->executeQuery("SELECT `carts`.*, `products`.`thumb`, `products`.`price`, `products`.`title`
                                                FROM `carts`
                                                INNER JOIN `products` ON `carts`.`product_id` = `products`.`id`
                                                WHERE `carts`.`user_id` = '$user_id' AND `carts`.`paid_time` < `carts`.`add_time`
                                                ORDER BY `carts`.`id` DESC
                                                ");

            $carts = array();
            while($cart = mysqli_fetch_assoc($result)){
                array_push($carts, $cart);
            }

            $this->db->closeConnection($result);

            return $carts;
        }
        
        public function addProductInCart($user_id, $product_id){
            $this->db->createConnection();

            $result = $this->db->executeNonQuery("INSERT INTO `carts` (`user_id`, `product_id`, `add_time`)
                                                        VALUES ('$user_id', '$product_id', '".time()."')");
            $this->db->closeConnection();
            return $result;                              
        }

        public function removeProductCart($id){
            $this->db->createConnection();
            $result = $this->db->executeNonQuery("DELETE FROM `carts` where `id` = '$id' ");
            $this->db->closeConnection();
            return $result;     
        }

        public function getCartById($id){
            $this->db->createConnection();
            $result = $this->db->executeQuery("SELECT * FROM `carts` WHERE `id` = '$id'");
            $cart = mysqli_fetch_assoc($result);
            $this->db->closeConnection($result);
            return $cart;
        }
    }
