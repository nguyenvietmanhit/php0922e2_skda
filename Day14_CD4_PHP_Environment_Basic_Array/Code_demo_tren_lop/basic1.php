<!--basic1.php-->
<?php
// 1 - Biến
$name = 'manhnv';
$age = 32;
// 2 - Kiểu dữ liệu:
// + integer: kiểu số nguyên, -2 tỉ -> 2 tỉ
$number1 = 123;
$number2 = -123;
// hàm debug (xem thông tin)
var_dump($number1);
echo $number1; //123
// + float(double): kiểu số thực hoặc số nguyên ngoài phạm vi
//integer
$number1 = 1.23;
var_dump($number1);
// + string: đc bao bởi ' hoặc "
$name = 'manhnv';
$address = "hn";
echo 'Tên của tôi là: ' . $name;
echo "Tên của tôi là: $name";
echo 'Tên của tôi là: $name';
var_dump($name);
// + boolean: true/false hoa thường thoải mái
$is_male = true;
$is_female = false;
$a = TRue;
var_dump($is_male);
// -> 4 kiểu dữ liệu trên là kiểu dữ liệu nguyên thủy
// + null: 1 giá trị duy nhất là null
$var1 = null;
var_dump($var1);
// + array: kiểu mảng
// + object: kiểu đối tượng
// 3 - Ép kiểu dữ liệu: sử dụng từ khóa kiểu dữ liệu trc biến
$number = 11.5;
var_dump($number); //float
$result1 = (integer) $number; //11
$result2 = (string) $number; // '11.5'
// 0, chuỗi rỗng, null, mảng rỗng, đối tượng rỗng ép sang boolean
// = false, và ngược lại
$result3 = (boolean) $number; //true
if (3) {
    echo 'hello';
}
// 4 - Hằng
// + Cú pháp:
define('PI', 3.14);
define('MAX', 10);
const FULLNAME = 'manhnv'; //ưu tiên
echo FULLNAME;
// FULLNAME = 'abc'; //báo lỗi
// + Một số hằng có sẵn của PHP:
echo "<br>" . __LINE__;
echo "<br>" . __FILE__;
echo "<br>" . __DIR__;
//5 - Hàm:
function sum($number1, $number2) {
    return $number1 + $number2;
}
$sum1 = sum(1, 2);
echo "Tồng = $sum1";
// 6 - Truyền biến kiểu tham trị, tham chiếu vào hàm
$number = 5;
echo "<br> Ban đầu number = $number"; //5

function changeNumber($num) {
    $num = 1;
    echo "<br>Bên trong hàm, giá trị = $num";
}
changeNumber($number);
echo "<br> Sau khi gọi hàm, number = $number";
// -> number ko bị thay đổi sau khi gọi hàm -> truyền tham trị
// -> truyền bản sao của biến vào trong hàm, bản gốc giữ nguyên
$number = 4;
echo "<br> Ban đầu number = $number"; //4
function changeNumber1(&$num) {
    $num = 2;
    echo "<br>Bên trong hàm, giá trị = $num";
}
changeNumber1($number);
echo "<br> Sau khi gọi hàm, number = $number";
?>