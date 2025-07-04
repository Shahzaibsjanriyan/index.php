<?php include 'includes/header.php'; ?>

<?php
$search_success = false;
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['from'], $_GET['to'], $_GET['date'])) {
  $search_success = true;
}
?>

<div style="
  background-image: url('/rs/assets/images/plane.jpg');
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  min-height: 500px;
  padding: 150px 20px;
  text-align: center;
  color: white;">
  <h2>Welcome to RS Airways</h2>
  <p>Book flights, explore destinations, and more!</p>
</div>

<div class="container">
  <h3>Search Flights</h3>
  <form action="index.php" method="GET" class="search-form">
    <label for="from">From:</label>
    <input type="text" name="from" id="from" autocomplete="off" required>

    <label for="to">To:</label>
    <input type="text" name="to" id="to" autocomplete="off" required>

    <label for="date">Date:</label>
    <input type="date" name="date" required 
           min="<?php echo date('Y-m-d'); ?>" 
           max="<?php echo date('Y-m-d', strtotime('+3 months')); ?>">

    <button type="submit">Search</button>
  </form>

  <?php if ($search_success): ?>
    <div id="success-message" style="color: green; font-weight: bold; margin-top: 1rem;">
      ✅ Your details have been sent successfully.<br>
      Your ticket will be shared with you as soon as possible after payment by getting in touch with our representative.
    </div>
  <?php endif; ?>

  <div class="autocomplete-suggestions" id="suggestions-from"></div>
  <div class="autocomplete-suggestions" id="suggestions-to"></div>
</div>

<div class="container tours">
 

  <div class="tour">
    <img src="assets/images/paris.jpg" alt="Paris Tour">
    <h4>Romantic Paris - 5 Days</h4>
    <p>Includes hotel, flight, and guided tours</p>
    <p><strong>PKR 249,000</strong></p>
    <div class="tour-btn-wrapper">
      <a href="tour_booking.php?package=Romantic Paris" class="book-now-btn">Book Now</a>
    </div>
  </div>

  <div class="tour">
    <img src="assets/images/turkey.jpg" alt="Turkey Tour">
    <h4>Discover Turkey - 7 Days</h4>
    <p>Explore Istanbul, Cappadocia & Antalya</p>
    <p><strong>PKR 199,500</strong></p>
    <div class="tour-btn-wrapper">
      <a href="tour_booking.php?package=Discover Turkey" class="book-now-btn">Book Now</a>
    </div>
  </div>
</div>

<!-- ✅ Hide success message after 5 seconds -->
<script>
  setTimeout(function () {
    const msg = document.getElementById("success-message");
    if (msg) msg.style.display = "none";
  }, 5000);
</script>

<?php include 'includes/footer.php'; ?>
