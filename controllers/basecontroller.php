<?php
    class BaseController
    {
        const VIEW_FOLDER_NAME = 'views';
        const MODEL_FOLDER_NAME = 'models';

        public function view($path, $data = [])
        {
            foreach($data as $key => $value)
            {
                $$key = $value;
            }

            return require(self::VIEW_FOLDER_NAME . '/' . str_replace('.', '/', $path) . '.php');
        }

        public function loadModel($path)
        {
            return require(self::MODEL_FOLDER_NAME . '/' . str_replace('.', '/', $path) . '.php');
        }
    }
?>