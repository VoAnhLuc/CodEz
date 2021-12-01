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
            $result = $this->db->executeQuery("SELECT * FROM `categories` WHERE `is_deleted` = '0'");
            $categories = $this->db->getArrayResult($result);
            $this->db->closeConnection($result);
            return $categories;
        }

        public function removeCategory($id)
        {
            $this->db->createConnection();
            $result = $this->db->executeNonQuery("UPDATE `categories` SET `is_deleted` = '1' WHERE `id` = '$id'");
            $this->db->closeConnection();
            return $result;     
        }

        public function getCategoryById($id)
        {
            $this->db->createConnection();
            $result = $this->db->executeQuery("SELECT * FROM `categories` WHERE `id` = '$id' AND `is_deleted` = '0'");
            $category = $this->db->getSingleResult($result);       
            $this->db->closeConnection($result);
            return $category;
        }

        public function fixCategory($category)
        {
            $this->db->createConnection();
            $result = $this->db->executeNonQuery("UPDATE `categories` SET 
                                                    `name` = '".$category['name']."', 
                                                    `description` = '".$category['des']."'                                                  
                                                    WHERE `id`  ='".$category['id']."'
                                                ");
            $this->db->closeConnection();
            return $result;
        }

        public function addCategory($category)
        {
            $this->db->createConnection();
            $result=$this->db->executeNonQuery("INSERT INTO `categories` VALUES (
                                            null,
                                            '" . $category['name'] . "',
                                            '" . $category['des'] . "'                            
                                        )");
            $this->db->closeConnection();
            return $result;
        }

        public function getAllCategoriesWithPaged($keyword, $page, $perPage = 10)
        {
            $this->db->createConnection();

            $result = $this->db->executeQuery("SELECT COUNT(*) AS 'total_categories' FROM `categories`
                                                WHERE `name` LIKE '%$keyword%' AND `is_deleted` = '0'");

            $totalItems = $this->db->getSingleResult($result)['total_categories'];
            $totalPages = max(ceil($totalItems / $perPage), 1);
            $start = ($page - 1) * $perPage;

            $result = $this->db->executeQuery("SELECT * FROM `categories` 
                                                WHERE `name` LIKE '%$keyword%' AND `is_deleted` = '0'
                                                ORDER BY `id` DESC
                                                LIMIT $start, $perPage");
            $categories = $this->db->getArrayResult($result);       

            $pageResult = new Pagination($page, $totalItems, $totalPages, $categories);

            $this->db->closeConnection($result);

            return $pageResult;
        }
    }
