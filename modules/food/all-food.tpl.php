
<div id="content" role="main">
	<div ng-app="myApp" ng-controller="customersCtrl">
		<div class="input-append">
          Filter : <input type="text" ng-model="search" autocomplete="false" style="width: 300px">
        </div>
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
    <a ng-click="hidden()">Add new Post</a>
    <div ng-init="hideShow = true" ng-hide="hideShow">
      <form>
        Name&nbsp;&nbsp;&nbsp;<input type="text" /><br /><br />
        Photo&nbsp;&nbsp;&nbsp;<input type="file" /><br /><br />
        Price&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" /><br /><br />
        <input type="submit" />
      </form>
    </div>  
	</div>
</div>