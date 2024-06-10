// $(document).ready(function() {
//     // Phần xử lý sự kiện ready chỉ cần được gọi một lần, nên đặt ở ngoài hàm order_details()
// });

function order_details(id){
    $.ajax({
        url: '/admin/order_details/' + id,
        type: 'GET',
        success: function(res) {
            // Xử lý dữ liệu ở đây
            console.log(res);

            // Điều chỉnh nội dung của các ô bảng HTML trong modal
            $('.modal-body table tbody').html(''); // Xóa nội dung cũ của bảng tbody
            res.forEach(function(item) {
                $('.modal-body table tbody').append(`
                    <tr>
                        <td>${item.full_name}</td>
                        <td>${item.email}</td>
                        <td>${item.phone}</td>
                        <td>${item.province}, ${item.district}, ${item.commune}</td>
                        <td>${item.product_name}</td>
                    </tr>
                `);
            });

            // Mở modal
            $('.modal').modal('show');
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
}
function update_order(id){
    var formData = $('#update_order').serialize(); // Lấy dữ liệu từ form
    $.ajax({
        url :'/admin/update_order/'+id,
        type: 'POST',
        data: formData,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Lấy CSRF token từ meta tag
        },
        success: function(response) {
            console.log(response);
            Swal.fire({
                icon: 'success',
                title: 'Thành Công',
                showConfirmButton: false,
                timer: 1500
            })
        },
        error: function(xhr, status, error) {
            Swal.fire({
                icon: 'error',
                title: 'Thất Bại',
                showConfirmButton: false,
                timer: 1500
            })        }
    });

}
