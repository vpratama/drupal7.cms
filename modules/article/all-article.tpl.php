<div id="content" role="main">
	<div ng-app="myApp" ng-controller="customersCtrl"> 
		<div class="input-append">
          Filter : <input type="text" ng-model="search" autocomplete="false" style="width: 300px">
        </div>
		<a ng-click="hidden()">Click to Hide / Show using AngularJS ng-Hide</a>
		<div ng-init="hideShow = false" class="custom-show-hide" ng-hide="hideShow">
		  <div ng-repeat="nodes in result  | filter:search">
			<h2 class="node__title node-title">{{ nodes.node.title }}</h2>
		    {{ nodes.node["Post date"]}}
		    <br>
		    <br>
		    <br>
		    <p align="justify">{{ nodes.node.Body }}</p>
			<br />
			<br />
		  </div>
		</div>
	</div>
</div>