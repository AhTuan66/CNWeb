<?php
session_start();  // Hàm này phải được gọi ở đầu mỗi file cần dùng SESSION

// TODO 2: Kiểm tra xem SESSION có tồn tại không (kiểm tra tên đăng nhập)
if (isset($_SESSION['log_user'])) {

    // TODO 3: Lấy username từ SESSION
    $loggedInUser = $_SESSION['log_user'];

    // TODO 4: In ra lời chào mừng
    echo "<h1>Chào mừng trở lại, $loggedInUser!</h1>";
    echo "<p>Bạn đã đăng nhập thành công.</p>";

    // TODO 5: Tạo 1 link để "Đăng xuất"
    echo '<a href="login.html">Đăng xuất (Tạm thời)</a>';
} else {
    // TODO 6: Nếu không tồn tại SESSION (chưa đăng nhập)
    // Chuyển hướng người dùng về trang login.html
    header('Location: login.html');
    exit;
}
?>
