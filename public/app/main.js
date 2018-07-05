app.controller("MainController", ['$rootScope', '$scope', 'MainService', 'NotificationService',
    function ($rootScope, $scope, MainService, NotificationService) {

        $scope.products = [];
        $scope.originalProducts = [];
        $scope.hotProducts = [];
        $scope.show = false;
        $scope.page = 'products';
        $scope.cartCount = 0;

        $scope.initialize = function () {
            $scope.getHotProducts();
            $scope.getCartCount();
            $scope.getAllByCategory(1);
            $scope.getRecommendedProducts();
        };

        $scope.getHotProducts = function () {
            MainService.getHotProducts(function (response) {
                $scope.hotProducts = response.data;
                $scope.hotProducts.data = shuffle($scope.hotProducts.data);
                $scope.hotProducts.data = $scope.hotProducts.data.splice(0, 2);
            }, function () {
                console.log("error in getting hot products");
            });
        };

        $scope.getRecommendedProducts = function () {
            MainService.getRecommendedProducts(function (response) {
                $scope.recommendedProducts = response.data;
                $scope.recommendedProducts.data = shuffle($scope.recommendedProducts.data);
                $scope.recommendedProducts.data = $scope.recommendedProducts.data.splice(0, 3);
            }, function (response) {
                console.log("error in getting recommended products");
            });
        };

        $scope.getAllProducts = function () {
            MainService.getAllProducts(function (response) {
                $scope.products = response.data;
                $scope.originalProducts = response.data;
            }, function (response, status) {
                console.log("an error occurred while fetching the list of products");
            });
        };

        $scope.filterProducts = function (param, value) {
            $scope.products.data = $scope.originalProducts.data.filter(function(p) {
                return p[param] == value;
            });
        };

        $scope.getAllByCategory = function (categoryId) {
            Pace.restart();
            MainService.findAllByCategory(categoryId, function (response) {
                $scope.products = response.data;
                $scope.originalProducts = Object.assign({}, response.data);
            }, function (response) {
                console.log("error in fetching learning aids");
            });
        };

        $scope.getCartCount = function () {
            MainService.getCartCount(function (response) {
                $scope.cartCount = response.data;
            }, function (response) {
                console.log("error occured while getting count of the cart");
            });
        };

        $scope.addToCart = function (product) {
            Pace.restart();
            var selectedProduct = {};
            selectedProduct.details = {
                "id": product.id,
                "name": product.name,
                "qty": 1,
                "price": parseInt(product.selling_price)
            };
            selectedProduct.details.options = {
                "image_location": product.image_location,
                "subtotal": selectedProduct.details.price * selectedProduct.details.qty,
                "details": product.details,
                "size": product.size
            };
            MainService.addToCart(selectedProduct, function (response) {
                $scope.getCartCount();
                $('#cartModal').modal('show');
                console.log("product has been added to cart");
            }, function (response, status) {
                console.log("error in adding the product to cart");
            });
        };

        $scope.searchByParam = function () {

            MainService.search($scope.searchParam, function (response) {
                if (!response.data.message) {
                    $scope.products = response.data;
                } else {
                    $scope.productsMessage = response.data.message;
                }
            });
        };

        $scope.productInfo = function (product) {
            Pace.restart();
            $scope.currentProduct = product;
            $scope.page = 'product-details';
        };

        $scope.addItemClass = function (index) {
            if (index == 2) {
                //$('#hot').addClass('active');
                setTimeout(function () {
                    document.getElementById('hot').classList.add('active');
                    $scope.show = true;
                }, 100);
            }
            return index;
        };

        $scope.nextPage = function (url) {
            Pace.restart();
            MainService.nextPage(url, function (response) {
                $scope.products = response.data;
            }, function (response) {
                console.log("error occured while getting next page");
            });
        };

        $scope.previousPage = function (url) {
            Pace.restart();
            MainService.previousPage(url, function (response) {
                $scope.products = response.data;
            }, function (response) {
                console.log("error occured while getting previous page");
            });
        };

        var shuffle = function (array) {
            var currentIndex = array.length,
                temporaryValue, randomIndex;

            // While there remain elements to shuffle...
            while (0 !== currentIndex) {

                // Pick a remaining element...
                randomIndex = Math.floor(Math.random() * currentIndex);
                currentIndex -= 1;

                // And swap it with the current element.
                temporaryValue = array[currentIndex];
                array[currentIndex] = array[randomIndex];
                array[randomIndex] = temporaryValue;
            }

            return array;
        };

        NotificationService.setUp();

    }
]);

