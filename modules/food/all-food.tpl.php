
<div id="content" role="main">
	<div ng-app="myApp" ng-controller="customersCtrl">
		<div class="input-append">
          Filter : <input type="text" ng-model="search" autocomplete="false" style="width: 300px">
        </div>
		<a ng-click="hidden()">Click to Hide / Show using AngularJS ng-Hide</a>
		<div ng-init="hideShow = false" class="custom-show-hide" ng-hide="hideShow"> 
			<div ng-repeat="nodes in result | filter:search">
        <div>    
          {{nodes.node.title}} 
        </div>
        <div>
          <img alt="{{nodes.node.Image.alt}}" width="300px" src="{{nodes.node.Image.src}}" />
        </div>
        <div>
          Price : {{nodes.node.Price}}
        </div>
        <br />
      </div>
		</div>
	</div>
</div>