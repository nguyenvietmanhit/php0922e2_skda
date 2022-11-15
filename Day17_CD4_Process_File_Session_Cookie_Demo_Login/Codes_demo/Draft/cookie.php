<?php
//cookie.php
// Cookie trong PHP:
// 1/ Cookie là gì:
// - Là kiểu mảng dùng lưu trữ thông tin, khởi tạo 1 lần dùng
//mọi nơi trên hệ thống
// - Chức năng : hay dùng cho marketing, tăng tốc độ tải trang
// (web hỏi để lưu cookie)
// - Cookie đc lưu trên trình duyệt, khác với session lưu trên
//server. Cách xem cookie lưu trên trình duyệt: Inspect ->
// Application -> Storage -> Cookies
// - Cookie ko tự mất đi khi đóng trình duyệt, phụ thuộc vào
//thời gian sống lúc khởi tạo
// - PHP sinh ra mảng $_COOKIE lưu tất cả cookie trên hệ thống
// 2/ Thao tác:
// - Thêm cookie: ko thêm như phần tử mảng đc, mà cần sử dụng
//hàm sau để cookie đc lưu vào trình duyệt
// $_COOKIE['fullname'] = 'manhnv';
setcookie('fullname', 'manhnv', time() + 60);
setcookie('test', 123456, time() + 10); //sống trong 10s
// - Hiển thị: giống mảng:
echo $_COOKIE['fullname'];
// - Xóa: ko dùng đc hàm unset, mà phải dùng hàm sau: set thời
//gian sống là số âm
setcookie('fullname', 'dsadasdas', time() - 1);
setcookie('laptop_name', 'asus', time() + 3600);
// Tạo file test_cookie.php cùng cấp
// Debug:
echo '<pre>';
print_r($_COOKIE);
echo '</pre>';
