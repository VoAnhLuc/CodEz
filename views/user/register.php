<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="./lib/css/reset.css">
    <link rel="stylesheet" href="./lib/css/style.css">
    <link rel="stylesheet" href="./lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"
        integrity="sha384-tKLJeE1ALTUwtXlaGjJYM3sejfssWdAaWR2s97axw4xkiAdMzQjtOjgcyw0Y50KU" crossorigin="anonymous">
    <link rel="stylesheet" href="./lib/css/responsive.css">
    <link rel="stylesheet" href="./lib/css/common.css">
</head>

<body>

    <?php include './common/header.php'; ?>

    <main>
        <div class="toanbo">
            
            <?php
                include './common/breadcrumb.php';
            ?>
            
            <section class="scdangki">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12 d-flex m-auto">
                            <div class="card carddangki">
                                <div class="card-header">
                                    <h2>Create Your Account</h1><br>
                                    <i>Please fill the following fields with appropriate information to register a new Marketplace account.</i><br/>
                                   <?php echo (!empty($errors) ? '<i style="color:red;"> *' .$errors. '</i>' : $errors ); ?>
                                </div>
                                <div class="card-body">
                                        <div class="row">
                                            <form method="post" action="" class="col-lg-12 col-md-12 col-sm-12 ">
                                                <div class="row dangki">
                                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                                        <label for="yourname">Your Name</label>
                                                        <input name="yourname" class="form-control" type="text" placeholder="Enter your name" >
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 ">
                                                        <label for="username">Username</label>
                                                        <input name="username" class="form-control" type="text" placeholder="Enter your username" >
                                                        <?php echo (!empty($errorName) ? '<label style="color:red;"> *' .$errorName. '</label>' : $errorName); ?>
                                                    </div>
                                                </div>
                                                <div class="row dangki">
                                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                                        <label for="email">E-mail Address</label>
                                                        <input name="email" class="form-control" type="email" placeholder="Enter your e-mail address">
                                                        <?php echo (!empty($errorEmail) ? '<label style="color:red;"> *' .$errorEmail. '</label>' : $errorEmail); ?>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 ">
                                                        <label for="password">Password</label>
                                                        <input name="password" class="form-control" type="password" placeholder="Enter your Password" >
                                                        <?php echo (!empty($errorPassword) ? '<label style="color:red;"> *' .$errorPassword. '</label>' : $errorPassword); ?>
                                                    </div>
                                                </div>
                                                <div class="row dangki">
                                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                                        <label for="confirmpassword">Confirm Password</label>
                                                        <input name="confirmpassword" class="form-control" type="password" placeholder="Enter confirm password" >
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 ">
                                                        <label for="">User Type *</label>
                                                        <select name="usertype" class="form-control chonlua" >
                                                            <option value=""></option>
                                                            <option value="Customer">Customer</option>
                                                            <option value="Vendor">Vendor</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6">                                              
                                                    <button name="submit" class="form-control submit" type="submit">Register</button>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 chuyendn">
                                                        <i>Already have an account?</i>
                                                        <a href="<?php echo ROUTES['user_login'] ?>">Login</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>  
                                    </div>        
                                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>   

    <?php include './common/footer.php'; ?>

</body>

</html>