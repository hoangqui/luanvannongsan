ngApp.factory('$orderService', function ($http, $httpParamSerializer){

	var service = {
		action: {},
		data: {}
	};

	service.data.filter = function (freetext, page) {
		return {
			freetext: freetext || '',
			page: page || 1
		}
	};	

	service.action.getOrder= function (params) {
		var url = SiteUrl + "/rest/admin/orders?" + $httpParamSerializer(params);
        return $http.get(url);
	};

	service.action.getDetailOrder= function (id) {
		var url = SiteUrl + "/rest/admin/detail-orders/" + id;
        return $http.get(url);
	};

	service.action.updateStatus = function (id, params) {
		var url = SiteUrl + "/rest/admin/update-orders/" + id;
        return $http.post(url, params);
	}

	service.action.getOrderProvider = function () {
        var url = SiteUrl + "/rest/admin/history-by-provider";
        return $http.get(url);
	}


	return service;
})