<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <?php include './common/css.php'; ?>
</head>

<body>
    
    <?php include './common/header.php'; ?>

    <main>
        <section class="content">
            <div class="container">
                <form method="post">
                    <div class="alert alert-danger mt-3">
                        <h1>Xóa người dùng <?php echo $user['username'] . ' - ID: ' . $user['id'] ?></h1>
                        <p>Bạn có chắc chắn muốn <span class="color--red">Xóa người dùng</span> này?</p>
                        <p>
                            <a class="btn btn-light" href="<?php echo ROUTES['panel_account'] ?>">
                                Quay lại
                            </a>
                            <button class="btn btn-danger" type="submit" name="confirmDelete">Xác nhận</button>
                        </p>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <?php include './common/footer.php'; ?>

</body>

</html>