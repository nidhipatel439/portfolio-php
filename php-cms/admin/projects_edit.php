<?php

include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');

secure();

if (!isset($_GET['id'])) {

  header('Location: projects.php');
  die();
}

if (isset($_POST['title'])) {

  if ($_POST['title'] and $_POST['content']) {

    $query = 'UPDATE projects SET
      title = "' . mysqli_real_escape_string($connect, $_POST['title']) . '",
      content = "' . mysqli_real_escape_string($connect, $_POST['content']) . '",
      github_url = "' . mysqli_real_escape_string($connect, $_POST['github_url']) . '",
      github_url = "' . mysqli_real_escape_string($connect, $_POST['project_url']) . '"
      WHERE id = ' . $_GET['id'] . '
      LIMIT 1';
    mysqli_query($connect, $query);

    set_message('Project has been updated');
  }

  header('Location: projects.php');
  die();
}


if (isset($_GET['id'])) {

  $query = 'SELECT *
    FROM projects
    WHERE id = ' . $_GET['id'] . '
    LIMIT 1';
  $result = mysqli_query($connect, $query);

  if (!mysqli_num_rows($result)) {

    header('Location: projects.php');
    die();
  }

  $record = mysqli_fetch_assoc($result);
}

include('includes/header.php');

?>

<h2>Edit Project</h2>

<form method="post">

  <label for="title">Title:</label>
  <input type="text" name="title" id="title" value="<?php echo htmlentities($record['title']); ?>">

  <br>

  <label for="content">Content:</label>
  <textarea type="text" name="content" id="content" rows="5"><?php echo htmlentities($record['content']); ?></textarea>

  <script>
    ClassicEditor
      .create(document.querySelector('#content'))
      .then(editor => {
        console.log(editor);
      })
      .catch(error => {
        console.error(error);
      });
  </script>

  <br>

  <label for="github_url">Github Url:</label>
  <input type="text" name="github_url" id="github_url" value="<?php echo htmlentities($record['github_url']); ?>">

  <br>

  <label for="project_url">Project Url:</label>
  <input type="text" name="project_url" id="project_url" value="<?php echo htmlentities($record['project_url']); ?>">


  <br>

  <input type="submit" value="Edit Project">

</form>

<p><a href="projects.php"><i class="fas fa-arrow-circle-left"></i> Return to Project List</a></p>


<?php

include('includes/footer.php');

?>