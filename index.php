<?php
    /* CodEz 2021 */

    session_start();

    require_once './controllers/basecontroller.php';
    require_once './core/controllers.php';
    require_once './core/database.php';
    require_once './core/func.php';
    require_once './core/messages.php';
    require_once './core/routes.php';

    $controller = (isset($_GET['controller']) ? strtolower($_GET['controller']) : 'home');
    $action = (isset($_GET['action']) ? strtolower($_GET['action']) : 'index');

    if (array_key_exists($controller, CONTROLLERS))
    {
        $fileName = CONTROLLERS[$controller]['fileName'];
        $className = CONTROLLERS[$controller]['className'];
        $classAction = CONTROLLERS[$controller]['action'];

        require './controllers/'.$fileName;
        
        $objController = new $className;
        
        if (in_array($action, $classAction))
        {
            $objController->$action();
        }
        else
        {
            require_once './views/404.php';
        }
    }
    else
    {
        require_once './views/404.php';
    }
?>