<!--security.php
- Hai lỗi bảo mật cơ bản trong form
+ XSS: Cross-Site Scripting, tấn công form thông qua đoạn code JS
+ CSRF: Cross-Site Request Forgery, tấn công giả mạo
shoppe.com/edit?user_id=1
shoppe.com/delete?user_id=1

Gửi mail:
    <a href= 'shoppe.com/delete?user_id=1'>
        <img src='mat-me.jpg'>
    </a>
Demo XSS
-->
<?php
if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    // - Nguyên tắc: ko tin tưởng dữ liệu từ user, để chống XSS,
    //dùng hàm sau của PHP:
    $fullname = htmlspecialchars($fullname);
    echo "Tên của bạn: $fullname";
    // <script>alert('hello')</script>
}
?>
<form action="" method="post">
    Nhập tên:
    <input type="text" name="fullname" >
    <input type="submit" name="submit" value="Hiển thị">
</form>