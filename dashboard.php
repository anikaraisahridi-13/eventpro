<?php
session_start();
if(!isset($_SESSION['user_id'])){
 header("Location: login.php");
 exit();
}
?>

<link rel="stylesheet" href="assets/style.css">

<div class="navbar">
  <div class="logo">EVENTPRO</div>
  <a href="logout.php"><button class="btn">Logout</button></a>
</div>

<div class="container">
<h2>Welcome, <?php echo $_SESSION['name']; ?> 👑</h2>

<a href="create_event.php"><button class="btn">➕ Create Event</button></a>
<a href="events.php"><button class="btn">📅 View Events</button></a>
</div>