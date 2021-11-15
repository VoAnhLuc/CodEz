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

            <section class="profile-settings">
                <div class="container">
                    <div class="row">
                        <form  method="post" action="<?php echo ROUTES['user_edit'] ?>" enctype="multipart/form-data">
                            <div class="d-lg-flex">
                                <div class="col-lg-6 p-2">
                                    <div class="profile-settings__title">Thông tin cá nhân</div>
                                    <div class="profile-settings__body">
                                        <div class="profile-settings__group">
                                            <p>Họ và Tên <span class="color--red">*</span></p>
                                            <input type="text" class="form-control" value="<?php echo $user['fullname'] ?>" name="fullname" >
                                        </div>
                                        <div class="profile-settings__group">
                                            <p>Tên đăng nhập <span class="color--red">*</span></p>
                                            <input type="text" class="form-control" value="<?php echo $user['username'] ?>" name="username" disabled>
                                        </div>
                                        <div class="profile-settings__group">
                                            <p>Địa chỉ Email <span class="color--red">*</span></p>
                                            <input type="email" class="form-control" value="<?php echo $user['email'] ?>" name="email" disabled >
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 profile-settings__group">
                                                <p>Mật khẩu</p>
                                                <input type="password" class="form-control" value="<?php echo $user['password'] ?>" name="password" >
                                            </div>
                                            <div class="col-md-6 profile-settings__group">
                                                <p>Xác thực mật khẩu</p>
                                                <input type="password" class="form-control" value="<?php echo $user['password'] ?>" name="repassword" >
                                            </div>
                                        </div>
                                        <div class="profile-settings__group">
                                            <p>Sinh nhật</p>
                                            <input class="form-control textbox-n" value="<?php echo $user['dob'] ?>" name="birthday" type="text" onfocus="(this.type='date')" id="date" max="<?php echo date('Y-m-d'); ?>">
                                        </div>
                                        <div class="profile-settings__group">
                                            <p>Website</p>
                                            <input type="text" class="form-control" value="<?php echo $user['website'] ?>" name="website">
                                        </div>
                                        <div class="profile-settings__group">
                                            <p>Tiêu đề trang cá nhân</p>
                                            <input type="text" class="form-control" value="<?php echo $user['heading'] ?>" name="profileheading">
                                        </div>
                                        <div class="profile-settings__group">
                                            <p>Giới thiệu</p>
                                            <textarea class="form-control" name="about" rows="4"><?php echo $user['about'] ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-2">
                                    <div class="profile-settings__title">Ảnh đại diện & Ảnh bìa</div>
                                    <div class="profile-settings__body">
                                        <div class="row">
                                            <div class="col-md-6 profile-settings__group">
                                                <p>Ảnh đại diện</p>
                                                <p class="color--gray">JPG, GIF or PNG - 100x100 px</p>
                                            </div>
                                            <div class="col-md-6 profile-settings__group m-auto">
                                                <input type="file" class="form-control mb-2" name="profile-image-avatar" id="profileimageavatar" <?php echo $user['avatar'] ?>>
                                            </div>
                                            <div class="col-12 text-center">
                                                <img src="<?php echo $user['avatar'] ?>" class="profile-settings__avatar">
                                            </div>
                                        </div>  
                                        <div class="row">
                                            <div class="col-md-6 profile-settings__group">
                                                <p>Ảnh bìa</p>
                                                <p class="color--gray">JPG, GIF or PNG - 750x370 px</p>
                                            </div>
                                            <div class="col-md-6 profile-settings__group m-auto">
                                                <input type="file" name="profile-image-cover" id="profile-image-cover" class="form-control mb-2" >
                                            </div>
                                            <div class="col-12 text-center">
                                                <img src="<?php echo $user['cover'] ?>" class="item__thumbnail">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="profile-settings__title mt-3">Tài khoản mạng xã hội</div>
                                    <div class="profile-settings__body">
                                        <div class="row profile-settings__group">
                                            <div class="col-auto m-auto">
                                                <i class="bi bi-facebook size--2rem color--facebook"></i>
                                            </div>
                                            <div class="col-10 m-auto">
                                                <input type="text" class="form-control" value="<?php echo $user['facebook'] ?>" name="facebook">
                                            </div>
                                        </div>
                                        <div class="row profile-settings__group">
                                            <div class="col-auto m-auto">
                                                <i class="bi bi-instagram size--2rem color--instagram"></i>
                                            </div>
                                            <div class="col-10 m-auto">
                                                <input type="text" class="form-control" value="<?php echo $user['instagram'] ?>" name="instagram">
                                            </div>
                                        </div>
                                        <div class="row profile-settings__group pb-2">
                                            <div class="col-auto m-auto">
                                                <i class="bi bi-twitter size--2rem color--blue"></i>
                                            </div>
                                            <div class="col-10 m-auto">
                                                <input type="text" class="form-control" value="<?php echo $user['twitter'] ?>" name="twitter">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="profile-settings__submit">
                                <input type="submit" value="Cập nhật" name="submitchangeuser" class="btn btn-sm btn__theme">
                            </div>
                        </form>
                    </div>
                </div>
            </section>
    </main>

    <?php include './common/footer.php'; ?>

</body>

</html>