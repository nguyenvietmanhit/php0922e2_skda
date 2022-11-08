<?php
//array.php
// - Các kiểu dữ liệu PHP: integer, float/double, string
// boolean, array, object, null
// 1 - Array/Mảng là gì:
// + Trong PHP thao tác với mảng thường xuyên
// + Là 1 kiểu dữ liệu có cấu trúc
// + Mảng là gì ?
// VD: Lưu thông tin tên của 4 chị em
// -> xử lý bằng cách tạo 4 biến: bị thủ công và xử lý thủ công
$name1 = 'Kim Anh';
$name2 = 'Mỵ';
$name3 = 'Nga';
$name4 = 'Giang';
// -> tạo 1 biến kiểu mảng lưu toàn bộ thông tin trên, có cơ
//chế lặp để xử lý hàng loạt
// + Mảng là 1 kiểu dữ liệu có cấu trúc, lưu đc nhiều giá trị
//đồng thời, các giá trị này có thể là bất cứ kiểu dữ liệu nào
// 2 - Cú pháp khai báo:
// C1: mọi phiên bản PHP
$arr1 = array('KA', 'Mỵ', 'Nga', 'Giang');
// C2: version PHP >= 5.4 , ưu tiên
$arr2 = ['KA', 'Mỵ', 'Nga', 'Giang'];
$arr3 = [123, 'abc', 5.4, true, null, []];
// 3 - Thuật ngữ:
// + Element / Phần tử: đặc trưng bởi cặp key/value
// + Key / Chỉ mục: là giá trị để xác định phần tử mảng
// + Value / Giá trị: là giá trị tương ứng của phần tử mảng
//dựa theo key
$arr = ['a', 'b', 'c', 1, 2, 3];
// 6 phần tử mảng
echo count($arr); //6
// Phần tử mảng đầu tiên, key = 0 và value = a
// Phần tử có key 3 thì value = 1
// Phần tử có key = 7 thì value = ?
// - Cú pháp debug để xác định thuật ngữ về mảng dễ dàng hơn
var_dump($arr);
echo '<pre>';
print_r($arr);
echo '</pre>';
// 4 - Thao tác với mảng:
$arr = ['a', 'b', 'c', 1, 2, 3];
// + Thủ công: dựa vào key của phần tử mảng:
echo '<br>';
echo $arr[2]; //c
echo $arr[0]; //a
echo $arr[6]; // undefined index = ko tồn tại key
// + Vòng lặp: for while do...while cần xác định
// trước số phần tử mảng, cẩn thận ở điều kiện lặp, khó hoạt
//động với mảng đa chiều
// Lấy tổng số phần tử mảng trc:
echo '<br>';
$count = count($arr); //6
for ($key = 0; $key < 6; $key++) {
    echo $arr[$key];
}
// 5 - Vòng lặp foreach
// + Là vòng lặp chuyên dùng để lặp mảng
// + Cơ chế: lặp qua từng phần tử mảng, mỗi lần đi qua từng phần
//tử mảng xác định đc luôn cặp key value tương ứng, thể hiện luôn
//thành biến
$arr = ['a', 'b', 'c', 1, 2, 3];
// + Cú pháp:
// - Foreach đầy đủ key/value:
foreach ($arr AS $key => $value) {
    echo "<br> Phần tử mảng có key = $key thì value = $value";
}
foreach ($arr AS $k => $v) {
    echo "<br> Phần tử mảng có key = $k thì value = $v";
}
// - Foreach khuyết key:
foreach ($arr AS $value) {
    echo "<br> Value = $value";
}
// 6 - Phân loại mảng:
// + Mảng tuần tự/Mảng số nguyên: key của mảng ở dạng số nguyên
$arr = ['a', 'b', 'c'];
echo '<pre>';
print_r($arr);
echo '</pre>';
// + Mảng kết hợp: key xuất hiện ở cả dạng string
$infos = [
    'fullname' => 'manhnv',
    'age' => 32,
    'address' => 'HN',
    1 => 'abc'
];
echo '<pre>';
print_r($infos);
echo '</pre>';
echo $infos['fullname']; //manhnv
echo $infos['age']; //32
echo $infos['address']; //HN
foreach ($infos AS $key => $value) {
    echo "Key = $key, value = $value";
}
// + Mảng đa chiều: mảng trong mảng, phức tạp nhất
$infos = [
    'fullname' => 'Chinh',
    'age' => 20,
    'class' => [
        'name' => 'PHP0722E',
        'address' => 'HTM',
        'abc' => [1, 2, 3]
    ]
];
// -> mảng 3 chiều
echo '<pre>';
print_r($infos);
echo '</pre>';
// Thủ công:
echo $infos['class']['name']; //PHP0722E
echo $infos['class']['abc'][2]; //3
// Hiển thị giá trị mảng mà ko cần nối chuỗi
echo "Hello, {$infos['class']['name']}";
//Hàng loạt: cần phải cẩn thận khi xử lý mảng đa chiều
foreach ($infos AS $key => $value) {
    // echo "<br> Key = $key, value = $value";
}
// -> nếu như mảng do bạn tự định nghĩa ra thì cố gắng dừng
//tối đa 3 chiều