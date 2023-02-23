<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';

class CartController extends Controller
{
	// index.php?controller=cart&action=add&id=1
	public function add() {
		$product_id = $_GET['product_id'];
		//Lấy sản phẩm theo id
		$product_model = new Product();
		$product = $product_model->getById($product_id);
		// Tạo mảng lưu lại thông tin cần thiết trong giỏ:
		$product_cart = [
			'name' => $product['title'],
			'price' => $product['price'],
			'avatar' => $product['avatar'],
			'quantity' => 1
		];
		// Logic thêm sp vào giỏ:
		// Nếu sp chưa tồn tại thì thêm mới, nếu tồn tại thì chỉ
		//cập nhật quantity
		if (!isset($_SESSION['cart'])) {
			$_SESSION['cart'][$product_id] = $product_cart;
		} else {
			if(isset($_SESSION['cart'][$product_id])) {
				$_SESSION['cart'][$product_id]['quantity']++;
			} else {
				$_SESSION['cart'][$product_id] = $product_cart;
			}
		}
		echo '<pre>';
		print_r($_SESSION['cart']);
		echo '</pre>';
	}

	// index.php?controller=cart&action=index
	public function index() {
		// Xử lý cập nhật lại giỏ hàng:
		echo '<pre>';
		print_r($_POST);
		print_r($_SESSION['cart']);
		echo '</pre>';
		if (isset($_POST['submit'])) {
			foreach ($_SESSION['cart'] AS $product_id => $cart_item) {
				// Validate số lượng phải > 0
				if ($_POST[$product_id] < 0) {
					$_SESSION['error'] = 'Số lượng phải > 0';
					header('Location: gio-hang-cua-ban.html');
					exit();
				}

				$_SESSION['cart'][$product_id]['quantity'] = $_POST[$product_id];
			}
			$_SESSION['success'] = 'Cập nhật thành công';
		}

		$this->page_title = 'Giỏ hàng của bạn';
		$this->content = $this->render('views/carts/index.php');
		require_once 'views/layouts/main.php';
	}

	public function delete() {
		echo '<pre>';
		print_r($_GET);
		echo '</pre>';
		$product_id = $_GET['id'];
		unset($_SESSION['cart'][$product_id]);
		$_SESSION['success'] = 'Xóa thành công';
		// Nếu xóa phần tử cuối cùng của giỏ, xóa giỏ hàng luôn
		if (empty($_SESSION['cart'])) {
			unset($_SESSION['cart']);
		}

		header('Location: gio-hang-cua-ban.html');
		exit();
	}
}
