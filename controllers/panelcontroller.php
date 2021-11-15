<?php
    class PanelController extends BaseController
    {
        public function index()
        {
            $data = [
                'title' => 'Quản lý sản phẩm',
                'active' => 1
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