app.service("MainService", ['APIService', function (APIService) {

    this.search = function (param, successHandler, errorHandler) {
        APIService.get("/api/product/search/" + param, successHandler, errorHandler);
    };

    this.getHotProducts = function (successHandler, errorHandler) {
        var status = "HOT";
        APIService.get("/api/products/status/" + status + "", successHandler, errorHandler);
    };

    this.getRecommendedProducts = function (successHandler, errorHandler) {
        var status = "COLD";
        APIService.get("/api/products/status/" + status + "", successHandler, errorHandler);
    };

    this.getAllProducts = function (successHandler, errorHandler) {
        APIService.get("/api/products", successHandler, errorHandler);
    };

    this.saveProduct = function (productDetails, successHandler, errorHandler) {
        APIService.post("/api/product/save", productDetails, successHandler, errorHandler);
    };

    this.findAllByCategory = function (categoryId, successHandler, errorHandler) {
        var productName = getParameterByName('product');
        APIService.get(`/api/products/find?q=${categoryId} ${productName ? '&product=' + productName : ''}`, successHandler, errorHandler);
    };

    this.addToCart = function (selectedProduct, successHandler, errorHandler) {
        APIService.post("/api/cart/add", selectedProduct, successHandler, errorHandler);
    };

    this.getCartCount = function (successHandler, errorHandler) {
        APIService.get('/api/cart/count', successHandler, errorHandler);
    };

    this.nextPage = function (url, successHandler, errorHandler) {
        APIService.get(url, successHandler, errorHandler);
    };

    this.previousPage = function (url, successHandler, errorHandler) {
        APIService.get(url, successHandler, errorHandler);
    };

    function getParameterByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
    }
}]);

