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
            $result = $this->db->executeQuery("SELECT `products`.*, `users`.`fullname`, `users`.`avatar`, `users`.`join_time`, `categories`.`name`,
                                                        COUNT(`carts`.`id`) AS bought, SUM(`carts`.`rate`) AS rating
                                                FROM `products`
                                                INNER JOIN `users` ON `products`.`user_id` = `users`.`id`
                                                INNER JOIN `categories` ON `products`.`category_id` = `categories`.`id`
                                                LEFT JOIN `carts` ON `products`.`id` = `carts`.`product_id` AND `carts`.`paid_time` >= `carts`.`add_time`
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
            $result = $this->db->executeQuery("SELECT `products`.*, `users`.`fullname`, `users`.`avatar`, `categories`.`name`,
                                                        COUNT(`carts`.`id`) AS bought, SUM(`carts`.`rate`) AS rating
                                                FROM `products` 
                                                INNER JOIN `users` ON `products`.`user_id` = `users`.`id`
                                                INNER JOIN `categories` ON `products`.`category_id` = `categories`.`id`
                                                LEFT JOIN `carts` ON `products`.`id` = `carts`.`product_id` AND `carts`.`paid_time` >= `carts`.`add_time`
                                                WHERE $where
                                                GROUP BY `products`.`id`
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

        public function removeProductById($product_id)
        {
            $this->db->createConnection();
            $this->db->executeNonQuery("DELETE FROM `products` WHERE `id` = '$product_id'");
            $this->db->closeConnection();
        }

        public function isExistProduct($product_id)
        {
            $this->db->createConnection();
            $result = $this->db->executeQuery("SELECT COUNT(*) AS 'count' FROM `products` WHERE `id` = '$product_id'");
            $is_exit = $this->db->getSingleResult($result)['count'];
            $this->db->closeConnection($result);
            return $is_exit != 0;
        }

        public function getAllProductsByKeyword($keyword = '', $page = 1, $orderby = '`products`.`released` DESC', $perPage = 12)
        {
            $this->db->createConnection();

            $result = $this->db->executeQuery("SELECT COUNT(*) AS 'total_products' FROM `products` WHERE `title` LIKE '%$keyword%'");

            $totalItems = $this->db->getSingleResult($result)['total_products'];
            $totalPages = max(ceil($totalItems / $perPage), 1);
            $start = ($page - 1) * $perPage;
            
            $result = $this->db->executeQuery("SELECT `products`.*, `users`.`fullname`, `users`.`avatar`, `categories`.`name`,
                                                        COUNT(`carts`.`id`) AS bought, SUM(`carts`.`rate`) AS rating
                                                FROM `products` 
                                                INNER JOIN `users` ON `products`.`user_id` = `users`.`id`
                                                INNER JOIN `categories` ON `products`.`category_id` = `categories`.`id`
                                                LEFT JOIN `carts` ON `products`.`id` = `carts`.`product_id` AND `carts`.`paid_time` >= `carts`.`add_time`
                                                WHERE `products`.`title` LIKE '%$keyword%'
                                                GROUP BY `products`.`id`
                                                ORDER BY $orderby
                                                LIMIT $start, $perPage");
            $products = $this->db->getArrayResult($result);       

            $pageResult = new Pagination($page, $totalItems, $totalPages, $products);

            $this->db->closeConnection($result);

            return $pageResult;
        }
    }