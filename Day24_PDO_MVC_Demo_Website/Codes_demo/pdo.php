<?php
//pdo.php
// - Kết nối CSDL MySQL từ PHP sử dụng thư viện PDO
// + PHP Data Object, là cơ chế kết nối CSDL từ PHP thông qua 1
//thư viện PDO
// + KẾt nối tới nhiều CSDL khác nhau
// + Sử dụng hoàn toán cú pháp của OOP
// - Code kết nối:
// php0922e2_crud
// users:id, name, age, created_at

//  Data Source Name
const DB_DSN='mysql:host=localhost;dbname=php0922e2_crud;port=3306';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';
try {
    $connection = new PDO(DB_DSN,DB_USERNAME,
        DB_PASSWORD);

} catch (PDOException $e) {
    die("Lỗi kết nối: " . $e->getMessage());
}
echo 'Kết nối CSDL thành công';

// 1 - INSERT:
// users:id, name, age, created_at
//B1: Viết truy vấn, chống luôn lỗi bảo mật SQLInjection bằng
//cách viết truy vấn dạng tham số
$sql_insert = "INSERT INTO users(name,age) VALUES(:name,:age)";
//B2: Cbi obj truy vấn:
$obj_insert = $connection->prepare($sql_insert);
//B3: Truyền giá trị thật cho tham số trong câu truy vấn nếu có
$inserts = [
    ':name' => 'nvmanh',
    ':age' => 32
];
//B4: Thực obj truy vấn: INSERT, UPDATE, DELETE trả về boolean
$is_insert = $obj_insert->execute($inserts);
var_dump($is_insert);
var_dump($is_insert);
