<?php
// Make sure RequirePHP is installed.
require '../../lib/require.php';
?>
<!doctype html>
<html ng-app="todoApp">
	<head>
		<title>Nymph Angular Todo App</title>
		<script type="text/javascript">
			(function(){
				var s = document.createElement("script"); s.setAttribute("src", "https://www.promisejs.org/polyfills/promise-5.0.0.min.js");
				(typeof Promise !== "undefined" && typeof Promise.all === "function") || document.getElementsByTagName('head')[0].appendChild(s);
			})();
			NymphOptions = {
				restURL: '../rest.php'
			};
		</script>
		<style type="text/css">
			label.list-group-item {
				font-weight: normal;
				cursor: pointer;
			}
			span.done-true {
				text-decoration: line-through;
				color: grey;
			}
		</style>
		<script src="../../src/Nymph.js"></script>
		<script src="../../src/Entity.js"></script>
		<script src="../classes/Todo.js"></script>

		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.0-rc.1/angular.min.js"></script>
		<script src="todoApp.js"></script>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	</head>
	<body>
		<div class="container" ng-controller="TodoController">
			<div class="row">
				<div class="col-lg-8">
					<div class="page-header">
						<h2>Todo</h2>
					</div>
					<div class="row">
						<div class="col-sm-8">
							<div class="list-group" style="clear: both;">
								<label ng-repeat="todo in todos" class="list-group-item list-group-item-{{todo.data.done ? 'success' : 'warning'}}">
									<input type="checkbox" ng-model="todo.data.done" ng-change="save(todo)">
									<span class="done-{{todo.data.done}}">{{todo.data.name}}</span>
								</label>
							</div>
						</div>
						<div ng-show="todos.length > 0" class="col-sm-4" style="text-align: center; margin-bottom: 1em;">
							<small class="alert alert-info" style="display: block;">{{remaining()}} of {{todos.length}} remaining [ <a href="" ng-click="archive()">archive</a> ]</small>
							<div ng-show="todos.length > 1" style="text-align: left;">
								Sort: <br>
								<label style="font-weight: normal;">
									<input type="radio" ng-model="sort" ng-change="sortTodos()" name="sort" value="name"> Alpha</label>
								&nbsp;&nbsp;&nbsp;
								<label style="font-weight: normal;">
									<input type="radio" ng-model="sort" ng-change="sortTodos()" name="sort" value="cdate"> Created</label>
							</div>
						</div>
					</div>


					<form ng-submit="addTodo()">
						<div class="row">
							<div class="col-xs-10">
								<input class="form-control" type="text" ng-model="todoText" placeholder="add new todo here">
							</div>
							<div class="col-xs-2" style="text-align: right;">
								<input class="btn btn-default" type="submit" value="add">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>