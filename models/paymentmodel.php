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
    }
