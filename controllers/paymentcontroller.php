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
