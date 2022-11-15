<?php
session_start();
//session.php
// Session và cookie
// 1 - Bài toán:
// Tạo file constant.php cùng cấp
// + Nhúng nhiều lần file và bị dư thừa dữ liệu trong
//file -> lưu biến dưới dạng session cookie
//require_once 'constant.php';
//echo AGE;
// 2 - Session:
// + Là phiên làm việc, sẽ có thời gian bắt đầu và kết thúc,
//bắt đầu khi tạo ra bằng code, kết thúc khi đóng trình duyệt
//hoặc xóa nó bằng code
// + Session có thể truy cập từ mọi nơi trên hệ thống
// + Chức năng: đăng nhập, giỏ hàng
// + PHP tạo sẵn 1 biến mảng $_SESSION để lưu toàn bộ session
// 3 - Thao tác với session: bắt buộc phải khởi tạo session trước
//thì mới sử dụng đc biến $_SESSION, khởi tạo trên đầu file PHP
// + Tạo mới 1 session: giống hệt mảng
$_SESSION['class_name'] = 'php0922e';
$_SESSION['name'] = 'manhnv';
$_SESSION['age'] = 32;
// + Hiển thị: giống mảng
echo $_SESSION['class_name'];
// + Xóa session: giống xóa mảng:
unset($_SESSION['age']);

echo '<pre>';
print_r($_SESSION);
echo '</pre>';
