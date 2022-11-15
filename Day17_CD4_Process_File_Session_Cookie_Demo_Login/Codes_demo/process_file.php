<?php
//process_file.php
// Cách đọc và ghi file trong PHP
// 1 - Đọc file: tạo file demo.txt cùng cấp file hiện tại
// + Đọc từng dòng: giữ đc format của file
$data = file('demo.txt');
echo '<pre>';
print_r($data);
echo '</pre>';
// + Đọc toàn bộ:
$content = file_get_contents('demo.txt');
var_dump($content);
// echo file_get_contents('https://vnexpress.net');
// 2 - Ghi file:
// + Ghi đè:
file_put_contents('abc.txt', '123');
// + Ghi nối tiếp:
file_put_contents('def.txt', '456', FILE_APPEND);
// 3 - Một số hàm cơ bản liên quan đến file:
// + Ktra tồn tại đường dẫn file/thư mục: file_exist
$test1 = file_exists('dsadsadsaas.png');
// + Xóa file: unlink
unlink('abc.txt');