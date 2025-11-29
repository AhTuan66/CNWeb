<?php
// File CSV
$file = "data.csv";

// Kiểm tra file tồn tại
if (!file_exists($file)) {
    die("Không tìm thấy file CSV: $file");
}

// Đọc CSV, bỏ dòng trống
$rows = array_map('str_getcsv', file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES));

if (!$rows) {
    die("File CSV trống hoặc không đọc được dữ liệu.");
}

// Lấy header (tên cột)
$header = array_shift($rows);

if (!$header) {
    die("File CSV không có header.");
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Danh sách tài khoản</title>
<style>
table { width: 90%; border-collapse: collapse; margin: 20px auto; }
th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
th { background-color: #f2f2f2; }
</style>
</head>
<body>

<h2 style="text-align:center;">Bảng dữ liệu tài khoản</h2>

<table>
<tr>
    <?php foreach($header as $col): ?>
        <th><?= htmlspecialchars($col) ?></th>
    <?php endforeach; ?>
</tr>

<?php if (!empty($rows)): ?>
    <?php foreach($rows as $r): ?>
    <tr>
        <?php foreach($r as $col): ?>
            <td><?= htmlspecialchars($col) ?></td>
        <?php endforeach; ?>
    </tr>
    <?php endforeach; ?>
<?php else: ?>
    <tr><td colspan="<?= count($header) ?>" style="text-align:center;">Không có dữ liệu</td></tr>
<?php endif; ?>
</table>

</body>
</html>
