<?php
    class HomeController extends BaseController
    {
        public function index()
        {
            $this->loadModel('productmodel');
            $productModel = new ProductModel;

            $newest_products = $productModel->getAllProducts();

            $popular_products = $productModel->getAllProducts('`views` DESC, `id` DESC');

            $data = [
                'title' => 'CodeZ.Shop - Coding is hard? Just buy it.',
                'newest_products' => $newest_products,
                'popular_products' => $popular_products
            ];

            return $this->view('home.index', $data);
        }
    }
?>