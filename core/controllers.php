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
                'edit'
            ]
        ],

        'user' => [
            'fileName' => 'usercontroller.php',
            'className' => 'UserController',
            'action' => [
                'index',
                'login',
                'register',
                'edit'
            ]
        ],

        'payment' => [
            'fileName' => 'paymentcontroller.php',
            'className' => 'PaymentController',
            'action' => [
                'index',
                'cart',
                'checkout'
            ]
        ]
    ];