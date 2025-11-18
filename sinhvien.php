<?php
    //Khai báo 3 biến 
    $ho_ten = "Trần Anh Tuấn";
    $diem_tb = 8;
    $co_di_hoc_chuyen_can = true;

    //In ra thông tin
    echo "Họ tên: $ho_ten <br>";
    echo "Điểm trung bình: $diem_tb <br>";
    echo "Chuyên cần: " . ($co_di_hoc_chuyen_can ? "Có" : "Không") . "<br><br>";

    //Viết cấu trúc IF/ELSE IF/ELSE (2.2) 
    if($diem_tb >= 8.5 && $co_di_hoc_chuyen_can == true) {
        echo "Xếp loại: Giỏi <br><br>";
    } else if($diem_tb >= 6.5 && $co_di_hoc_chuyen_can == true) {
        echo "Xếp loại: Khá <br><br>";
    } else if($diem_tb >= 5.0 && $co_di_hoc_chuyen_can == true) {
        echo "Xếp loại: Trung bình <br><br>";
    } else {
        echo "Xếp loại: Yếu (Cần cố gắng thêm!) <br><br>";
    }
    
    //Viết 1 hàm đơn giản (2.3)
    function chaoMung() {
        echo "Chúc mừng bạn đã hoàn thành PHT Chương 2!";
    }
    //Gọi hàm bạn vừa tạo
    chaoMung();
?>