var ngApp = angular.module('ngApp', ['bw.paging', 'ngSanitize']);


ngApp.filter('orderObjectBy', function() {
  return function(items, field, reverse) {
    var filtered = [];
    angular.forEach(items, function(item) {
      filtered.push(item);
    });
    filtered.sort(function (a, b) {
      return (a[field] > b[field] ? 1 : -1);
    });
    if(reverse) filtered.reverse();
    return filtered;
  };
});

ngApp.filter('formatDate', function() {
    return function(items, field, reverse) {
        formattedDate = moment(items, 'YYYY/MM/DD').format('DD-MM-YYYY');
        return formattedDate;
    };
});