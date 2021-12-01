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
                        <h1>Sửa danh mục <?php echo $category['name'] ?></h1>
                        <div class="content__item mt-4">
                            <label for="title" >Tên danh mục <i class="color--red">*</i></label>
                            <input type="text" name="category_name" id="title" class="form-control"
                                value="<?php echo $category['name'] ?>" required style="width : 400px;">
                        </div>
                        <div class="content__item">
                            <label for="title">Mô tả <i class="color--red">*</i></label>
                            <input type="text" name="category_des" id="title" class="form-control"
                                value="<?php echo $category['description'] ?>" required style="width : 800px;">
                        </div>
                            <a class="btn btn-warning" href="<?php echo ROUTES['panel_category'] ?>">
                                Quay lại
                            </a>
                            <button class="btn btn-primary" type="submit" name="confirmFixCategory">Xác nhận</button>
                        </p>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <?php include './common/footer.php'; ?>

</body>

</html>