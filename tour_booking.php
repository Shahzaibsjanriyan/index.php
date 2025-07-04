<?php include 'includes/header.php'; ?>

<?php
$package = $_GET['package'] ?? 'Selected Tour Package';
?>

<div class="container">
  <h3>Book: <?= htmlspecialchars($package) ?></h3>
  <form method="post" action="">
    <div id="traveler-forms">
      <div class="traveler">
        <h4>Traveler 1</h4>
        <input type="text" name="first_name[]" placeholder="First Name (as on passport)" required><br>
        <input type="text" name="last_name[]" placeholder="Last Name (as on passport)" required><br>
        <input type="text" name="passport[]" placeholder="Passport Number" required><br>
      </div>
    </div>

    <label>Number of Persons:</label>
    <input type="number" id="person-count" name="person_count" value="1" min="1" max="10" required>
    <button type="button" onclick="generateTravelers()">Update Travelers</button><br><br>

    <button type="submit">Confirm Booking</button>
  </form>
</div>

<script>
function generateTravelers() {
  const count = parseInt(document.getElementById("person-count").value);
  const container = document.getElementById("traveler-forms");
  container.innerHTML = "";

  for (let i = 1; i <= count; i++) {
    container.innerHTML += `
      <div class="traveler">
        <h4>Traveler ${i}</h4>
        <input type="text" name="first_name[]" placeholder="First Name (as on passport)" required><br>
        <input type="text" name="last_name[]" placeholder="Last Name (as on passport)" required><br>
        <input type="text" name="passport[]" placeholder="Passport Number" required><br>
      </div>
    `;
  }
}
</script>

<?php include 'includes/footer.php'; ?>
