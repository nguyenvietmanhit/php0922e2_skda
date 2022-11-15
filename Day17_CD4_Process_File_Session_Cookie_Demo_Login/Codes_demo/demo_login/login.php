<!--Tạo cấu trúc sau
demo_login /
           /login.php: đăng nhập
           /profile.php: hiển thị thông tin sau khi đăng nhập
           /logout.php: đăng xuất
-->
<!--login.php-->
<?php
session_start();
// - Check nếu đăng nhập rồi thì chuyển hướng sang trang profile
if (isset($_SESSION['username'])) {
    $_SESSION['success'] = 'Bạn đã đăng nhập rồi, ko thể truy cập
    lại trang login';
    header('Location: profile.php');
    exit();
}

// XỬ LÝ FORM
// B1: Debug:
echo '<pre>';
print_r($_POST);
echo '</pre>';
// B2:
$error = '';
$result = '';
// B3:
if (isset($_POST['login'])) {
    //B4:
    $username = $_POST['username'];
    $password = $_POST['password'];
    // B5:
    if (empty($username) || empty($password)) {
        $error = 'Phải nhập thông tin';
    }
    // B6:
    if (empty($error)) {
        // Xử lý đăng nhập: giả sử login thành công khi pass=123
        if ($password == 123) {
            // Tạo phiên làm việc để lưu lại thông tin đăng nhập
            $_SESSION['username'] = $username;
            $_SESSION['success'] = 'Đăng nhập thành công';
            //Chuyển hướng tới trang profile
            header('Location: profile.php');
            exit();
        } else {
            $error = 'Sai tài khoản/mật khẩu';
        }
    }
}
// B7:
?>
<h3 style="color: red">
    <?php echo $error; ?>
    <?php
    // Nếu tồn tại thì mới hiển thị, sau khi hiển thị thì xóa
    // flash
    if (isset($_SESSION['error'])) {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
    ?>
</h3>
<h3 style="color: green">
    <?php echo $result; ?>
    <?php
    if (isset($_SESSION['success'])) {
        echo $_SESSION['success'];
        unset($_SESSION['success']);
    }
    ?>
</h3>
<h2>Form đăng nhập</h2>
<form action="" method="post">
    Username:
    <input type="text" name="username">
    <br>
    Password:
    <input type="password" name="password">
    <br>
<!-- Checkbox chỉ có 1 thì name ko cần dạng mảng   -->
    <input type="checkbox" name="remember" value="1"> Ghi nhớ đăng nhập
    <br>
    <input type="submit" name="login" value="Đăng nhập">
</form>