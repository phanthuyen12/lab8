function addToCart(){
    // alert('đã click vào dữ liệu');
    const product_price = document.getElementById('product_price').innerText;
    const name_product = document.getElementById('name_product').innerText;
    const quantity_product = document.getElementById('quantity_product').value;
    const img_products = document.getElementById('img_products').src;
    
    var product = {
        name: name_product,
        price: product_price,
        image: img_products,
        quantity: quantity_product
    }
    // console.log(product);
    var cart = sessionStorage.getItem('cart');
    console.log(cart)
    if (!cart){
        cart =[];
    }else{
        cart = JSON.parse(cart);
        var indexproductindex = cart.findIndex(item => item.name === product.name);
        if (indexproductindex !==-1){
            cart[indexproductindex].quantity = parseInt(cart[indexproductindex].quantity)+ parseInt(quantity_product);
            cart[indexproductindex].price = parseInt(cart[indexproductindex].quantity)+parseInt(product_price).toFixed(2);
            // Totalproduct = cart[indexproductindex].quantity * cart[indexproductindex].price;
        }else{
            cart.push(product)

        }

    }
            // Thêm sản phẩm vào giỏ hàng
     // Lưu giỏ hàng vào session
     sessionStorage.setItem('cart', JSON.stringify(cart));
     // Hiển thị thông báo hoặc chuyển hướng đến trang giỏ hàng (tùy thuộc vào yêu cầu của bạn)
     Swal.fire({
        icon: 'success',
        title: 'Đã thêm vào giỏ hàng!',
        showConfirmButton: false,
        timer: 1500
    });}
    function displaycart() {
        var cart = sessionStorage.getItem('cart');
        var totalCartPrice = 0; // Tổng giá trị của giỏ hàng
    
        if (cart) {
            cart = JSON.parse(cart);
            var cartContent = document.getElementById('cart_content');
            cartContent.innerHTML = '';
    
            cart.forEach(function(product) {
                // Tính tổng giá trị của từng sản phẩm trong giỏ hàng
                var productTotal = parseFloat(product.price) * parseInt(product.quantity);
                totalCartPrice += productTotal;
    
                var productElement = document.createElement('tr');
                productElement.innerHTML = `
                    <td class="product-thumbnail"><a href="shop-details.html"><img src="${product.image}" alt=""></a></td>
                    <td class="product-name">${product.name}</td>
                    <td class="product-price" id="product-price"><span class="amount">${parseFloat(product.price).toLocaleString('vi-VN', { style: 'currency', currency: 'VND' })}</span></td>
                    <td class="cart-plus-minus">
                        <div class="dec qtybutton">-</div>
                        <input type="text" class="quantity_product" value="${product.quantity}">
                        <div class="inc qtybutton">+</div>
                    </td>
                    <td class="product-subtotal" id="product-subtotal">${parseFloat(productTotal).toLocaleString('vi-VN', { style: 'currency', currency: 'VND' })}</td>
                    <td class="product-remove" onclick= "remove_cart('${product.name}')"><a href="#"><i class="fa fa-times"></i></a></td>
                `;
                cartContent.appendChild(productElement);
            });
    
            // Hiển thị tổng giá trị của giỏ hàng
            document.getElementById('subtotal_product').innerText = parseFloat(totalCartPrice).toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
        } else {
            // Hiển thị thông báo nếu giỏ hàng trống
            document.getElementById('cart_content').innerHTML = '<p>Giỏ hàng trống</p>';
        }
    }
    function remove_cart(name){
        //  alert('nhận giá trị xóa'+name);
        var cart = sessionStorage.getItem('cart');
        if ( cart){
            cart = JSON.parse(cart);
            cart = cart.filter(function(product){
                return product.name !== name;

            });
            sessionStorage.setItem('cart', JSON.stringify(cart));
            displaycart(); // Cập nhật giao diện sau khi xóa sản phẩm

        }
    }
    document.getElementById('update_cart').addEventListener('click', function() {
        var cart = sessionStorage.getItem('cart');
        if (cart) {
            cart = JSON.parse(cart);
            var quantityInputs = document.querySelectorAll('.quantity_product');
            quantityInputs.forEach(function(input, index) {
                cart[index].quantity = input.value;
            });
            sessionStorage.setItem('cart', JSON.stringify(cart));
            displaycart();
        }
    });
    
    window.onload = function() {
        displaycart();
    };
    
    