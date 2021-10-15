<?php
    class PaymentController extends BaseController
    {
        private $paymentModel;
        private $productModel;
        
        public function __construct()
        {
            $this->loadModel('paymentmodel');
            $this->paymentModel = new PaymentModel;
            $this->loadModel('productmodel');
            $this->productModel = new ProductModel;
        }

        public function index()
        {
            return $this->cart();
        }

        public function cart()
        {
            $iduser = 1;

            $cart = $this->paymentModel->getCartByUser($iduser);

            foreach ($cart as $value) {

                $idproduct = $value['product_id'];
                $product = $this->productModel->getProductById($idproduct);
            }
            var_dump($product);

        
            
            /* [
                $productget['thumb'] => [$productget['title'],$productget['price']],
            ]; */

           /*  $products = [
                "whatapp" => ["Android Whats Web v2.0 – Whatsapp all tools App",1999],
                "emall" =>["EMall - Flutter Shopping Full App",1999],
                "vpn"=>[ "WILL VPN App - VPN App With Admin Panel | Secure VPN &amp; Fast VPN | Refer &amp; Earn | Reward Lucky Wheel",
                1999]   
            ];
 */
            $data = [
                'title' => 'Giỏ hàng',
                /* 'products' => $products, */
                'cart' => $cart
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