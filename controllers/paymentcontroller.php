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

        public function add(){
       
            $_SESSION['user_id'] = 1;

            $carts = $this->paymentModel->getAllCartsByUserId($_SESSION['user_id']);

            $arrayid = [];

            foreach ($carts as $value) {
                array_push($arrayid , $value['product_id']);
            }

            $idproduct = (isset($_GET['id']) ? intval($_GET['id']) : 0);

            if (isset($_POST['addproducttocart'])) {
                if (!in_array($idproduct, $arrayid)) {
                    $this->paymentModel->addProductInCart( $_SESSION['user_id'], $idproduct);
                    header('Location: ' . ROUTES['payment_cart'] . '');       
                }
                else{
                    header('Location: ' . ROUTES['payment_cart'] . '');    
                }
            }
            else{
                header('Location: ' . ROUTES['payment_cart'] . ''); 
            }

            $data = [
                
            ];
            
            return $this->view('payment.cart', $data);
        }

        public function delete(){

            $_SESSION['user_id'] = 1;

            $id = (isset($_GET['id']) ? intval($_GET['id']) : 0);

            $cart = $this->paymentModel->getCartById($id);

            if ($cart == null || $cart['user_id'] != $_SESSION['user_id']) {
               return $this->view('404') ;
            }

            $this->paymentModel->removeProductCart($id);
            header('Location: ' . ROUTES['payment_cart'] . '');       
                
        }
    }