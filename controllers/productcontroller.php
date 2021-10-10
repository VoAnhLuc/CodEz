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
            $error = '';

            if (isset($_POST['submit']))
            {
                $category_id = intval($_POST['category']);
                $user_id = 1; // handle later
                $title = htmlspecialchars($_POST['title']);
                $content = htmlspecialchars($_POST['content']);
                $description = htmlspecialchars($_POST['description']);
                $price = intval($_POST['price']);
                $isSupport = isset($_POST['isSupport']);

                // call method to upload file
                $thumb = '';
                $thumb_message = '';
                $code = '';
                $code_message = '';
                if (!Func::uploadFile('images.products', 'thumb', $thumb, $thumb_message, true))
                {
                    $error = empty($error) ? $thumb_message : $error;
                }
                if (!Func::uploadFile('files.products', 'code', $code, $code_message))
                {
                    $error = empty($error) ? $code_message : $error;
                }

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

                // check the input value
                if (!Func::isAnyEmptyValue($product))
                {
                    // call model to insert to database
                    $product_id = $this->productModel->addProduct($product); // this method return boolean, use this to check if insert ok or not
                    if ($product_id)
                    {
                        // if add success, redirect to detail product
                        header('Location: ' . ROUTES['product_detail'] . '&id=' . $product_id. '');
                    }
                    else
                    {
                        return $this->view('404');
                    }
                }
                else
                {
                    $error = empty($error) ? MESSAGES['input_empty'] : $error;
                }
            }

            $data = [
                'title' => 'Đăng bán sản phẩm',
                'error' => $error
            ];

            return $this->view('product.create', $data);
        }
    }