document.addEventListener("DOMContentLoaded", function() {
    // Lấy giá trị của trường user_id
    var userId = document.getElementById("user_id").value;

    // In giá trị ra console
    console.log("User ID:", userId);

    $.ajax({
        url: '/api/user/order_user/' + userId, // Sửa $userId thành userId
        type: 'GET',
        success: function(response) {
            console.log(response);
            $('#history_content').html('');

            // Sử dụng forEach để duyệt qua từng danh mục
            response.forEach(function(order, index) {
                $('#history_content').append(`
                <tr>
                <td>${order.order_date}</td>
                <td>${order.shipping}</td>
                <td>${order.email}</td>
                <td>${order.phone}</td>
                <td>${order.province}/${order.district}/${order.commune}</td>
                <td>${order.product_name}</td>
                <td>${order.product_quantity}</td>
                <td>${order.product_price}</td>
               

            </tr>
                `);
            });
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
});