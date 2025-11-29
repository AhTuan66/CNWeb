<?php require "flowers.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Quản trị hoa</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 8px; }
        img { width: 100px; height: 70px; object-fit: cover; }
    </style>
</head>
<body>

<h2>Bảng quản lý danh sách hoa</h2>

<table>
<tr>
    <th>Ảnh</th>
    <th>Tên hoa</th>
    <th>Mô tả</th>
    <th>Hành động</th>
</tr>

<?php foreach ($flowers as $f) : ?>
<tr>
    <td><img src="images/<?php echo $f['image']; ?>"></td>
    <td><?php echo $f['name']; ?></td>
    <td><?php echo $f['desc']; ?></td>
    <td>
        <button>Sửa</button>
        <button>Xóa</button>
    </td>
</tr>
<?php endforeach; ?>

</table>

</body>
</html>
