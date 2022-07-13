<?php

include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');

secure();

if (isset($_GET['delete'])) {

  $query = 'DELETE FROM education
    WHERE id = ' . $_GET['delete'] . '
    LIMIT 1';
  mysqli_query($connect, $query);

  set_message('Education has been deleted');

  header('Location: education.php');
  die();
}

include('includes/header.php');

$query = 'SELECT *
  FROM education ORDER BY start DESC';
$result = mysqli_query($connect, $query);

?>

<h2>Manage Education</h2>

<table>
  <tr>
    <th align="center">ID</th>
    <th align="left">Title</th>
    <th align="center">Start</th>
    <th align="center">End</th>
    <th align="center">Degree</th>
    <th align="center">Location</th>
    <th></th>
    <th></th>
  </tr>
  <?php while ($record = mysqli_fetch_assoc($result)) : ?>
    <tr>
      <td><?php echo $record['id']; ?></td>
      <td>
        <?php echo $record['title']; ?>
      </td>
      <td><?php echo $record['start']; ?></td>
      <td><?php echo $record['end']; ?></td>
      <td><?php echo $record['degree']; ?></td>
      <td><?php echo $record['location']; ?></td>
      <td align="center"><a href="education_edit.php?id=<?php echo $record['id']; ?>">Edit</a></td>
      <td align="center">
        <a href="education.php?delete=<?php echo $record['id']; ?>" onclick="return confirm('Are you sure you want to delete this education?');">Delete</a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>

<p><a href="education_add.php">Add Education</a></p>


<?php

include('includes/footer.php');

?>