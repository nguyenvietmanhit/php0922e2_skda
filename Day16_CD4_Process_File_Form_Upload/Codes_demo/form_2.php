<!--form_2.php
Xử lý form với input radio, checkbox, selectbox, textarea
-->
<?php
// XỬ LÝ FORM: 8 bước
// + B1: Debug:
echo '<pre>';
print_r($_GET);
echo '</pre>';
// + B2: Khai báo error và result:
$error = '';
$result = '';
// + B3: Ktra nếu submit form thì mới xử lý form:
if (isset($_GET['show'])) {
    // + B4: Lấy giá trị từ form:
    $email = $_GET['email'];
    // Cần chú ý nếu ko chọn radio/checkbox nào thì PHP ko
    //bắt đc dữ liệu:
//    $gender = $_GET['gender'];
//    $jobs = $_GET['jobs'];
    $country = $_GET['country'];
    $note = $_GET['note'];
    // + B5: Validate form:
    // - Phải nhập tất cả các trường
    // - Email phải đúng định dạng
    if (empty($email)) {
        $error = 'Phải nhập email';
    } elseif (!isset($_GET['gender'])) {
        $error = 'Phải chọn giới tính';
    } elseif (!isset($_GET['jobs'])) {
        $error = 'Phải chọn nghề nghiệp';
    } elseif (empty($note)) {
        $error = 'Phải nhập ghi chú';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Email phải đúng định dạng';
    }
    // + B6: Xử lý logic bài toán chỉ khi ko có lỗi
    if (empty($error)) {
        $result .= "Email: $email";
        // Giới tính:
        $gender = $_GET['gender'];
        $gender_text = 'Nam';
        if ($gender == 2) {
            $gender_text = 'Nữ';
        }
        $result .=  "<br> Giới tính: $gender_text";
        // Nghề nghiệp:
        $jobs = $_GET['jobs'];
        $result .= "<br> Nghề nghiệp: ";
        foreach ($jobs AS $job) {
            switch ($job) {
                case 0: $result .= "Dev ";break;
                case 1: $result .= "Tester ";break;
                case 2: $result .= "BA ";
            }
        }
        // Quốc gia: select xử lý giống radio
        $country_text = 'VN';
        if ($country == 1) {
            $country_text = 'JP';
        }
        $result .= "<br> Quốc gia: $country_text";
        // Ghi chú:
        $result .= "<br> Ghi chú: $note";
    }
}
// + B7: Hiển thị error và result ra form
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result; ?></h3>
<!-- + B8: Giữ lại các giá trị đã nhập cho form -->
<form action="" method="get">
    Nhập email:
    <input type="text" name="email"
value="<?php echo isset($_GET['email']) ? $_GET['email'] : ''?>"
    >
    <br>
    Chọn giới tính:
<!--  Bắt buộc phải set value cụ thể cho radio  -->
    <?php
    // Có bao nhiêu radio tạo ra từng đó biến để lưu checked:
    $checked_male = '';
    $checked_female = '';
    if (isset($_GET['gender'])) {
        $gender = $_GET['gender'];
        switch ($gender) {
            case 1: $checked_male = 'checked';break;
            case 2: $checked_female = 'checked';
        }
    }
    ?>
    <input <?php echo $checked_male; ?> type="radio" name="gender" value="1">Nam
    <input <?php echo $checked_female; ?> type="radio" name="gender" value="2">Nữ
    <br>
    Chọn nghề nghiệp:
<!--  Với các input có thể chọn nhiều value tại 1 thời điểm,
name cần ở dạng mảng: checkbox, select multiple, file multiple-->
    <?php
    // Xử lý tương tự radio
    $checked_dev = '';
    $checked_tester = '';
    $checked_ba = '';
    if (isset($_GET['jobs'])) {
        $jobs = $_GET['jobs'];
        foreach ($jobs AS $job) {
            switch ($job) {
                case 0: $checked_dev = 'checked';break;
                case 1: $checked_tester = 'checked';break;
                case 2: $checked_ba = 'checked';
            }
        }
    }
    ?>
    <input <?php echo $checked_dev; ?> type="checkbox" name="jobs[]" value="0">Dev
    <input <?php echo $checked_tester; ?> type="checkbox" name="jobs[]" value="1">Tester
    <input <?php echo $checked_ba; ?> type="checkbox" name="jobs[]" value="2">BA
    <br>
    Chọn quốc gia:
    <?php
    // select dùng selected tại option để chọn sẵn, xử lý giống
    //hệt radio, chỉ khác là selected thay vì checked
    ?>
    <select name="country">
        <option value="0">VN</option>
        <option value="1">JP</option>
    </select>
    <br>
    Ghi chú:
    <textarea name="note"><?php echo isset($_GET['note']) ? $_GET['note'] : '' ?></textarea>
    <br>
    <input type="submit" name="show" value="Hiển thị"/>

    <input type="reset" name="reset" value="Reset form">
</form>
