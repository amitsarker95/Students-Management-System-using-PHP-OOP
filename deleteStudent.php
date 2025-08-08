<?php

require("oop_classes/Student.php");
require("oop_classes/SessionManager.php");

SessionManager::protect();

$student = new Student();
if(isset($_GET["id"])){
    $student->deleteStudent($_GET["id"]);
}

header("Location: dashboard.php");
exit;


?>