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

        public function updateUser($userchange){
            $this->db->createConnection();

            $result = $this->db->executeNonQuery(" UPDATE `users` set 
                                    `fullname` = '".$userchange['fullname']."', 
                                    `username` = '".$userchange['username']."', 
                                    `email` = '".$userchange['email']."', 
                                    `password` = '".$userchange['password']."', 
                                    `dob` = '".$userchange['birthday']."', 
                                    `website` = '".$userchange['website']."', 
                                    `heading` = '".$userchange['profileheading']."', 
                                    `about` = '".$userchange['about']."', 
                                    `facebook` = '".$userchange['facebook']."', 
                                    `instagram` = '".$userchange['instagram']."', 
                                    `twitter` = '".$userchange['twitter']."'   where `id`  ='".$userchange['id']."' ");
            
            $this->db->closeConnection();
            return $result;
          /*   if(isset($btnchange)){

                $id = $_GET['id'];

                $fullname = $_POST['fullname'];
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $repassword = $_POST['repassword'];
                $birthday = $_POST['birthday'];
                $website = $_POST['website'];
                $profileheading = $_POST['profile-heading'];
                $about = $_POST['about'];
                $facebook = $_POST['facebook'];
                $instagram = $_POST['instagram'];
                $twitter = $_POST['twitter'];
               
                if(!empty($fullname) && !empty($username) &&  !empty($email) &&  !empty($password) &&  !empty($repassword) &&  !empty($birthday) &&  !empty($website) &&  !empty($profileheading) &&  !empty($about) &&  !empty($facebook) &&  !empty($instagram)  &&  !empty($twitter)
                ){

                    if($password == $repassword)  {

                        $result = $this->db->executeNonQuery(" UPDATE `users` set `fullname` = '$fullname', `username` = '$username', `email` = '$email', `password` = '$password', `dob` = '$birthday', `website` = '$website', `heading` = '$profileheading', `about` = '$about',`facebook` = '$facebook', `instagram` = '$instagram', `twitter` = '$twitter'  where `id`  ='$id'");

                        if($result){
                            echo "<script type='text/javascript'>alert('Cập Nhật Thành Công !');</script>";    
                        }
                        else{
                            echo "<script type='text/javascript'>alert('Cập Nhật Thất Bại !');</script>";    
                        }
                    }
                    else
                    {
                        echo "<script type='text/javascript'>alert('Vui lòng nhập repassword giống password !');</script>";
                    }

                }
                else{
                    echo "<script type='text/javascript'>alert('Vui lòng không để trống một trường nào !');</script>";
                }
            } */
        }
    }
?>