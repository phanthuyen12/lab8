function displaycart() {
    var cart = sessionStorage.getItem('cart');
    var totalCartPrice = 0; // Tổng giá trị của giỏ hàng

    if (cart) {
        cart = JSON.parse(cart);
        var cartContent = document.getElementById('product_item');
        cartContent.innerHTML = '';

        var products = cart.map(function(product) {
            return {
                name: product.name,
                quantity: product.quantity,
                price : product.price
            };
        });

        document.getElementById('products_input').value = JSON.stringify(products);

        cart.forEach(function(product) {
            // Tính tổng giá trị của từng sản phẩm trong giỏ hàng
            var productTotal = parseFloat(product.price) * parseInt(product.quantity);
            totalCartPrice += productTotal;

            var productElement = document.createElement('tr');
            productElement.innerHTML = `
            <tr class="cart_item">
                <td class="product-name">
                    ${product.name} <strong class="product-quantity"> × ${product.quantity}</strong>
                </td>
                <td class="product-total">
                    <span class="amount">${parseFloat(productTotal).toLocaleString('vi-VN', { style: 'currency', currency: 'VND' })}</span>
                </td>
            </tr>
            `;
            cartContent.appendChild(productElement);
        });

        // Hiển thị tổng giá trị của giỏ hàng
        document.getElementById('totls_product').innerText = parseFloat(totalCartPrice).toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
    } else {
        // Hiển thị thông báo nếu giỏ hàng trống
        document.getElementById('product_item').innerHTML = '<p>Giỏ hàng trống</p>';
    }
}
window.onload = function() {
    displaycart();
};
