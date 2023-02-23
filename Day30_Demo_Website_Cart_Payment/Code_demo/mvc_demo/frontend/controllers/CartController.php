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
		$this->page_title = 'Giỏ hàng của bạn';
		$this->content = $this->render('views/carts/index.php');
		require_once 'views/layouts/main.php';
	}
}
