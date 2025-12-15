<?php
// Sử dụng layout và truyền nội dung vào
ob_start();
?>

<!--begin::Row-->
<div class="row">
    <div class="col-12">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Danh sách danh mục tour</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse" title="Collapse">
                        <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                        <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <?php if (!empty($categories)): ?>
                <div cl ass="table-reponsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Mô tả</th>
                                <th>Trạng thái</th>
                                <th>Cập nhật</th>
                                <th class="text-center">Thao tác </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($categories as $index => $category): ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td><?= $category['name'] ?? '' ?></td>
                                <td><?= $category['description'] ?? '' ?></td>
                                <td>
                                    <?= $category['status'] == 1 ? "Hoạt động " : "Dừng hoạt động" ?>
                                </td>
                                <td><?= $category['updated_at'] ? date('d/m/Y H:i', strtotime($category['updated_at'])) : '-' ?>
                                </td>
                                <td><button class="btn btn-warning">Thao tác </button></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php endif ?>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
<!--end::Row-->

<?php
$content = ob_get_clean();

// Hiển thị layout với nội dung
view('layouts.AdminLayout', [
    'title' => $title,
    'pageTitle' => $title,
    'content' => $content,
    'breadcrumb' => [

        ['label' => 'Danh mục', 'url' => BASE_URL . 'categories', 'active' => true],
    ],
]);
?>