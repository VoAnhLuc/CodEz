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
        public function removeCategory($id)
        {
            $this->db->createConnection();
            $result = $this->db->executeNonQuery("DELETE FROM `categories` where `id` = '$id' ");
            $this->db->closeConnection();
            return $result;     
        }

        public function getCategoryById($id)
        {
            $this->db->createConnection();
            $result = $this->db->executeQuery("SELECT * FROM `categories` WHERE `id` = '$id' ");
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
                                                    where `id`  ='".$category['id']."'
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
    }
