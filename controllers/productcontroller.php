<?php
    class ProductController extends BaseController
    {
        private $productModel;
        private $categoryModel;
        public function __construct()
        {
            $this->loadModel('productmodel');
            $this->productModel = new ProductModel;

            $this->loadModel('categorymodel');
            $this->categoryModel = new CategoryModel;
        }

        public function index()
        {  
    /* Check if has already submitted */
            if(isset($_POST['productsubmit']))
            {
                $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
                $productname = Func::getInput($_POST['productname']);
                $product = $this->productModel->getAllProductByName($productname,$page);

                if(empty($product->getItems()))
                {
                    $data = [
                        'title' => 'Tìm kiếm sản phẩm', 
                        'productsearch' => $product,
                        'notfound' => MESSAGES['empty_product'],
                    ];     
                    return $this->view('product.index', $data);
                }
               
                if (!Func::isInRange($page, 1, $product->getTotalPages()))
                {
                    return $this->view('404');
                }
                $data = [
                    'title' => 'Tìm kiếm sản phẩm', 
                    'productsearch' => $product,
                ];
                return $this->view('product.index', $data);
            }
    /* Check if has not submitted  yet */      
            if(!isset($_POST['productsubmit']))
            {
                if(isset($_GET['category_id']))
                {
                    $where = '`categories`.`id`';
                    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
                    $category_id =  Func::getInput($_GET['category_id']);
                    $product = $this->productModel->getAllProductByName($category_id,$page,$where);
    
                    if(empty($product->getItems()))
                    {
                        $data = [
                            'title' => 'Tìm kiếm sản phẩm', 
                            'productsearch' => $product,
                            'notfound' => MESSAGES['empty_product'],
                        ];     
                        return $this->view('product.index', $data);
                    }
    
                    if (!Func::isInRange($page, 1, $product->getTotalPages()))
                    {
                        return $this->view('404');
                    }
                    $data = [
                        'title' => 'Tìm kiếm sản phẩm', 
                        'productsearch' => $product,
                    ];
                    return $this->view('product.index', $data);
                }
                $productname = '';
                $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
                $product = $this->productModel->getAllProductByName($productname,$page);

                if (!Func::isInRange($page, 1, $product->getTotalPages()))
                {
                    return $this->view('404');
                }
                $data = [
                    'title' => 'Tìm kiếm sản phẩm', 
                    'productsearch' => $product,
                ];
                return $this->view('product.index', $data);
            }
        }

        public function detail()
        {
            $id = (isset($_GET['id']) ? intval($_GET['id']) : 0);

            $product = $this->productModel->getProductById($id);

            if ($product == null)
            {
                return $this->view('404');
            }

            $this->productModel->increaseProductView($id);

            $related_products = $this->productModel->getAllProducts("RAND()", 4, "`products`.`category_id` = '" . $product['category_id'] . "'");

            $data = [
                'id' => $id,
                'title' => $product['title'],
                'product' => $product,
                'related_products' => $related_products
            ];
            
            return $this->view('product.detail', $data);
        }

        public function create()
        {
            if (!Func::isLogged() || !Func::isCurrentUserVendor())
            {
                return $this->view('404');
            }

            $categories = $this->categoryModel->getAllCategories();

            $data = [
                'title' => 'Đăng bán sản phẩm',
                'error' => '',
                'is_create' => true,
                'categories' => $categories,
                'product' => [
                    'category_id' => 0,
                    'user_id' => $_SESSION['user_id'],
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
                $data['product']['price'] = min(max(intval($_POST['price']), 0), PHP_INT_MAX);
                $data['product']['is_support'] = isset($_POST['is_support']);

                if (!in_array($data['product']['category_id'], array_column($categories, 'id')))
                {
                    $data['error'] = MESSAGES['category_not_found'];
                    return $this->view('product.create', $data);
                }

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
                    $data['error'] = MESSAGES['input_empty'];
                    return $this->view('product.create', $data);
                }

                $product_id = $this->productModel->addProduct($data['product']);
                if (!$product_id)
                {
                    Func::removeFile($data['product']['thumb']);
                    Func::removeFile($data['product']['code']);
                    return $this->view('404');
                }
                
                return header('Location: ' . ROUTES['product_detail'] . '&id=' . $product_id. '');
            }

            return $this->view('product.create', $data);
        }

        public function edit()
        {
            if (!Func::isRoleAdmin() || !Func::isCurrentUserVendor())
            {
                return $this->view('404');
            }

            $product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

            $product = $this->productModel->getProductById($product_id);

            if ($product == null || ($product['user_id'] != $_SESSION['user_id'] && !Func::isRoleAdmin()))
            {
                return $this->view('404');
            }

            $categories = $this->categoryModel->getAllCategories();

            $data = [
                'title' => 'Chỉnh sửa sản phẩm',
                'error' => '',
                'is_create' => false,
                'categories' => $categories,
                'product' => $product
            ];

            if (isset($_POST['submit']))
            {
                $data['product']['category_id'] = intval($_POST['category_id']);
                $data['product']['title'] = htmlspecialchars($_POST['title']);
                $data['product']['content'] = htmlspecialchars($_POST['content']);
                $data['product']['description'] = htmlspecialchars($_POST['description']);
                $data['product']['price'] = min(max(intval($_POST['price']), 0), PHP_INT_MAX);
                $data['product']['is_support'] = isset($_POST['is_support']);

                if (Func::isAnyEmptyValue([$data['product']['category_id'], $data['product']['title'],
                                            $data['product']['content'], $data['product']['description'],
                                            $data['product']['price']]))
                {
                    $data['error'] = MESSAGES['input_empty'];
                    return $this->view('product.create', $data);
                }
                
                if (!in_array($data['product']['category_id'], array_column($categories, 'id')))
                {
                    $data['error'] = MESSAGES['category_not_found'];
                    return $this->view('product.create', $data);
                }

                if (!Func::uploadFile('images.products', 'thumb', $data['product']['thumb'], $message, true))

                if (!Func::uploadFile('files.products', 'code', $data['product']['code'], $message));

                if (!$this->productModel->updateProduct($data['product']))
                {
                    return $this->view('404');
                }
                
                return header('Location: ' . ROUTES['product_detail'] . '&id=' . $product_id. '');
            }

            return $this->view('product.create', $data);
        }

        public function delete()
        {
            if (!Func::isRoleAdmin() || !Func::isCurrentUserVendor())
            {
                return $this->view('404');
            }

            $product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

            $product = $this->productModel->getProductById($product_id);

            if ($product == null || ($product['user_id'] != $_SESSION['user_id'] && !Func::isRoleAdmin()))
            {
                return $this->view('404');
            }

            if (!isset($_POST['confirmDelete']))
            {
                $data = [
                    'title' => 'Xóa sản phẩm ' . $product['title'],
                    'product' => $product
                ];
                return $this->view('product.delete', $data);
            }

            $this->productModel->removeProductById($product_id);

            return header('Location: ' . ROUTES['home']);
        }
    }
?>