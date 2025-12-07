<?php
// Lấy toàn bộ sinh viên
function getAllSinhVien($pdo) { 
    $sql = "SELECT * FROM sinhvien";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Thêm sinh viên mới
function addSinhVien($pdo, $ten, $email) {
    $sql = "INSERT INTO sinhvien (ten_sinh_vien, email) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$ten, $email]);
}
?>
