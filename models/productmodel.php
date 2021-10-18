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
            $result = $this->db->executeQuery("SELECT `products`.*, `users`.`fullname`, `users`.`avatar`, `categories`.`name` FROM `products`
                                                INNER JOIN `users` ON `products`.`user_id` = `users`.`id`
                                                INNER JOIN `categories` ON `products`.`category_id` = `categories`.`id`
                                                WHERE `products`.`id` = '$id'");
            $product = $this->db->getSingleResult($result);
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
                                            '" . time() . "',
                                            '0'
                                        )");
            $product_id = $this->db->getInsertId();
            $this->db->closeConnection();
            return $product_id;
        }

        public function getAllProducts($orderby = "`id` DESC", $limit = 8, $where = "`products`.`id` != 0")
        {
            $this->db->createConnection();
            $result = $this->db->executeQuery("SELECT `products`.*, `users`.`fullname`, `users`.`avatar`, `categories`.`name`
                                                FROM `products`
                                                INNER JOIN `users` ON `products`.`user_id` = `users`.`id`
                                                INNER JOIN `categories` ON `products`.`category_id` = `categories`.`id`
                                                WHERE $where
                                                ORDER BY $orderby
                                                LIMIT $limit");
                                                
            $products = $this->db->getArrayResult($result);
            $this->db->closeConnection($result);
            return $products;
        }

        public function updateProduct($product)
        {
            $this->db->createConnection();
            $result = $this->db->executeNonQuery("UPDATE `products` SET
                                                        `category_id` = '" . $product['category_id'] . "',
                                                        `title` = '" . $product['title'] . "',
                                                        `content` = '" . $product['content'] . "',
                                                        `description` = '" . $product['description'] . "',
                                                        `price` = '" . $product['price'] . "',
                                                        `thumb` = '" . $product['thumb'] . "',
                                                        `code` = '" . $product['code'] . "',
                                                        `is_support` = '" . $product['is_support'] . "',
                                                        `updated` = '" . time() . "'
                                                WHERE `id` = '" . $product['id'] . "'
                                            ");
            $this->db->closeConnection();
            return $result;
        }

        public function increaseProductView($product_id)
        {
            $this->db->createConnection();
            $this->db->executeNonQuery("UPDATE `products` SET `views` = `views` + 1 WHERE `id` = '$product_id'");
            $this->db->closeConnection();
        }
    }