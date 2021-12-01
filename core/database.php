<?php
    require_once 'config.php';

    class Database
    {
        private $link;

        public function createConnection() 
        {
            $this->link = mysqli_connect(HOST, USER, PASSWORD, DB);
            $this->link->set_charset("utf8");
            if (!$this->link) {
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }
        }

        public function executeQuery($query)
        {
            return mysqli_query($this->link, $query);
        }

        public function executeNonQuery($query)
        {
            $result = mysqli_query($this->link, $query);
            return $result != false;
        }

        public function getInsertId()
        {
            return mysqli_insert_id($this->link);
        }

        public function closeConnection($result = null)
        {
            if ($result != null) {
                mysqli_free_result($result);
            }
            mysqli_close($this->link);
        }
        
        public function getArrayResult($result)
        {
            $items = array();

            if (empty($result))
            {
                return $items;
            }

            while ($item = mysqli_fetch_assoc($result))
            {
                array_push($items, $item);
            }
            
            return $items;
        }

        public function getSingleResult($result)
        {
            return empty($result) ? null : mysqli_fetch_assoc($result);
        }

        public function getNumRows($result)
        {
            return empty($result) ? null : mysqli_num_rows($result);
        }
    }