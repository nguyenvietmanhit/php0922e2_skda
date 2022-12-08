<?php
// phuong_phap_lap_trinh.php
//Các phương pháp lập trình:
// - Lập trình tuyến tính: nghĩ gì code nấy
// Bài toán: cộng hai số và hiển thị kết quả
$number1 = 4;
$number2 = 5;
$sum = $number1 + $number2;
echo $sum;
// -> ko có tính sử dụng và ko linh hoạt khi yêu cầu thay đổi
// - Lập trình có cấu trúc/thủ tục: viết hàm
function sum($number1, $number2) {
    return $number1 + $number2;
}
echo sum(1, 2); //3
// -> tái sử dụng và có tính linh hoạt
// -> với các hệ thống lớn thì gọi hàm liên tục sẽ phức tạp
// - Lập trình hướng đối tượng: khó tiếp cận vì cú pháp phức tạp
//hơn và thay đổi tư duy code -> lấy đối tượng làm trọng tâm thay
//vì chức năng như có cấu trúc
// VD: CRUD user có cấu trúc: listUser, createUser, updateUser,
//deleteUSer
// CRUD theo OOP: phân tích user: lấy thuộc tính và phương thức
//của nó -> tạo class
class SumNumber {
    public $number1;
    public $number2;
    public function sum() {
        return $this->number1 + $this->number2;
    }
}
$obj = new SumNumber();
$obj->number1 = 3;
$obj->number2 = 5;
echo $obj->sum(); //8
?>
