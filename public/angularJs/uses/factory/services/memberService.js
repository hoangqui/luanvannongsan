ngApp.factory('$memberService', function ($http, $httpParamSerializer){

	var service = {
		action: {},
		data: {}
	};

	service.data.filter = function () {

	};

	service.action.getMember = function () {
		var url = SiteUrl + "/rest/admin/members";
        return $http.get(url);
	};

	return service;
})