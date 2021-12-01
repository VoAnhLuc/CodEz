<?php
    const ROUTES = [

        /* Home */
        'home' => 'index.php',

        /* User */
        'user' => 'index.php?controller=user',
        'user_edit' => 'index.php?controller=user&action=edit',
        'user_approve' => 'index.php?controller=user&action=approve',
        'user_delete' => 'index.php?controller=user&action=delete',
        'user_login' => 'index.php?controller=user&action=login',
        'user_register' => 'index.php?controller=user&action=register',
        'user_logout' => 'index.php?controller=user&action=logout',

        /* Payment */
        'payment' => 'index.php?controller=payment',
        'payment_cart' => 'index.php?controller=payment&action=cart',
        'payment_checkout' => 'index.php?controller=payment&action=checkout',
        'payment_add' => 'index.php?controller=payment&action=add',
        'payment_delete' => 'index.php?controller=payment&action=delete',
        'payment_history' => 'index.php?controller=payment&action=history',
        'payment_rating' => 'index.php?controller=payment&action=rating',

        /* Product */
        'product' => 'index.php?controller=product',
        'product_create' => 'index.php?controller=product&action=create',
        'product_edit' => 'index.php?controller=product&action=edit',
        'product_detail' => 'index.php?controller=product&action=detail',
        'product_delete' => 'index.php?controller=product&action=delete',
        
        /* Product */
        'panel' => 'index.php?controller=panel',
        'panel_account' => 'index.php?controller=panel&action=account',
        'panel_category' => 'index.php?controller=panel&action=category',
        'panel_statistic' => 'index.php?controller=panel&action=statistic',
        'panel_transaction' => 'index.php?controller=panel&action=transaction',

        /* Category */
        'category_delete' => 'index.php?controller=category&action=delete',
        'category_fix' => 'index.php?controller=category&action=fix',
        'category_create' => 'index.php?controller=category&action=create'
        
        
    ];