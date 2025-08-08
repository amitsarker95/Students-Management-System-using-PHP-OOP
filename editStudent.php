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
<h2>Edit Student : (<?php echo $student['name'];?>)</h2>
<hr>
<form method="POST">
    <input type="hidden" name="id" value="<?= htmlspecialchars($student['id']) ?>">
    <label for="name">Name: <input type="text" name="name" value="<?= htmlspecialchars($student['name']) ?>"></label><br><br>
    <label for="age">Age: <input type="number" name="age" value="<?= htmlspecialchars($student['age']) ?>"></label><br><br>
    <label for="email">Email: <input type="email" name="email" value="<?= htmlspecialchars($student['email']) ?>"></label><br><br>
    <label for="course">Course: <input type="text" name="course" value="<?= htmlspecialchars($student['course']) ?>"></label><br><br><br>
    <button type="submit">Update</button>
</form>
