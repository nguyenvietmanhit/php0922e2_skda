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

// 2 - UPDATE: cập nhật tên tuổi cho user có id = 1
// B1: Viết truy vấn dạng tham số:
$sql_update = "UPDATE users SET name=:name,age=:age WHERE id=:id";
// B2: Cbi obj truy vấn:
$obj_update = $connection->prepare($sql_update);
// B3: Tạo mảng truyền giá trị cho tham số truy vấn:
$updates = [
    ':name' => 'manhnv update',
    ':age' => 10,
    ':id' => 1
];
// B4: Thực thi: UPDATE trả về boolean
$is_update = $obj_update->execute($updates);
var_dump($is_update);
// 3 - DELETE: xóa user có id > 5
// B1: Viết truy vấn dạng tham số:
$sql_delete = "DELETE FROM users WHERE id > :id";
// B2: Cbi obj truy vấn:
$obj_delete = $connection->prepare($sql_delete);
// B3: Tạo mảng:
$deletes = [
    ':id' => 5
];
// B4: Thực thi: DELETE trả về boolean
$is_delete = $obj_delete->execute($deletes);
var_dump($is_delete);
// 4 - SELECT
// - Lấy 1 bản ghi: lấy user có id = 1
// B1: Viết truy vấn:
$sql_select_one = "SELECT * FROM users WHERE id = :id";
// B2: Cbi
$obj_select_one = $connection->prepare($sql_select_one);
// B3: Tạo mảng
$selects = [
    ':id' => 1
];
// B4: Thực thi, SELECT ko cần qtam đến kiểu dữ liệu trả về
$obj_select_one->execute($selects);
// B5: Trả về mảng kết hợp 1 chiều:
$user = $obj_select_one->fetch(PDO::FETCH_ASSOC);
echo '<pre>';
print_r($user);
echo '</pre>';

// - Lấy nhiều bản ghi: lấy tất cả user
// B1: Viết truy vấn:
$sql_select_all = "SELECT * FROM users";
// B2: Cbi:
$obj_select_all = $connection->prepare($sql_select_all);
// B3: Bỏ qua vì câu truy vấn ko có tham số
// B4: Thực thi
$obj_select_all->execute();
// B5: Trả về mảng kết hợp 2 chiều:
$users = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
echo '<pre>';
print_r($users);
echo '</pre>';

