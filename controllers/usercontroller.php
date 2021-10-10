<?php
    class UserController extends BaseController
    {
        private $userModel;

        public function __construct()
        {
            $this->loadModel('usermodel');
            $this->userModel = new UserModel;
        }

        public function index()
        {
            $id = (isset($_GET['id']) ? intval($_GET['id']) : 0);

            $user = $this->userModel->getUserById($id);

            if ($user == null)
            {
                return $this->view('404');
            }

            $data = [
                'id' => $id,
                'title' => 'User Profile',
                'user' => $user
            ];
            
            return $this->view('user.index', $data);
        }

        public function login()
        {
            $data = [
                'title' => 'Login'
            ];

            return $this->view('user.login', $data);
        }

        public function register()
        {
            $data = [
                'title' => 'Register'
            ];

            return $this->view('user.register', $data);
        }

        public function edit()
        {
            $id = (isset($_GET['id']) ? intval($_GET['id']) : 0);
            $user = $this->userModel->getUserById($id);

            if ($user == null)
            {
                return $this->view('404');
            }
               
            if(isset($_POST['submitchangeuser'])){
                
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


                $error = '';
                $avatar = '';
                $avatar_message = '';
                if (!Func::uploadFile('images.users.avatars','profile-image-avatar', $avatar, $avatar_message, true))
                {
                    $error = empty($error) ? $avatar_message : $error;

                }

                if(empty($avatar)){
                    $avatar = $user['avatar'];
                }

                $errorcover = '';
                $cover = '';
                $cover_message = '';
                if (!Func::uploadFile('images.users.covers',  'profile-image-cover', $cover, $cover_message, true))
                {
                    $error = empty($errorcover) ? $cover_message : $errorcover;
                }
                if(empty($cover)){
                    $cover = $user['cover'];
                }


                $userchange = [
                    
                    'id' => $id,
                    
                    'fullname' => $fullname,
                    'username' => $username,
                    'email' => $email,
                    'password' => $password,
                    'repassword' => $repassword,
                    'birthday' => $birthday,
                    'website' => $website,
                    'profileheading' => $profileheading,
                    'about' => $about,
                    'facebook' => $facebook,
                    'instagram' => $instagram,
                    'twitter' => $twitter,
                    'avatar' => $avatar,
                    'cover' => $cover
                    
                ];  
                
                if(!empty($fullname) && !empty($username) &&  !empty($email) &&  !empty($password) &&  !empty($repassword) &&  !empty($birthday) &&  !empty($website) &&  !empty($profileheading) &&  !empty($about) &&  !empty($facebook) &&  !empty($instagram)  &&  !empty($twitter) 
                ){
                    
                    if($password == $repassword)  {
                        
                        $this->userModel->updateUser($userchange);
                        header('Location: index.php?controller=user&id='.$id.'');
                       
                    }     

                    else{
                        echo "<script type='text/javascript'>alert('Vui lòng nhập password giống repassword !');</script>";
                    }           
                }
                else{
                    echo "<script type='text/javascript'>alert('Vui lòng không để trống một trường nào !');</script>";
                }
            }
            
            $data = [
                'id' => $id,
                'title' => 'Edit Profile',
                'user' => $user
            ];
            return $this->view('user.edit', $data);
    
        }
    }