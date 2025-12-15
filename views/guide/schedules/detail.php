<?php require BASE_PATH . '/views/layouts/header.php'; ?>

<h2>Lịch trình tour: <?= $tour['name'] ?></h2>

<p><strong>Địa điểm:</strong> <?= $tour['location'] ?></p>
<p><strong>Thời gian:</strong> <?= $tour['start_date'] ?> - <?= $tour['end_date'] ?></p>

<hr>

<?php foreach ($schedules as $day): ?>
<h4>Ngày <?= $day['day_number'] ?></h4>
<p><strong>Hoạt động:</strong> <?= $day['activity'] ?></p>
<p><strong>Nhiệm vụ HDV:</strong> <?= $day['guide_task'] ?></p>
<?php endforeach; ?>

<a href="/guide/schedules">← Quay lại</a>

<?php require BASE_PATH . '/views/layouts/footer.php'; ?>