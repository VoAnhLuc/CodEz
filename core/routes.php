<?php
    const ROUTES = [

        /* Home */
        'home' => 'index.php',

        /* User */
        'user' => 'index.php?controller=user',
        'user_edit' => 'index.php?controller=user&action=edit',
        'user_login' => 'index.php?controller=user&action=login',
        'user_register' => 'index.php?controller=user&action=register',

        /* Payment */
        'payment' => 'index.php?controller=payment',
        'payment_cart' => 'index.php?controller=payment&action=cart',
        'payment_checkout' => 'index.php?controller=payment&action=checkout',
        'payment_history' => 'index.php?controller=payment&action=history',

        /* Product */
        'product' => 'index.php?controller=product',
        'product_create' => 'index.php?controller=product&action=create',
        'product_edit' => 'index.php?controller=product&action=edit',
        'product_detail' => 'index.php?controller=product&action=detail'
        
    ];