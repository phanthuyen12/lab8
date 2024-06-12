document.addEventListener("DOMContentLoaded", function() {
    // Lấy giá trị của trường user_id

    // In giá trị ra console
    var urlParams = new URLSearchParams(window.location.search);
    var token = urlParams.get('token');
    
    // In giá trị token ra console để kiểm tra
    console.log(token);
    $.ajax({
        url: '/order-clients?token=' + token, // Thêm token vào URL
        type: 'GET',
        success: function(response) {
            console.log(response);
            $('#history_content').html('');

            // Hàm tạo HTML cho chi tiết đơn hàng
            function get_orderdetall(orderDetails) {
                let orderDetailsHtml = '';
                orderDetails.forEach(detail => {
                    orderDetailsHtml += `
                        <tr>
                            <td>${detail.product_name}</td>
                            <td>${detail.product_price}</td>
                            <td>${detail.product_quantity}</td>
                        </tr>
                    `;
                });
                return orderDetailsHtml;
            }

            // Sử dụng forEach để duyệt qua từng đơn hàng
            response.forEach(function(order, index) {
                let orderDetailsHtml = get_orderdetall(order.order_details); // Tạo nội dung chi tiết đơn hàng ở đây
                let modalId = 'modal' + order.order_id;

                $('#history_content').append(`
                    <tr>
                        <td>${order.order_date}</td>
                        <td>${order.shipping === 'online_payment' ? "thanh toán online":"thanh toán khi nhận"}</td>
                                                <td>${order.status == 'đang phê duyệt' ?'chưa thanh toán' :'đã thanh toán'} </td>

                        <td>${order.email}</td>
                        <td>${order.phone}</td>
                        <td>${order.province}/${order.district}/${order.commune}</td>
                                                <td>${order.totalamount}</td>

<td>${order.totalamountsale === null ? 'ko có mã giảm giá' : order.totalamountsale}</td>

                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#${modalId}">
                                Xem chi tiết đơn hàng
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="${modalId}" tabindex="-1" aria-labelledby="${modalId}Label" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="${modalId}Label">Chi tiết sản phẩm</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Tên sản phẩm</th>
                                                        <th scope="col">Giá sản phẩm</th>
                                                        <th scope="col">Số lượng</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    ${orderDetailsHtml} <!-- Sử dụng biến ở đây -->
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                `);
            });
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
});
