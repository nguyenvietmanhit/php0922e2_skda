<?php
session_start();
//constant.php
// Truy cập session đã khởi tạo sau khi chạy file session.php
// - Cần chú ý ktra sự tồn tại của session trước khi thao tác,
//để tránh trường hợp báo lỗi khi chưa tạo ra session
echo isset($_SESSION['age']) ? $_SESSION['age'] : '';
echo isset($_SESSION['class_name']) ? $_SESSION['class_name'] : '';