<?php
    class PaymentModel
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database();
        }

        public function getAllPaidCarts($page = 1)
        {
            $_SESSION['user_id'] = 1; //change later;
            $user_id = $_SESSION['user_id'];

            $this->db->createConnection();

            $result = $this->db->executeQuery("SELECT `id` FROM `carts` WHERE `user_id` = '$user_id' AND `paid_time` >= `add_time`");
            $perPage = 10;
            $totalItems = $this->db->getNumRows($result);
            $totalPages = ceil($totalItems / $perPage);

            $start = ($page - 1) * $perPage;
            $result = $this->db->executeQuery("SELECT `carts`.*, `products`.`title`
                                                FROM `carts`
                                                INNER JOIN `products` ON `carts`.`product_id` = `products`.`id`
                                                WHERE `carts`.`user_id` = '$user_id' AND `paid_time` >= `add_time`
                                                ORDER BY `paid_time` DESC
                                                LIMIT $start, $perPage");
            $carts = $this->db->getArrayResult($result);       

            $pageResult = new Pagination($page, $totalItems, $totalPages, $carts);

            $this->db->closeConnection($result);

            return $pageResult;
        }

        public function getCartById($id)
        {
            $this->db->createConnection();
            $result = $this->db->executeQuery("SELECT `user_id` FROM `carts` WHERE `id` = '$id' AND `paid_time` >= `add_time`");
            $cart = $this->db->getSingleResult($result);       
            $this->db->closeConnection($result);
            return $cart;
        }

        public function updateRatingStarByCartId($id, $rating)
        {
            $this->db->createConnection();
            $this->db->executeNonQuery("UPDATE `carts` SET `rate` = '$rating' WHERE `id` = '$id'");
            $this->db->closeConnection();
        }
    }