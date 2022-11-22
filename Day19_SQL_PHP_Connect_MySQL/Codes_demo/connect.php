<?php
//connection.php
// - Cách kết nối CSDL MySQL từ PHP sử dụng thư viện:
// + mysqli: sử dụng tại thời điểm hiện tại để demo
// Hỗ trợ code kết nối = function PHP thuần, OOP
// Chỉ hỗ trợ kết nối tới CSDL MySQL
// + PDO: sử dụng sau khi OOP
// Chỉ hỗ trợ code theo OOP
// Hỗ trợ kết nối tới nhiều CSDL
// 1 - Cài đặt thư viện mysqli: XAMPP cài
// 2 - Code kết nối sử dụng mysqli
// + Tạo CSDL: php0922e_mysqli
// + Tạo bảng: products: id,name,price,created_at
// a / Khởi tạo kết nối:
// - Khai báo hằng số lưu thông tin kết nối:
// Tên máy chủ đang lưu CSDL cần kết nối:
const DB_HOST = 'localhost';
// Username login vào CSDL:
const DB_USERNAME = 'root'; //Username XAMPP tạo ra
// Password login CSDL:
const DB_PASSWORD = ''; //Password XAMPP tạo với tài khoản root
// Tên CSDL sẽ kết nối:
const DB_NAME = 'php0922e_mysqli';
// Cổng CSDL sẽ kết nối: dựa vào XAMPP để check port
const DB_PORT = 3306;

$connection = mysqli_connect(DB_HOST, DB_USERNAME,
    DB_PASSWORD, DB_NAME, DB_PORT);
if (!$connection) {
    die('Lỗi kết nối: '. mysqli_connect_error());
}
echo 'Kết nối CSDL php0922e_mysqli thành công';
// b - INSERT:
// products:id,name,price,created_at
// B1 - Viết truy vấn:
$sql_insert = "INSERT INTO products(name, price) 
VALUES('Iphone123', 1000)";
// B2 - Thực thi truy vấn: INSERT trả về boolean
$is_insert = mysqli_query($connection, $sql_insert);
var_dump($is_insert);
// Cách debug khi false, copy chuỗi truy vấn B1, thực thi trực
//tiếp tại tab SQL của PHPMyadmin trong CSDL tương ứng
// c - UPDATE
// CẬp nhật name = abc, price = 123 với id = 1
// B1 - Viết truy vấn:
$sql_update = "UPDATE products SET name='abc', price=123 
WHERE id = 1";
// B2 - Thực thi truy vấn: UPDATE trả về boolean
$is_update = mysqli_query($connection, $sql_update);
var_dump($is_update);
// d - DELETE:
// Xóa user có id > 4
// B1 - Viết truy vấn:
$sql_delete = "DELETE FROM products WHERE id > 4";
// B2 - Thực thi: DELETE trả về boolean
$is_delete = mysqli_query($connection, $sql_delete);
var_dump($is_delete);
// 3 truy vấn INSERT, UPDATE, DELETE giống nhau về các bước
// e - SELECT:
// + SELECT 1 bản ghi: lấy sp có id = 1
// B1: Viết truy vấn:
$sql_select_one = "SELECT * FROM products WHERE id = 1";
// B2: Thực thi truy vấn: SELECT trả về obj trung gian nào đó
$result_one = mysqli_query($connection, $sql_select_one);
// B3: Trả về dưới dạng mảng kết hợp 1 chiều: association
$product = mysqli_fetch_assoc($result_one);
echo '<pre>';
print_r($product);
echo '</pre>';
echo "Tên: " . $product['name'];

// + SELECT nhiều bản ghi: lấy tất cả sp
// B1: Viết truy vấn:
$sql_select_all = "SELECT * FROM products";
// B2: Thực thi: SELECT trả về obj trung gian
$result_all = mysqli_query($connection, $sql_select_all);
// B3: Trả về mảng kết hợp 2 chiều chứa các bản ghi:
$products = mysqli_fetch_all($result_all, MYSQLI_ASSOC);
echo '<pre>';
print_r($products);
echo '</pre>';
foreach ($products AS $product) {
    echo "Giá sản phẩm: " . $product['price'];
}
