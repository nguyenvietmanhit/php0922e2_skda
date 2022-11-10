<!--upload_file.php
- Xử lý upload file trong form
-->
<?php
// XỬ LÝ FORM: 8 bước
// B1: Debug:
echo '<pre>';
print_r($_FILES);
echo '</pre>';
// Mặc định $_POST, $_GET chỉ bắt đc tên file nên ko đủ để xử lý
//upload file, mà bắt buộc phải dùng mảng sau để bắt thông tin file:
// $_FILES
// - Form cần thỏa mãn 2 điều kiện sau để biến $_FILES hoạt động:
// + Method = POST
// + enctype = 'multipart/form-data'
// - Các thuộc tính của $_FILES:
// + name: tên file
// + ful_path: tên file
// + type: kiểu file
// + tmp_name: temporary name, đường dẫn tạm đang lưu file khi
//chọn file xong
// + error: mã lỗi, chỉ cần quan tâm error = 0 thì là có file
//đc tải lên thư mục tạm thành công và ko lỗi
// + size: kích thước file, Byte. 1Mb = 1024Kb = 1024 * 1024 B
// - B2: Khai báo biến:
$error = '';
$result = '';
// - B3: Ktra submit form:
if (isset($_POST['upload'])) {
    // - B4: lấy giá trị form:
    $avatars = $_FILES['avatar'];
    // - B5: Validate:
    // + File upload phải là ảnh
    // + Dung lương file ko đc vượt quá 2Mb
    // Luôn phải đảm bảo có file đc tải lên thư mục tạm thành
    //công thì mới xử lý đc file
    if ($avatars['error'] == 0) {
        // + File upload phải là ảnh:
        // Lấy đuôi file
        $extension = pathinfo($avatars['name'], PATHINFO_EXTENSION);
        $extension = strtolower($extension);
        // So sánh đuôi file với mảng: png, jpg, jpeg, gif
        $allows = ['png', 'jpg', 'jpeg', 'gif'];
        if (!in_array($extension, $allows)) {
            $error = 'File upload phải là ảnh';
        }
        // + Dung lương file ko đc vượt quá 2Mb:
        $size_b = $avatars['size'];
        $size_mb = $size_b / 1024 / 1024;
        if ($size_mb > 2) {
            $error = 'Dung lương file ko đc vượt quá 2Mb';
        }
    }
    // + B6: Xử lý logic chính chỉ khi ko có lỗi: upload file
    if (empty($error)) {
        // - Xử lý upload file
        // Chỉ xử lý upload file nếu có file đc tải lên thành công
        //vào thư mục tạm
        if ($avatars['error'] == 0) {
            // Tạo thư mục lưu trữ file sẽ upload: tạo bằng code
            $dir_uploads = 'uploads';
            // Ktra thư mục chưa tồn tại thì mới tạo
            if (!file_exists($dir_uploads)) {
                mkdir($dir_uploads);
            }
            // Tạo tên file mang tính duy nhất:
            // 43432432-abc.png
            $file_name = time(). "-" . $avatars['name'];
            // Chuyển file từ thư mục tạm vào thư mục upload
            $is_upload = move_uploaded_file($avatars['tmp_name']
            , "$dir_uploads/$file_name");
            var_dump($is_upload);
            if ($is_upload) {
                $result .= "Ảnh đại diện: ";
                $result .= "<img src='$dir_uploads/$file_name' height='60px'>";

            }
        }
    }
}
// + B7
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result; ?></h3>
<form action="" method="post" enctype="multipart/form-data">
    Chọn ảnh đại diện:
    <input type="file" name="avatar" />
    <br>
    <input type="submit" name="upload" value="Upload file" />
</form>