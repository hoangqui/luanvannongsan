ngApp.controller('orderProviderCtrl',function($scope, $orderService, $apply) {

    $scope.data = {
        orders: {},
        page: {},
    }
    $scope.filter = {
        freetext: "",
        orderBy: "",
        orderByCheck: '',
        order: false,
    }

    $scope.checker = {
        btnCheckAll: false,
        checkedAll: []
    }
    $scope.actions = {
        getOrderProvider: function () {
            var params = $orderService.data.filter($scope.filter.freetext, $scope.filter.orderName, $scope.filter.orderBy,
                $scope.data.page.current_page, $scope.data.page.per_page);
            $orderService.action.getOrderProvider(params).then(function (resp) {
                if (resp) {
                    $apply(function () {
                        $scope.data.orders = resp.data.data;
                        $scope.data.page    = resp.data;
                        if ($scope.data.page.current_page > resp.data.last_page) {
                            $scope.data.page.current_page = resp.data.last_page;
                            $scope.actions.getSlide();
                        }
                    })
                }
            }, function (error) {
            })
        },

        changePage: function (page) {
            $scope.data.page.current_page = page;
            $scope.actions.getSlide();
        },

        delete: function ($id) {
            if ($id) {
                $myBootbox.confirm('Bạn có muốn xóa？', function (resp) {
                    if (resp) {
                        $slideService.action.deleteSlide($id).then(function (resp) {
                            if (resp) {
                                $myNotify.success();
                                $scope.actions.getSlide();
                            }
                        }, function (error) {
                            $myNotify.error();
                        })
                    }
                })
            }
        },

        filter: function () {
            $scope.actions.getSlide();
        },

        orderBy: function(propertyName) {
            $scope.filter.order = ($scope.filter.orderName == propertyName) ? !$scope.filter.order : false;
            $scope.filter.orderName = propertyName;
            $scope.filter.orderBy = $scope.filter.order ? 'desc' : 'asc'
            $scope.actions.getSlide();
        },

        actionCheckAll: function () {
            var ids = [];
            angular.forEach($scope.checker.checkedAll, function(val, key){
                if(val == true) {
                    ids.push(key);
                }
            });
            if (ids.length != 0 ) {
                var params = {
                    ids: ids
                };
                $myBootbox.confirm('',function (resp) {
                    if (resp) {
                        $slideService.action.deleteSlideMulti(params).then(function (resp) {
                            if (resp) {
                                $myNotify.success();
                                $scope.actions.getSlide();
                            }
                        }, function (error) {
                            $myNotify.error();
                        })
                    }
                })
            }
        },

        checkOrUncheck: function (check) {
            if (!check && $scope.checker.btnCheckAll) {
                $scope.checker.btnCheckAll = ! $scope.checker.btnCheckAll;
            }
        },

        formatMoney: function ($data) {
            return formatMoney1($data, 0, ".", ",");

        },
    }

    $scope.actions.getOrderProvider();
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