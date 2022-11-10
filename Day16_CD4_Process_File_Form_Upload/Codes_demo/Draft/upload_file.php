<!--
upload_file.php
- Form có 2 dạng input:
+ Dạng cơ bản:giá trị nhìn thấy đc: text, number, radio, checkbox..
+ Dạng file: giá trị ko đọc đc
-->
<?php
// - Hai điều kiện bắt buộc để form bắt đc hết thông tin của file:
// + Method form = POST
// + Form phải có thêm thuộc tính: enctype="multipart/form-data"
// - PHP dùng biến dạng mảng 2 chiều $_FILES lưu toàn bộ thông
//tin của file gửi lên
// - Các thuộc tính của $_FILES:
// + name: tên file
// + full_path: tên file
// + tmp_name: temporary, là đường dẫn tạm thời lưu file tải lên
//ngay sau khi chọn file xong
// + error: mã lỗi, nếu error = 0 là ko có lỗi, file đc tải
//vào đường dẫn tạm thành công, ngược lại là có lỗi
// + size: dung lượng file, tính bằng Byte
// 1Mb = 1024Kb = 1024 * 1024 Byte, 1 Byte = 8 bit
// - B1: Debug:
echo '<pre>';
print_r($_POST);
print_r($_FILES);
echo '</pre>';
// - B2: Tạo biến chứa lỗi và kqua
$error = '';
$result = '';
// - B3: Chỉ xử lý form khi form đã đc submit:
if (isset($_POST['submit'])) {
    // - B4: Lấy giá trị từ form:
    $avatars = $_FILES['avatar']; // mảng 1 chiều
    // - B5: Validate form:
    // + File upload phải là ảnh
    // + Dung lượng ko đc vượt quá 2Mb
    // Điều kiện bắt buộc khi xử lý file là phải có file đc
    //tải lên thành công
    if ($avatars['error'] == 0) {
        // + File upload phải là ảnh
        // - Lấy đuôi file từ tên file
        $extension = pathinfo($avatars['name'], PATHINFO_EXTENSION);
        // - Tạo mảng chứa các đuôi file ảnh:
        $allowed = ['png', 'jpg', 'gif', 'jpeg'];
        if (!in_array($extension, $allowed)) {
            $error = 'File upload phải là ảnh';
        }
        // + Dung lượng ko vượt quá 2MB:
        // 1MB = 1024 KB = 1024 * 1024 B
        $size_b = $avatars['size'];
        $size_mb = $size_b / 1024 / 1024;
        if ($size_mb > 2) {
            $error = 'Dung lượng ko vượt quá 2MB';
        }


    }
    // - B6: Xử lý logic chính chỉ khi ko có lỗi:
    if (empty($error)) {
        // + Xử lý upload file nếu như có file đc tải lên thành công
        if ($avatars['error'] == 0) {
            // - Tạo đường dẫn tương đối tới thư mục sẽ lưu file
            $dir_upload = 'uploads';
            // - Bắt buộc phải tạo thư mục trên bằng code: mkdir
            //, luôn phải kiểm tra nếu đường dẫn chưa tồn tại
            //thì mới tạo mới, để tránh ghi đè thư mục: file_exists
            if (!file_exists($dir_upload)) {
                mkdir($dir_upload);
            }
            // - Sinh ra tên file mang tính duy nhất: để tránh sự ghi
            //đè của các file trùng tên khi upload
            $filename = time() . "-" . $avatars['name'];
            // 432423432-anh.jpg
            // 432423433-anh.jpg
            // - Upload file từ đường dẫn tạm vào thư mục uploads
            $is_upload = move_uploaded_file($avatars['tmp_name'],
            "$dir_upload/$filename");
            var_dump($is_upload);
            if ($is_upload) {
                $result .= "Tên file: $filename <br>";
                $size_mb = $avatars['size'] / 1024 / 1024;
                $result .= "Dung lượng: $size_mb MB <br>";
                $result .=
                "Ảnh đại diện: <img src='$dir_upload/$filename' height='80px'>";
            }
        }
    }
}
// - B7: Đổ thông tin lỗi và kết quả ra form
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result; ?></h3>
<form action="" method="post" enctype="multipart/form-data">
    Chọn ảnh đại diện:
<!--  Thuộc tính value của input file ko đc dùng  -->
    <input type="file" name="avatar">
    <br>
    <input type="submit" name="submit" value="Hiển thị">
</form>
