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

        public function addProduct($product)
        {
            $this->db->createConnection();
            $this->db->executeNonQuery("INSERT INTO `products` VALUES (
                    null,
                    '" . $product['category_id'] . "',
                    '" . $product['user_id'] . "',
                    '" . $product['title'] . "',
                    '" . $product['content'] . "',
                    '" . $product['description'] . "',
                    '" . $product['price'] . "',
                    '" . $product['thumb'] . "',
                    '" . $product['code'] . "',
                    '" . $product['is_support'] . "',
                    '" . time() . "',
                    '" . time() . "'
                )", true);
            $product_id = $this->db->getInsertId();
            $this->db->closeConnection();
            return $product_id;
        }
    }