<?php
require_once 'controllers/Controller.php';
require_once 'models/Order.php';
require_once 'models/OrderDetail.php';
require_once 'libraries/PHPMailer/src/PHPMailer.php';
require_once 'libraries/PHPMailer/src/SMTP.php';
require_once 'libraries/PHPMailer/src/Exception.php';

class PaymentController extends Controller
{
	// index.php?controller=payment&action=index
	public function index() {
		// Xử lý submit form
		echo '<pre>';
		print_r($_POST);
		echo '</pre>';
		if (isset($_POST['submit'])) {
			$fullname = $_POST['fullname'];
			$address = $_POST['address'];
			$mobile = $_POST['mobile'];
			$email = $_POST['email'];
			$note = $_POST['note'];
			$method = $_POST['method']; // 0 - online, 1 - cod
			// Validate bỏ qua:
			if (empty($this->error)) {
				// Lưu vào bảng orders trc, r đến order_details
				$payment_status = 0; //mặc định là chưa thanh toán
				// Tổng giá trị đơn hàng
				$price_total = 0;
				foreach ($_SESSION['cart'] AS $cart_item) {
					$price_item = $cart_item['price'] * $cart_item['quantity'];
					$price_total += $price_item;
				}
				$order_model = new Order();
				// Cần trả về id sau khi insert để lưu tiếp vào bảng order_details
				$order_id = $order_model->insertData($fullname, $address,
					$mobile, $email, $note, $price_total, $payment_status);
//				var_dump($order_id);
				/// Lưu tiếp vào bảng order_details
				// order_id, product_name, product_price, quantity
				foreach ($_SESSION['cart'] AS $cart_item) {
					$order_detail_model = new OrderDetail();
					$is_insert = $order_detail_model->insertData($order_id,
						$cart_item['name'],
						$cart_item['price'],
						$cart_item['quantity']);
//					var_dump($is_insert);
				}
				// - Gửi mail dựa vào email của KH:
				// - Nếu chọn TT online, thì chuyển hướng sang trang thanh toán
				//online, sử dụng thư viện của Ngân lượng (libraries/nganluong)
				if ($method == 0) {
					$_SESSION['payment'] = [
						'price_total' => $price_total,
						'fullname' => $fullname,
						'email' => $email,
						'mobile' => $mobile,
					];
					header('Location:index.php?controller=payment&action=online');
					exit();
				}
				// COD
				// chuyển hướng tới trang cảm ơn
			}
		}

		$this->page_title = 'Trang thanh toán';
		$this->content = $this->render('views/payments/index.php');
		require_once 'views/layouts/main.php';
	}

	public function online() {
		$this->page_title = 'TT online';
		$this->content = $this->render('libraries/nganluong/index.php');
		require_once 'views/layouts/main.php';
	}
}
