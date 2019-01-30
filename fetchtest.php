<?php
  require('config/config.php');
  require('config/db.php');
  // echo "test";
  //create query
  $query = 'SELECT * FROM Songs';

  //get result
  $result = mysqli_query($conn, $query);

  // Fetch Data
  $Songs = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
      <a href="<?php echo ROOT_URL; ?>addposts.php" class="btn btn-primary">Back</a>
      <h1>Fetch Data</h1>
      <?php foreach($Songs as $song) : ?>
      <div class="well">
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
        <a class="btn btn-primary" href="posts.php?id=<?php echo $song['id']; ?>">See your submit</a>
      </div>
      <?php endforeach; ?>
  </div>

  <script
  src="https://code.jquery.com/jquery-1.12.4.js"
  integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="
  crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  </body>
</html>
