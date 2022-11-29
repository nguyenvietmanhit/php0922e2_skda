<!--crud_user/update.php
Bảng users: id, name, age, avatar, created_at
-->
<?php
session_start();
require_once 'connection.php';
// - Lấy id từ url: crud_user/update.php?id=1
// Validate id hợp lệ: phải tồn tại tham số id và phải là số
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    $_SESSION['error'] = 'Id ko hợp lệ';
    header('Location: index.php');
    exit();
}
$id = $_GET['id'];
// - Lấy user dựa theo id: SELECT 1 bản ghi
// B1: Viết truy vấn:
$sql_select_one = "SELECT * FROM users WHERE id = $id";
// B2: Thực thi: SELECT trả về obj trung gian
$result_one = mysqli_query($connection, $sql_select_one);
// B3: Trả về mảng kết hợp 1 chiều:
$user = mysqli_fetch_assoc($result_one);
echo '<pre>';
print_r($user);
echo '</pre>';
// - Đổ thông tin user ra form
// Ctrl Alt L
// - Xử lý form
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
        // Nếu ko tải file đè thì lưu tên file hiện tại
        $filename = $user['avatar'];
        if ($avatars['error'] == 0) {
            $dir_upload = 'uploads';
            if (!file_exists($dir_upload)) {
                mkdir($dir_upload);
            }
            // Xóa file cũ để tránh nặng hệ thống,
            //thêm @ để bỏ qua lỗi warning khi file cần xóa
            //ko tồn tại
            @unlink("$dir_upload/$filename");
            $filename = time() . "-" . $avatars['name'];
            move_uploaded_file($avatars['tmp_name'],
                "$dir_upload/$filename");
        }
        // + Kết nối CSDL để update vào DB
        // B1:
        $sql_update = "UPDATE users 
SET name='$name',age=$age,avatar='$filename' WHERE id=$id";
        // B2:
        $is_update = mysqli_query($connection, $sql_update);
        var_dump($is_update);
        if ($is_update) {
            $_SESSION['success'] = 'Update thành công';
            header('Location: index.php');
            exit();
        }
        $error = 'Cập nhật thất bại';
    }
}
//  B7: Đổ lỗi ra form
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h2>Form cập nhật user</h2>
<form action="" method="post" enctype="multipart/form-data">
    Tên:
    <input type="text" value="<?php echo $user['name']?>" name="name" " ><br>
    Tuổi:
    <input type="text" value="<?php echo $user['age']?>" name="age" ><br>
    Ảnh đại diện:
    <input type="file" name="avatar" >
    <img height="60" src="uploads/<?php echo $user['avatar'] ?>" />
    <br>
    <input type="submit" name="submit" value="Cập nhật user">
    <a href="index.php">Về trang danh sách</a>
</form>
