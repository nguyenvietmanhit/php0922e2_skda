<?php
//logout.php
session_start();
// Đăng xuất: xóa các thông tin tạo ra khi đăng nhập
//thành công, chuyển hướng về trang login
unset($_SESSION['username']);
$_SESSION['success'] = 'Đăng xuất thành công';
header('Location: login.php');
exit();