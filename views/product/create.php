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
        
        <?php include './common/breadcrumb.php'; ?>

        <section class="create-product">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 m-auto">
                        <form method="post" action="<?php echo ROUTES['product_create']; ?>" enctype="multipart/form-data" class="create-product__form">

                            <?php echo (!empty($error) ? '<div class="create-product__list create-product__title create-product__item color--red">' . $error . '</div>' : ""); ?>

                            <div class="create-product__list">
                                <div class="create-product__title">
                                    Tiêu đề & Nội dung
                                </div>
                                <div class="create-product__body">
                                    <div class="create-product__item">
                                        <label for="title">Tên sản phẩm <i class="color--red">*</i></label>
                                        <input type="text" name="title" id="title" class="form-control"
                                            value="<?php echo $product['title'] ?>" required>
                                    </div>
                                    <div class="create-product__item">
                                        <label for="content">Nội dung <i class="color--red">*</i></label>
                                        <textarea rows="5" name="content" id="content" class="form-control" required><?php echo $product['content'] ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="create-product__list">
                                <div class="create-product__title">
                                    Thông tin sản phẩm
                                </div>
                                <div class="create-product__body">
                                    <div class="create-product__item">
                                        <label for="category">Thể loại <i class="color--red">*</i></label>
                                        <select class="form-control" name="category"
                                            value="<?php echo $product['category'] ?>">
                                            <option value="1">C#</option>
                                            <option value="2">PHP</option>
                                            <option value="3">JAVA</option>
                                            <option value="4">JAVASCRIPT</option>
                                        </select>
                                    </div>
                                    <div class="create-product__item">
                                        <label for="description">Mô tả ngắn <i class="color--red">*</i></label>
                                        <textarea rows="3" name="description" id="description" class="form-control" required><?php echo $product['description'] ?></textarea>
                                    </div>
                                    <div class="create-product__item">
                                        <label for="price">Giá sản phẩm <i class="color--red">*</i></label>
                                        <input type="number" name="price" id="price" class="form-control"
                                            value="<?php echo $product['price'] ?>"
                                            required>
                                    </div>
                                    <div class="create-product__item">
                                        <label for="thumb">Ảnh bìa <i class="color--red">*</i></label>
                                        <input type="file" name="thumb" id="thumb" class="form-control" required>
                                    </div>
                                    <div class="create-product__item">
                                        <label for="code">File zip code <i class="color--red">*</i></label>
                                        <input type="file" name="code" id="code" class="form-control" required>
                                    </div>
                                    <div class="create-product__item">
                                        <input type="checkbox" name="is_support" id="is_support" <?php echo ($product['is_support'] ? 'checked' : '') ?>>
                                        <label for="is_support">Hỗ trợ cập nhật bản mới nhất sau khi mua</label>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <button name="submit" class="btn btn-sm btn__theme">Đăng bài</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <?php include './common/footer.php'; ?>

</body>

</html>