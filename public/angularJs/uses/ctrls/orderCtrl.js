ngApp.controller('orderCtrl',function($scope, $myNotify, $myBootbox, $myLoader, $orderService, $apply) {
	$scope.modalProduct;
	$scope.data = {
		orders: {},
		page: {},
		order: {},
	}
	$scope.filter = {
		freetext: ""
	}

	$scope.actions = {

		getOrder: function () {
			var params = $orderService.data.filter($scope.filter.freetext, $scope.data.page.current_page);
			$orderService.action.getOrder(params).then(function (resp) {
				if (resp) {
					$scope.data.page  = resp.data;
					if ($scope.data.page.current_page > resp.data.last_page) {
						$scope.data.page.current_page = resp.data.last_page;
						$scope.actions.getOrder();
					}
					$scope.data.orders = resp.data.data;
					console.log($scope.data.orders)
				}
			}, function (error) {
			})
		},

		changePage: function (page) {
			$scope.data.page.current_page = page;
			$scope.actions.getOrder();
		},

		filter: function () {
			$scope.actions.getOrder();
		},

		detailOrder: function (id) {
			var check = true;
			angular.forEach($scope.data.orders, function(value, key){
				if (value.id == id && check) {
					$scope.order = value;
					check = false;
				}
			});
			$orderService.action.getDetailOrder(id).then(function (resp) {
				$scope.data.detailOrder = resp.data;
			}, function (error) {
			})
			$($scope.modalProduct).modal('show');
		},

		saveStatus: function () {
			if (!$scope.order.id) {
				return false;
			}
			var params = {
				order_status: $('select[name="order_status"]').val(),
				payment_status: $('select[name="payment_status"]').val(),
			}

			$orderService.action.updateStatus($scope.order.id, params).then(function (resp){
				if (resp.data.status) {
					$myNotify.success('Thành công');
					$scope.actions.getOrder();
				}
			}, function (error) {
				$myNotify.success('Thất bại')
			})
		},

	}

	$scope.actions.getOrder();
});