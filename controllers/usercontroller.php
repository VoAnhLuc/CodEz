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
            $errors = '';
            $errorEmail = '';
            $errorName= '';
            $errorPassword= '';
            if(isset($_POST['submit']))
            {
                $username = $this->userModel->test_input($_POST['username']);
                $password = $this->userModel->test_input(($_POST['password']));
                $fullname = $this->userModel->test_input($_POST['yourname']);
                $email = $this->userModel->test_input($_POST['email']);
                $confirmpassword = $this->userModel->test_input(($_POST['confirmpassword']));
                $usertype = $this->userModel->test_input($_POST['usertype']);
                $user = $this->userModel->getUserByEmailOrUsername($email, $username);
                $input = [
                    'username' => $username,
                    'password' => $password,
                    'fullname' => $fullname,
                    'email' => $email,
                    'confirmpassword' => $confirmpassword,
                    'usertype' => $usertype,
                ];
                if(!Func::isAnyEmptyValue($input))
                {   
                    $email = filter_var($email,FILTER_SANITIZE_EMAIL);
                    if(filter_var($email,FILTER_VALIDATE_EMAIL))
                    {
                        if(preg_match("/^[a-zA-Z0-9]{1,30}$/",$username))
                        {
                            if(!empty($user))
                            {
                                $errors = empty($errors) ? MESSAGES['email_username_used'] : $errors;
                            }
                            else
                            {
                                if(preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/",$password))
                                {
                                    $password = md5(md5($password));
                                    $confirmpassword = md5(md5($confirmpassword));
                                    if($password!==$confirmpassword)
                                    {
                                        $errors = empty($errors) ? MESSAGES['password_confirmpassword_notsame'] : $errors;
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
                                else
                                {
                                    $errorPassword = empty($errorPassword) ? MESSAGES['passwordtype_error'] : $errorPassword;
                                } 
                            }
                        }
                        else
                        {
                            $errorName = empty($errorName) ? MESSAGES['nametype_error'] : $errorName;
                        }
                    }
                    else
                    {
                        $errorEmail = empty($errorEmail) ? MESSAGES['emailtype_error'] : $errorEmail;
                    }
                }
                else
                {
                    $errors = empty($errors) ? MESSAGES['input_empty'] : $errors;
                }
            }
            $data['errors'] = $errors;
            $data['errorEmail'] = $errorEmail;
            $data['errorName'] = $errorName;
            $data['errorPassword'] = $errorPassword;
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