<?php
//test.php
// - Hiển thị giá trị của phần tử mảng đầu tiên của mảng $names
// từ file session_cookie.php?
require_once 'session_cookie.php';

echo "<br>" . $names[0];
// -> đã giải quyết đc bài toán là hiển thị tên của phần tử mảng
//đầu tiên, tuy nhiên sẽ bị các xử lý thừa từ file đang nhúng
// -> trong trường hợp muốn sử dụng 1 biến ở nhiều file thì lưu
//trữ biến đó bằng session hoặc cookie, thay vì lưu như 1 mảng
//thông thường