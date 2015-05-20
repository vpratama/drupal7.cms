<div id="content" role="main">
	<div ng-app="myApp" ng-controller="customersCtrl">
		<div class="input-append">
          <input type="text" ng-model="search" autocomplete="false" style="width: 300px">
          <button type="submit" class="btn">Filter</button>
        </div>
		
		<a ng-click="hidden()">Click to Hide / Show using AngularJS ng-Hide</a>
		<div ng-init="hideShow = false" class="custom-show-hide" ng-hide="hideShow"> 
			<div ng-repeat="nodes in result"> 
			  <div ng-repeat="node in nodes | filter:search">
			    <h2 class="node__title node-title">{{ node.title }}</h2>
				<div ng-repeat="image in node">
				    <img alt="{{ image.alt }}" src="{{ image.src }}" width="200px" />	
				</div>
				<b>Price :</b> {{ node.Price }}
				<br />
			  </div>
			</div>
		</div>
	</div>
</div>