<?php
session_start();
echo '<pre>';
print_r($_SESSION);
echo '</pre>';
//test_session.php
// Thao tác với session ở 1 file khác:
// - Cần xử lý lỗi liên quan đến thao tác với session ko tồn tại
echo isset($_SESSION['address']) ? $_SESSION['address'] : '';