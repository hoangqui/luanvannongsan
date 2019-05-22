ngApp.controller('providerCtrl',function($scope, $myNotify, $myBootbox, $myLoader, $userService, $apply) {

	$scope.data = {
		users: {},
		page: {}
	}
	$scope.filter = {
		freetext: ""
	}

	$scope.actions = {
		getProvider: function () {
			var params = $userService.data.filter($scope.filter.freetext, $scope.data.page.current_page);
			$userService.action.getProvider(params).then(function (resp) {
				if (resp) {
					$scope.data.users = resp.data.data;
					$scope.data.page  = resp.data;
				}
			}, function (error) {
			})
		},

		changePage: function (page) {
			$scope.data.page.current_page = page;
			$scope.actions.getProvider();
		},

		delete: function ($id) {
			if ($id) {
				$myBootbox.confirm('Bạn muốn xóa?', function (resp) {
					if (resp) {
					$userService.action.deleteUser($id).then(function (resp) {
						if (resp) {
							$myNotify.success('');
							$scope.actions.getProvider();
						}
						}, function (error) {
							$myNotify.error('');
						})
					}
				})
			}
		},

		filter: function () {
			$scope.actions.getProvider();
		}

	}

	$scope.actions.getProvider();
});