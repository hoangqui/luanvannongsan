ngApp.factory('$userService', function ($http, $httpParamSerializer){

	var service = {
		action: {},
		data: {}
	};

	service.data.filter = function () {

	};

	service.action.getUser = function () {
		var url = SiteUrl + "/rest/admin/users";
        return $http.get(url);
	};

	service.action.deleteUser = function ($id) {
		var url = SiteUrl + "/rest/admin/users/" + $id;
        return $http.delete(url);
	};

	service.action.getProvider = function () {
		var url = SiteUrl + "/rest/admin/provider";
        return $http.get(url);
	};

	return service;
})