<?php
//php_connect_mysql.php
// Cách PHP kết nối tới CSDL MySQL thông qua thư viện của bên thứ
// 3, có 2 thư viện phổ biến nhất:
// + mysqli: sử dụng hàm PHP thuần để kết nối, chỉ kết nối đc
// tới CSDL duy nhất là MySQL
// + PDO: chỉ sử dụng cú pháp của OOP, ưu tiên trong thực tế, hỗ
//trợ kết nối nhiều CSDL

// 1 - Các bước kết nối từ PHP tới MySQL sử dụng mysqli
// a/ Khởi tạo kết nối:
// + Khai báo các hằng số lưu thông tin kết nối:
// Tên máy chủ đang lưu trữ CSDL sẽ kết nối:
const DB_HOST = 'localhost';
// Username login vào CSDL:
const DB_USERNAME = 'root'; // mặc định sinh ra bởi XAMPP
// Password login vào CSDL:
const DB_PASSWORD = ''; //mặc định sinh ra bởi XAMPP
// Tên CSDL sẽ kết nối:
const DB_NAME = 'php0722e_demo';
// Cổng của CSDL:
const DB_PORT = 3306;
// + Code kết nối:
$connection = mysqli_connect(DB_HOST, DB_USERNAME,
    DB_PASSWORD, DB_NAME, DB_PORT);
if (!$connection) {
    die("Lỗi kết nối: " . mysqli_connect_error());
}
echo '<h2>Kết nối CSDL thành công</h2>';

// b / INSERT: thêm dữ liệu tĩnh vào bảng categories(id, name)
// B1: Viết truy vấn INSERT:
$sql_insert = "INSERT INTO categories(name) VALUES('Thể thao')";
// B2: Thực thi truy vấn: INSERT trả về boolean
$is_insert = mysqli_query($connection, $sql_insert);
var_dump($is_insert);
// Cách debug khi thực thi bị false: copy câu truy vấn và chạy
//trực tiếp trên tab SQL của PHPMyadmin
// c/ UPDATE: cập nhật dữ liệu
// Cập nhật tên sp = abc, giá sp = 123 với sp có id = 3
// B1: Viết truy vấn:
$sql_update = "UPDATE products SET name = 'abc', price = 123
WHERE id = 3";
// B2: Thực thi truy vấn: UPDATE trả về boolean
$is_update = mysqli_query($connection, $sql_update);
var_dump($is_update);

// d/ DELETE: xóa dữ liệu
// Xóa danh mục id > 2;
// B1: Viết truy vấn:
$sql_delete = "DELETE FROM categories WHERE id > 2";
// B2: Thực thi: DELETE trả về boolean
$is_delete = mysqli_query($connection, $sql_delete);
var_dump($is_delete);
// -> INSERT UPDATE DELETE giống nhau về các bước, chỉ khác đúng
//câu truy vấn

// e / SELECT: lấy dữ liệu
// + SELECT 1 bản ghi: lấy sp có id = 4
// B1: Viết truy vấn:
$sql_select_one = "SELECT * FROM products WHERE id = 4";
// B2: Thực thi truy vấn: SELECT trả về 1 obj trung gian, ko phải
//boolean như INSERT UPDATE DELETE
$result_one = mysqli_query($connection, $sql_select_one);
var_dump($result_one);
// B3: Lấy thông tin dưới dạng mảng 1 chiều từ obj trung gian:
$product = mysqli_fetch_assoc($result_one);
echo '<pre>';
print_r($product);
echo '</pre>';

// + SELECT nhiều bản ghi: lấy tất cả sp
// B1: Viết truy vấn:
$sql_select_all = "SELECT * FROM products";
// B2: Thực thi: SELECT trả về 1 obj trung gian, ko phải
////boolean như INSERT UPDATE DELETE
$result_all = mysqli_query($connection, $sql_select_all);
// B3: Lấy thông tin dạng mảng kết hợp 2 chiều:
$products = mysqli_fetch_all($result_all, MYSQLI_ASSOC);
echo '<pre>';
print_r($products);
echo '</pre>';

foreach ($products AS $product) {
    echo $product['name'] . "<br>";
}
//CRUD sản phẩm