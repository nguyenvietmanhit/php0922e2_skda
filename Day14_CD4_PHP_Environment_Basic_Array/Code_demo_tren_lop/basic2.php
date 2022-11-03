<?php
//basic2.php
// 1 - Toán tử
// + Toán tử số học + - * / % ++ --
// + Toán tử so sánh: == > >= < <= !=
// + Toán tử logic: && || !
// + Toán tử gán: = += -= *= /= *=
// 2 - Câu lệnh điều kiện:
// + if else elseif
// + switch case
// - Toán tử điều kiện, thay thế cho if else
$number = 5;
if ($number > 0) {
    echo 'Number > 0';
} else {
    echo 'Number <= 0';
}
echo $number > 0 ? 'Number > 0' : 'Number <= 0';
// - Thẻ viết tắt if else elseif
// + Hiển thị 1 bảng HTML có 2 hàng, mỗi hàng 2 cột  nếu như
//biến number > 0
$number = 5;
if ($number > 0) {
    echo '<table border="1" cellspacing="0" cellpadding="8">';
        echo '<tr>';
            echo '<td>A</td>';
            echo '<td>B</td>';
        echo '</tr>';
        echo '<tr>';
            echo '<td>A</td>';
            echo '<td>B</td>';
        echo '</tr>';
    echo '</table>';
}
?>
<?php if ($number > 0): ?>
    <table border="1" cellspacing="0" cellpadding="8">
        <tr>
            <td>A</td>
            <td>B</td>
        </tr>
        <tr>
            <td>A</td>
            <td>B</td>
        </tr>
    </table>
<?php endif; ?>

<?php if ($number == 0): ?>
    <h2>Number = 0</h2>
<?php elseif ($number == 1): ?>
    <h2>Number = 1</h2>
<?php elseif ($number == 2): ?>
    <h2>Number = 2</h2>
<?php else: ?>
    <h2>Number != 0 1 2</h2>
<?php endif; ?>
<?php
// 3 - Vòng lặp: for while do...while
// 4 - Từ khóa break, continue trong vòng lặp
?>
