<?php

include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');

secure();

if (!isset($_GET['id'])) {

  header('Location: experience.php');
  die();
}

if (isset($_POST['title'])) {

  if ($_POST['title']) {

    $query = 'UPDATE experience SET
      title = "' . mysqli_real_escape_string($connect, $_POST['title']) . '",
      start = "' . mysqli_real_escape_string($connect, $_POST['start']) . '",
      end = "' . mysqli_real_escape_string($connect, $_POST['end']) . '",
      degree = "' . mysqli_real_escape_string($connect, $_POST['company_name']) . '",
      location = "' . mysqli_real_escape_string($connect, $_POST['location']) . '"
      WHERE id = ' . $_GET['id'] . '
      LIMIT 1';
    mysqli_query($connect, $query);

    set_message('Experience has been updated');
  }

  header('Location: experience.php');
  die();
}


if (isset($_GET['id'])) {

  $query = 'SELECT *
    FROM experience
    WHERE id = ' . $_GET['id'] . '
    LIMIT 1';
  $result = mysqli_query($connect, $query);

  if (!mysqli_num_rows($result)) {

    header('Location: experience.php');
    die();
  }

  $record = mysqli_fetch_assoc($result);
}

include('includes/header.php');

?>

<h2>Edit Experience</h2>

<form method="post">

  <label for="title">Title:</label>
  <input type="text" name="title" id="title" value="<?php echo $record['title']; ?>">

  <br>

  <label for="start">Start:</label>
  <input type="text" name="start" id="start" value="<?php echo $record['start']; ?>">

  <br>

  <label for="end">End:</label>
  <input type="text" name="end" id="end" value="<?php echo $record['end']; ?>">

  <br>
  <label for="company_name">Company name:</label>
  <input type="text" name="company_name" id="company_name" value="<?php echo $record['company_name']; ?>">

  <br>
  <label for="location">Location:</label>
  <input type="text" name="location" id="location" value="<?php echo $record['location']; ?>">

  <br>



  <input type="submit" value="Edit Experience">

</form>

<p><a href="experience.php">Return to experience List</a></p>


<?php

include('includes/footer.php');

?>