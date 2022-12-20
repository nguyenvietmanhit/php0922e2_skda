<?php
//mvc/index.php
// Code CRUD User theo MVC
// - File index.php là file index gốc của ứng dụng MVC, tên file
//luôn luôn là index.php, là file đầu tiên nhận request từ
//user gửi lên -> mọi URL phải xuất phát từ file index này
// - Một số chuẩn trong mô hình MVC hiện tại:
// + Url bắt buộc phải truyền 2 tham số controller và action, trừ
//trang chủ
//VD: Url thêm mới user:
// index.php?controller=user&action=create
// VD Url cập nhật:
// index.php?controller=user&action=update&id=3
// + Nếu file chứa 1 class, thì bắt buộc tên file phải trùng
//tên class đó
//VD: UserController.php -> class UserController
// + Tên file controller bắt buộc phải có chuỗi Controller sau
//cùng
// UserController.php, NewsController.php
// Demo với chức năng thêm mới user:
// index.php?controller=user&action=create

// - Code gì trong file này ? phân tích url, gọi đúng controller
//tương ứng xử lý
// + KHởi tạo session chung cho toàn hệ thống
session_start();
// + Set múi giờ chung cho toàn hệ thống
date_default_timezone_set('Asia/Ho_Chi_Minh');
//echo date('d-m-Y H:i:s');
// + Phân tích url để lấy giá trị của controller và action
// index.php?controller=user&action=create
$controller = isset($_GET['controller']) ? $_GET['controller'] :
    'home'; //user
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
          // create
//var_dump($controller); //user
//var_dump($action); //create
// + Biến đổi controller thành tên file controller tương ứng
// user -> UserController
$controller = ucfirst($controller); //User
$controller .= "Controller"; // UserController
//var_dump($controller); //UserController
// index.php?controller=user&action=create
// + Nhúng đường dẫn tới file controller tương ứng:
// Trong MVC luôn luôn phải tư duy đứng từ file index gốc để
//nhúng các file khác
$controller_path = "controllers/$controller.php";
//var_dump($controller_path); //controllers/UserController.php

if (!file_exists($controller_path)) {
    die('Trang bạn tìm không tồn tại - 404');
}
require_once $controller_path;
// + Do file controller chứa 1 class controller bên trong, nên
//cần khởi tạo đối tượng từ class trên
$obj = new $controller(); // $obj = new UserController()
// + Dùng obj trên truy cập phương thức $action tương ứng
// action trên url chính là tên phương thức tương ứng của class
// index.php?controller=user&action=create
if (!method_exists($obj, $action)) {
    die("PHương thức $action ko tồn tại trong class $controller");
}

$obj->$action();