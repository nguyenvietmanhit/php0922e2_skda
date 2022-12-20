<?php
//oop2.php
// Các thuật ngữ chính của lập trình hướng đối tượng:
// OOP : Object Oriented Programming
// 1 - Class: khuôn mẫu cho các đối tượng sinh ra từ nó
class Person1 {

}

class ProjectName {

}
// 2 - Object: đối tượng cụ thể của class, class - object luôn
// tồn tại song song
class HomeAchitect {

}
$obj1 = new HomeAchitect();
$obj2 = new HomeAchitect();
$obj3 = new HomeAchitect();
// 3 - Thuộc tính:
// + Được khai báo bên trong class
// + Sinh ra từ phân tích đặc điểm của 1 obj cụ thể
// VD: code CRUD user -> cần phân tích obj user: fullname, age ...
// -> thuộc tính của class User
class User1 {
    // Khai báo các thuộc tính:
    public $fullname;
    public $age;
}
// Tạo obj:
$user1 = new User1();
// Gán thông tin cụ thể cho obj này
// Cú pháp obj truy cập thuộc tính:
$user1->fullname = 'manhnv';
$user1->age = 32;
echo "Họ tên: " . $user1->fullname;

$user2 = new User1();
$user2->fullname = 'manhnv 2';
$user2->age = 3222;
echo "Họ tên user2: " . $user1->fullname;
// 4 - Phương thức:
// + Được khai báo bên trong class
// + Tương tự như cách cách xác định thuộc tính, cần phân tích
//đối tượng để tìm ra hành vi -> phương thức
// + Thuộc tính trong class giống của PHP thuần, phương thức giống
// như hàm của PHP thuần
class User2 {
    public function create() {
        echo 'Tạo user';
    }
    public function edit($id) {
        echo "Sửa user: $id";
    }
}
$user1 = new User2();
// Truy cập PT từ obj tương tự như truy cập TT, giống gọi hàm
$user1->create(); // Tạo user
$user1->edit(3); //Sửa user: 3
// 5 - PT khởi tạo: là 1 PT của 1 class đc gọi đầu tiên
// ngay sau khi có 1 obj sinh ra, dùng để khởi tạo giá trị mặc
// định nào đó cho TT của class
class User3 {
    //PT khởi tạo, tên bắt buộc phải là __construct
    public function __construct() {
        echo 'PT khởi tạo đc chạy đầu tiên';
    }

    public function showName() {
        echo 'PT showName';
    }
}
$user = new User3();
// 6 - Từ khóa this: gọi/tham chiếu đến chính đối tượng hiện tại,
// dùng để truy cập PT, TT bên trong chính class của nó
class User4 {
    public $fullname;
    public $age;

    public function getFullname() {
        echo "Fullname: " . $this->fullname;
    }
}
// 7 - Phạm vi truy cập:
// + private, protected, public
// + Đứng trước TT/PT
// - private: riêng tư nhất, chỉ truy cập đc trong nội bộ class
class User5 {
    private $fullname;

    private function getFullname() {
        // ok
        echo $this->fullname;
    }
}
$user = new User5();
// $user->fullname = 'abc'; //lỗi
// - protected: truy cập đc trong nội bộ class và các class kế thừa
class Person2 {
    protected $fullname;
}
class User6 extends Person2 {
    public function getFullname() {
        // Truy cập protected đc
        echo "Fullname: " . $this->fullname;
    }
}
$user = new User6();
// $user->fullname = 'abc'; //lỗi
// - public: truy cập đc từ mọi nơi
// 8 - extends: thể hiện cho tính kế thừa của OOP
// + class con kế thừa từ class cha, kế thừa đc các TT/PT của class
//cha ở 2 phạm vi truy cập là protected và public
// + PHP là đơn kế thừa
class Person3 {
    public $fullname;
    protected $age;
}
class User7 extends Person3 {
    public $address;
    public function showInfo() {
        echo "Tên: " . $this->fullname;
    }
}
// 9 - abstract: tính trừu tượng trong OOP
abstract class User8 {
    public $fullname;
    public function showFullname() {
        echo 'Fullname';
    }
    //PT trừu tượng
    abstract public function showInfo();
}
// Abtract dùng cho tính kế thừa, class con kế thừa từ class
//abstract bắt buộc phải thực thi cụ thể PT abstract
class Student1 extends User8 {
    public function showInfo() {
        echo 'showInfo của class Student1';
    }
}
// 10 - interface: thể hiện cho tính đa hình của OOP
interface Config {
//    public $fullname;
    public function sendMail();
    public function receiveMail();
}
class User9 implements Config {
    public function sendMail() {
        echo 'User9 sendmail';
    }
    public function receiveMail() {
        echo 'User9 receiveMail';
    }
}
// 4 tính chất của OOP:
// + Tính đóng gói: che giấu thông tin, thể hiện phạm vi truy cập
// + Tính kế thừa: extends
// + Tính trừu tượng: abstract
// + Tính đa hình: interface