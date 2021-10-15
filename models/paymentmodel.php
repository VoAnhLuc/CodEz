<?php
    class PaymentModel
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database();
        }
 
        public function getCartByUser($iduser)
        {
            $this->db->createConnection();
            $result = $this->db->executeQuery("SELECT * FROM `carts` WHERE `user_id` = '$iduser'");

            $carts = array();

            while($cart = mysqli_fetch_assoc($result)){
                array_push($carts,$cart);
            }

            $this->db->closeConnection($result);
            return $carts;
        }
        
        public function getUser()
        {
            $this->db->createConnection();
            $resultuser = $this->db->executeQuery("SELECT * FROM `users`");
            $user = mysqli_fetch_assoc($resultuser);
            $this->db->closeConnection($resultuser);
            return $user;
        }

        public function getProductByCart($orderby = '`id` DESC')
        {
            $this->db->createConnection();
            $resultproduct = $this->db->executeQuery("SELECT `products`.* FROM `products`
                                                        INNER JOIN `carts` ON `products`.`id` = `carts`.`product_id`
                                                        ORDER BY $orderby");

            $products = array();

            while($product = mysqli_fetch_assoc($resultproduct)){   
                array_push($products, $product);
            }
            $this->db->closeConnection($resultproduct);
            return $products;
        }
    }
