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

            $data = [
                'id' => $id,
                'title' => 'Title của sản phẩm',
                'product' => $product
            ];
            
            return $this->view('product.detail', $data);
        }
    }