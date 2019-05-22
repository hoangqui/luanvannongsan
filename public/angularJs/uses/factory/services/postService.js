ngApp.factory('$postService', function ($http, $httpParamSerializer){

	var service = {
		action: {},
		data: {}
	};

	service.data.filter = function (freetext, orderName, orderBy , page, perPage) {
		return params = {
			'freetext': freetext || '',
			'orderName': orderName || 'id',
			'orderBy': orderBy || 'desc',
			'page': page || 1,
			'perPage': perPage || 20,
		}
	};

	service.action.getPost = function (params) {
		var url = SiteUrl + "/rest/admin/posts?" + $httpParamSerializer(params);
        return $http.get(url);
	};

	service.action.deletePost = function ($id) {
		var url = SiteUrl + "/rest/admin/posts/" + $id;
        return $http.delete(url);
	};

	service.action.deletePostMulti = function (params) {
		var url = SiteUrl + "/rest/admin/posts/delete-multi";
        return $http.post(url, params);
	};

	service.action.hotPosts = function ($id) {
		var url = SiteUrl + "/rest/admin/posts/hot-new/" + $id ;
        return $http.post(url);
	};

	service.action.prioritizePost = function ($id) {
		var url = SiteUrl + "/rest/admin/posts/prioritize-new/" + $id ;
        return $http.post(url);
	};

	return service;
})