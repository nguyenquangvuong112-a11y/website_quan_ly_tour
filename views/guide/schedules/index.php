<?php
ob_start();
?>

<h2>Lịch trình & Lịch làm việc</h2>

<?php if (empty($tours)): ?>
<div class="alert alert-warning">
    Chưa có lịch trình được phân công
</div>
<?php else: ?>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Tên tour</th>
            <th>Thời gian</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tours as $tour): ?>
        <tr>
            <td><?= htmlspecialchars($tour['name']) ?></td>
            <td><?= $tour['start_date'] ?> - <?= $tour['end_date'] ?></td>
            <td>
                <a class="btn btn-sm btn-primary"
                    href="<?= BASE_URL ?>?act=guide/schedule-detail&id=<?= $tour['id'] ?>">
                    Xem chi tiết
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php endif; ?>

<?php
$content = ob_get_clean();

view('layouts.AdminLayout', [
    'title' => 'Lịch trình HDV',
    'pageTitle' => 'Lịch trình & Lịch làm việc',
    'content' => $content,
    'breadcrumb' => [
        ['label' => 'Trang chủ', 'url' => BASE_URL . '?act=home'],
        ['label' => 'Lịch trình', 'active' => true],
    ],
]);