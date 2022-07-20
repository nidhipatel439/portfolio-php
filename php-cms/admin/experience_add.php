<?php

include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');

secure();

if (isset($_POST['title'])) {

  if ($_POST['title']) {

    $query = 'INSERT INTO experience (
        title,
        start,
        end,
        company_name,
        location
      ) VALUES (
         "' . mysqli_real_escape_string($connect, $_POST['title']) . '",
         "' . mysqli_real_escape_string($connect, $_POST['start']) . '",
         "' . mysqli_real_escape_string($connect, $_POST['end']) . '",
         "' . mysqli_real_escape_string($connect, $_POST['company_name']) . '",
         "' . mysqli_real_escape_string($connect, $_POST['location']) . '"
      )';
    mysqli_query($connect, $query);

    set_message('Experience has been added');
  }

  header('Location: experience.php');
  die();
}

include('includes/header.php');

?>

<h2>Add experience</h2>

<form method="post">

  <label for="title">Title:</label>
  <input type="text" name="title" id="title">

  <br>

  <label for="start">Start:</label>
  <input type="text" name="start" id="start">
  <br>

  <label for="end">End:</label>
  <input type="text" name="end" id="end">

  <br>
  <label for="company_name">Company name:</label>
  <input type="text" name="company_name" id="company_name">

  <br>
  <label for="location">Location:</label>
  <input type="text" name="location" id="location">

  <br>

  <input type="submit" value="Add Experience">

</form>

<p><a href="experience.php">Return to Experience List</a></p>


<?php

include('includes/footer.php');

?>