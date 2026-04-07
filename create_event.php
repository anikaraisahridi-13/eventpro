<?php
session_start();
if(!isset($_SESSION['user_id'])){
 header("Location: login.php");
 exit();
}
?>

<link rel="stylesheet" href="assets/style.css">

<div class="card">
<h2>Create Event</h2>

<form action="create_event_process.php" method="POST" enctype="multipart/form-data">
<input name="title" placeholder="Event Title" required>
<input name="date" type="date" required>
<input type="file" name="image" required>
<button class="btn">Create Event</button>
</form>

</div>