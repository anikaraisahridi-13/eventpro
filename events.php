<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user_id'])){
 header("Location: login.php");
 exit();
}

$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT * FROM events WHERE user_id=?");
$stmt->bind_param("i",$user_id);
$stmt->execute();

$result = $stmt->get_result();
?>

<link rel="stylesheet" href="assets/style.css">

<div class="container">
<h2>Your Events 🎉</h2>

<?php if($result->num_rows==0): ?>
<div class="card">
<p>No events yet 😢</p>
</div>
<?php endif; ?>

<div class="grid">

<?php while($row=$result->fetch_assoc()): ?>

<div class="event-card">
<img src="uploads/<?php echo $row['image']; ?>">
<h3><?php echo $row['title']; ?></h3>
<p><?php echo $row['event_date']; ?></p>
</div>

<?php endwhile; ?>

</div>
</div>