<?php
    class Func
    {
        /*  
            This method use for check an array value. 
            If any value in array is empty, return true.
            The other cases return false.
        */
        public static function isAnyEmptyValue($arr)
        {
            foreach($arr as $value)
            {
                if (empty($value) && gettype($value) == 'string')
                {
                    return true;
                }
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

            $outputName = str_replace('.', '/', $dir) . '/' . $_SESSION['user_id'] . '_' . rand(1000, 9999) . '_' . time() . $upload_file_type[$_FILES[$inputName]['type']];

            move_uploaded_file($_FILES[$inputName]['tmp_name'], $outputName);

            $message = MESSAGES['upload_file_success'];
            return true;
        }

        public static function getInput($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        
        public static function isValidPassword($password)
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

        public static function isValidUserName($username)
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
            if (file_exists($location))
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

        public static function getCurrentURL($have_request = true){
            return  (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ?
                    "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . ($have_request ? $_SERVER['REQUEST_URI'] : '');
        }

        public static function getShortPrice($price)
        {
            if ($price >= 1000000000)
            {
                return floor($price/1000000000) . ' T';
            }
            if ($price >= 1000000)
            {
                return floor($price/1000000) . ' TR';
            }
            if ($price >= 1000)
            {
                return floor($price/1000) . ' K';
            }
            return $price . ' Đồng';
        }

        public static function getDotPrice($price)
        {
            return number_format($price, 0, '.', '.');
        }

        /*
            This function use for copy file from dictionary to other dictionary
        */
        public static function copyFileFromTo($from, $to, $user_id, $is_image = true)
        {
            $fileType = $is_image ? self::UPLOAD_FILE_TYPES['image'] : self::UPLOAD_FILE_TYPES['file'];
            $fileName = str_replace('.', '/', $to) . '/' . $user_id . '_' . rand(1000, 9999) . '_' . time() . $fileType[mime_content_type($from)];
            copy($from, $fileName);
            return $fileName;
        }

        public static function isValidWebsite($url)
        {
            return filter_var($url, FILTER_VALIDATE_URL) !== FALSE;
        }

        public static function isContain($key, $value)
        {
            return strpos($value, $key) !== FALSE;
        }

        public static function isLogged()
        {
            return isset($_SESSION['is_logged']) && $_SESSION['is_logged'];
        }

        public static function isCurrentUserVendor()
        {
            return isset($_SESSION['is_logged']) && $_SESSION['is_vendor'];
        }

        public static function isRoleAdmin()
        {
            return isset($_SESSION['is_logged']) && $_SESSION['user']['role_name'] == 'admin';
        }

        public static function displayStars($rating)
        {
            $stars = '';

            for($i = 1; $i <= floor($rating); $i++)
            {
                $stars .= '<i class="bi bi-star-fill color--star"></i>';
            }

            for ($i = 1; $i <= 5-floor($rating); $i++)
            {
                $stars .= '<i class="bi bi-star color--star"></i>';
            }

            return $stars;
        }
    }