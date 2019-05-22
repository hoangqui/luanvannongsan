ngApp.controller('memberCtrl',function($scope, $myNotify, $myBootbox, $myLoader, $memberService, $apply) {

	$scope.data = {
		members: {},
		page: {}
	}
	$scope.filter = {
		freetext: ""
	}

	$scope.actions = {
		getMember: function () {
			var params = $memberService.data.filter($scope.filter.freetext, $scope.data.page.current_page);
			$memberService.action.getMember(params).then(function (resp) {
				if (resp) {
					$scope.data.page  = resp.data;
					if ($scope.data.page.current_page > resp.data.last_page) {
						$scope.data.page.current_page = resp.data.last_page;
						$scope.actions.getMember();
					}
					$scope.data.members = resp.data.data;
				}
			}, function (error) {
			})
		},

		changePage: function (page) {
			$scope.data.page.current_page = page;
			$scope.actions.getMember();
		},

		filter: function () {
			$scope.actions.getMember();
		}

	}

	$scope.actions.getMember();
});