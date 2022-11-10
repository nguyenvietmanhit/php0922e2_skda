<!--process_form_2.php-->
<?php
// + B1: Debug
echo '<pre>';
print_r($_GET);
echo '</pre>';
// + B2: Khai báo biến chứa lỗi và kết quả
$error = '';
$result = '';
// + B3: Check nếu submit form thì mới xử lý:
if (isset($_GET['submit'])) {
    // + B4: Lấy giá trị form:
    $email = $_GET['email'];
    $age = $_GET['age'];
    // - Báo lỗi ở radio và checkbox nếu như ko tích chọn
    //, cần chú ý với 2 input này
    // $gender = $_GET['gender'];
    // $jobs = $_GET['jobs'];
    $country = $_GET['country'];
    $note = $_GET['note'];
    // + B5: Validate:
    // - Email phải đúng định dạng
    // - Tuổi phải là số
    // - Gender và Jobs bắt buộc phải chọn
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Email phải đúng định dạng';
    } else if (!is_numeric($age)) {
        $error = 'Tuổi phải là số';
    } else if (!isset($_GET['gender'])) {
        $error = 'Phải chọn giới tính';
    } else if (!isset($_GET['jobs'])) {
        $error = 'Phải chọn ít nhất 1 job';
    }
    // + B6: Xử lý logic bài toán chỉ khi hệ thống ko có lỗi
    if (empty($error)) {
        $result = "Email: $email <br>";
        $result .= "Age: $age <br>";
        // Xử lý gender
        $gender = $_GET['gender'];
        $gender_text = '';
        switch ($gender) {
            case 0: $gender_text = 'Nữ';break;
            case 1: $gender_text = 'Nam';break;
            case 2: $gender_text = 'Khác';break;
        }
        $result .= "Gender: $gender_text <br>";
        // Xử lý jobs
        $jobs = $_GET['jobs']; //
        $job_text = '';
        foreach ($jobs AS $job) {
            switch ($job) {
                case 0: $job_text .= 'Dev ';break;
                case 1: $job_text .= 'Tester ';break;
                case 2: $job_text .= 'BA ';break;
            }
        }
        $result .= "Nghề nghiệp: $job_text <br>";
        // Select xử lý giống hệt radio, Textarea giống hệt input
        //thường
    }
}
// + B7: Hiển thị error và result ra form
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result; ?></h3>
<!-- + B8: Đổ lại dữ liệu ra form -->
<form action="" method="GET">
    Nhập email:
    <input type="text" name="email"
value="<?php echo isset($_GET['email']) ? $_GET['email'] : ''?>" >
    <br>
    Nhập tuổi:
    <input type="text" name="age"
value="<?php echo isset($_GET['age']) ? $_GET['age'] : ''?>" >
    <br>
    Chọn giới tính:
    <?php
    // Có bao nhiêu radio thì tạo từng đó biến để lưu lại
    //thuộc tính checked tương ứng
    $checked_female = '';
    $checked_male = '';
    $checked_another = '';
    if (isset($_GET['gender'])) {
        $gender = $_GET['gender'];
        switch ($gender) {
            case 0: $checked_female = 'checked';break;
            case 1: $checked_male = 'checked';break;
            case 2: $checked_another = 'checked';
        }
    }
    ?>
<!--  PHP dựa vào value của radio để biết đc chọn radio nào  -->
    <input type="radio" <?php echo $checked_female ?>  name="gender" value="0" > Nữ
    <input type="radio" <?php echo $checked_male ?> name="gender" value="1"> Nam
    <input type="radio" <?php echo $checked_another ?> name="gender" value="2"> Khác
    <br>
    Chọn nghề nghiệp:
<!--  Với các input có thể chọn nhiều giá trị tại 1 thời điểm
  , name bắt buộc phải ở dạng mảng: checkbox, select multiple,
  file multiple-->
    <?php
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
    <input <?php echo $checked_dev ?> type="checkbox" name="jobs[]" value="0">Dev
    <input <?php echo $checked_tester ?> type="checkbox" name="jobs[]" value="1">Tester
    <input <?php echo $checked_ba ?> type="checkbox" name="jobs[]" value="2">BA
    <br>
    Chọn quốc gia:
    <?php
    $selected_vn = '';
    $selected_kr = '';
    $selected_jp = ''
//    Logic set selected giống hệt radio
    ?>
    <select name="country">
        <option <?php echo $selected_vn ?> value="0">Viet Nam</option>
        <option <?php echo $selected_kr ?> value="1">Korea</option>
        <option <?php echo $selected_jp ?> value="2">Japan</option>
    </select>
    <br>
    Ghi chú:
    <textarea name="note" cols="10">
        <?php echo isset($_GET['note']) ? $_GET['note'] : ''?></textarea>
    <br>
    <input type="submit" name="submit" value="Show">
</form>