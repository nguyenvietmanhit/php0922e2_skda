<?php
//crud_user/connection.php
// - Tạo ra đối tượng kết nối dùng chung cho CRUD
// - Sử dụng thư viện mysqli để kết nối

// Tên máy chủ đang lưu CSDL:
const DB_HOST = 'localhost';
// Username login vào CSDL:
const DB_USERNAME = 'root';
// Password login:
const DB_PASSWORD = '';
// Tên CSDL:
const DB_NAME = 'php0722e_crud';
// Port CSDL:
const DB_PORT = 3306;
// + Code kết nối:
$connection = mysqli_connect(DB_HOST, DB_USERNAME,
    DB_PASSWORD, DB_NAME, DB_PORT);
if (!$connection) {
    die("Lỗi kết nối: " . mysqli_connect_error());
}
echo '<h2>Kết nối CSDL thành công</h2>';