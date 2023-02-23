//frontend/assets/js/script.js
// Ctrl Shift R
// alert('test');
$(document).ready(function() {
    // Click Thêm vào giỏ, gọi ajax để truyền lên PHP xử lý
    $('.add-to-cart').click(function() {
        // Lấy id của sp đang click
        var product_id = $(this).attr('data-id'); //attribute
        // alert(product_id)
        // Gọi ajax để truyền dữ liệu PHP
        $.ajax({
            // url mvc của PHP để xử lý dữ liệu truyền lên
            url: 'index.php?controller=cart&action=add',
            // Phương thức gửi dữ liệu lên: get, post, put, delete
            method: 'get',
            // Dữ liệu gửi kèm lên:
            data: {
                product_id: product_id,
                // quantity:
            },
            // Hàm nhận dữ liệu trả về từ PHP thông qua tham số data
            success: function(data) {
                //Để xem ajax hoạt động, thì Inspect -> Network ->
                // lọc theo Fetch/XHR để chỉ lấy các ajax
                // console.log(data);
                $('.ajax-message').html('Thêm sp vào giỏ thành công');
                $('.ajax-message').addClass('ajax-message-active');

                // Sau 3s ẩn message
                setTimeout(function() {
                    $('.ajax-message').removeClass('ajax-message-active');
                }, 3000)

                // Update lại số lượng tương ứng cho giỏ
                var amount = $('.cart-amount').text();
                amount++;
                $('.cart-amount').text(amount);
            }
        });
    })
})
