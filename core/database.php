<?php
    require_once 'config.php';

    class Database
    {
        private $link;

        public function createConnection() 
        {
            $this->link = mysqli_connect(HOST, USER, PASSWORD, DB);
            if (!$this->link) {
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }
        }

        public function executeQuery($query)
        {
            return mysqli_query($this->link, $query);
        }

        public function executeNonQuery($query, $isInsert = false)
        {
            $result = mysqli_query($this->link, $query);
            return ($isInsert ? mysqli_insert_id($this->link) : $result);
        }

        public function closeConnection($result = null)
        {
            if ($result != null) {
                mysqli_free_result($result);
            }
            mysqli_close($this->link);
        }
    }