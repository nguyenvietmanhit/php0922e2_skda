<?php
//oop1.php
// - Các phương pháp lập trình: ví dụ code chức năng cộng 2 số
// + Lập trình tuyến tính: nghĩ gì code nấy, ko có tính sử dụng
//lại, ko phù hợp với bài toán lớn
$number1 = 2;
$number2 = 3;
$sum = $number1 + $number2;
echo "Tổng = $sum";
// + Lập trình có cấu trúc: tách thành hàm, hoàn toàn có thể xây
//dựng đc 1 website, tuy nhiên cách tiếp cận theo chức năng (hàm)
//phức tạp vì việc gọi hàm trong hàm
function sum($number1, $number2) {
    return $number1 + $number2;
}
echo "Tổng = " . sum(1, 2);
echo "Tổng = " . sum(2, 3);
// + Lập trình hướng đối tượng: tập trung vào đối tượng thay vì
//chức năng như lập trình cấu trúc, hầu hết các website hiện nay
//đều dựa trên OOP
class Number {
    public $number1;
    public $number2;
    public function sum() {
        return $this->number1 + $this->number2;
    }
}
$obj1 = new Number();
$obj1->number1 = 3;
$obj1->number2 = 5;
echo "Tổng OOP: " . $obj1->sum();