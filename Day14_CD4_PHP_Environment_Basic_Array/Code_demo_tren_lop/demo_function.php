<?php
// demo_function.php
// Demo 1 số hàm cơ bản xử lý chuỗi, số, thời gian
// 1 - Xử lý string
// + Lấy độ dài chuỗi: strlen
// Ctrl Q
$count = strlen('abc'); //3
// + Chuyển thành chuỗi hoa: strtoupper
$str = strtoupper('abcdef');
// + Chuyển thành chuỗi thường: strtolower
// + Chuyển ký tự đầu tiên thành ký tự hoa
echo ucfirst('manh nv hello'); //Manh nv hello
// + Hàm cắt chuỗi: substr  Ctrl P
echo "<br>";
echo substr('hello 123', 3); //lo 123
echo "<br>";
// 2 - Thao tác với số:
// + Ktra có phải là số hay ko: is_numeric
$check = is_numeric(1.23); //true
// + Làm tròn lên/xuống theo phần thập phân: round
echo round(121.6212121); //122
echo round(12.3456, 2); //12.35
// + Làm tròn lên số nguyên gần nhất: ceil
echo ceil(1.37); //2
echo ceil(-1.37); //-1
// + Làm tròn xuống số nguyên gần nhất: floor
echo floor(1.37); //1
echo floor(-1.37); //-2
// + Format số:
$price = 1000000;
echo number_format($price); //1,000,000
echo number_format($price, NULL,
    NULL, '.');
// 3 - Thao tác với Time
// + Số giây tính từ thời điểm hiện tại so với 01-01-1970
echo time();
// + Set múi giờ:
date_default_timezone_set('Asia/Ho_Chi_Minh');
// + Format thời gian: 03/11/2022 21:10:11
echo date('d/m/Y H:i:s');