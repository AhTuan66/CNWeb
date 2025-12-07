<?php
// Tệp View CHỈ chứa HTML và logic hiển thị (echo, foreach)
?>
<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="UTF-8">
        <title>PHT Chương 5 - MVC</title>
        <style>
                    body {
            font-family: Arial, sans-serif;
            background: #f5f7fa;
            padding: 20px;
        }

        h2 {
            color: #333;
            margin-bottom: 10px;
        }

        /* Form nhập */
        form {
            background: white;
            padding: 15px;
            width: 350px;
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
            margin-bottom: 25px;
        }

        input[type="text"], input[type="email"] {
            width: 95%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        button {
            background-color: #007bff;
            color: white;
            padding: 10px 18px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Bảng danh sách */
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
        }

        th {
            background-color: #007bff;
            color: white;
            padding: 10px;
            text-align: left;
            font-weight: bold;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
        </style>
    </head>
    <body>
        <h2>Thêm Sinh Viên Mới (Kiến trúc MVC)</h2>
        
        <!-- Form thêm sinh viên -->
        <form method="post" action="">
            <label>Tên sinh viên:</label><br>
            <input type="text" name="ten" required><br><br>

            <label>Email:</label><br>
            <input type="email" name="email" required><br><br>

            <button type="submit">Thêm</button>
        </form>

        <hr>

        <h2>Danh Sách Sinh Viên</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Tên Sinh Viên</th>
                <th>Email</th>
                <th>Ngày Tạo</th>
            </tr>

            <?php
            // TODO 4: Duyệt qua $danh_sach_sv
            foreach ($danh_sach_sv as $sv) {
                // TODO 5: In dữ liệu
                echo "<tr>";
                echo "<td>" . htmlspecialchars($sv['id']) . "</td>";
                echo "<td>" . htmlspecialchars($sv['ten_sinh_vien']) . "</td>";
                echo "<td>" . htmlspecialchars($sv['email']) . "</td>";
                echo "<td>" . htmlspecialchars($sv['ngay_tao']) . "</td>";
                echo "</tr>";
            }
            ?>

        </table>
    </body>
</html>
