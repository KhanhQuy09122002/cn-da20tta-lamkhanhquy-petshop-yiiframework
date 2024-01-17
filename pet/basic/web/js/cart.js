// Trong tệp cart-interactions.js
$(document).ready(function() {
    // Đặt mã JavaScript và jQuery ở đây
    // Ví dụ: xử lý sự kiện khi người dùng thay đổi số lượng sản phẩm
    $('input[name="quantity"]').on('change', function() {
        var itemId = $(this).siblings('input[name="itemId"]').val();
        var newQuantity = $(this).val();
        
        // Gọi Ajax để cập nhật giỏ hàng
        $.ajax({
            url: '/products/updatecart',
            type: 'POST',
            dataType: 'json',
            data: {
                item_id: itemId,
                quantity: newQuantity,
            },
            success: function(response) {
                if (response.success) {
                    // Cập nhật thành công, có thể thực hiện các hành động khác nếu cần
                    console.log(response.message);
                } else {
                    // Xử lý khi có lỗi
                    console.error(response.message);
                }
            },
            error: function(xhr, status, error) {
                // Xử lý khi có lỗi Ajax
                console.error('Ajax request failed: ' + status + ', ' + error);
            }
        });
    });
});

