<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cảm ơn bạn đã mua sản phẩm của chúng tôi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
      
        .card-body {
            text-align: center;
        }
      
        .icon {
            font-size: 50px;
            color: #007bff;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Cảm ơn bạn</h2>
                </div>

                <div class="card-body">
                    <div class="icon">&#x1F60A;</div>
                    <p class="h4">Cảm ơn bạn đã đặt hàng!</p>
                    <p>Đơn hàng của bạn đã được đặt thành công.</p>
                    <p>Một email xác nhận đã được gửi đến địa chỉ email của bạn.</p>
                    <p>Nhấn vào nút bên dưới để xem giỏ hàng:</p>

                    <a href="{{ $name }}" class="btn btn-primary">Bấm vào đây để xem giỏ hàng</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
