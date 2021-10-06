<?php
    class Database
    {
        private const HOST = "localhost";
        private const DB = "codezshop";
        private const USER = "root";
        private const PASSWORD = "";
        private $link;

        public function createConnection() 
        {
            $this->link = mysqli_connect(self::HOST, self::USER, self::PASSWORD, self::DB);
            if (!$this->link) {
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }
        }

        public function executeQuery($query)
        {
            return mysqli_query($this->link, $query);
        }

        public function closeConnection($result = null)
        {
            if ($result != null) {
                mysqli_free_result($result);
            }
            mysqli_close($this->link);
        }
    }