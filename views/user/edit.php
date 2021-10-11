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

            <section class="profile-settings">
                <div class="container">
                    <div class="row">
                        <form  method="post" action="index.php?controller=user&action=edit&id=<?php echo $user['id'] ?>" enctype="multipart/form-data">
                            <div class="d-lg-flex">
                                <div class="col-lg-6 p-2">
                                    <div class="profile-settings__title">Profile Information</div>
                                    <div class="profile-settings__body">
                                        <div class="profile-settings__group">
                                            <p>Name <span class="color--red">*</span></p>
                                            <input type="text" class="form-control" value="<?php echo $user['fullname'] ?>" name="fullname" >
                                        </div>
                                        <div class="profile-settings__group">
                                            <p>Username <span class="color--red">*</span></p>
                                            <input type="text" class="form-control" value="<?php echo $user['username'] ?>" name="username" >
                                        </div>
                                        <div class="profile-settings__group">
                                            <p>Email Address <span class="color--red">*</span></p>
                                            <input type="email" class="form-control" value="<?php echo $user['email'] ?>" name="email" >
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 profile-settings__group">
                                                <p>Password</p>
                                                <input type="password" class="form-control" value="<?php echo $user['password'] ?>" name="password" >
                                            </div>
                                            <div class="col-md-6 profile-settings__group">
                                                <p>Confirm Password</p>
                                                <input type="password" class="form-control" value="<?php echo $user['password'] ?>" name="repassword" >
                                            </div>
                                        </div>
                                        <div class="profile-settings__group">
                                            <p>Birthday</p>
                                            <input class="form-control textbox-n" value="<?php echo $user['dob'] ?>" name="birthday" type="text" onfocus="(this.type='date')" id="date">
                                        </div>
                                        <div class="profile-settings__group">
                                            <p>Website</p>
                                            <input type="text" class="form-control" value="<?php echo $user['website'] ?>" name="website">
                                        </div>
                                        <div class="profile-settings__group">
                                            <p>Profile Heading</p>
                                            <input type="text" class="form-control" value="<?php echo $user['heading'] ?>" name="profileheading">
                                        </div>
                                        <div class="profile-settings__group">
                                            <p>About</p>
                                            <textarea class="form-control" name="about" rows="4"><?php echo $user['about'] ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-2">
                                    <div class="profile-settings__title">Profile Image & Cover Image</div>
                                    <div class="profile-settings__body">
                                        <div class="row">
                                            <div class="col-md-6 profile-settings__group">
                                                <p>Profile Image</p>
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
                                                <p>Cover Image</p>
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

                                    <div class="profile-settings__title mt-3">Social Profiles</div>
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