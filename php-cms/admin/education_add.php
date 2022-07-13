<?php

include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');

secure();

if (isset($_POST['title'])) {

  if ($_POST['title']) {

    $query = 'INSERT INTO education (
        title,
        start,
        end,
        degree,
        location
      ) VALUES (
         "' . mysqli_real_escape_string($connect, $_POST['title']) . '",
         "' . mysqli_real_escape_string($connect, $_POST['start']) . '",
         "' . mysqli_real_escape_string($connect, $_POST['end']) . '",
         "' . mysqli_real_escape_string($connect, $_POST['degree']) . '",
         "' . mysqli_real_escape_string($connect, $_POST['location']) . '"
      )';
    mysqli_query($connect, $query);

    set_message('Education has been added');
  }

  header('Location: education.php');
  die();
}

include('includes/header.php');

?>

<h2>Add Education</h2>

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
  <label for="degree">Degree:</label>
  <input type="text" name="degree" id="degree">

  <br>
  <label for="location">Location:</label>
  <input type="text" name="location" id="location">

  <br>

  <input type="submit" value="Add Education">

</form>

<p><a href="education.php">Return to Education List</a></p>


<?php

include('includes/footer.php');

?>