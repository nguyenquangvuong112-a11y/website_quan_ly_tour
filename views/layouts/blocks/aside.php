<!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!-- 🔥 FIX: home đúng router -->
        <a href="<?= BASE_URL ?>?act=home" class="brand-link">
            <img src="<?= asset('dist/assets/img/AdminLTELogo.png') ?>" alt="AdminLTE Logo"
                class="brand-image opacity-75 shadow" />
            <span class="brand-text fw-light">Quản Lý Tour</span>
        </a>
    </div>
    <!--end::Sidebar Brand-->

    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">

                <!-- DASHBOARD -->
                <li class="nav-item">
                    <a href="<?= BASE_URL ?>?act=home" class="nav-link">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- ===== MENU CHO ADMIN ===== -->
                <?php if (isAdmin()): ?>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-airplane-engines"></i>
                        <p>
                            Quản lý Tour
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <!-- 🔥 FIX: categories đúng router -->
                            <a href="<?= BASE_URL ?>?act=categories" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Danh mục Tour</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Danh sách Tour</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-people-fill"></i>
                        <p>
                            Quản lý Khách hàng
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Danh sách Khách hàng</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-person-gear"></i>
                        <p>
                            Quản lý Người dùng
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Danh sách Người dùng</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>

                <!-- ===== MENU CHO HDV ===== -->
                <?php if (isLoggedIn() && !isAdmin()): ?>
                <li class="nav-header">HƯỚNG DẪN VIÊN</li>

                <li class="nav-item">
                    <a href="<?= BASE_URL ?>?act=guide/schedules" class="nav-link">
                        <i class="nav-icon bi bi-calendar-check"></i>
                        <p>Lịch trình & Lịch làm việc</p>
                    </a>
                </li>
                <?php endif; ?>

                <!-- HỆ THỐNG -->
                <li class="nav-header">HỆ THỐNG</li>
                <li class="nav-item">
                    <a href="<?= BASE_URL ?>?act=logout" class="nav-link">
                        <i class="nav-icon bi bi-box-arrow-right"></i>
                        <p>Đăng xuất</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
<!--end::Sidebar-->