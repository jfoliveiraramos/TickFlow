<?php

include_once("../util.php");

session_start();

$email = $_POST['email'];
$password = $_POST['pwd'];

if ($email == "" || $password == ""){
    $_SESSION["error"] = new MyError("Login", "All fields are required");
    header("Location: ../auth_page.php");
    exit();
}

$db = new PDO('sqlite:../database/database.db');

$query = $db->prepare("SELECT * FROM User WHERE email = '$email' AND password = '$password' ");
$query->execute();

$users = $query->fetchAll();

$count = count($users);

if ($count == 1){

    $user_info = $users[0];

    $_SESSION["user"] = new User($user_info['email'], $user_info['name'], $user_info['role']);
    $_SESSION["error"] = "";
    header("Location: ../landing.php");
    exit();
}
else{       
    $_SESSION["error"] = new MyError("Login", "Email or password incorrect");
    header("Location: ../auth_page.php");
    exit();
}

?>