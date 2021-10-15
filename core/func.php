<?php
    class Func
    {
        /*
            This method user for initialize `roles` data.
            Everytime access the web, server will call to database to check if any data exist in `roles` table.
            If there are not having yet, server will insert automatically.
        */
        public static function initDatabase()
        {
            $db = new Database;
            $db->createConnection();

            /* Initialize Roles */
            $result = $db->executeQuery("SELECT `id` FROM `roles`");
            if (!mysqli_num_rows($result))
            {
                $db->executeNonQuery("INSERT INTO `roles` (`name`) VALUES ('user'), ('admin')");
            }

            /* Initialize Categories */
            $result = $db->executeQuery("SELECT `id` FROM `categories`");
            if (!mysqli_num_rows($result))
            {
                $db->executeNonQuery("INSERT INTO `categories` (`name`, `description`) VALUES
                                                    ('HTML/Css', 'About HTML5 and Css...'),
                                                    ('Javascript', 'About Javascript, Jquery, ReactJS...'),
                                                    ('C#/.NET', 'About C# .NET, ASP.NET, F#, ML.NET...'),
                                                    ('Java', 'About Java, Jsp, Servlet, Spring...'),
                                                    ('C/C++', 'About C, C++...'),
                                                    ('Python', 'About Python...'),
                                                    ('PHP & MYSQL', 'About PHP, Lavarel Framework...'),
                                                    ('The Others', 'The others languages...')
                                                    ");
            }

            $db->closeConnection($result);
        }

        /*  
            This method use for check an array value. 
            If any value in array is empty, return true.
            The other cases return false.
        */
        public static function isAnyEmptyValue($arr)
        {
            foreach($arr as $value)
            {
                return empty($value) && gettype($value) == 'string';
            }
            return false;
        }

        /* 
            This method use for upload file.
            $dir: direction to put the file in.
            $inputName: the name of input file in form html (view).
            $outputName: direction + name of the file after upload.
            $message: message of upload file, include error and success.
            $isImageUpload: boolean, just a param to specify upload image or file.
        */
        const UPLOAD_FILE_TYPES = [
            "image" => [
                "image/jpeg" => ".jpg",
                "image/png" => ".png"
            ],

            "file" => [
                "application/zip" => ".zip",
                "application/x-zip-compressed" => ".zip",
                "application/zip-compressed" => ".zip",
                "application/vnd.rar" => ".rar",
                "application/x-rar-compressed" => ".rar"
            ]
        ];
        const UPLOAD_FILE_MAX_SIZE = 25000000; // 25mb
        
        public static function uploadFile($dir, $inputName, &$outputName = '', &$message = '', $isImageUpload = false)
        {
            if ($_FILES[$inputName]['error'] > 0)
            {
                $message = MESSAGES['upload_file_error'];
                return false;
            }

            if ($_FILES[$inputName]['size'] > self::UPLOAD_FILE_MAX_SIZE)
            {
                $message = MESSAGES['file_size_exceed'];
                return false;
            }

            $upload_file_type = self::UPLOAD_FILE_TYPES[($isImageUpload ? 'image' : 'file')];

            if (!array_key_exists($_FILES[$inputName]['type'], $upload_file_type))
            {
                $message = MESSAGES[($isImageUpload ? 'image_type_error' : 'file_type_error')];
                return false;
            }

            if (!empty($outputName))
            {
                self::removeFile($outputName);
            }

            $_SESSION['user_id'] = 1; // change later.

            $outputName = str_replace('.', '/', $dir) . '/' . $_SESSION['user_id'] . '_' . time() . $upload_file_type[$_FILES[$inputName]['type']];

            move_uploaded_file($_FILES[$inputName]['tmp_name'], $outputName);

            $message = MESSAGES['upload_file_success'];
            return true;
        }

        // Test Input
        public static function getInput($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        
        public static function checkPassword($password)
        {
            if(preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/",$password))
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        public static function checkUserName($username)
        {
            if(preg_match("/^[a-zA-Z0-9]{1,30}$/",$username))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        /*
            This method use for remove file in the location provided. 
        */
        public static function removeFile($location)
        {
            if (!empty($location))
            {
                return unlink($location);
            }
            return false;
        }

        /*
            This method use for check a value in range
            Return true if in range.
            The other cases return false.
        */
        public static function isInRange($value, $start, $end = 2147483647)
        {
            switch (gettype($value))
            {
                case 'string':
                    return strlen($value) >= $start && strlen($value) <= $end;
                case 'integer':
                    return $value >= $start && $value <= $end;
                case 'double':
                    return $value >= $start && $value <= $end;
                default:
                    return false;
            }
        }

        public static function isValidMd5($md5 =''){
            return preg_match('/^[a-f0-9]{32}$/', $md5);
        }

        public static function getURL(){
            return  (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ?
                    "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . 
                    $_SERVER['REQUEST_URI'];
        }
    }