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
            $_SESSION['user_id'] = 1;

            $carts = $this->paymentModel->getAllCartsByUserId($_SESSION['user_id']);

            $data = [
                'title' => 'Giỏ hàng',
                'carts' => $carts
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
    }