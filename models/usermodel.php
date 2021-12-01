<?php
    class UserModel
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database();
        }

        public function getUserById($id)
        {
            $this->db->createConnection();
            $result = $this->db->executeQuery("SELECT * FROM `users` WHERE `id` = '$id'");
            $user = $this->db->getSingleResult($result);
            $this->db->closeConnection($result);
            return $user;
        }

        public function getUserByUsernameAndPassword($username, $password)
        {
            $this->db->createConnection();
            $result = $this->db->executeQuery("SELECT `users`.*, `roles`.`name` AS role_name 
                                                FROM `users`
                                                INNER JOIN `roles` ON `users`.`role_id` = `roles`.`id`
                                                WHERE `username` = '$username' AND `password` = '" . md5(md5($password)) . "'");
            $user = $this->db->getSingleResult($result);
            $this->db->closeConnection($result);
            return $user;
        }    

        public function updateUser($userchange){
            $this->db->createConnection();

            $result = $this->db->executeNonQuery("UPDATE `users` SET 
                                                    `fullname` = '".$userchange['fullname']."', 
                                                    `password` = '".md5(md5($userchange['password']))."', 
                                                    `dob` = '".$userchange['birthday']."', 
                                                    `website` = '".$userchange['website']."', 
                                                    `heading` = '".$userchange['profileheading']."', 
                                                    `about` = '".$userchange['about']."', 
                                                    `facebook` = '".$userchange['facebook']."', 
                                                    `instagram` = '".$userchange['instagram']."', 
                                                    `twitter` = '".$userchange['twitter']."', 
                                                    `avatar` = '".$userchange['avatar']."',
                                                    `cover` = '".$userchange['cover']."'
                                                    where `id`  ='".$userchange['id']."'
                                                ");
            
            $this->db->closeConnection();
            return $result;
        }

        public function updateUserNoPass($userchange){
            $this->db->createConnection();

            $result = $this->db->executeNonQuery("UPDATE `users` SET 
                                                    `fullname` = '".$userchange['fullname']."', 
                                                    `dob` = '".$userchange['birthday']."', 
                                                    `website` = '".$userchange['website']."', 
                                                    `heading` = '".$userchange['profileheading']."', 
                                                    `about` = '".$userchange['about']."', 
                                                    `facebook` = '".$userchange['facebook']."', 
                                                    `instagram` = '".$userchange['instagram']."', 
                                                    `twitter` = '".$userchange['twitter']."', 
                                                    `avatar` = '".$userchange['avatar']."',
                                                    `cover` = '".$userchange['cover']."'
                                                    where `id`  ='".$userchange['id']."'
                                                ");
            
            $this->db->closeConnection();
            return $result;
        }

        public function addUser($username, $password, $fullname, $email)
        {
            $this->db->createConnection();
            $this->db->executeNonQuery("INSERT INTO `users` (`role_id`, `username`, `password`, `is_vendor`, `fullname`, `email`, `join_time`)
                                                VALUES ('1', '$username', '$password', '1', '$fullname', '$email', '" . time() . "')");
            $user_id = $this->db->getInsertId();
            $this->db->closeConnection();
            return $user_id;
        }
        
        public function getUserByUsername($username)
        {
            $this->db->createConnection();
            $result = $this->db->executeQuery("SELECT * FROM `users` WHERE `username` = '$username' ");
            $user = $this->db->getSingleResult($result);
            $this->db->closeConnection($result);
            return $user;
        }

        public function updateUserByStringQuery($user_id, $query)
        {
            $this->db->createConnection();
            $this->db->executeNonQuery("UPDATE `users` SET $query WHERE `id` = '$user_id'");
            $this->db->closeConnection();
        }

        public function getAllUsers($keyword, $page, $perPage)
        {
            $this->db->createConnection();

            $result = $this->db->executeQuery("SELECT COUNT(*) AS 'total_accounts' FROM `users`
                                                WHERE `fullname` LIKE '%$keyword%' OR `username` LIKE '%$keyword%'");

            $totalItems = $this->db->getSingleResult($result)['total_accounts'];
            $totalPages = max(ceil($totalItems / $perPage), 1);
            $start = ($page - 1) * $perPage;

            $result = $this->db->executeQuery("SELECT * FROM `user` 
                                                WHERE `fullname` LIKE '%$keyword%' OR `username` LIKE '%$keyword%'
                                                ORDER BY `id` DESC
                                                LIMIT $start, $perPage");
            $products = $this->db->getArrayResult($result);       

            $pageResult = new Pagination($page, $totalItems, $totalPages, $products);

            $this->db->closeConnection($result);

            return $pageResult;
        }
    }