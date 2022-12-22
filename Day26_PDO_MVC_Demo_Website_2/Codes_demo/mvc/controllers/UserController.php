<?php
//controllers/UserController.php
// Nhúng file đi từ file index gốc
require_once 'controllers/Controller.php';
require_once 'models/User.php';

class UserController extends Controller {
    //index.php?controller=user&action=create
    public function create() {
        // - Controller xử lý submit form:
        // B1:
        echo '<pre>';
        print_r($_POST);
        print_r($_FILES);
        echo '</pre>';
        // B2
        // B3:
        if (isset($_POST['submit'])) {
            // B4:
            $name = $_POST['name'];
            $age = $_POST['age'];
            $avatars = $_FILES['avatar'];
            // B5:
            if (empty($name) || empty($age)) {
                $this->error = 'Tên và tuổi phải nhập';
            }
            //B6:
            if (empty($this->error)) {
                // + Upload file nếu có
                $avatar = '';
                if ($avatars['error'] == 0) {
                    $dir_upload = 'uploads';
                    if (!file_exists($dir_upload)) {
                        mkdir($dir_upload);
                    }
                    $avatar = time() . '-' . $avatars['name'];
                    move_uploaded_file($avatars['tmp_name'],
                        "$dir_upload/$avatar");
                }
                // + Thêm vào CSDL
                // - Controller gọi Model để nhờ Model
                // truy vấn CSDL
                $user_model = new User();
                $is_insert =
                    $user_model->insertUser($name, $age, $avatar);
                if ($is_insert) {
                    $_SESSION['success'] = 'Thêm mới thành công';
                    header('Location:index.php?controller=user&action=index');
                    exit();
                }
                $this->error = 'Thêm mới thất bại';
            }
        }
        //B7:

        // - Controller gọi View để hiển thị giao diện
        // + Gán giá trị tương ứng cho TT của class cha
        $this->page_title = 'Form thêm mới user';
        $this->content =
            $this->render('views/users/create.php');
//        var_dump($this->content);
        // + Gọi layout để hiển thị các thông tin trên
        // Layout động
        require_once 'views/layouts/main.php';
    }

    // index.php?controller=user&action=index
    public function index() {
        // - Controller gọi Model
        $user_model = new User();
        $users = $user_model->getUsers();

        // - Controller gọi View
        $this->page_title = 'Danh sách user';
        $this->content =
            $this->render('views/users/index.php', [
                'users' => $users // $users
            ]);
        require_once 'views/layouts/main.php';
    }
}
