ngApp.factory('$cartService', function ($http, $httpParamSerializer){

	var service = {
		action: {}
	};

	service.action.addCart = function (params) {
		var url = SiteUrl + "/rest/frontend/add-cart/" + params;
        return $http.post(url);
	};

	service.action.addCartProduct = function (id, params) {
		var url = SiteUrl + "/rest/frontend/add-cart/" + id;
        return $http.post(url, params);
	};

	service.action.getCart = function () {
		var url = SiteUrl + "/rest/frontend/cart" ;
        return $http.get(url);
	};

	service.action.deleteCart = function (params) {
		var url = SiteUrl + "/rest/frontend/delete-cart/" + params ;
        return $http.post(url);
	};

	service.action.updateCart = function (params, data) {
		var url = SiteUrl + "/rest/frontend/update-cart/" + params ;
        return $http.post(url, data);
	};
	
	return service;
})