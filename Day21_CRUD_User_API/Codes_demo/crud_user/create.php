<!--create.php
- Code frontend, backend sau
Bảng users: id, name, age, avatar, created_at
-->
<?php
session_start();
require_once 'connection.php';
// XỬ LÝ FORM
// B1:
echo '<pre>';
print_r($_POST);
print_r($_FILES);
echo '</pre>';
// B2:
$error = '';
// B3:
if (isset($_POST['submit'])) {
    // B4:
    $name = $_POST['name'];
    $age = $_POST['age'];
    $avatars = $_FILES['avatar'];
    // B5:
    // Tên, tuổi phải nhập: empty
    // Tên phải ít nhất 2 ký tự: strlen
    // Tuổi phải là số: is_numeric
    // Avatar phải là ảnh, dung lượng ko đc vượt quá 2Mb
    if (empty($name) || empty($age)) {
        $error = 'Tên tuổi phải nhập';
    } elseif (strlen($name) < 2) {
        $error = 'Tên ít nhất 2 ký tự';
    } elseif (!is_numeric($age)) {
        $error = 'Tuổi phải là số';
    }
    // Luôn phải check nếu có file đc tải lên thư mục tạm thành
    //công thì mới xử lý file đc
    elseif ($avatars['error'] == 0) {
        // Avatar phải là ảnh
        $extension = pathinfo($avatars['name'],
            PATHINFO_EXTENSION);
        $extension = strtolower($extension);
        $allowed = ['jpeg', 'jpg', 'png', 'gif'];
        if (!in_array($extension, $allowed)) {
            $error = 'Avatar phải là ảnh';
        }
        // Dung lương file ko đc > 2Mb
        $size_b = $avatars['size'];
        $size_mb = $size_b / 1024 / 1024;
        if ($size_mb > 2) {
            $error = 'Dung lương file ko đc > 2Mb';
        }

    }

    // B6: Xử lý logic chính chỉ khi ko có lỗi
    if (empty($error)) {
        // + Upload file lên hệ thống nếu có
        $filename = '';
        if ($avatars['error'] == 0) {
            $dir_upload = 'uploads';
            if (!file_exists($dir_upload)) {
                mkdir($dir_upload);
            }
            $filename = time() . "-" . $avatars['name'];
            move_uploaded_file($avatars['tmp_name'],
                "$dir_upload/$filename");
        }

        // + Kết nối CSDL để insert vào DB
        // - B1: Viết truy vấn:
        $sql_insert = "INSERT INTO users(name,age,avatar)
VALUES('$name',$age,'$filename')";
        // - B2: Thực thi: INSERT trả về boolean
        $is_insert = mysqli_query($connection, $sql_insert);
        var_dump($is_insert);
        if ($is_insert) {
            $_SESSION['success'] = 'Thêm mới thành công';
            header('Location: index.php');
            exit();
        }
        $error = 'Thêm mới thất bại';
    }
}
//  B7: Đổ lỗi ra form
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h2>Form thêm mới user</h2>
<form action="" method="post" enctype="multipart/form-data">
    Nhập tên:
    <input type="text" name="name" ><br>
    Nhập tuổi:
    <input type="text" name="age" ><br>
    Chọn ảnh đại diện:
    <input type="file" name="avatar" ><br>
    <input type="submit" name="submit" value="Lưu user">
    <a href="index.php">Về trang danh sách</a>
</form>
