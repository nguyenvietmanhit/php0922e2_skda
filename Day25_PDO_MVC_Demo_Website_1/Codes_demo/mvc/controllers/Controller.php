<?php
//controllers/Controller.php
// Controller cha chứa các TT/PT dùng chung cho
//controller con

class Controller {
    public $page_title; //Tiêu đề trang của từng chức năng
    public $error; //Lưu lỗi
    public $content; //Nội dung động của từng chức năng

    // Đọc nội dung từ đường dẫn $file_path, có cơ chế truyền
    //mảng biến $variables vào 1 cách tường minh
    public function render($file_path, $variables = []) {
        extract($variables);
        ob_start();
        require_once $file_path;
        $content = ob_get_clean();
        return $content;
    }
}