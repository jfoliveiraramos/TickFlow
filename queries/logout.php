<?php

session_start();
session_unset();
session_destroy();

error_log("Logout");
header("Location: ../authentication.php");

?>