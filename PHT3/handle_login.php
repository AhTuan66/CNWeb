<?php
session_start();  // Hàm này phải được gọi trước khi có bất kỳ output nào

// TODO 2: Kiểm tra xem người dùng đã nhấn nút "Đăng nhập" (gửi form) chưa
if (isset($_POST['username']) && isset($_POST['password'])) {

    // TODO 3: Lấy dữ liệu 'username' và 'password' từ $_POST
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // TODO 4: Kiểm tra logic đăng nhập
    if ($user === 'admin' && $pass === '123') {

        // TODO 5: Lưu tên username vào SESSION
        $_SESSION['log_user'] = $user;

        // TODO 6: Chuyển hướng người dùng sang trang "chào mừng"
        header('Location: welcome.php');
        exit;

    } else {
        // Nếu thất bại, chuyển hướng về login.html với thông báo lỗi
        header('Location: login.html?error=1');
        exit;
    }

} else {
    // TODO 7: Nếu người dùng truy cập trực tiếp file này mà không gửi form
    header('Location: login.html');
    exit;
}
?>
