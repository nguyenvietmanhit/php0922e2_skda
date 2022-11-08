<?php
//function_array.php
// Demo 1 số hàm cơ bản của PHP xử lý mảng
// - Tính tổng giá trị của mảng:
$arr = [1, 2, 3, 4];
$sum = 0;
foreach ($arr AS $number) {
    $sum += $number;
}
echo $sum; //10
echo array_sum($arr); //10
// - Ktra phần tử mảng có tồn tại hay ko ?
$arr = [
    'name' => 'manhnv',
    'age' => 32
];
$check = isset($arr['name']); //true
$check1 = isset($arr['abcdef']); //false
// - Loại bỏ phần tử trùng lặp trong mảng, trả về mảng
$arr = [1, 2, 3, 4, 3 ,3];
$arr1 = array_unique($arr);
// - Đếm phần tử mảng: count
// - Chuyển chuỗi thành mảng dựa vào ký tự phân tách: explode
$str = "Hello Kim Anh";
$arr = explode(' ', $str);
// - Chuyển mảng thành chuỗi: implode
$arr = ['Hello', 'Kim', 'Anh'];
$str = implode(' ', $arr); //Hello Kim Anh
// - Lấy giá trị đầu tiên, cuối cùng của mảng: reset, end
$arr = [1, 2, 3, 4];
echo reset($arr); //1
echo end($arr); //4
// - Xóa phần tử mảng theo key: unset
unset($arr[3]); //[1, 2, 3]
// - Ktra kiểu dữ mảng: is_array
$check = is_array($arr); //true