app.service('NotificationService', ['APIService', function (APIService) {

    var GCM_ENDPOINT = 'https://android.googleapis.com/gcm/send';

    var isPushEnabled = localStorage.getItem('pushEnabled') || false;

    function endpointWorkaround(pushSubscription) {
        // Make sure we only mess with GCM
        if (pushSubscription.endpoint.indexOf('https://android.googleapis.com/gcm/send') !== 0) {
            return pushSubscription.endpoint;
        }

        var mergedEndpoint = pushSubscription.endpoint;
        // Chrome 42 + 43 will not have the subscriptionId attached
        // to the endpoint.
        if (pushSubscription.subscriptionId &&
            pushSubscription.endpoint.indexOf(pushSubscription.subscriptionId) === -1) {
            // Handle version 42 where you have separate subId and Endpoint
            mergedEndpoint = pushSubscription.endpoint + '/' +
                pushSubscription.subscriptionId;
        }
        return mergedEndpoint;
    }

    function sendSubscriptionToServer(subscription) {
        var mergedEndpoint = endpointWorkaround(subscription);

        if (mergedEndpoint.indexOf(GCM_ENDPOINT) !== 0) {
            console.log('This browser isn\'t currently ' +
                'supported for this demo');
            return;
        }

        var endpointSections = mergedEndpoint.split('/');
        var subscriptionId = endpointSections[endpointSections.length - 1];

        localStorage.setItem('push_subscription', subscriptionId);

        APIService.post('/notifications/subscribe', { 'subscriptionId': subscriptionId }, function(response) {
            console.log('successfully registered');
        }, function (response) {
            console.error('an error occurred');
        });
    }

    function unsubscribe() {

        navigator.serviceWorker.ready.then(function (serviceWorkerRegistration) {
            // To unsubscribe from push messaging, you need get the
            // subcription object, which you can call unsubscribe() on.
            serviceWorkerRegistration.pushManager.getSubscription().then(
                function (pushSubscription) {
                    // Check we have a subscription to unsubscribe
                    if (!pushSubscription) {
                        // No subscription object, so set the state
                        // to allow the user to subscribe to push
                        isPushEnabled = false;
                        return;
                    }

                    // TODO: Make a request to your server to remove
                    // the users data from your data store so you
                    // don't attempt to send them push messages anymore

                    // We have a subcription, so call unsubscribe on it
                    pushSubscription.unsubscribe().then(function () {
                        isPushEnabled = false;
                    }).catch(function (e) {
                        // We failed to unsubscribe, this can lead to
                        // an unusual state, so may be best to remove
                        // the subscription id from your data store and
                        // inform the user that you disabled push

                        console.log('Unsubscription error: ', e);
                    });
                }).catch(function (e) {
                console.log('Error thrown while unsubscribing from ' +
                    'push messaging.', e);
            });
        });
    }

    function subscribe() {

        navigator.serviceWorker.ready.then(function (serviceWorkerRegistration) {
            serviceWorkerRegistration.pushManager.subscribe({
                    userVisibleOnly: true
                })
                .then(function (subscription) {
                    // The subscription was successful
                    isPushEnabled = true;

                    // TODO: Send the subscription subscription.endpoint
                    // to your server and save it to send a push message
                    // at a later date
                    return sendSubscriptionToServer(subscription);
                })
                .catch(function (e) {
                    if (Notification.permission === 'denied') {
                        // The user denied the notification permission which
                        // means we failed to subscribe and the user will need
                        // to manually change the notification permission to
                        // subscribe to push messages
                        console.log('Permission for Notifications was denied');
                    } else {
                        // A problem occurred with the subscription, this can
                        // often be down to an issue or lack of the gcm_sender_id
                        // and / or gcm_user_visible_only
                        console.log('Unable to subscribe to push.', e);
                    }
                });
        });
    }

    function initialiseState() {
        // Are Notifications supported in the service worker?
        if (!('showNotification' in ServiceWorkerRegistration.prototype)) {
            console.log('Notifications aren\'t supported.');
            return;
        }

        // Check the current Notification permission.
        // If its denied, it's a permanent block until the
        // user changes the permission
        if (Notification.permission === 'denied') {
            console.log('The user has blocked notifications.');
            return;
        }

        // Check if push messaging is supported
        if (!('PushManager' in window)) {
            console.log('Push messaging isn\'t supported.');
            return;
        }

        // We need the service worker registration to check for a subscription
        navigator.serviceWorker.ready.then(function (serviceWorkerRegistration) {
            // Do we already have a push message subscription?
            serviceWorkerRegistration.pushManager.getSubscription()
                .then(function (subscription) {

                    if (!subscription) {
                        // We aren’t subscribed to push, so set UI
                        // to allow the user to enable push
                        return;
                    }

                    // Keep your server in sync with the latest subscription
                    //sendSubscriptionToServer(subscription);

                    // Set your UI to show they have subscribed for
                    // push messages
                    isPushEnabled = true;
                })
                .catch(function (err) {
                    console.log('Error during getSubscription()', err);
                });
        });

        localStorage.setItem('pushEnabled', isPushEnabled);
    }

    this.setUp = function () {

        subscribe();

        localStorage.setItem('pushEnabled', isPushEnabled);

        // Check that service workers are supported, if so, progressively
        // enhance and add push messaging support, otherwise continue without it.
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('./service-worker.js')
                .then(initialiseState);
        } else {
            console.log('Service workers aren\'t supported in this browser.');
        }
    };
}]);