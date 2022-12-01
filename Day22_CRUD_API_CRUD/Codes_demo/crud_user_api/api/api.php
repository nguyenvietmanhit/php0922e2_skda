<?php
//api.php
//echo 'File xử lý api';

// Lấy ra phương thức từ client gửi lên:
// (GET POST PUT DELETE)
//echo '<pre>';
//print_r($_SERVER);
//echo '</pre>';
require_once 'connection.php';
$method = $_SERVER['REQUEST_METHOD'];
//var_dump($method);
switch ($method) {
    case 'GET':
        // Get user:
        // - Truy vấn CSDL
        // B1: Viết truy vấn:
        $sql_select_all = "SELECT * FROM users";
        // B2: Thực thi:
        $result_all = mysqli_query($connection, $sql_select_all);
        // B3:
        $users = mysqli_fetch_all($result_all, MYSQLI_ASSOC);
        // Dữ liệu luôn luôn cần chuyển về kiểu JSON
        echo json_encode($users);
        // Trả về status code tương ứng, get luôn trả về 200
        //nếu thành công
        http_response_code(200);
        break;
    case 'POST':
        header('Content-Type: application/json;');
        // Thêm mới
        // users: name, age
        // - Bắt dữ liệu từ client gửi lên bằng code sau:
        $datas = file_get_contents("php://input");
        // Do dữ liệu gửi lên từ API là JSON, cần phải giải mã
    //chuỗi JSON về kiểu dữ liệu mà PHP có thể hiểu đc
        $datas = json_decode($datas);
        // Ép về mảng:
        $datas = (array) $datas;
        $name = $datas['name'];
        $age = $datas['age'];
        // B1:
        $sql_insert = "INSERT INTO users(name,age) 
                        VALUES('$name', $age)";
        // B2:
        $is_insert = mysqli_query($connection, $sql_insert);
//        var_dump($is_insert);
        $result = [
            'message' => $is_insert ? 'Thêm ok' : 'Thất bại',
        ];
        echo json_encode($result);
        http_response_code(201);
        break;
    case 'PUT':
        break;
    case 'DELETE':
}