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
        <section class="content mt-5 mb-5">
            <div class="container">
                <form method="post">
                    <div class="p-5 bg--white">
                        <h1>Chỉnh sửa thông tin, <?php echo $user['username'] . ' - ID: ' . $user['id'] ?></h1>
                        <div class="content__item mt-5">
                            <label for="money">Tiền:</label>
                            <input type="text" name="money" id="money" class="form-control"
                                value="<?php echo $user['money'] ?>" required>
                        </div>
                        <div class="content__item">
                            <input class="form-check-input" type="checkbox" id="approved" name="approved" <?php echo $user['is_vendor'] ? 'checked' : '' ?>>
                            <label class="form-check-label" for="approved">
                                Quyền người bán
                            </label>
                        </div>
                        <a class="btn btn-warning" href="<?php echo ROUTES['panel_account'] ?>">
                            Quay lại
                        </a>
                        <button class="btn btn-primary" type="submit" name="submit">Xác nhận</button>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <?php include './common/footer.php'; ?>

</body>

</html> 