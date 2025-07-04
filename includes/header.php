<?php
session_start(); // ✅ This MUST be at the very top, before any HTML output
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>RS Airways</title>
  <link rel="stylesheet" href="/rs/assets/css/style.css">
</head>
<body>

<header>
  <h1>RS Airways</h1>
</header>

<nav class="navbar">
  <div class="nav-left">
    <a href="/rs/index.php">Home</a>
    <a href="/rs/register.php">Register</a>
    <a href="/rs/contact.php">Contact</a>
  </div>
  <div class="nav-right">
    <?php if (isset($_SESSION['user_name'])): ?>
      <span style="color: #fff; font-weight: bold;">Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?></span>
      <a href="/rs/logout.php" style="margin-left: 15px;">Logout</a>
    <?php else: ?>
      <a href="/rs/login.php">Login</a>
    <?php endif; ?>
  </div>
</nav>

