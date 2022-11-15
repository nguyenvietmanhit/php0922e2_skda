<?php
//cookie.php
// 1 - Cookie:
// - Giống session, khởi tạo 1 lần, truy cập đc từ
//mọi nơi trên hệ thống
// - PHP tạo biến mảng $_COOKIE lưu toàn bộ cookie trên hệ thống
// - Cookie ko tự mất đi khi đóng trình duyệt
// - Chức năng: lưu thông tin cấu hình trang, marketing
// - Cookie lưu trên trình duyệt, session lưu trên server
// 2 - Cách xem cookie được lưu khi truy cập 1 web
// + Truy cập vnpress.net
// + Inspect -> Application -> Storage -> Cookies theo tên miền
// 3 - Thao tác với cookie:
// + Thêm mới: ko thêm đc như thêm phần tử mảng
//$_COOKIE['abc'] = '123';
//$_COOKIE['def'] = '456';
setcookie('abc', '123', time() + 3600); //sống trong 1h
setcookie('def', '456', time() + 10); //sống trong 10s
// + Hiển thị: giống mảng (cần check tồn tại trước khi hiển thị
//khi sử dụng cookie ở file khác file khai báo)
echo $_COOKIE['abc'];
// + Xóa cookie: ko giống xóa mảng
// Set thời gian sống là quá khứ
setcookie('abc', '', time() - 1);
echo '<pre>';
print_r($_COOKIE);
echo '<pre>';
// Giống và khác nhau giữa session và cookie:
// + Giống:
// - Đều dạng mảng
// - Có thể truy cập đc từ mọi nơi trên hệ thống sau khi khởi tạo
// + Khác:
// - Session phải khởi tạo thì mới sử dụng đc, cookie thì ko
// - Session lưu trên server, cookie lưu trên trình duyệt
// - Session mất đi khi đóng trình, cookie thì ko