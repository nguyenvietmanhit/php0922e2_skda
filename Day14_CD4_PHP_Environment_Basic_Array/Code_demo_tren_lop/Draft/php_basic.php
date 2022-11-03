<!--php_basic.php-->
<?php
// Kiến thức cơ bản về PHP
//1 - Biến
// + Cú pháp khai báo:
$fullname = 'manhnv';
$age = 32;
// + Quy tắc đặt tên biến: giống JS
//$1name = 'manh';
//$name*abc = 'manhnv';
//$name và $namE là 2 biến hoàn toàn khác nhau
// $nameOfMe hoăc name_of_me, ko nên nameofme
//2 - Kiểu dữ liệu
// JS: number, string, boolean, undefined, array, object, null ...
// + integer: kiểu số nguyên, ~ -2 tỉ -> 2 tỉ
$number1 = 123;
$number2 = -10;
// Hàm debug
var_dump($number1); // int(123)
var_dump(is_int($number1)); //bool(true)
// + float/double: kiểu số thực và số nguyên phạm vi ko phải
//integer
$number1 = 1.23;
var_dump($number1);
// + string: kiểu chuỗi
$str1 = 'manhnv1';
$str2 = "manhnv2";
var_dump($str1);
// Nối chuỗi, sử dụng ký tự .
echo 'Hello: ' . $str1; //Hello: manhnv1
// Sự khác nhau khi hiển thị 1 biến trong chuỗi đơn và chuỗi kép:
echo '<br>Hello $str1';
echo "<br>Hello $str1"; // ko cần nối chuỗi -> ưu tiên
echo "<br>Hello " . $str1;
// + boolean: PHP ko phân biệt hoa thường 2 giá trị true false
$check1 = true;
$check2 = false;
$check3 = True;
var_dump($check1);
// -> integer, float, string, boolean: kiểu dữ liệu nguyên thủy
// + null: xảy ra khi sử dụng 1 biến ko tồn tại
$check = null;
var_dump($check);
// + array: kiểu mảng
// + object: đối tượng

// 3 - Ép kiểu dữ liệu: thay đổi kiểu dữ liệu, quy tắc thêm từ
// khóa kiểu dữ liệu trc giá trị cần ép
$var = 11.2; //float

$test1 = (integer) $var;
var_dump($test1);

$test2 = (string) $var;
var_dump($test2);

$test3 = (boolean) $var;
var_dump($test3); // các giá trị 0, chuỗi rỗng, null, mảng
//rỗng, obj rỗng khi ép về boolean = false, và ngược lại
// 4 - Hằng:
// + C1: nên dùng cách này vì phạm vi rộng hơn
const PI = 3.14;
// + C2:
define('MAX_FILE', 10);
echo PI;
echo MAX_FILE;
// PI = 123; báo lỗi vì cố tình gán lại giá trị cho hằng
// - Một số hằng định nghĩa sẵn trong PHP
// + Số dòng code hiện tại:
echo '<br>';
echo __LINE__;
// + Đường dẫn tuyệt đối/vật lý tới file hiện tại
echo '<br>';
echo __FILE__;
// + Đường dẫn tuyệt đối/vật lý tới thư mục cha gần nhất của
// file hiện tại
echo '<br>';
echo __DIR__;
?>