<!--form_1.php
1/ Form là gì?
+ Là nơi user nhập thông tin, sau đó submit form để thông tin
đc gửi lên server xử lý
2/ Xử lý form:
 + Thông tin ở dạng cơ bản: text, số, radio, checkbox ..
 + Thông tin ở dạng file
-->
<!--
Thuộc tính của form:
+ action: đường dẫn xử lý thông tin từ form gửi lên,  chuỗi rỗng
tương đương với file hiện tại xử lý submit
+ method: phương thức truyền dữ liệu lên server: post và get
- post: truyền ngầm dữ liệu
- get: dữ liệu truyền lên url theo dạng ?name1=value1&name2=value2,
ko sử dụng form có dữ liệu nhạy cảm như mật khẩu ...
Get sử dụng cho các chức năng thuần về lấy dữ liệu: tìm kiếm
+ PHP tạo ra sẵn biến dạng mảng để bắt thông tin từ form gửi lên
dựa theo method form, get -> $_GET, post -> $_POST
-->
<?php
// QUY TRÌNH 8 bước xử lý form:
// - B1: Debug: dựa vào method của form để debug mảng tương ứng
echo '<pre>';
print_r($_POST);
echo '</pre>';
// - B2: Tạo biến chứa lỗi và kết quả để hiển thị ra form
$error = '';
$result = '';
// - B3: Ktra nếu form được submit rồi thì mới xử lý form:
if (isset($_POST['show'])) {
    // - B4: Lấy giá trị của form gửi lên để thao tác cho dễ
    $fullname = $_POST['fullname'];
    // - B5: Validate form: đổ thông tin lỗi vào biến error
    // + Tên ko đc để trống: empty
    // + Tên tối thiểu 3 ký tự: strlen
    if (empty($fullname)) {
        $error = 'Tên ko đc để trống';
    } elseif (strlen($fullname) < 3) {
        $error = 'Tên ít nhất 3 ký tự';
    }
    // - B6: Xử lý logic chính của bài toán chỉ khi ko có lỗi
    if (empty($error)) {
        $result = "Tên của bạn là: $fullname";
    }
}
// - B7: Đổ thông tin lỗi và kết quả ra form
// - B8: Đổ dữ liệu ra input của form sau khi submit -> trải
//nghiệm người dùng
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result; ?></h3>
<form action="" method="post">
    Nhập tên của bạn:
<!--  Các input bắt buộc phải khai báo thuộc tính name, để PHP
  biết đc dữ liệu đc gửi lên từ input nào -->
    <input type="text" name="fullname"
value="<?php echo isset($_POST['fullname']) ? $_POST['fullname'] : '' ?>"/>
    <br>
<!--  Nút submit form-->
    <input type="submit" name="show" value="Hiển thị" />
</form>
