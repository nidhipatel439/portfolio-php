<?php

include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');

secure();

if (isset($_POST['title'])) {

  if ($_POST['title'] and $_POST['content']) {

    $query = 'INSERT INTO projects (
        title,
        content,
        github_url,
        project_url
      ) VALUES (
         "' . mysqli_real_escape_string($connect, $_POST['title']) . '",
         "' . mysqli_real_escape_string($connect, $_POST['content']) . '",
         "' . mysqli_real_escape_string($connect, $_POST['github_url']) . '",
         "' . mysqli_real_escape_string($connect, $_POST['project_url']) . '"

      )';
    mysqli_query($connect, $query);

    set_message('Project has been added');
  }

  header('Location: projects.php');
  die();
}

include('includes/header.php');

?>

<h2>Add Project</h2>

<form method="post">

  <label for="title">Title:</label>
  <input type="text" name="title" id="title">

  <br>

  <label for="content">Content:</label>
  <textarea type="text" name="content" id="content" rows="10"></textarea>

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
  <input type="text" name="github_url" id="github_url">

  <br>
  <label for="project_url">Project Url:</label>
  <input type="text" name="project_url" id="project_url">

  <br>

  <input type="submit" value="Add Project">

</form>

<p><a href="projects.php"><i class="fas fa-arrow-circle-left"></i> Return to Project List</a></p>


<?php

include('includes/footer.php');

?>