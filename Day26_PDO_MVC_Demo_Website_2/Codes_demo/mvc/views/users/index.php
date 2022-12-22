<!--views/users/index.php-->
<?php
echo '<pre>';
print_r($users);
echo '</pre>';
?>
<h2>Danh sách user</h2>
<a href="index.php?controller=user&action=create">Thêm mới</a>
<table border="1" cellspacing="0" cellpadding="8">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Age</th>
        <th>Avatar</th>
        <th>Created_at</th>
        <th></th>
    </tr>
    <?php foreach ($users AS $user): ?>
    <tr>
        <td><?php echo $user['id']; ?></td>
        <td><?php echo $user['name']; ?></td>
        <td><?php echo $user['age']; ?></td>
        <td>
            <img src="uploads/<?php echo $user['avatar']; ?>"
                 height="50px" >
        </td>
        <td>
<?php echo date('d-m-Y H:i:s',
    strtotime($user['created_at'])) ?>
        </td>
        <td>
            <a
        href="index.php?controller=user&action=update&id=<?php echo $user['id']?>">Sửa</a>
            <a href="index.php?controller=user&action=delete&id=<?php echo $user['id']?>" onclick="return confirm('Delete?')">Xóa</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>