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
            // hello

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
            if(isset($_POST['submit']))
            {
                $username = $_POST['username'];
                $password = md5(md5($_POST['password']));
                $fullname = $_POST['yourname'];
                $email = $_POST['email'];
                $confirmpassword = md5(md5($_POST['confirmpassword']));
                $usertype = $_POST['usertype'];
                $user = $this->userModel->getUserByEmailOrUsername($email, $username);
                if(!empty($user))
                {
                    echo '<h1>Your email has used</h1>';
                }
                else
                {
                    if($password!==$confirmpassword)
                    {
                        echo '<h1>Password and Confirm Password have to the same</h1>';
                    }
                    else
                    {
                       $issuccess = $this->userModel->addUser($username,$password,$fullname,$email);
                       if($issuccess)
                       {
                         return $this->view('user.registersuccess',$data);
                       }
                       else
                       {
                           return $this->view('user.register',$data);
                       }
                    }
                }
            }

            return $this->view('user.register', $data);
        }

        public function edit()
        {
            $data = [
                'title' => 'Edit Profile'
            ];

            return $this->view('user.edit', $data);
        }
    }