<?php
//pdo.php
// PHP Data Object
// - Kết nối CSDL MySQL từ PHP sử dụng thư viện PDO
// - PDO hỗ trợ kết nối tới nhiều CSDL, còn mysqli chỉ kết nối
//tới CSDL MySQL -> PDO thực tế
// - PDO sử dụng hoàn toàn cú pháp của OOP, mysql hỗ trợ
//cả 2 cú pháp PHP thuần và OOP
// - Demo:
// Sử dụng CSDL php0722e_crud
// Bảng: users (id, fullname, age, created_at)
// + Code kết nối:
// Data Source Name: chuỗi kết nối
const DB_DSN = "mysql:host=localhost;dbname=php0722e_crud;port=3306";
const DB_USERNAME = 'root';
const DB_PASSWORD = '';

try {
    $connection = new PDO(DB_DSN, DB_USERNAME,
        DB_PASSWORD);

} catch (PDOException $e) {
    die('Lỗi kết nối: ' . $e->getMessage());
}

echo 'Kết nối CSDL thành công';

// 1 - Truy vấn INSERT:
// users(id, fullname, age, created_at)
// + B1: Viết truy vấn: cần chống lỗi bảo mật SQLInjection bằng
// kỹ thuật bind param (viết truy vấn dạng tham số)
$sql_insert = "INSERT INTO users(fullname, age) 
VALUES(:fullname, :age)";
// + B2: Cbi đối tượng truy vấn:
$obj_insert = $connection->prepare($sql_insert);
// + B3: [Tùy chọn] Tạo mảng truyền giá trị thật cho tham số
// trong câu truy vấn nếu có
$inserts = [
    ':fullname' => 'Manhnv',
    ':age' => 344
];
// + B4: Thực thi: INSERT UPDATE DELETE trả về boolean
$is_insert = $obj_insert->execute($inserts);
var_dump($is_insert);

// 2 - Truy vấn UPDATE: sửa tên và tuổi của user có id =1
// B1: Viết truy vấn dạng tham số:
$sql_update = "UPDATE users SET fullname=:fullname, age=:age
WHERE id=:id";
// B2: Cbi obj truy vấn:
$obj_update = $connection->prepare($sql_update);
// B3: [Option] Tạo mảng
$updates = [
    ':fullname' => 'manhnv edit',
    ':age' => 123,
    ':id' => 1
];
// B4: Thực thi
$is_update = $obj_update->execute($updates);
var_dump($is_update);
// 3 - Truy vấn DELETE: xóa user có id > 10
// B1: Viết truy vấn dạng tham số:
$sql_delete = "DELETE FROM users WHERE id > :id";
// B2: Cbi obj truy vấn:
$obj_delete = $connection->prepare($sql_delete);
// B3: Tạo mảng:
$deletes = [
    ':id' => 10
];
// B4: Thực thi
$is_delete = $obj_delete->execute($deletes);
var_dump($is_delete);


