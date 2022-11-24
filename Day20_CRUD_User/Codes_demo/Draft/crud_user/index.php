<!--
crud_user/index.php
- Tạo ứng dụng CRUD: Create - Read - Update - Delete: Thêm Sửa
Xóa Liệt kê, là 4 thao tác nền tảng của mọi chức năng trên Web
- CRUD giúp hình dung rõ hơn xây dựng 1 chức năng thực tế ntn
bằng việc code cả frontend và backend
- Tạo cấu trúc file và thư mục sau:
crud_user /
          /index.php: liệt kê user
          /create.php: thêm mới user
          /update.php: cập nhật user
          /delete.php: xóa user
          /connection.php: chứa obj kết nối dùng chung cho CRUD
+ Tạo cấu trúc database:
Database: php0722e_crud
Table: users(id, fullname, age, created_at)
+ Code CRUD: code chức năng nào trước ? C - R - U - D
-->

<!--
crud_user/index.php
- R - Liệt kê user: FeE -> BE, là trang đầu tiên hướng user truy
cập vào, nên dẫn các link sang C U D
-->
<?php
session_start();
require_once 'connection.php';
// LẤy dữ liệu từ CSDL đổ ra bảng:
// - Kết nối CSDL và thực hiện truy vấn SELECT:
// + B1: Viết truy vấn:
$sql_select_all = "SELECT * FROM users ORDER BY created_at DESC";
// + B2: Thực thi: SELECT trả về obj trung gian
$result_all = mysqli_query($connection, $sql_select_all);
// + B3: Lấy mảng kết hợp 2 chiều:
$users = mysqli_fetch_all($result_all, MYSQLI_ASSOC);
echo '<pre>';
print_r($users);
echo '</pre>';
?>
<a href="create.php">Thêm mới user</a>
<h2>Danh sách user</h2>
<table border="1" cellspacing="0" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Fullname</th>
        <th>Age</th>
        <th>Created_at</th>
        <th>Action</th>
    </tr>
    <?php foreach($users AS $user): ?>
        <tr>
            <td><?php echo $user['id']; ?></td>
            <td><?php echo $user['fullname']; ?></td>
            <td><?php echo $user['age']; ?></td>
            <td>
<!--                20/05/2000 20:50:00-->
<?php echo date('d/m/Y H:i:s',
    strtotime($user['created_at'])); ?>
            </td>
            <td>
                <a href="update.php?id=<?php echo $user['id']?>">Sửa</a>
                <a href="delete.php?id=<?php echo $user['id']?>" onclick="return confirm('Delete?')">Xóa</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>