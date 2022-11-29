<!--delete.php-->
<?php
session_start();
require_once 'connection.php';
// - Lấy id từ url: crud_user/delete.php?id=1
// Validate id hợp lệ: phải tồn tại tham số id và phải là số
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    $_SESSION['error'] = 'Id ko hợp lệ';
    header('Location: index.php');
    exit();
}
$id = $_GET['id'];
// - Truy vấn CSDL để xóa user theo id: SOFT DELETE
// B1:
$sql_delete = "DELETE FROM users WHERE id = $id";
// B2:
$is_delete = mysqli_query($connection, $sql_delete);
if ($is_delete) {
    $_SESSION['success'] = 'Xóa thành công';
} else {
    $_SESSION['error'] = 'Xóa thất bại';
}
header('Location: index.php');
exit();