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
                'title' => 'Title của sản phẩm',
                'category' => 'Category nak',
                'product' => $product
            ];
            
            return $this->view('product.detail', $data);
        }

        public function create()
        {
            if (isset($_POST['submit']))
            {
                $category_id = intval($_POST['category']);
                $user_id = 1; // handle later
                $title = htmlspecialchars($_POST['title']);
                $content = htmlspecialchars($_POST['content']);
                $description = htmlspecialchars($_POST['description']);
                $price = intval($_POST['price']);
                $thumb = ''; // handle later
                $code = ''; // handle later
                $isSupport = boolval($_POST['isSupport']);

                // add to array to pass to model
                $product = [
                    'category_id' => $category_id,
                    'user_id' => $user_id,
                    'title' => $title,
                    'content' => $content,
                    'description' => $description,
                    'price' => $price,
                    'thumb' => $thumb,
                    'code' => $code,
                    'isSupport' => $isSupport
                ];

                // call model to insert to database
                $product_id = $this->productModel->addProduct($product); // this method return boolean, use this to check if insert ok or not
                if ($product_id)
                {
                    // if add success, redirect to detail product
                    header('Location: index.php?controller=product&action=detail&id=' . $product_id. '');
                }

                return $this->view('404');
            }

            $data = [
                'title' => 'Đăng bán sản phẩm'
            ];

            return $this->view('product.create', $data);
        }
    }