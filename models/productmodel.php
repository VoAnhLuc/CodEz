<?php
    class ProductModel
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database();
        }

        public function getProductById($id)
        {
            $this->db->createConnection();
            $result = $this->db->executeQuery("SELECT * FROM `products` WHERE `id` = '$id'");
            $product = mysqli_fetch_assoc($result);
            $this->db->closeConnection($result);
            return $product;
        }
    }