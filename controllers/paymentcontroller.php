<?php
    class PaymentController extends BaseController
    {
        private $paymentModel;
        
        public function __construct()
        {
            $this->loadModel('paymentmodel');
            $this->paymentModel = new PaymentModel;
        }

        public function index()
        {
            return $this->cart();
        }

        public function cart()
        {
            $products = [
                "whatapp" => ["Android Whats Web v2.0 – Whatsapp all tools App",1999],
                "emall" =>["EMall - Flutter Shopping Full App",1999],
                "vpn"=>[ "WILL VPN App - VPN App With Admin Panel | Secure VPN &amp; Fast VPN | Refer &amp; Earn | Reward Lucky Wheel",
                1999]
            ];

            $data = [
                'title' => 'Giỏ hàng',
                'products' => $products
            ];
            
            return $this->view('payment.cart', $data);
        }

        public function checkout()
        {
            $products = [
                "whatapp" => ["Android Whats Web v2.0 – Whatsapp all tools App",1999],
                "emall" =>["EMall - Flutter Shopping Full App",1999],
                "vpn"=>[ "WILL VPN App - VPN App With Admin Panel | Secure VPN &amp; Fast VPN | Refer &amp; Earn | Reward Lucky Wheel",
                1999]
            ];

            $data = [
                'title' => 'Checkout',
                'products' => $products
            ];
            
            return $this->view('payment.checkout', $data);
        }

        public function history()
        {
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
            $_SESSION['user_id'] = 1; // change later

            $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
            $rating = isset($_GET['rating']) ? intval($_GET['rating']) : 0;

            $cart = $this->paymentModel->getCartById($id);

            if ($cart == null || $cart['user_id'] != $_SESSION['user_id'] || !Func::isInRange($rating, 1, 5))
            {
                return $this->view('404');
            }

            $this->paymentModel->updateRatingStarByCartId($id, $rating);
            header('Location: ' . ROUTES['payment_history'] . '');
        }
    }