<!--crud_user /-->
<!--          /index.php: hiển thị ds user - R-->
<!--          /create.php: thêm mới user - C-->
<!--          /update.php: cập nhật user - U-->
<!--          /delete.php: xóa user - D-->
<!--          /connection.php: code kết nối sd chung cho CRUD-->
<!--- CRUD: Create Read Update Delete - là ứng dụng cơ bản-->
<!--nhất của mọi chức năng trong thực tế-->
<!--Là cách tiếp cận tốt nhất ban đầu khi muốn học 1 ngôn-->
<!--ngữ-->
<!--1 - Tạo CSDL: php0922e2_crud-->
<!--Bảng users:-->
<!--id: khóa chính-->
<!--name: tên user, VARCHAR-->
<!--age: tuổi, TINYINT-->
<!--avatar: tên file, VARCHAR-->
<!--created_at: ngày tạo-->
<!--2 - Code CRUD:-->
<!--Code chức năng nào trc ? Create để sinh dữ liệu -> R - U - D-->

<!--index.php-->
<?php
session_start();
require_once 'connection.php';
// - Truy vấn CSDL lấy tất cả user theo thứ tự mới nhất
// + B1: Viết truy vấn:
$sql_select_all = "SELECT * FROM users ORDER BY created_at DESC";
// + B2: Thực thi: SELECT trả về obj trung gian
$result_all = mysqli_query($connection, $sql_select_all);
// + B3: Mảng kết hợp 2 chiều chứa các user:
$users = mysqli_fetch_all($result_all, MYSQLI_ASSOC);
echo '<pre>';
print_r($users);
echo '</pre>';
?>
<h2>Danh sách user</h2>
<a href="create.php">Thêm mới</a>
<table border="1" cellspacing="0" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Age</th>
        <th>Avatar</th>
        <th>Created_at</th>
        <th></th>
    </tr>
    <?php foreach($users AS $user): ?>
    <tr>
        <td><?php echo $user['id']; ?></td>
        <td><?php echo $user['name']; ?></td>
        <td><?php echo $user['age']; ?></td>
        <td>
            <img src="uploads/<?php echo $user['avatar']; ?>"
                 height="60px">
        </td>
        <td>
<!--            24-11-2022 20:38:45-->
<!--          2022-11-24 20:38:45  -->
            <?php
            echo date('d-m-Y H:i:s',
                strtotime($user['created_at']));
            ?>
        </td>
        <td>
            <a href="update.php?id=<?php echo $user['id']; ?>">Sửa</a>
            <a href="delete.php?id=<?php echo $user['id']; ?>" onclick="return confirm('Xóa?')">Xóa</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
