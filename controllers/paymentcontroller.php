<?php
    class PaymentController extends BaseController
    {
        private $paymentModel;
        private $userModel;
        private $productModel;
        
        public function __construct()
        {
            $this->loadModel('paymentmodel');
            $this->paymentModel = new PaymentModel;

            $this->loadModel('usermodel');
            $this->userModel = new UserModel;

            $this->loadModel('productmodel');
            $this->productModel = new ProductModel;
        }

        public function index()
        {
            return $this->cart();
        }

        public function cart()
        {
            if (Func::isLogged())
            {
                $carts = $this->paymentModel->getAllCarts();
            }
            else
            {
                $carts = isset($_SESSION['tmp_cart']) ? $_SESSION['tmp_cart'] : array();
            }

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

            if (count($carts) == 0)
            {
                return header('Location: ' . ROUTES['payment_cart']);
            }

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
                $_SESSION['total_cart'] = $this->paymentModel->getTotalCarts();

                $data['is_success'] = 1;
            }

            return $this->view('payment.confirm', $data);
        }

        public function add()
        {
            $product_id = (isset($_GET['id']) ? intval($_GET['id']) : 0);

            $product = $this->productModel->getProductById($product_id);

            if ($product == null)
            {
                return $this->view('404');
            }

            Func::isLogged() ? $this->addToCart($product_id) : $this->addToTmpCart($product);

            return header('Location: ' . ROUTES['payment_cart'] . '');  
        }

        public function addToTmpCart($product)
        {
            if (!isset($_SESSION['tmp_cart']))
            {
                $_SESSION['tmp_cart'] = array();
            }
            
            foreach ($_SESSION['tmp_cart'] as $item)
            {
                if ($item['id'] == $product['id'])
                {
                    return;
                }
            }

            $product['product_id'] = $product['id'];
            array_push($_SESSION['tmp_cart'], $product);

            $_SESSION['total_cart'] = count($_SESSION['tmp_cart']);
        }

        public function addToCart($product_id)
        {
            $is_exit = $this->paymentModel->isExistProductInCart($product_id);

            if (!$is_exit)
            {
                $this->paymentModel->addProductIntoCart($product_id);
                $_SESSION['total_cart'] = $this->paymentModel->getTotalCarts();
            }
        }

        public function delete()
        {
            $id = (isset($_GET['id']) ? intval($_GET['id']) : 0);

            if (Func::isLogged())
            {
                $cart = $this->paymentModel->getCartById($id);
                if ($cart == null)
                {
                   return $this->view('404') ;
                }
                $this->paymentModel->removeProductFromCart($id);
                $_SESSION['total_cart'] = $this->paymentModel->getTotalCarts();
            }
            else
            {
                unset($_SESSION['tmp_cart'][$id]);
                $_SESSION['tmp_cart'] = array_values($_SESSION['tmp_cart']);
                $_SESSION['total_cart'] = count($_SESSION['tmp_cart']);
            }

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
