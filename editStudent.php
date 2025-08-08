<?php

require("oop_classes/Student.php");
require("oop_classes/SessionManager.php");

SessionManager::protect();

$studentObj = new Student();
$student = $studentObj->getStudentById($_GET['id']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentObj->updateStudent([
        'id' => $_POST['id'], 
        'name' => $_POST['name'],
        'age' => $_POST['age'],
        'email' => $_POST['email'],
        'course' => $_POST['course']
    ]);
    header("Location: dashboard.php");
    exit;
}
?>

<form method="POST">
    <input type="hidden" name="id" value="<?= htmlspecialchars($student['id']) ?>">
    Name: <input type="text" name="name" value="<?= htmlspecialchars($student['name']) ?>"><br>
    Age: <input type="number" name="age" value="<?= htmlspecialchars($student['age']) ?>"><br>
    Email: <input type="email" name="email" value="<?= htmlspecialchars($student['email']) ?>"><br>
    Course: <input type="text" name="course" value="<?= htmlspecialchars($student['course']) ?>"><br>
    <button type="submit">Update</button>
</form>
