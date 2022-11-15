<?php
session_start();
//session.php
// Session trong PHP
// 1/ Session là gì?
// - Là kiểu mảng dùng lưu trữ thông tin, khởi tạo 1 lần dùng
//mọi nơi trên hệ thống
// - Giống như 1 phiên làm việc: có thời gian bắt đầu và kết thúc
// - Chức năng sử dụng session: đăng nhập, giỏ hàng
// - Session mất đi khi đóng trình duyệt hoặc xóa thủ công session
// - PHP tạo sẵn 1 mảng $_SESSION lưu toàn bộ thông tin session
//đang có trên hệ thống
//2/ Thao tác:
// - Luôn luôn cần khởi tạo session thì mới sử dụng đc $_SESSION,
//luôn khởi tạo trên đầu file
//echo '<pre>';
//print_r($_SESSION);
//echo '</pre>';
// - Các thao tác thêm sửa xóa hiển thị session y hệt mảng
// + Thêm dữ liệu:
$_SESSION['address'] = 'HN';
$_SESSION['age'] = 32;
$_SESSION['class'] = 'php0722e';
// + Hiển thị:
echo $_SESSION['address'];
// + Xóa:
unset($_SESSION['class']);
// Tạo file test_session.php cùng cấp file hiện tại
echo '<pre>';
print_r($_SESSION);
echo '</pre>';