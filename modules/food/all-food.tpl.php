<div id="content" role="main">
  <div ng-app="myApp" ng-init="food.type='product'" ng-controller="customersCtrl">
    <div class="input-append">
          Filter : <input type="text" ng-model="search" autocomplete="false" style="width: 300px">
    </div>
    <a ng-click="hidden()">Add new Post</a>
    <div ng-init="hideShow = true" ng-hide="hideShow">
      <form ng-submit="submit()" ng-init="food.body.und[0].format='filtered_html'">
        Name&nbsp;&nbsp;&nbsp;<input ng-model="food.title" type="text" /><br /><br />
        Photo&nbsp;&nbsp;&nbsp;<input type="file" name="file" file-upload multiple /><br /><br />
        Price&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input ng-model="food.field_price.und[0].value" type="text" /><br /><br />
        <input type="submit" />
        <p>{{files.name}}</p>
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
        <a data-toggle="modal" href="#myModal" ng-click="updatedData(nodes.node.Nid)">Update Post</a>
        <a ng-click="delete(nodes.node.Nid)">Delete Post</a>
        <br />
    </div>
        <!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <form ng-submit="update(datas.nid)">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Update Data</h4>
            </div>
            <div class="modal-body">
                ID = <input type="text" ng-model="datas.nid" readonly /><br />
                Title <input type="text" ng-model="datas.title" /><br /><br />
                Content <textarea cols="50" ng-model="datas.body.und[0].value" rows"250"></textarea><br /><br />
          </div>
          <div class="modal-footer">
              <input type="submit" />
            </div>
            </form>
          </div>
          
        </div>
      </div>
  </div>
</div>