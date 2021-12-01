<?php
    const CONTROLLERS = [
        'home' => [
            'fileName' => 'homecontroller.php',
            'className' => 'HomeController',
            'action' => [
                'index'
            ]
        ],

        'product' => [
            'fileName' => 'productcontroller.php',
            'className' => 'ProductController',
            'action' => [
                'index',
                'detail',
                'create',
                'edit',
                'delete'
            ]
        ],

        'user' => [
            'fileName' => 'usercontroller.php',
            'className' => 'UserController',
            'action' => [
                'index',
                'login',
                'register',
                'edit',
                'logout',
                'approve',
                'delete'
            ]
        ],

        'payment' => [
            'fileName' => 'paymentcontroller.php',
            'className' => 'PaymentController',
            'action' => [
                'index',
                'cart',
                'checkout',
                'add',
                'delete',
                'history',
                'rating'
            ]
        ],

        'panel' => [
            'fileName' => 'panelcontroller.php',
            'className' => 'PanelController',
            'action' => [
                'index',
                'account',
                'category',
                'statistic',
                'transaction'
            ]
        ],

        'category' => [
            'fileName' => 'categorycontroller.php',
            'className' => 'CategoryController',
            'action' => [
                'delete',
                'fix',
                'create'
                
            ]
        ]
    
    ];