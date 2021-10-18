<?php
    class PaymentModel
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database();
        }

        public function getAllPaidCartsByUserId($user_id)
        {
            $this->db->createConnection();
            $result = $this->db->executeQuery("SELECT * FROM `carts`
                                                WHERE `user_id` = '$user_id' AND `paid_time` >= `add_time`
                                                ORDER BY `paid_time` DESC");
            $carts = $this->db->getArrayResult($result);       
            $this->db->closeConnection($result);
            return $carts;
        }
    }