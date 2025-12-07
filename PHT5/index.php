<?php 
// Tệp Controller là "não" của ứng dụng

// TODO 6: Import Model
require_once 'models/SinhVienModel.php';


// === THIẾT LẬP KẾT NỐI PDO ===
$host = '127.0.0.1';
$dbname = 'cse485_web';
$username = 'root';
$password = '';
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4"; 

try {
    $pdo = new PDO($dsn, $username, $password); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
} catch (PDOException $e) { 
    die("Kết nối thất bại: " . $e->getMessage()); 
}
// === KẾT THÚC KẾT NỐI PDO ===

// === LOGIC CỦA CONTROLLER ===

// TODO 8: Kiểm tra POST thêm sinh viên
if (isset($_POST['ten']) && isset($_POST['email'])) {

    // TODO 9: Lấy dữ liệu
    $ten = $_POST['ten'];
    $email = $_POST['email'];

    // TODO 10: Gọi hàm thêm sinh viên
    addSinhVien($pdo, $ten, $email);

    // TODO 11: Reload lại trang
    header('Location: index.php');
    exit;
}

// TODO 12: Luôn luôn lấy danh sách sinh viên
$danh_sach_sv = getAllSinhVien($pdo);

// TODO 13: Import View
include 'views/sinhvien_view.php';
?>
