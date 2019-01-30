<?php
  require('config/config.php');
  require('config/db.php');

  // Check For Submit
  if(isset($_POST['delete'])){
    // echo 'Submitted';
    // Get Form Data
    $delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);

    $query = "DELETE FROM Songs WHERE id = {$delete_id}";

    if(mysqli_query($conn, $query)){
        header('Location: '.ROOT_URL.'fetchtest.php');
    } else {
        echo 'ERROR: '.mysqli_error($conn);
    }

  }
  //
  // }
  // echo "test";
  // get ID
  $id = mysqli_real_escape_string($conn, $_GET['id']);
  //create query
  $query = 'SELECT * FROM Songs WHERE id = '.$id;

  //get result
  $result = mysqli_query($conn, $query);

  // Fetch Data
  $song = mysqli_fetch_assoc($result);
  // var_dump($Songs);
  //free result
  mysqli_free_result($result);

  //close connection
  mysqli_close($conn);
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PHP Fetch test</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/cerulean/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
      <a href="<?php echo ROOT_URL; ?>fetchtest.php" class="btn btn-primary">Back</a>
      <h1>Fetch Data</h1>
        <h3><?php echo $song['username']; ?></h3>
        <p><?php echo $song['mail']; ?></p>
        <p><?php echo $song['message']; ?></p>
        <p><?php echo $song['titel1']; ?></p>
        <p><?php echo $song['arties1']; ?></p>
        <p><?php echo $song['url1']; ?></p>
        <p><?php echo $song['titel2']; ?></p>
        <p><?php echo $song['artiest2']; ?></p>
        <p><?php echo $song['url2']; ?></p>
        <p><?php echo $song['titel3']; ?></p>
        <p><?php echo $song['artiest3']; ?></p>
        <p><?php echo $song['url3']; ?></p>
        <form class="float-right" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
          <input type="hidden" name="delete_id" value="<?php echo $song['id']; ?>">
          <input type="submit" name="delete" value="Delete" class="btn btn-danger">
        </form>
        <a href="<?php echo ROOT_URL; ?>editpost.php?id=<?php echo $song['id']; ?>" class="btn btn-primary">Edit</a>
  </div>

  <script
  src="https://code.jquery.com/jquery-1.12.4.js"
  integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="
  crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  </body>
</html>
