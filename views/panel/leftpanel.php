<div class="col-12 col-lg-2 left-panel">
    <div class="left-panel__info">
        <div class="left-panel__user">
            <img src="/images/defaults/avatar.png" class="left-panel__avatar">
            <a href="#">No The Goodman</a>
        </div>
    </div>
    <div class="left-panel__item <?php echo $active == 1 ? 'left-panel__item--active' : '' ?>">
        <a href="<?php echo ROUTES['panel'] ?>">
            <i class="bi bi-file-earmark-text me-2"></i>
            Quản lý sản phẩm
        </a>
    </div>
    <div class="left-panel__item <?php echo $active == 2 ? 'left-panel__item--active' : '' ?>">
        <a href="<?php echo ROUTES['panel_account'] ?>">
            <i class="bi bi-people me-2"></i>
            Quản lý tài khoản
        </a>
    </div>
    <div class="left-panel__item <?php echo $active == 3 ? 'left-panel__item--active' : '' ?>">
        <a href="<?php echo ROUTES['panel_category'] ?>">
            <i class="bi bi-bookmarks me-2"></i>
            Quản lý thư mục
        </a>
    </div>
    <div class="left-panel__item <?php echo $active == 4 ? 'left-panel__item--active' : '' ?>">
        <a href="<?php echo ROUTES['panel_transaction'] ?>">
            <i class="bi bi-bank me-2"></i>
            Quản lý giao dịch
        </a>
    </div>
    <div class="left-panel__item <?php echo $active == 5 ? 'left-panel__item--active' : '' ?>">
        <a href="<?php echo ROUTES['panel_statistic'] ?>">
            <i class="bi bi-bar-chart me-2"></i>
            Báo cáo thống kê
        </a>
    </div>
    <hr>
    <div class="left-panel__item <?php echo $active == 6 ? 'left-panel__item--active' : '' ?>">
        <a href="#">
            <i class="bi bi-box-arrow-left me-2"></i>
            Đăng xuất
        </a>
    </div>
</div>