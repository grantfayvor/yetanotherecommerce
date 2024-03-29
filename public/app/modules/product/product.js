var idToUpdate;

app.controller("ProductController", ['$scope', '$rootScope', 'ProductService', function ($scope, $rootScope, ProductService) {

    $scope.products = [];
    $scope.new_product = {};
    $scope.page = 'product-list';

    $scope.initialize = function () {
        $scope.getAllProducts();
        $scope.getCategories();
    };

    $scope.getAllProducts = function () {
        ProductService.getAllProducts(function (response) {
            $scope.products = response.data;
        }, function (response, status) {
            console.log("an error occured while fetching the list of products");
        });
    };

    $scope.addNewProduct = function () {
        Pace.restart();
        ProductService.saveProduct($scope.new_product, function (response) {
            console.log("product was added successfully");
            ProductService.notificationEndPoints.push();
        }, function (response, status) {
            console.log("error in adding product");
        });
    };

    $scope.updateProduct = function () {
        Pace.restart();
        var payload = new FormData();
        payload.append('name', $scope.updatedProduct.name);
        payload.append('brand', $scope.updatedProduct.brand);
        payload.append('categoryId', $scope.updatedProduct.categoryId);
        payload.append('details', $scope.updatedProduct.details);
        payload.append('image', $scope.updatedProduct.image);
        payload.append('status', $scope.updatedProduct.status);
        payload.append('size', $scope.updatedProduct.size);
        ProductService.updateProduct($scope.updatedProduct.id, payload, function (response) {
            console.log("the product was successfully updated");
            ProductService.notificationEndPoints.push();
        }, function (response) {
            console.log("error in updating the product " + response);
        });
    };

    $scope.countProducts = function () {
        Pace.restart();
        ProductService.countProducts(function (response) {
            $scope.productCount = response.data;
        }, function (response) {
            console.log("error in counting products");
        });
    };

    $scope.deleteProduct = function () {
        $('#deleteModal').modal('hide');
        Pace.restart();
        ProductService.deleteProduct($scope.productIdToDelete, function (response) {
            console.log("product delete was successful");
            $scope.getAllProducts();
        }, function (response) {
            console.log("product delete was unsuccessful");
        });
    };

    $scope.getCategories = function () {
        ProductService.getCategories(function(response) {
            $scope.categories = response.data;
        }, function (response) {
            console.log("error occurred while trying to fetch the categories");
        });
    };

    $scope.searchByParam = function () {
        $scope.page = 'product-list';
        ProductService.search($scope.searchParam, function (response) {
            if (!response.data.message) {
                $scope.products = response.data;
            } else {
                $scope.productsMessage = response.data.message;
                $scope.page = 'product-error';
            }
        }, function(response) {
            console.log("couldn't get the products sorry");
        });
    };

    $scope.showEditPage = function (product) {
        Pace.restart();
        $scope.updatedProduct = product;
        $scope.updatedProduct.sellingPrice = product.selling_price;
        $scope.updatedProduct.categoryId = parseInt(product.category_id);
        $scope.updatedProduct.id = parseInt(product.id);
        $scope.page = 'edit-product';
    };

    $scope.showDeletePage = function (productId) {
        $scope.productIdToDelete = productId;
        $('#deleteModal').modal('show');
    };

    $scope.nextPage = function (url) {
        Pace.restart();
        ProductService.nextPage(url, function (response) {
            $scope.products = response.data;
        }, function (response) {
            console.log("error occured while getting next page");
        });
    };

    $scope.previousPage = function (url) {
        Pace.restart();
        ProductService.previousPage(url, function (response) {
            $scope.products = response.data;
        }, function (response) {
            console.log("error occured while getting previous page");
        });
    };

}]);

app.service("ProductService", ['APIService', function (APIService) {

    this.getAllProducts = function (successHandler, errorHandler) {
        APIService.get("/api/products", successHandler, errorHandler);
    };

    this.saveProduct = function (productDetails, successHandler, errorHandler) {
        APIService.post("/api/product/save", productDetails, successHandler, errorHandler);
    };

    this.search = function (param, successHandler, errorHandler) {
        APIService.get("/api/product/search/" + param, successHandler, errorHandler);
    };

    this.updateProduct = function (productId, productDetails, successHandler, errorHandler) {
        APIService.putWithOptions("/api/product/update?id=" + productId, productDetails, {
            transformRequest: angular.identity,
            headers: {
                'Content-Type': undefined
            }
        }, successHandler, errorHandler);
    };

    this.countProducts = function (successHandler, errorHandler) {
        APIService.get('/api/products/count', successHandler, errorHandler);
    };

    this.deleteProduct = function (id, successHandler, errorHandler) {
        APIService.delete('/api/product/delete/' + id, successHandler, errorHandler);
    };

    this.getCategories = function (successHandler, errorHandler) {
        APIService.get('/api/categories', successHandler, errorHandler);
    };

    this.nextPage = function (url, successHandler, errorHandler) {
        APIService.get(url, successHandler, errorHandler);
    };

    this.previousPage = function (url, successHandler, errorHandler) {
        APIService.get(url, successHandler, errorHandler);
    };

    this.notificationEndPoints = {
        push : function () {
            APIService.get('/notifications/push', function (resp) {
                console.log('notifications were successfully pushed');
            }, function (resp) {
                console.error('an error occurred while pushing the notifications');
            });
        }
    };
}]);

app.directive("fileModel", ['$parse', function ($parse) {
    return {
        restrict: 'A',
        link: function (scope, element, attrs) {
            var model = $parse(attrs.fileModel);
            var modelSetter = model.assign;

            element.bind('change', function () {
                scope.$apply(function () {
                    modelSetter(scope, element[0].files[0]);
                });
            });
        }
    };
}]);