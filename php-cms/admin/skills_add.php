<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_POST['skill_name'] ) )
{
  
  if( $_POST['skill_name'] )
  {
    
    $query = 'INSERT INTO skills (
        skill_name,
        url
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['skill_name'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['url'] ).'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'Skill has been added' );
    
  }
  
  header( 'Location: skills.php' );
  die();
  
}

include( 'includes/header.php' );

?>

<h2>Add Skill</h2>

<form method="post">
  
  <label for="skill_name">Skill Name:</label>
  <input type="text" name="skill_name" id="skill_name">
  
  <br>
  
  <label for="url">URL:</label>
  <input type="text" name="url" id="url">

  <br>
  
  
  <input type="submit" value="Add Skill">
  
</form>

<p><a href="skills.php"><i class="fas fa-arrow-circle-left"></i> Return to Skills List</a></p>


<?php

include( 'includes/footer.php' );

?>