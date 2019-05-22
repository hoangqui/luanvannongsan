ngApp.controller('cartCtrl', function($apply, $rootScope, $scope, $cartService, $myLoader, $http, $httpParamSerializer ) {

	$rootScope.listCarts = {};
	$rootScope.countCart = 0;
	$rootScope.totalCart = 0;
	$scope.data = { qty: 1};

	$rootScope.getCart = function () {
		$cartService.action.getCart().then(function (resp) {
			$apply(function () {
				$rootScope.listCarts = resp.data.cartItems;
				$rootScope.countCart = resp.data.cartCount;
				$rootScope.totalCart = resp.data.cartTotal;
			});
		}, function (error) {

		});
	}

	$scope.actions= {
		addCart: function ($id) {
			$cartService.action.addCart($id).then(function (resp) {
				$rootScope.getCart();
			}, function (error) {

			})
		},
		addCartProduct: function ($id) {
			var params = {
				qty: $scope.data.qty || 1
			}
			$cartService.action.addCartProduct($id, params).then(function (resp) {
				$rootScope.getCart();
			}, function (error) {

			})
		},
		deleteCart : function ($id) {
			$cartService.action.deleteCart($id).then(function(resp) {
				$rootScope.getCart();
			}, function (error){
				console.log(error);
			});
		},

		updateCart : function ($id, $qty, key) {
			if ($qty > 0 && $id) {
				$cartService.action.updateCart($id, {'qty': $qty}).then(function (resp){
					$rootScope.getCart();
				}, function (error) {

				});
			} else {
				$cartService.action.updateCart($id, {'qty': 1}).then(function (resp){
					$rootScope.getCart();
				}, function (error) {

				});
			}
		},

		formatMoney: function ($data) {
			return formatMoney1($data, 0, ".", ",");
			
		},	
	}

	$scope.$watch('data.qty', function (newVal, oldVal) {
		if (newVal <= 0) {
			$scope.data.qty = 1;
		}
	})
	
	$rootScope.getCart();
});

function formatMoney1(amount, decimalCount = 2, decimal = ".", thousands = ",") {
  	try {
	    decimalCount = Math.abs(decimalCount);
	    decimalCount = isNaN(decimalCount) ? 2 : decimalCount;

	    const negativeSign = amount < 0 ? "-" : "";

	    let i = parseInt(amount = Math.abs(Number(amount) || 0).toFixed(decimalCount)).toString();
	    let j = (i.length > 3) ? i.length % 3 : 0;

	    return negativeSign + (j ? i.substr(0, j) + thousands : '') + 
	    					i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands) + 
	    					(decimalCount ? decimal + Math.abs(amount - i).toFixed(decimalCount).slice(2) : "");
	  } catch (e) {
	    console.log(e)
	  }
};