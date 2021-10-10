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
                if (empty($value))
                {
                    return true;
                }
            }
            return false;
        }

        /* Upload file */
        private const UPLOAD_FILE_TYPES = [
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
        private const UPLOAD_FILE_MAX_SIZE = 25000000; // 25mb
        
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


            $_SESSION['user_id'] = 1; // change later.

            $outputName = str_replace('.', '/', $dir) . '/' . $_SESSION['user_id'] . '_' . time() . $upload_file_type[$_FILES[$inputName]['type']];

            move_uploaded_file($_FILES[$inputName]['tmp_name'], $outputName);

            $message = MESSAGES['upload_file_success'];
            return true;
        }
    }