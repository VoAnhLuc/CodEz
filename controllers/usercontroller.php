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
                'title' => 'Register',
                'errors' => '',
            ];
            if(isset($_POST['submit']))
            {
                $username = Func::getInput($_POST['username']);
                $password = Func::getInput(($_POST['password']));
                $fullname = Func::getInput($_POST['yourname']);
                $email = Func::getInput($_POST['email']);
                $confirmpassword =Func::getInput(($_POST['confirmpassword']));
                $user = $this->userModel->getUserByUsername($username);
                $input = [
                    'username' => $username,
                    'password' => $password,
                    'fullname' => $fullname,
                    'email' => $email,
                    'confirmpassword' => $confirmpassword,
                ];
               
                // kiểm tra có input nào bị bỏ trống không
                if(Func::isAnyEmptyValue($input))
                {   
                    $data['errors'] = MESSAGES['input_empty'];
                    return $this->view('user.register', $data);
                }

                // kiểm tra có đúng form của email hay không
                $email = filter_var($email,FILTER_SANITIZE_EMAIL);
                if(!filter_var($email,FILTER_VALIDATE_EMAIL))
                {
                    $data['errors'] = MESSAGES['emailtype_error'];
                    return $this->view('user.register', $data);
                }
                
                // kiểm tra yêu cầu về tên
                if(!Func::checkUserName($username))
                { 
                    $data['errors'] = MESSAGES['nametype_error'];
                    return $this->view('user.register', $data);
                }

                // kiểm tra "email" và "username" đã tồn tại chưa
                if(!empty($user))
                {
                    $data['errors'] = MESSAGES['username_used'];
                    return $this->view('user.register', $data);
                }

                // kiểm tra các yêu cầu về mật khẩu
                if(!Func::checkPassword($password))
                {
                    $data['errors'] = MESSAGES['passwordtype_error'];
                    return $this->view('user.register', $data);
                }

                // kiểm tra "mật khẩu" có khớp với "xác nhận mật khẩu"
                $password = md5(md5($password));
                $confirmpassword = md5(md5($confirmpassword));
                if($password!==$confirmpassword)
                { 
                    $data['errors'] = MESSAGES['password_confirmpassword_notsame'];
                    return $this->view('user.register',$data);
                }

                // Thêm vào database
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