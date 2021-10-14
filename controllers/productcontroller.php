<?php
    class ProductController extends BaseController
    {
        private $productModel;
        public function __construct()
        {
            $this->loadModel('productmodel');
            $this->productModel = new ProductModel;
        }

        public function index()
        {
            $data = [
                'title' => 'Tìm kiếm sản phẩm'
            ];
            
            return $this->view('product.index', $data);
        }

        public function detail()
        {
            $id = (isset($_GET['id']) ? intval($_GET['id']) : 0);

            $product = $this->productModel->getProductById($id);

            if ($product == null)
            {
                return $this->view('404');
            }

            $data = [
                'id' => $id,
                'title' => $product['title'],
                'category' => 'Category nak',
                'product' => $product
            ];
            
            return $this->view('product.detail', $data);
        }

        public function create()
        {
            $data = [
                'title' => 'Đăng bán sản phẩm',
                'error' => '',
                'is_create' => true,
                'product' => [
                    'category_id' => 1,
                    'user_id' => 1,
                    'title' => '',
                    'content' => '',
                    'description' => '',
                    'price' => 0,
                    'thumb' => '',
                    'code' => '',
                    'is_support' => false
                ]
            ];

            if (isset($_POST['submit']))
            {
                $data['product']['category_id'] = intval($_POST['category_id']);
                $data['product']['title'] = htmlspecialchars($_POST['title']);
                $data['product']['content'] = htmlspecialchars($_POST['content']);
                $data['product']['description'] = htmlspecialchars($_POST['description']);
                $data['product']['price'] = intval($_POST['price']);
                $data['product']['is_support'] = isset($_POST['is_support']);

                if (!Func::uploadFile('images.products', 'thumb', $data['product']['thumb'], $message, true))
                {
                    $data['error'] = $message;
                    return $this->view('product.create', $data);
                }

                if (!Func::uploadFile('files.products', 'code', $data['product']['code'], $message))
                {
                    $data['error'] = $message;
                    Func::removeFile($data['product']['thumb']);
                    return $this->view('product.create', $data);
                }

                if (Func::isAnyEmptyValue($data['product']))
                {
                    Func::removeFile($data['product']['thumb']);
                    Func::removeFile($data['product']['code']);
                    $data['error'] = MESSAGES['input_empty'];
                    return $this->view('product.create', $data);
                }

                $product_id = $this->productModel->addProduct($data['product']);
                if (!$product_id)
                {
                    return $this->view('404');
                }
                
                header('Location: ' . ROUTES['product_detail'] . '&id=' . $product_id. '');
            }

            return $this->view('product.create', $data);
        }

        public function edit()
        {
            $_SESSION['user_id'] = 1; // change later

            $product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

            $product = $this->productModel->getProductById($product_id);

            if ($product == null || $product['user_id'] != $_SESSION['user_id'])
            {
                return $this->view('404');
            }

            $data = [
                'title' => 'Chỉnh sửa sản phẩm',
                'error' => '',
                'is_create' => false,
                'product' => $product
            ];

            if (isset($_POST['submit']))
            {
                $data['product']['category_id'] = intval($_POST['category_id']);
                $data['product']['title'] = htmlspecialchars($_POST['title']);
                $data['product']['content'] = htmlspecialchars($_POST['content']);
                $data['product']['description'] = htmlspecialchars($_POST['description']);
                $data['product']['price'] = intval($_POST['price']);
                $data['product']['is_support'] = isset($_POST['is_support']);

                if (!Func::uploadFile('images.products', 'thumb', $data['product']['thumb'], $message, true))

                if (!Func::uploadFile('files.products', 'code', $data['product']['code'], $message));

                if (Func::isAnyEmptyValue($data['product']))
                {
                    $data['error'] = MESSAGES['input_empty'];
                    return $this->view('product.create', $data);
                }

                if (!$this->productModel->updateProduct($data['product']))
                {
                    return $this->view('404');
                }
                
                header('Location: ' . ROUTES['product_detail'] . '&id=' . $product_id. '');
            }

            return $this->view('product.create', $data);
        }
    }