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
            $result = $this->db->executeQuery("INSERT INTO `users` (`username`, `password`, `fullname`, `email`)
                                                VALUES ('$username', '$password', '$fullname','$email')");
             $this->db->closeConnection(null);
            return $result;
        }
        public function getUserByUsername($username)
        {
            $this->db->createConnection();
            $result = $this->db->executeQuery("SELECT * FROM `users` WHERE `username` = '$username' ");
            $user = mysqli_fetch_assoc($result);
            $this->db->closeConnection($result);
            return $user;
        }
    }