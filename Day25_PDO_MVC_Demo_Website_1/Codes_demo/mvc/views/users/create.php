<!--views/users/create.php-->

<h2>Form thêm mới user</h2>
<form action="" method="post" enctype="multipart/form-data">
    Tên:
    <input type="text" name="name"><br>
    Tuổi:
    <input type="number" name="age"><br>
    Ảnh đại diện
    <input type="file" name="avatar"><br>
    <input type="submit" name="submit" value="Lưu">
    <a href="index.php?controller=user&action=index">
        Về trang danh sách
    </a>
</form>