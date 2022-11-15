<!--
security.php
Demo 1 số lỗi bảo mật trong form:
+ XSS: Cross-Site Scripting: tấn công form sử dụng code JS
+ CSRF: Cross-site Request Forgery: tấn công giả mạo (tự tìm hiểu)
-->
<?php
if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    // <script>alert('xss??')</script>
    // Cách chống XSS: cần chuyển đổi các ký tự đặc biệt thành
    //ký tự an toàn trc khi hiển thị ra
    $fullname = htmlspecialchars($fullname);
    echo "Tên của bạn là: $fullname";
}
?>
<form action="" method="post">
    Nhập tên:
    <input type="text" name="fullname" >
    <input type="submit" name="submit" value="Hiển thị tên">
</form>