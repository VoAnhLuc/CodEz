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
               
            if(isset($_POST['submitchangeuser']))
            {      
                $fullname = htmlspecialchars($_POST['fullname']);
                $password = htmlspecialchars($_POST['password']);
                $repassword = htmlspecialchars($_POST['repassword']);
                $birthday = $_POST['birthday'];
                $website = htmlspecialchars($_POST['website']);
                $profileheading = htmlspecialchars($_POST['profileheading']);
                $about = htmlspecialchars($_POST['about']);
                $facebook = htmlspecialchars($_POST['facebook']);
                $instagram = htmlspecialchars($_POST['instagram']);
                $twitter = htmlspecialchars($_POST['twitter']);

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
                
                if(!empty($fullname) && !empty($password) &&  !empty($repassword) &&  !empty($birthday)  &&  !empty($profileheading) 
                ){
                    if($password == $repassword)  {  
                        $this->userModel->updateUser($userchange);
                        header('Location: index.php?controller=user&id='.$id.'');       
                    }     
                    else{
                        ROUTES['user_edit']; 
                    }           
                }
                else{
                    ROUTES['user_edit'];
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