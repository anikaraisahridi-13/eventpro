<?php
include 'db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// check if email exists
$check = $conn->prepare("SELECT id FROM users WHERE email=?");
$check->bind_param("s",$email);
$check->execute();
$result = $check->get_result();

if($result->num_rows > 0){
    echo "<h3 style='color:red;text-align:center;'>⚠️ Email already registered!</h3>";
    echo "<p style='text-align:center;'><a href='login.php'>Go to Login</a></p>";
    exit();
}

// insert user
$stmt = $conn->prepare("INSERT INTO users(name,email,password) VALUES(?,?,?)");
$stmt->bind_param("sss",$name,$email,$password);
$stmt->execute();

header("Location: login.php");
?>