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
        
        <?php include './common/breadcrumb.php'; ?>

        <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 m-auto">
                        <form method="post" action="<?php echo $is_create ? ROUTES['product_create'] : ROUTES['product_edit'] . '&id=' . $product['id'] ?>" enctype="multipart/form-data" class="content__form">

                            <?php echo (!empty($error) ? '<div class="content__list content__title content__item color--red">' . $error . '</div>' : ""); ?>

                            <div class="content__list">
                                <div class="content__title">
                                    Tiêu đề & Nội dung
                                </div>
                                <div class="content__body">
                                    <div class="content__item">
                                        <label for="title">Tên sản phẩm <i class="color--red">*</i></label>
                                        <input type="text" name="title" id="title" class="form-control"
                                            value="<?php echo $product['title'] ?>" required>
                                    </div>
                                    <div class="content__item">
                                        <label for="content">Nội dung <i class="color--red">*</i></label>
                                        <textarea rows="5" name="content" id="content" class="form-control" required><?php echo $product['content'] ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="content__list">
                                <div class="content__title">
                                    Thông tin sản phẩm
                                </div>
                                <div class="content__body">
                                    <div class="content__item">
                                        <label for="category_id">Thể loại <i class="color--red">*</i></label>
                                        <select class="form-control" name="category_id">
                                            <option value="<?php echo $product['category_id'] ?>">Chọn Category</option>
                                            <?php
                                                foreach($categories as $category)
                                                {
                                                    echo '<option value="' . $category['id'] . '" ';
                                                    echo $product['category_id'] == $category['id'] ? 'selected >' : '>';
                                                    echo $category['name'] . '</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="content__item">
                                        <label for="description">Mô tả ngắn <i class="color--red">*</i></label>
                                        <textarea rows="3" name="description" id="description" class="form-control" required><?php echo $product['description'] ?></textarea>
                                    </div>
                                    <div class="content__item">
                                        <label for="price">Giá sản phẩm <i class="color--red">*</i></label>
                                        <input type="number" name="price" id="price" class="form-control"
                                            value="<?php echo $product['price'] ?>"
                                            required>
                                    </div>
                                    <div class="content__item">
                                        <label for="thumb">Ảnh bìa <i class="color--red">*</i></label>
                                        <input type="file" name="thumb" id="thumb" class="form-control" <?php echo $is_create ? 'required' : '' ?>>
                                        <?php echo !$is_create ? '<img class="item__thumbnail" src="' . $product['thumb'] . '">' : '' ?>
                                    </div>
                                    <div class="content__item">
                                        <label for="code">File zip code <i class="color--red">*</i></label>
                                        <input type="file" name="code" id="code" class="form-control" <?php echo $is_create ? 'required' : '' ?>>
                                        <?php echo !$is_create ? '<a href="' . $product['code'] . '">Tải file zip code</a>' : '' ?>
                                    </div>
                                    <div class="content__item">
                                        <input type="checkbox" name="is_support" id="is_support" <?php echo ($product['is_support'] ? 'checked' : '') ?>>
                                        <label for="is_support">Hỗ trợ cập nhật bản mới nhất sau khi mua</label>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <button name="submit" class="btn btn-sm btn__theme"><?php echo $is_create ? "Đăng bài" : "Sửa bài" ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <?php include './common/footer.php'; ?>
    <script>CKEDITOR.replace('content');</script>

</body>

</html>