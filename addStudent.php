<?php

require("oop_classes/Student.php");
require("oop_classes/SessionManager.php");

SessionManager::protect();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student = new Student();
    $student->addStudent(
        [
            'name' => $_POST['name'],
            'age' => $_POST['age'],
            'email' => $_POST['email'],
            'course' => $_POST['course']
        ]
        );
    header('Location: dashboard.php');
    exit;
}


?>



<h2>Add Student</h2><hr>
<form method="POST">
    Name: <input type="text" name="name" required><br><br>
    Age: <input type="number" name="age" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    Course: <input type="text" name="course" required><br><br><br>
    <button type="submit">Add</button>
</form>
<a href="dashboard.php">⬅ Back</a>