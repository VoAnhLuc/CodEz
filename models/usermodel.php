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

        public function getLogin()
        {
            if(isset($_REQUEST['username']) && isset($_REQUEST['password']))
            {
                $username = $_REQUEST['username'];
                $password = $_REQUEST['password'];

                $this->db->createConnection();
                $result = $this->db->executeQuery("SELECT * FROM `users` WHERE `username` = '$username' AND 'password' = '$password'");

                if($result != null)
                {
                    return 'login';
                }
                else
                {
                    return 'invalid user';
                }
            }
        }
    }