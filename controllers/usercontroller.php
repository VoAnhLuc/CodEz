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
            $data = ['title' => 'Login'];
            $result = $this->userModel->getLogin();
            
            if($result == 'login')
            {
                return $this->view('home.index', $data = ['CodeZ.Shop - Coding is hard? Just buy it.']);
            }
            else
            {
                return $this->view('user.Login', $data);
            }
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
            $data = [
                'title' => 'Edit Profile'
            ];

            return $this->view('user.edit', $data);
        }
    }