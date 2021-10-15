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

            $categories = array();
            while ($category = mysqli_fetch_assoc($result))
            {
                array_push($categories, $category);
            }

            $this->db->closeConnection($result);

            return $categories;
        }
    }