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
            $user = mysqli_fetch_assoc($result);
            $this->db->closeConnection($result);
            return $user;
        }
        public function addUser($username, $password, $fullname, $email)
        {
            $this->db->createConnection();
            $result = $this->db->executeQuery("INSERT INTO `users` VALUES (NULL, '$username', '$password', '$fullname',
                                                                            '$email', NULL, NULL, NULL, NULL
                                                                            , NULL, NULL, NULL, NULL, NULL)");
             $this->db->closeConnection(null);
            return $result;
        }
        public function getUserByEmailOrUsername($email, $username)
        {
            $this->db->createConnection();
            $result = $this->db->executeQuery("SELECT * FROM `users` WHERE `email` =' $email' OR `username` = '$username' ");
            $user = mysqli_fetch_assoc($result);
            $this->db->closeConnection($result);
        }
    }