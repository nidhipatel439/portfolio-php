<?php

include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');

secure();

if (isset($_GET['delete'])) {

  $query = 'DELETE FROM experience
    WHERE id = ' . $_GET['delete'] . '
    LIMIT 1';
  mysqli_query($connect, $query);

  set_message('Experience has been deleted');

  header('Location: experience.php');
  die();
}

include('includes/header.php');

$query = 'SELECT *
  FROM experience ORDER BY start DESC';
$result = mysqli_query($connect, $query);

?>

<h2>Manage Experience</h2>

<table>
  <tr>
    <th align="center">ID</th>
    <th align="left">Title</th>
    <th align="center">Start</th>
    <th align="center">End</th>
    <th align="center">Company name</th>
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
      <td><?php echo $record['company_name']; ?></td>
      <td><?php echo $record['location']; ?></td>
      <td align="center"><a href="experience_edit.php?id=<?php echo $record['id']; ?>">Edit</a></td>
      <td align="center">
        <a href="experience.php?delete=<?php echo $record['id']; ?>" onclick="return confirm('Are you sure you want to delete this experience?');">Delete</a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>

<p><a href="experience_add.php">Add Experience</a></p>


<?php

include('includes/footer.php');

?>