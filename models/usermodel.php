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
        public function updateUser($userchange){
            $this->db->createConnection();

            $result = $this->db->executeNonQuery(" UPDATE `users` set 
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
                                    where `id`  ='".$userchange['id']."' ");
            
            $this->db->closeConnection();
            return $result;
        }

        public function updateUserNoPass($userchange){
            $this->db->createConnection();

            $result = $this->db->executeNonQuery(" UPDATE `users` set 
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
                                    where `id`  ='".$userchange['id']."' ");
            
            $this->db->closeConnection();
            return $result;
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
    
?>
