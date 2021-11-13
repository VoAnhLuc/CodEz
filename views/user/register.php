<?php
    if(isset($_SESSION['is_logged']) && $_SESSION['is_logged'])
    {
        header('location: ' . ROUTES['home']);
    }
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <?php include './common/css.php'; ?>
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
                                    <h2>Tạo Tài Khoản</h1><br>
                                    <i>Vui lòng điền đầy đủ thông tin để thực hiện đăng ký tài khoản.</i><br/>
                                   <?php
                                        echo (!empty($errors) ? '<i style="color:red;"> *' .$errors. '</i>' : $errors);   
                                    ?>
                                </div>
                                <div class="card-body">
                                        <div class="row">
                                            <form method="post" action="" class="col-lg-12 col-md-12 col-sm-12 ">
                                                <div class="row dangki">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 ">
                                                        <label for="username">Tên tài khoản <span class="color--red">*</span></label>
                                                        <input name="username" class="form-control" type="text" placeholder="Nhập tên tài khoản" required >
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                                        <label for="yourname">Họ và Tên <span class="color--red">*</span></label>
                                                        <input name="yourname" class="form-control" type="text" placeholder="Nhập họ và tên" required >
                                                    </div>
                                                </div>
                                                <div class="row dangki">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 ">
                                                        <label for="password">Mật khẩu <span class="color--red">*</span></label>
                                                        <input name="password" class="form-control" type="password" placeholder="Nhập mật khẩu" required >
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                                        <label for="email">Địa chỉ Email <span class="color--red">*</span></label>
                                                        <input name="email" class="form-control" type="email" placeholder="Nhập địa chỉ Email" required >
                                                    </div>
                                                </div>
                                                <div class="row dangki">
                                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                                        <label for="confirmpassword">Xác nhận mật khẩu <span class="color--red">*</span></label>
                                                        <input name="confirmpassword" class="form-control" type="password" placeholder="Nhập xác nhận mật khẩu" required >
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 text-center">                                              
                                                        <button name="submit" class="form-control submit" type="submit">Đăng ký</button>
                                                        <i>Đã có tài khoản?</i>
                                                        <a href="<?php echo ROUTES['user_login'] ?>">Đăng nhập</a>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 chuyendn">
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