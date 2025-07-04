<?php
include 'includes/db.php';
session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $res = $stmt->get_result();
    $user = $res->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        // ✅ Store user session data
        $_SESSION['user'] = $user;
        $_SESSION['user_name'] = $user['name']; // ✅ This is used in navbar
        
        // ✅ Redirect after login
        header("Location: index.php"); // or 'dashboard.php' if you want
        exit();
    } else {
        $error = "Invalid email or password!";
    }
}
?>

<?php include 'includes/header.php'; ?>
<div class="container">
  <h3>Login</h3>
  <form method="post" action="">
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Login</button>
  </form>
  <p style="color:red;"><?php echo $error; ?></p>
</div>
<?php include 'includes/footer.php'; ?>
