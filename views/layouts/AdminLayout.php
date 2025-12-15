<!doctype html>
<html lang="vi">
<!--begin::Head-->

<head>
    <meta charset="utf-8" />
    <title><?= $title ?? 'Trang chủ quản lý tour' ?></title>

    <!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="<?= $title ?? 'Trang chủ quản lý tour' ?>" />
    <meta name="author" content="FPOLY HN" />
    <meta name="description" content="Website Quản Lý Tour FPOLY HN" />
    <meta name="keywords" content="Website Quản Lý Tour FPOLY HN" />
    <!--end::Primary Meta Tags-->

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
        crossorigin="anonymous" />
    <!--end::Fonts-->

    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css"
        crossorigin="anonymous" />
    <!--end::Third Party Plugin(OverlayScrollbars)-->

    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        crossorigin="anonymous" />
    <!--end::Third Party Plugin(Bootstrap Icons)-->

    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="<?= asset('dist/css/adminlte.css') ?>" />
    <!--end::Required Plugin(AdminLTE)-->
</head>
<!--end::Head-->

<!--begin::Body-->

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">

        <!-- HEADER -->
        <?php block('header'); ?>

        <!-- SIDEBAR -->
        <?php block('aside'); ?>

        <!--begin::App Main-->
        <main class="app-main">

            <!--begin::App Content Header-->
            <div class="app-content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0"><?= $pageTitle ?? 'Trang chủ' ?></h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">

                                <!-- HOME (ĐÃ FIX ROUTER) -->
                                <li class="breadcrumb-item">
                                    <a href="<?= BASE_URL ?>?act=home">Home</a>
                                </li>

                                <?php if (!empty($breadcrumb)): ?>
                                <?php foreach ($breadcrumb as $item): ?>
                                <li class="breadcrumb-item <?= !empty($item['active']) ? 'active' : '' ?>"
                                    <?= !empty($item['active']) ? 'aria-current="page"' : '' ?>>
                                    <?php if (!empty($item['active'])): ?>
                                    <?= $item['label'] ?>
                                    <?php else: ?>
                                    <a href="<?= $item['url'] ?>"><?= $item['label'] ?></a>
                                    <?php endif; ?>
                                </li>
                                <?php endforeach; ?>
                                <?php endif; ?>

                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::App Content Header-->

            <!--begin::App Content-->
            <div class="app-content">
                <div class="container-fluid">

                    <!-- NỘI DUNG TRANG -->
                    <?= $content ?? '' ?>

                </div>
            </div>
            <!--end::App Content-->

        </main>
        <!--end::App Main-->

        <!-- FOOTER -->
        <?php block('footer'); ?>

    </div>
    <!--end::App Wrapper-->

    <!--begin::Script-->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" crossorigin="anonymous">
    </script>

    <script src="<?= asset('dist/js/adminlte.js') ?>"></script>

    <script>
    const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
    document.addEventListener('DOMContentLoaded', function() {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
        if (sidebarWrapper && typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== 'undefined') {
            OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                scrollbars: {
                    theme: 'os-theme-light',
                    autoHide: 'leave',
                    clickScroll: true,
                },
            });
        }
    });
    </script>

    <?php if (!empty($extraJs)): ?>
    <?php foreach ($extraJs as $js): ?>
    <script src="<?= asset($js) ?>"></script>
    <?php endforeach; ?>
    <?php endif; ?>
    <!--end::Script-->

</body>
<!--end::Body-->

</html>