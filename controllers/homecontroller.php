<?php
    class HomeController extends BaseController
    {
        public function index()
        {
            $this->loadModel('productmodel');
            $productModel = new ProductModel;
            $newest_products = $productModel->getAllProducts();
            $popular_products = $productModel->getAllProducts('`views` DESC, `id` DESC');

            $this->loadModel('categorymodel');
            $categoryModel = new CategoryModel;
            $categories = $categoryModel->getAllCategories();

            $data = [
                'title' => 'CodeZ.Shop - Coding is hard? Just buy it.',
                'categories' => $categories,
                'newest_products' => $newest_products,
                'popular_products' => $popular_products
            ];

            return $this->view('home.index', $data);
        }
    }
?>