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
                                    <i>Vui lòng điền đầy đủ thông tin để thực hiện đăng ký tài khoản.</i>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="row dangki text-center">
                                                <h3 class="color--instagram">Chúc mừng bạn đã đăng ký thành công!</h3>
                                                <p>Vui lòng <a style="color: green" href="<?php echo ROUTES['user_login'] ?>">Đăng nhập</a> để tiếp tục trải nghiệm.</p>
                                            </div>
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