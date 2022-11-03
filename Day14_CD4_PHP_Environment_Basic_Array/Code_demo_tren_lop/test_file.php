<?php
//test_file.php
// - Các hàm nhúng file trong PHP
echo 'Nội dung file test_file.php';
// Tạo file test1.php, ngang hàng với file hiện tại
// - Có 4 hàm nhúng file: include, require, include_once,
//require_once ->  2 nhóm include và require
include 'test1dsadsadsadsa.php';

echo 'hello';
// -> ưu tiên dùng require_once để nhúng file để nhúng file 1
//lần duy nhất và dừng thực thi khi file ko tồn tại
?>