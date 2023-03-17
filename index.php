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
    <style>
        .todo
        {
            margin: auto;
            width: 50%;
            border: 3px white solid;
            padding: 10px;
        }
    </style>
</head>
<body>
    
    <h1>ToDo List</h1>
    
    <?php if (isset($user)): ?>
        
        <p>Hello <?= htmlspecialchars($user["name"]) ?></p>
        
        <p><a href="logout.php">Log out</a></p>

        <div class="todo">
            <label for="name">Done</label>
            <input type="checkbox">
            <input type="text" id="name" name="name">
        </div>

    <div class="todo">
            <label for="name">Done</label>
            <input type="checkbox">
            <input type="text" id="name" name="name">
        </div>
    <div class="todo">
            <label for="name">Done</label>
            <input type="checkbox">
            <input type="text" id="name" name="name">
        </div>
        <div class="todo">
            <label for="name">Done</label>
            <input type="checkbox">
            <input type="text" id="name" name="name">
        </div>
        <div class="todo">
            <label for="name">Done</label>
            <input type="checkbox">
            <input type="text" id="name" name="name">
        </div>
        <div class="todo">
            <label for="name">Done</label>
            <input type="checkbox">
            <input type="text" id="name" name="name">
        </div>
        <div class="todo">
            <label for="name">Done</label>
            <input type="checkbox">
            <input type="text" id="name" name="name">
        </div>
        <div class="todo">
            <label for="name">Done</label>
            <input type="checkbox">
            <input type="text" id="name" name="name">
        </div>
        <div class="todo">
            <label for="name">Done</label>
            <input type="checkbox">
            <input type="text" id="name" name="name">
        </div>

        
    <?php else: ?>
        
        <p><a href="login.php">Log in</a> or <a href="signup.html">sign up</a></p>
        
    <?php endif; ?>

    
    
</body>
</html>
    
    
    
    
    
    
    
    
    
    
    