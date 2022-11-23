 <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
                <span class="menu-title">Quản lý chung</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#brand" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Quản lý hãng xe</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-archive menu-icon"></i>
            </a>
            <div class="collapse" id="brand">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="brand.php">Quản lý hãng xe</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Quản lý xe</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-motorbike menu-icon"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="register_bike.php">Thêm xe</a></li>
                    <li class="nav-item"> <a class="nav-link" href="manage_bike.php">Danh sách xe</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#bookings" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Quản lý đặt xe</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-briefcase-check menu-icon"></i>
            </a>
            <div class="collapse" id="bookings">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="new_bookings.php">Mới</a></li>
                    <li class="nav-item"> <a class="nav-link" href="confirmed_bookings.php">Đã xác nhận</a></li>
                </ul>
            </div>
        </li>

    </ul>
</nav>