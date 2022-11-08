<?php
//array.php
// Kiểu dữ liệu mảng
// 1 - Định nghĩa
// + Là kiểu dữ liệu có cấu trúc
// + Lưu đc nhiều giá trị tại 1 thời điểm, các giá trị có thể
//có thể là bất cứ kiểu dữ liệu nào
// Bài toán, lưu trữ tên của 500 anh em và hiển thị ra toàn bộ
//500 tên đó
$name1 = 'a';
$name2 = 'b';
$name3 = 'c';
echo $name1;
echo $name2;
echo $name3;
// 2 - Cú pháp khai báo: 2 cách
// C1: dùng cho mọi phiên bản PHP
$names = array('a', 'b', 'c');
// C2: dùng chi PHP >= 5.4
$names = ['a', 'b', 'c'];
// 3 - Thuật ngữ
// + element: là phần tử mảng
// + key - value: đặc trưng cho từng phần tử mảng, để xác định
//đc chính xác 1 phần tử mảng, bắt buộc phải dựa vào key của nó
$numbers = [2, 4, 6, 8];
// Phần tử mảng có key = 2, value = 6
// Phần tử mảng có key = 3, value = 8
// Phần tử mảng có key = 4, value = lỗi undefined
// 4 - Thao tác thủ công để lấy giá trị mảng:
echo $numbers[2]; //6
echo $numbers[3]; //8
// echo $numbers[4]; // lỗi undefined
// - Cách debug mảng:
echo '<pre>';
print_r($numbers);
echo '</pre>';
// 5 - Sử dụng vòng lặp để xử lý mảng:
$numbers = [2, 4, 6, 8];
// Lấy số phần tử mảng:
$count = count($numbers); //4
for ($key = 0; $key < $count; $key++) {
    echo $numbers[$key];
}
// -> for, while, do...while khi lặp mảng luôn cần đếm số phần
//tử mảng trc và phải cẩn thận điều kiện lặp -> tốn thao tác và
//ngoài ra chỉ lặp đc cho mảng mà có key là số
// 6 - Vòng lặp foreach: chuyên dùng để lặp mảng
echo "<br>";
$numbers = [2, 4, 6, 8];
// - Dạng đầy đủ key value
foreach ($numbers AS $key => $value) {
    echo "Phần tử mảng có key = $key thì value = $value";
}
// - Dạng khuyết key
foreach ($numbers AS $value) {
    echo "Value = $value";
}
// 7 - Phân loại mảng:
// + Mảng số nguyên/tuần tự: key đều ở dạng số nguyên
$names = ['a', 'b', 'c', 'd'];
// + Mảng kết hợp: key xuất hiện ở dạng chuỗi
$infos = [
    'fullname' => 'manhnv',
    'age' => 32,
    'address' => 'HN'
];
echo '<pre>';
print_r($infos);
echo '</pre>';
// LẤy thủ công:
echo $infos['fullname']; //manhnv
echo $infos['address']; //HN
// Lấy dùng vòng lặp:
foreach ($infos AS $string => $info) {
    echo "Key: $string, value: $info";
}
// + Mảng đa chiều: mảng trong mảng
$infos = [
    'class_name' => 'php0922e',
    'amount' => 20,
    'province' => [
        'HN',
        'NĐ',
        'BN' => ['a', 'b', 'c']
    ]
];
// Lấy thủ công
echo $infos['province'][0]; //HN
echo $infos['province']['BN'][1]; //b
echo '<pre>';
print_r($infos);
echo '</pre>';
// Vòng lặp:
foreach ($infos AS $key => $value) {
    // echo "<br>Key: $key, value: $value";
    // Cẩn thận khi echo trong mảng đa chiều
}
// => mảng càng nhiều càng phức tạp, nếu mảng do bạn tự định
//nghĩa chỉ nên dừng ở tối đa 3 chiều
// 8 - Thẻ viết tắt foreach
// + Dùng khi hiển thị HTML phức tạp
$class = ['HTML', 'CSS', 'JS', 'PHP'];
?>
<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>Tên lớp</th>
    </tr>
    <?php foreach ($class AS $language): ?>
        <tr>
            <td><?php echo $language; ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<?php
// 9 - Một số hàm PHP thao tác với mảng
// + Tính tổng mảng:
$numbers = [1, 2, 3];
$s = array_sum($numbers); //6
// + Ktra tồn tại phần tử mảng theo key hay ko: isset
$names = ['a', 'b', 'c'];
$check = isset($names[4]); //false
var_dump($check);
// + Đếm số phần tử mảng: count
// + Chuyển chuỗi thành mảng dựa vào ký tự phân tách: explode
$str = 'Hello manhnv 123';
$arrs = explode(' ', $str);
echo '<pre>';
print_r($arrs);
echo '</pre>';
// + Chuyển mảng về chuỗi: implode
// + Xóa phần tử mảng: unset
$numbers = [1, 2, 3];
unset($numbers[2]);
echo '<pre>';
print_r($numbers);
echo '</pre>';
?>