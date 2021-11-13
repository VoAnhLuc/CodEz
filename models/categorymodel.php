<?php
    class CategoryModel
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database();
        }

        public function getAllCategories()
        {
            $this->db->createConnection();
            $result = $this->db->executeQuery("SELECT * FROM `categories`");
            $categories = $this->db->getArrayResult($result);
            $this->db->closeConnection($result);
            return $categories;
        }
    }
