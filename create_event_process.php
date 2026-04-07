<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user_id'])){
 header("Location: login.php");
 exit();
}

$title = $_POST['title'];
$date = $_POST['date'];

$image = $_FILES['image']['name'];
$tmp = $_FILES['image']['tmp_name'];

$newName = time()."_".$image;

move_uploaded_file($tmp,"uploads/".$newName);

$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("INSERT INTO events(title,event_date,image,user_id) VALUES(?,?,?,?)");
$stmt->bind_param("sssi",$title,$date,$newName,$user_id);
$stmt->execute();

header("Location: events.php");
?>