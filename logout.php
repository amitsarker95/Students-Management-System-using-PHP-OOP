<?php

require("oop_classes/SessionManager.php");
SessionManager::start();
SessionManager::logout();

header("Location: index.php");
exit;

?>