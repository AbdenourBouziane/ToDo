<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Todo</title>
	<script src="files/text.js"></script>
    <link
      rel="stylesheet"
      href="files/style.css"/>

    <style>
      .app-container {
        height: 100vh;
        width: 100%;
      }
      .complete {
        text-decoration: line-through;
      }
    </style>
</head>
<body>

	<a href="logout.php">Logout</a>
	<h1>Welcome to Todo App</h1>

	<br>
	Hello, <?php echo $user_data['user_name']; ?>

	<div
      class="app-container d-flex align-items-center justify-content-center flex-column"
      ng-app="myApp"
      ng-controller="myController"
    >
      {{ task_name }}
      <h3>Todo App</h3>
      <div class="d-flex align-items-center mb-3">
        <div class="form-group mr-3 mb-0">
          <input
            ng-model="yourTask"
            type="text"
            class="form-control"
            id="formGroupExampleInput"
            placeholder="Enter a task here"
          />
        </div>
        <button
          type="button"
          class="btn btn-primary mr-3"
          ng-click="saveTask()"
        >
          Save
        </button>
        <button type="button" class="btn btn-warning" ng-click="getTask()">
          Get Tasks
        </button>
      </div>
      {{ yourName }}
      <div class="table-wrapper">
        <table class="table table-hover table-bordered">
          <thead>
            <tr>
              <th>No.</th>
              <th>Todo item</th>
              <th>status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr
              ng-repeat="task in tasks"
              class="{{ task.status ? 'table-success' : 'table-light' }}"
            >
              <td>{{ $index + 1 }}</td>
              <td class="{{ task.status ? 'complete' : 'task' }}">
                {{ task.task_name }}
              </td>
              <td>{{ task.status ? "Completed" : "In progress" }}</td>
              <td>
                <button class="btn btn-danger" ng-click="delete($index)">
                  Delete
                </button>
                <button class="btn btn-success" ng-click="finished($index)">
                  Finished
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <script>
      var app = angular.module("myApp", []);
      app.controller("myController", function($scope) {
        $scope.tasks = [];
        // $scope.saved = localStorage.getItem("tasks");
        // $scope.tasks =
        //   localStorage.getItem("tasks") !== null
        //     ? JSON.parse($scope.saved)
        //     : [
        //         { task_name: "Learn AngularJS", status: false },
        //         { task_name: "Build an Angular app", status: false }
        //       ];
        // localStorage.setItem("tasks", JSON.stringify($scope.tasks));
        $scope.saveTask = function() {
          $scope.tasks.push({ task_name: $scope.yourTask, status: false });
          //   localStorage.setItem("tasks", JSON.stringify($scope.tasks));
        };
        $scope.getTask = function() {
          var oldTasks = $scope.tasks;
          $scope.tasks = [];
          angular.forEach(oldTasks, function(task) {
            if (!task.done) $scope.tasks.push(task);
          });
          localStorage.setItem("tasks", JSON.stringify($scope.tasks));
        };
        $scope.delete = function(i) {
          $scope.tasks.splice(i, 1);
        };
        $scope.finished = function(i) {
          $scope.tasks[i].status = true;
        };
      });
    </script>
    <script
      src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
      integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
      integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
      crossorigin="anonymous"
    ></script>

	
</body>
</html>