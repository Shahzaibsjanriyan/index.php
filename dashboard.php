<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
include 'includes/header.php';
?>

<div class="container">
  <h2>Welcome, <?php echo htmlspecialchars($_SESSION['user']['name']); ?>!</h2>
  <p>You are now logged in to RS Airways.</p>
  <a href="logout.php">Logout</a>
</div>

<?php include 'includes/footer.php'; ?>
