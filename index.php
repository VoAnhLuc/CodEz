<?php
    session_start();
    date_default_timezone_set('Asia/Ho_Chi_Minh');

    require_once './controllers/basecontroller.php';
    require_once './core/controllers.php';
    require_once './core/database.php';
    require_once './core/func.php';
    require_once './core/messages.php';
    require_once './core/routes.php';
    require_once './core/pagination.php';

    $controller = (isset($_GET['controller']) ? strtolower($_GET['controller']) : 'home');
    $action = (isset($_GET['action']) ? strtolower($_GET['action']) : 'index');

    if (!array_key_exists($controller, CONTROLLERS))
    {
        require_once './views/404.php';
        exit;
    }

    $fileName = CONTROLLERS[$controller]['fileName'];
    $className = CONTROLLERS[$controller]['className'];
    $classAction = CONTROLLERS[$controller]['action'];
    
    if (!in_array($action, $classAction))
    {
        require_once './views/404.php';
        exit;
    }

    require './controllers/'.$fileName;
    $objController = new $className;
    $objController->$action();
?>
