<?php
    class Pagination
    {
        private $currentPage;
        private $totalItems;
        private $totalPages;
        private $items;

        public function __construct($currentPage, $totalItems, $totalPages, $items)
        {
            $this->currentPage = $currentPage;
            $this->totalItems = $totalItems;
            $this->totalPages = $totalPages;
            $this->items = $items;
        }

        public function getCurrentPage()
        {
            return $this->currentPage;
        }

        public function getTotalItems()
        {
            return $this->totalItems;
        }

        public function getTotalPages()
        {
            return $this->totalPages;
        }

        public function getItems()
        {
            return $this->items;
        }

        public function displayPager($currentURL)
        {
            if ($this->getTotalPages() < 2)
            {
                return;
            }

            $pager =  "<nav class='pager' aria-label='Page navigation'>";
            $pager .= "<ul class='pagination justify-content-end'>";
            $pager .= "<li class='page-item'><a href='$currentURL&page=" . max($this->getCurrentPage() - 1, 1) . "' class='page-link' aria-label='Previous'><span aria-hidden='true'>&laquo;</span></a></li>";
            for($i = 1; $i <= $this->getTotalPages(); $i++)
            {
                $pager .= "<li class='page-item " . ($this->getCurrentPage() == $i ? 'active' : '') . "'><a href='$currentURL&page=$i' class='page-link' aria-label='$i'>$i</a></li>";
            }
            $pager .= "<li class='page-item'><a href='$currentURL&page=" . min($this->getCurrentPage() + 1, $this->getTotalPages()) . "' class='page-link' aria-label='Previous'><span aria-hidden='true'>&raquo;</span></a></li>";
            $pager .= "</ul>";
            $pager .= "</nav>";
    
            return $pager;
        }
    }