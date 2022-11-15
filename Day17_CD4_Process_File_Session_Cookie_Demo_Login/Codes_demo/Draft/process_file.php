<?php
//process_file.php
// Cách đọc ghi file với PHP
// 1/ Đọc file: có 1 file excel chứa thông tin khách hàng,
// chuyển các thông tin từ file đó vào Database
// - Tạo 1 file read_demo.txt, cùng cấp với file php hiện tại
// + Đọc theo từng hàng: giữ format của file
$contents = file('read_demo.txt');
echo '<pre>';
print_r($contents);
echo '</pre>';
foreach ($contents AS $content) {
    echo "$content <br>";
}
// + Đọc toàn bộ file:
$file_content = file_get_contents('read_demo.txt');
echo $file_content;
// Demo lấy nội dung 1 trang web:
//$test = file_get_contents('https://vnexpress.net');
//echo $test;
// 2/ Ghi file: ghi log như log truy cập, log lỗi ..., xuất file
// + Ghi đè file:
file_put_contents('demo_write.txt', 'Hello manhnv');
// + Ghi nối tiếp:
file_put_contents('demo_write_append.txt', 'manhnv',
FILE_APPEND);
//3 / Một số hàm có sẵn xử lý file:
// + Xóa file:
unlink('demo_write.txt');
// + Check đường dẫn file/thư mục có tồn tại hay ko:
// laban + google translate
$is_check = file_exists('abc.txt');
var_dump($is_check);