<?php
//profile.php
session_start();

// - Cần check nếu login thành công thì mới cho truy cập trang này
if (!isset($_SESSION['username'])) {
    $_SESSION['error'] = 'Bạn chưa đăng nhập';
    header('Location: login.php');
    exit();
}

echo '<pre>';
print_r($_SESSION);
echo '</pre>';
//Session flash
if (isset($_SESSION['success'])) {
    echo $_SESSION['success'];
    unset($_SESSION['success']);
}
echo "<br>Chào bạn: " . $_SESSION['username'];
echo "<a href='logout.php'>Logout</a>";