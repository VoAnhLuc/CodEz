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

        public function getAllProducts($orderby = '`id` DESC', $limit = 8)
        {
            $this->db->createConnection();

            $result = $this->db->executeQuery("SELECT `products`.*, `users`.`fullname`, `users`.`avatar`, `categories`.`name` FROM `products`
                                                INNER JOIN `users` ON `products`.`user_id` = `users`.`id`
                                                INNER JOIN `categories` ON `products`.`category_id` = `categories`.`id`
                                                ORDER BY $orderby
                                                LIMIT $limit");
            $products = array();
            while ($product = mysqli_fetch_assoc($result))
            {
                array_push($products, $product);
            }

            $this->db->closeConnection($result);
            return $products;
        }
    }