<?php
    class PaymentController extends BaseController
    {
        private $paymentModel;
        private $userModel;
        
        public function __construct()
        {
            $this->loadModel('paymentmodel');
            $this->paymentModel = new PaymentModel;

            $this->loadModel('usermodel');
            $this->userModel = new UserModel;
        }

        public function index()
        {
            return $this->cart();
        }

        public function cart()
        {
            if (!Func::isLogged())
            {
                return $this->view('404');
            }

            $carts = $this->paymentModel->getAllCarts();

            $data = [
                'title' => 'Giỏ hàng',
                'carts' => $carts
            ];
            
            return $this->view('payment.cart', $data);
        }

        public function checkout()
        {
            if (!Func::isLogged())
            {
                return $this->view('404');
            }

            $carts = $this->paymentModel->getAllCarts();

            $data = [
                'title' => 'Thanh toán',
                'carts' => $carts,
                'is_success' => 0
            ];
            
            if (!isset($_POST['confirmOrder']))
            {
                return $this->view('payment.checkout', $data);
            }

            $total_money = array_sum(array_column($carts, 'price'));
            if ($_SESSION['user']['money'] >= $total_money)
            {
                foreach ($carts as $cart)
                {
                    $price = $cart['price'];
                    $cart_id = $cart['id'];
                    $link_code = Func::copyFileFromTo($cart['code'], 'files.payments', $_SESSION['user_id'], false);
                    $this->paymentModel->updateItemPaid($cart_id, $link_code, $price);
                }

                $this->userModel->updateUserByStringQuery($_SESSION['user_id'], "`money` = `money` -  $total_money");
                $_SESSION['user']['money'] = $_SESSION['user']['money'] - $total_money;

                $data['is_success'] = 1;
            }

            return $this->view('payment.confirm', $data);
        }

        public function add()
        {
            if (!Func::isLogged())
            {
                return $this->view('404');
            }

            $id_product = (isset($_GET['id']) ? intval($_GET['id']) : 0);

            $product_have = $this->paymentModel->getCartByProductId($id_product);

            if (isset($_POST['addproducttocart']) && empty($product_have))
            {
                $this->paymentModel->addProductIntoCart($id_product);
            }

            return header('Location: ' . ROUTES['payment_cart'] . '');  
        }

        public function delete()
        {
            if (!Func::isLogged())
            {
                return $this->view('404');
            }

            $id = (isset($_GET['id']) ? intval($_GET['id']) : 0);

            $cart = $this->paymentModel->getCartById($id);

            if ($cart == null) {
               return $this->view('404') ;
            }

            $this->paymentModel->removeProductFromCart($id);
            
            return header('Location: ' . ROUTES['payment_cart'] . '');  
        }     
                
        public function history()
        {
            if (!Func::isLogged())
            {
                return $this->view('404');
            }
            
            $page = isset($_GET['page']) ? intval($_GET['page']) : 1;

            $pageResult = $this->paymentModel->getAllPaidCarts($page);
            $totalPrices = $this->paymentModel->getAllPricesPaid();

            if (!Func::isInRange($page, 1, $pageResult->getTotalPages()))
            {
                return $this->view('404');
            }

            $data = [
                'title' => 'Lịch sử mua hàng',
                'carts' => $pageResult->getItems(),
                'totalPrices' => $totalPrices,
                'pageInfo' => $pageResult
            ];

            return $this->view('payment.history', $data);
        }

        public function rating()
        {
            if (!Func::isLogged())
            {
                return $this->view('404');
            }

            $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
            $rating = isset($_GET['rating']) ? intval($_GET['rating']) : 0;

            $cart = $this->paymentModel->getCartPaidById($id);

            if ($cart == null || !Func::isInRange($rating, 1, 5))
            {
                return $this->view('404');
            }

            $this->paymentModel->updateRatingStarByCartId($id, $rating);
            header('Location: ' . ROUTES['payment_history'] . '');
        }
    }
