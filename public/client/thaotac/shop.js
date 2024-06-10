var app = angular.module('myApp', []);

app.controller('shop', function($scope, $http) {
    $scope.searchTerm = '';
    $scope.products = [];
    $scope.categories = [];

    // Hàm lấy danh mục
    $scope.getCategory = function() {
        $http.get('/search-category')
            .then(function(response) {
                console.log(response.data)
                angular.forEach(response.data, function(category, index) {
                    category.selected = false; // Thêm thuộc tính selected để lưu trạng thái của checkbox
                    category.index = index; // Thêm thuộc tính index để sử dụng trong template
                });
                $scope.categories = response.data;
            }, function(error) {
                console.error('Lỗi khi lấy danh mục:', error);
            });
    };

    // Hàm lấy sản phẩm theo danh mục
    $scope.getProductCategory = function(id) {
        $http.get('/search-category-products/' + id)
            .then(function(response) {
                $scope.products = response.data;
                console.log(response);
            }, function(error) {
                console.error('Lỗi khi lấy sản phẩm theo danh mục:', error);
            });
    };

    // Hàm tìm kiếm tất cả sản phẩm
    $scope.searchAllProducts = function() {
        $http.get('/search-all-products')
            .then(function(response) {
                $scope.products = response.data;
                console.log(response);
            }, function(error) {
                console.error('Lỗi khi tìm kiếm tất cả sản phẩm:', error);
            });
    };

    // Khởi tạo dữ liệu
    $scope.init = function() {
        $scope.getCategory();
        $scope.searchAllProducts();
    };

    // Gọi hàm init khi controller được khởi tạo
    $scope.init();
});
