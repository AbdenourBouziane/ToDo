<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="main.css">
    <style>
        .todo
        {
            margin: auto;
            width: 50%;
            border: 3px white solid;
            padding: 10px;
        }
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
    
    <h1>ToDo List</h1>
    
    <?php if (isset($user)): ?>
        
        <p class="welcome">Hello <?= htmlspecialchars($user["name"]) ?></p>
        
        <p><a href="logout.php">Log out</a></p>

        <header>
		<h1>Task List 2021</h1>
		<form id="new-task-form">
			<input 
				type="text" 
				name="new-task-input" 
				id="new-task-input" 
				placeholder="What do you have planned?" />
			<input 
				type="submit"
				id="new-task-submit" 
				value="Add task" />
		</form>
	</header>
	<main>
		<section class="task-list">
			<h2>Tasks</h2>

			<div id="tasks">

				<!-- <div class="task">
					<div class="content">
						<input 
							type="text" 
							class="text" 
							value="A new task"
							readonly>
					</div>
					<div class="actions">
						<button class="edit">Edit</button>
						<button class="delete">Delete</button>
					</div>
				</div> -->

			</div>
		</section>
	</main>

	<script src="main.js"></script>

        
    <?php else: ?>
        
        <p><a href="login.php">Log in</a> or <a href="signup.html">sign up</a></p>
        
    <?php endif; ?>

    
    
</body>
</html>
    
    
    
    
    
    
    
    
    
    
    