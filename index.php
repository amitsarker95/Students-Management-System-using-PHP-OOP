<?php

require("oop_classes/User.php");
require("oop_classes/SessionManager.php");

SessionManager::start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = new User($_POST['username'], $_POST['password']);
    if ($user->authenticate()) {
        SessionManager::login($_POST['username']);
        header('Location: dashboard.php');
        echo 'user found';
        exit();
    } else {
        $error = "Invalid username or password";
        echo $error;
    }
}



?>
<div>
    <h2 >Login</h2>
    <hr>
    <form method="POST">
        Username: <input type="text" name="username" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        <button type="submit">Login</button>
    </form>
</div>
