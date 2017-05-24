<div ng-app="app">
    <div class="panel panel-default" ng-controller="demo as dm">
        <div class="panel-heading">
            <h3 class="panel-title">AngularJs $scope</h3>
        </div>
        <div class="panel-body">
            <label>Name:</label>
            <input type="text" ng-model="name" placeholder="Enter a name here">
            <hr>
            年龄:{{age()}}
        </div>
    </div>
    <!-- -------- -->
    <div class="panel panel-default" ng-controller="http">
        <div class="panel-heading">
            <h3 class="panel-title">$http</h3>
        </div>
        <div class="panel-body">
            <label>Name:</label>
            <input type="text" ng-model="name" placeholder="Enter a name here">
            <hr>
            ID:{{id}}
            <hr>
            name:{{name}}
        </div>
    </div>
    <!-- -------- -->
    <div class="panel panel-default" ng-controller="location">
        <div class="panel-heading">
            <h3 class="panel-title">$location</h3>
        </div>
        <div class="panel-body">
            <label>Name:</label>
            <input type="text" ng-model="name" placeholder="Enter a name here">
            <hr>
            <pre>
absUrl:{{absUrl}}
url:{{ng_url}}
            </pre>
        </div>
    </div>
    <!-- -------- -->
</div>

<script src="//cdn.bootcss.com/angular.js/1.5.8/angular.min.js"></script>

<script>
    var app = angular.module('app', []);

    app.controller('demo', ['$scope', function ($scope) {
        // 属性
        $scope.name = 'maoge';

        // 行为 事件 方法
        $scope.age = function ages() {
            if ($scope.name === "maoge") {
                return 18;
            } else if ($scope.name === "dm") {
                return 17;
            } else {
                return 99;
            }
        };

    }]);

    app.controller('http', ['$scope','$http', function ($scope,$http) {
        // 常用 一般方法
//        $http({
//            method: 'post',
//            url: '/account_api/test/index',
//            headers: {
//                'Content-Type': 'application/json'
//            },
//            data: {id: 99}
//        }).then(function (e) {
//            $scope.id = e.data.id;
//            $scope.name = e.data.name;
//        },function (e) {
//            alert('请求失败\r\n' + e.status + '\r\n' + e.statusText);
//        });

        // 常用 get
//        $http.get('/account_api/test/index').success(function (e) {
//            $scope.id = e.id;
//            $scope.name = e.name;
//        });
//
//        // 常用 post
        $http.post('/account_api/test/index',{id:88}).success(function (e) {
            $scope.id = e.id;
            $scope.name = e.name;
        }).error(function (e) {
            alert('请求失败');
        })
    }]);

    app.controller('location', ['$scope','$location', function ($scope,$location) {
        $scope.absUrl = $location.absUrl();
        $scope.ng_url = $location.url();
//        console.log(angular.version)
    }]);
</script>