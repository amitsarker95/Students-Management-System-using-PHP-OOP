<?php

require("oop_classes/Student.php");
require("oop_classes/SessionManager.php");

SessionManager::protect();

$student = new Student();
$students = $student->getAllStudents();


?>



<h2>Student Dashboard</h2>
<p>Welcome, <?= $_SESSION['username'] ?> | <a href="logout.php">Logout</a></p>
<a href="addStudent.php">➕ Add New Student</a><br>

<table border="" cellpadding="5">
    <tr>
        <th>Name</th><th>Age</th><th>Email</th><th>Course</th><th>Actions</th>
    </tr>
    <?php foreach ($students as $st): ?>
    <tr>
        <td><?= $st['name'] ?></td><br>
        <td><?= $st['age'] ?></td><br>
        <td><?= $st['email'] ?></td><br>
        <td><?= $st['course'] ?></td><br>
        <td>
            <a href="edit.php?id=<?= $st['id'] ?>">Edit</a> | 
            <a href="delete.php?id=<?= $st['id'] ?>" onclick="return confirm('Delete this student?')">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>