<?php
//oop.php
// - Lập trình hướng đối tượng:
// + Object Oriented Programming - OOP, là phương pháp lập trình
//sẽ lấy đối tượng làm trọng tâm để phân tích và giải
//quyết bài toán
// - Các thuật ngữ cơ bản trong OOP:
// + class: khuôn mẫu cho các đối tượng sinh ra từ nó
class Number {

}

class CheckName {

}
// + object: là thực thể cụ thể sinh ra từ 1 class -> object
//và class luôn đi kèm nhau
$obj = new Number();
var_dump($obj);
// + property: là các thuộc tính đc khai báo bên trong class,
// là đặc điểm của đối tượng, phân tích user -> đặc điểm: fullname,
//age, address ... -> chuyển thành các thuộc tính của class
class User1 {
    public $fullname;
    public $age;
    public $address = 'abc';
}
// Cách obj truy cập thuộc tính của class:
$obj_user1 = new User1();
// Object sinh ra từ 1 class sẽ truy cập thuộc tính
// public/protected của class đó
$obj_user1->fullname = 'A';
$obj_user1->age = 12;
$obj_user1->address = 'add1';

$obj_user2 = new User1();
$obj_user2->fullname = 'B';
$obj_user2->age = 22;
$obj_user2->address = 'def';
echo "Tên của bạn: " . $obj_user2->fullname;
// - Function: là các phương thức đc khai báo bên trong class,
// là hành vi của obj. VD: CRUD user -> create, update, delete,
//getUser  -> chuyển phương thức bên trong class tương ứng
class User2 {
    public $fullname;

    public function showName($name) {
        echo "Tên của bạn: $name";
    }
}
$user2 = new User2();
// Obj truy cập phương thức public/protected bên trong class
$user2->showName('abc'); //Tên của bạn: abc
// - Constructor Function - PHương thức khởi tạo: là phương thức
// sẽ tự động đc gọi đầu tiên khi 1 obj sinh ra từ 1 class, khởi
//tạo giá trị mặc định cho chính thuộc tính của class đó
class User3 {
    public function __construct() {
        echo 'PT khởi tạo';
    }
    public function show() {
        echo 'Show';
    }
}
$obj = new User3();
// PT khởi tạo có tham số:
class User4 {
    public function __construct($name) {
        echo "Tên của bạn: $name";
    }
}
$obj = new User4('abc');
//Tên của bạn: abc
// - this: gọi đến chính đối tượng hiện tại
class User5 {
    public $fullname;
    public $age;
    public function showInfo() {
        echo $this->fullname . $this->age;
    }
}
$obj = new User5();
$obj->fullname = 'abc';
$obj->age = 12;
$obj->showInfo();
// - Access Modifier: phạm vi truy cập, là các từ khóa private/
//protected/public đứng trước tên TT/PT, quy định cách truy cập
//vào TT/PT
// + private: chỉ truy cập đc nội bộ class
class User6 {
    private $fullname;

    private function show() {
        echo $this->fullname;
    }
}
$obj = new User6();
//$obj->fullname = 'abc';
//$obj->show();
// + protected: cũng như private tuy nhiên có thể truy cập đc
// trong class con kế thừa từ class hiện tại
// + public: truy cập đc từ mọi nơi
// - Constant: là các hằng số bên trong class
class User7 {
    const AGE = 35;

    public function showAge() {
        echo "Tuổi: " . self::AGE; //nội bộ class
        echo "Tuổi: " . User7::AGE;//dùng ở mọi nơi
    }
}
// - extends: tính kế thừa trong OOP, sử dụng lại, class con kế
//thừa từ class: TT/PT public/protected
class Person {
    public $fullname;
    public $age;
}
class Student extends Person {
    public $id;
    public function showInfo() {
        echo $this->fullname . $this->age;
    }
}
// - abstract: tính trừu tượng trong OOP
abstract class User8 {
    public $fullname;
    public function show() {
        echo 'show';
    }
    abstract public function test();
}
class User9 extends User8 {
    public function test() {
        echo ' test user9';
    }
}

// - interface: tính đa hình trong OOP
interface ConfigMail {
//    public $name; // lỗi
//
//    public function show() {
//        echo 'abc';
//    }
    public function sendMail();
    public function receiveMail();
}
class GoogleMail implements ConfigMail {
    public function sendMail() {
        echo 'Send mail Google';
    }
    public function receiveMail() {
        echo 'Receive mail Google';
    }
}
// 4 tính chất của OOP:
// + Trừu tượng: abstract
// + Đóng gói: phạm vi truy cập
// + Kế thừa: extends
// + Đa hình: interface