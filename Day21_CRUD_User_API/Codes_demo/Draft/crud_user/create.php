<!--crud_user/create.php
- C - Form thêm mới và xử lý thêm mới user:
users(id, fullname, age, created_at)
-->
<?php
session_start();
require_once 'abc\123.txt';
var_dump(__DIR__);
die;
require_once 'connection.php';
// Xử lý form
// B1: Debug:
echo '<pre>';
print_r($_POST);
echo '</pre>';
// B2: Tạo biến chứa lỗi và kết quả:
$error = '';
// B3: Check nếu user submit form thì mới xử lý form
if (isset($_POST['submit'])) {
    // B4: Tạo biến:
    $fullname = $_POST['fullname'];
    $age = $_POST['age'];
    // B5: Validate:
    // - Ko đc để trống 2 trường: empty
    // - Tuổi phải là số: is_numeric
    if (empty($fullname) || empty($age)) {
        $error = 'Ko đc để trống 2 trường';
    } elseif (!is_numeric($age)) {
        $error = 'Tuổi phải là số';
    }
    // B6: Xử lý logic chính là insert vào db chỉ khi nào ko
    //có lỗi
    if (empty($error)) {
        // + Kết nối CSDL:
        // + Thao tác thêm mới:
        // B1: Viết truy vấn:
        $sql_insert = "INSERT INTO users(fullname, age) 
                        VALUES('$fullname', $age)";
        // B2: Thực thi truy vấn: INSERT trả về boolean
        $is_insert = mysqli_query($connection, $sql_insert);
        if ($is_insert) {
            // Chuyển hướng về trang ds kèm thông báo
            $_SESSION['success'] = 'Thêm mới user thành công';
            header('Location: index.php');
            exit();
        }
        // Ngược lại thì là lỗi
        $error = 'Thêm thất bại';
    }
}
// B7: Hiển thị error ra form
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h2>Form thêm mới user</h2>
<!--B8: Đổ dữ liệu ra form-->
<form action="" method="post">
    Họ tên:
    <input type="text" name="fullname"
value="<?php echo isset($_POST['fullname']) ? $_POST['fullname'] : ''?>" />

    <br />
    Tuổi:
    <input type="text" name="age"
value="<?php echo isset($_POST['age']) ? $_POST['age'] : ''?>" />
    <br/>
    <input type="submit" name="submit" value="Lưu user" />
    <a href="index.php">Về trang danh sách</a>
</form>
