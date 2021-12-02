<?php
    class UserController extends BaseController
    {
        private $userModel;
        private $paymentModel;
        private $productModel;

        public function __construct()
        {
            $this->loadModel('usermodel');
            $this->userModel = new UserModel;

            $this->loadModel('paymentmodel');
            $this->paymentModel = new PaymentModel;

            $this->loadModel('productmodel');
            $this->productModel = new ProductModel;
        }

        public function index()
        {
            $id = (isset($_GET['id']) ? intval($_GET['id']) : (isset($_SESSION['is_logged']) ? $_SESSION['user_id'] : 0));
            $page = isset($_GET['page']) ? intval($_GET['page']) : 1;

            $user = $this->userModel->getUserById($id);

            if ($user == null)
            {
                return $this->view('404');
            }

            $products = $this->productModel->getAllProductsByUserId($id, $page);

            if (!Func::isInRange($page, 1, $products->getTotalPages()))
            {
                return $this->view('404');
            }

            $data = [
                'id' => $id,
                'title' => 'Thông tin cá nhân',
                'user' => $user,
                'products' => $products
            ];
            
            return $this->view('user.index', $data);
        }

        public function login()
        {            
            $data = [
                'title' => 'Login',
                'error_message' => ''
            ];

            if (!isset($_POST['submit']))
            {
                return $this->view('user.login', $data);
            }

            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);
            $remember = isset($_POST['remember']) ? true : false; // handle later.

            if (Func::isAnyEmptyValue([$username, $password, $remember]))
            {
                $data['error_message'] = MESSAGES['input_empty'];
                return $this->view('user.login', $data);
            }

            if(!Func::isValidUserName($username))
            { 
                $data['error_message'] = MESSAGES['nametype_error'];
                return $this->view('user.login', $data);
            }

            if(!Func::isValidPassword($password))
            {
                $data['error_message'] = MESSAGES['passwordtype_error'];
                return $this->view('user.login', $data);
            }

            $user = $this->userModel->getUserByUsernameAndPassword($username, $password);

            if ($user == null)
            {
                $data['error_message'] = MESSAGES['login_failed'];
                return $this->view('user.login', $data);
            }

            $_SESSION["user"] = $user;
            $_SESSION["is_logged"] = true;
            $_SESSION["user_id"] = $user['id'];
            $_SESSION["username"] = $user['username'];
            $_SESSION["fullname"] = $user['fullname'];
            $_SESSION["is_vendor"] = $user['is_vendor'];

            // move products in tmp_cart to real carts.
            $this->moveTmpCartToCarts();
            $_SESSION['total_cart'] = $this->paymentModel->getTotalCarts();

            return header('Location: ' . ROUTES['home']);
        }

        public function moveTmpCartToCarts()
        {
            if (!isset($_SESSION['tmp_cart']))
            {
                return;
            }

            foreach ($_SESSION['tmp_cart'] as $item)
            {
                if (!$this->paymentModel->isExistProductInCart($item['id']))
                {
                    $this->paymentModel->addProductIntoCart($item['id']);
                }
            }
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
                if(!Func::isValidUserName($username))
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
                if(!Func::isValidPassword($password))
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
                $user_id = $this->userModel->addUser($username, $password, $fullname, $email);
                if($user_id)
                {
                    // copy default avatar and cover to user
                    $avatar = Func::copyFileFromTo('images/defaults/avatar.png', 'images.users.avatars', $user_id);
                    $cover = Func::copyFileFromTo('images/defaults/cover.jpg', 'images.users.covers', $user_id);
                    $this->userModel->updateUserByStringQuery($user_id, "`avatar` = '$avatar', `cover` = '$cover'");
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
            if (!Func::isLogged())
            {
                return $this->view('404');
            }

            $user = $this->userModel->getUserById($_SESSION['user_id']);

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
                $website = $_POST['website'];
                $profileheading = htmlspecialchars($_POST['profileheading']);
                $about = htmlspecialchars($_POST['about']);
                $facebook = $_POST['facebook'];
                $instagram = $_POST['instagram'];
                $twitter = $_POST['twitter'];

                $avatar = $user['avatar'];
                Func::uploadFile('images.users.avatars','profile-image-avatar', $avatar, $avatar_message, true);

                $cover = $user['cover'];
                Func::uploadFile('images.users.covers',  'profile-image-cover', $cover, $cover_message, true);

                if (!Func::isAnyEmptyValue([$website]) && !Func::isValidWebsite($website))
                {
                    return header('Location: ' . ROUTES['user']); 
                }

                if (!Func::isAnyEmptyValue([$facebook]) && !Func::isContain('facebook.com', $facebook))
                {
                    return header('Location: ' . ROUTES['user']); 
                }

                if (!Func::isAnyEmptyValue([$instagram]) && !Func::isContain('instagram.com', $instagram))
                {
                    return header('Location: ' . ROUTES['user']); 
                }

                if (!Func::isAnyEmptyValue([$twitter]) && !Func::isContain('twitter.com', $twitter))
                {
                    return header('Location: ' . ROUTES['user']); 
                }
                
                if (Func::isAnyEmptyValue([$fullname, $password, $repassword]) || $password !== $repassword)
                {
                    return header('Location: ' . ROUTES['user']); 
                }

                $user_changed = [
                    'id' => $_SESSION['user_id'],
                    'fullname' => $fullname,
                    'password' => $password,
                    'repassword' => $repassword,
                    'birthday' => $birthday,
                    'website' => htmlspecialchars($website),
                    'profileheading' => $profileheading,
                    'about' => $about,
                    'facebook' => htmlspecialchars($facebook),
                    'instagram' => htmlspecialchars($instagram),
                    'twitter' => htmlspecialchars($twitter),
                    'avatar' => $avatar,
                    'cover' => $cover
                ]; 
                
                if (Func::isValidMd5($password) || !Func::isValidPassword($password) || $password !== $repassword)
                {
                    $this->userModel->updateUserNoPass($user_changed);      
                    return header('Location: ' . ROUTES['user']); 
                }

                $this->userModel->updateUser($user_changed);      
                return header('Location: ' . ROUTES['user']);
            }

            $data = [
                'title' => 'Edit Profile',
                'user' => $user
            ];

            return $this->view('user.edit', $data);
        }

        public function logout()
        {
            session_unset();
            return header('Location: ' . ROUTES['home']);
        }

        public function approve()
        {
            if (!Func::isRoleAdmin())
            {
                return $this->view('404');
            }

            $user_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

            $user = $this->userModel->getUserById($user_id);

            if ($user == null)
            {
                return $this->view('404');
            }

            if (isset($_POST['submit']))
            {
                $is_approved = isset($_POST['approved']) ? 1 : 0;
                $money = max(0, $_POST['money']);

                $this->userModel->updateUserByStringQuery($user_id, "`is_vendor` = '$is_approved', `money` = '$money'");

                return header('Location: ' . ROUTES['panel_account']);
            }

            $data = [
                'title' => 'Cấp quyền cho người dùng',
                'user' => $user
            ];

            return $this->view('user.approve', $data);
        }

        public function delete()
        {
            if (!Func::isRoleAdmin())
            {
                return $this->view('404');
            }

            $user_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

            $user = $this->userModel->getUserById($user_id);

            if ($user == null)
            {
                return $this->view('404');
            }

            if (isset($_POST['confirmDelete']))
            {
                $this->userModel->deleteUser($user_id);

                return header('Location: ' . ROUTES['panel_account']);
            }

            $data = [
                'title' => 'Xóa người dùng',
                'user' => $user
            ];

            return $this->view('user.delete', $data);
        }
    }
?>