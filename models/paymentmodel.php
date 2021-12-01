<?php
    class PaymentModel
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database();
        }
 
        public function getAllCarts()
        {
            $user_id = $_SESSION['user_id'];

            $this->db->createConnection();

            $result = $this->db->executeQuery("SELECT `carts`.*, `products`.`thumb`, `products`.`price`, `products`.`title`, `products`.`code`
                                                FROM `carts`
                                                INNER JOIN `products` ON `carts`.`product_id` = `products`.`id`
                                                WHERE `carts`.`user_id` = '$user_id' AND `carts`.`paid_time` < `carts`.`add_time`
                                                ORDER BY `carts`.`id` DESC
                                                ");

            $carts = $this->db->getArrayResult($result);

            $this->db->closeConnection($result);

            return $carts;
        }

        public function getAllPaidCarts($page = 1)
        {
            $user_id = $_SESSION['user_id'];

            $this->db->createConnection();

            $result = $this->db->executeQuery("SELECT COUNT(*) AS 'total_carts' FROM `carts` WHERE `user_id` = '$user_id' AND `paid_time` >= `add_time`");

            $perPage = 10;
            $totalItems = $this->db->getSingleResult($result)['total_carts'];
            $totalPages = max(ceil($totalItems / $perPage), 1);
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

        public function getAllPricesPaid()
        {
            $user_id = $_SESSION['user_id'];

            $this->db->createConnection();
            $result = $this->db->executeQuery("SELECT SUM(`price`) AS 'sum' FROM `carts` WHERE `user_id` = '$user_id' AND `paid_time` >= `add_time`");
            $total_price = $this->db->getSingleResult($result);
            $this->db->closeConnection($result);

            return (int)$total_price['sum'];
        }

        public function getCartById($id)
        {
            $this->db->createConnection();
            $result = $this->db->executeQuery("SELECT * FROM `carts` WHERE `id` = '$id' AND `paid_time` < `add_time` AND `user_id` = '" . $_SESSION['user_id'] . "'");
            $cart = $this->db->getSingleResult($result);       
            $this->db->closeConnection($result);
            return $cart;
        }

        public function getCartByProductId($product_id)
        {
            $this->db->createConnection();
            $result = $this->db->executeQuery("SELECT * FROM `carts` WHERE `product_id` = '$product_id' AND `paid_time` < `add_time` AND `user_id` = '" . $_SESSION['user_id'] . "'");
            $cart = $this->db->getSingleResult($result);       
            $this->db->closeConnection($result);
            return $cart;
        }

        public function getCartPaidById($id)
        {
            $this->db->createConnection();
            $result = $this->db->executeQuery("SELECT * FROM `carts` WHERE `id` = '$id' AND `paid_time` >= `add_time` AND `user_id` = '" . $_SESSION['user_id'] . "'");
            $cart = $this->db->getSingleResult($result);       
            $this->db->closeConnection($result);
            return $cart;
        }
        
        public function addProductIntoCart($product_id)
        {
            $user_id = $_SESSION['user_id'];

            $this->db->createConnection();

            $result = $this->db->executeNonQuery("INSERT INTO `carts` (`user_id`, `product_id`, `add_time`)
                                                        VALUES ('$user_id', '$product_id', '" . time() . "')");
            $this->db->closeConnection();

            return $result;                              
        }

        public function removeProductFromCart($id){
            $this->db->createConnection();
            $result = $this->db->executeNonQuery("DELETE FROM `carts` where `id` = '$id'");
            $this->db->closeConnection();
            return $result;     
        }

        public function updateRatingStarByCartId($id, $rating)
        {
            $this->db->createConnection();
            $this->db->executeNonQuery("UPDATE `carts` SET `rate` = '$rating' WHERE `id` = '$id'");
            $this->db->closeConnection();
        }

        public function updateItemPaid($cart_id, $link_code, $price)
        {
            $this->db->createConnection();
            $this->db->executeNonQuery("UPDATE `carts` SET `paid_time` = '" . time() . "', `link_code` = '$link_code', `price` = '$price' WHERE `id` = '$cart_id'");
            $this->db->closeConnection();
        }

        public function isExistProductInCart($product_id)
        {
            $this->db->createConnection();
            $result = $this->db->executeQuery("SELECT COUNT(*) AS 'count' FROM `carts`
                                                WHERE `product_id` = '$product_id' AND `paid_time` < `add_time`
                                                AND `user_id` = '" . $_SESSION['user_id'] . "'");
            $is_exit = $this->db->getSingleResult($result)['count'];
            $this->db->closeConnection($result);
            return $is_exit != 0;
        }

        public function getTotalCarts()
        {
            $this->db->createConnection();
            $result = $this->db->executeQuery("SELECT COUNT(*) AS 'total_carts'
                                                FROM `carts`
                                                WHERE `user_id` = '" . $_SESSION['user_id'] . "'
                                                    AND `add_time` > `paid_time`");
            $total = $this->db->getSingleResult($result)['total_carts'];
            $this->db->closeConnection($result);
            return $total;
        }
    }
