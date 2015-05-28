
<div id="content" role="main">
	<div ng-app="myApp" ng-init="food.type='product'" ng-controller="customersCtrl">
		<div class="input-append">
          Filter : <input type="text" ng-model="search" autocomplete="false" style="width: 300px">
    </div>
    <a ng-click="hidden()">Add new Post</a>
    <div ng-init="hideShow = true" ng-hide="hideShow">
      <form>
        Name&nbsp;&nbsp;&nbsp;<input ng-model="food.title" type="text" /><br /><br />
        Photo&nbsp;&nbsp;&nbsp;<input ng-model="food.field_image.und[0].uri" type="file" /><br /><br />
        Price&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input ng-model="food.field_price.und[0].value" type="text" /><br /><br />
        <input type="submit" />
        <p>form data = {{ food }}</p>
      </form>
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
    
	</div>
</div>