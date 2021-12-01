<?php
    class PanelController extends BaseController
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
            if (!Func::isRoleAdmin())
            {
                return $this->view('404');
            }

            $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
            
            if (isset($_POST['q']))
            {
                $keyword = htmlspecialchars($_POST['q']);
                $_SESSION['keyword'] = $keyword;
                $page = 1;
            }
            else
            {
                $keyword = isset($_SESSION['keyword']) ? $_SESSION['keyword'] : '';
            }

            $pagedResults = $this->productModel->getAllProductsByKeyword(0, $keyword, 0, 0, $page);

            if (!Func::isInRange($page, 1, $pagedResults->getTotalPages()))
            {
                return $this->view('404');
            }

            $data = [
                'title' => 'Quản lý sản phẩm',
                'active' => 1,
                'keyword' => $keyword,
                'pagedResults' => $pagedResults
            ];

            return $this->view('panel.index', $data);
        }

        public function account()
        {
            $data = [
                'title' => 'Quản lý tài khoản',
                'active' => 2
            ];

            return $this->view('panel.account', $data);
        }

        public function category()
        {
            $data = [
                'title' => 'Quản lý thư mục',
                'active' => 3
            ];

            return $this->view('panel.category', $data);
        }

        public function transaction()
        {
            $data = [
                'title' => 'Quản lý giao dịch',
                'active' => 4
            ];

            return $this->view('panel.transaction', $data);
        }

        public function statistic()
        {
            $data = [
                'title' => 'Báo cáo thống kê',
                'active' => 5
            ];

            return $this->view('panel.statistic', $data);
        }
    }