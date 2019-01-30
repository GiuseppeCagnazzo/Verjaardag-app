<?php
  require('config/config.php');
  require('config/db.php');
  // echo "test";

  // Check For Submit
  if(isset($_POST['submit'])){
    // echo 'Submitted';
    // Get Form Data
    $update_id = mysqli_real_escape_string($conn, $_POST['update_id']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $mail = mysqli_real_escape_string($conn, $_POST['mail']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    $titel1 = mysqli_real_escape_string($conn, $_POST['titel1']);
    $artiest1 = mysqli_real_escape_string($conn, $_POST['artiest1']);
    $url1 = mysqli_real_escape_string($conn, $_POST['url1']);
    $titel2 = mysqli_real_escape_string($conn, $_POST['titel2']);
    $artiest2 = mysqli_real_escape_string($conn, $_POST['artiest2']);
    $url2 = mysqli_real_escape_string($conn, $_POST['url2']);
    $titel3 = mysqli_real_escape_string($conn, $_POST['titel3']);
    $artiest3 = mysqli_real_escape_string($conn, $_POST['artiest3']);
    $url3 = mysqli_real_escape_string($conn, $_POST['url3']);

    $query = "UPDATE Songs SET
    username= '$username',
    mail = '$mail',
    message = '$message',
    titel1 = '$titel1',
    artiest1 = '$artiest1',
    url1 = '$url1',
    titel2 = '$titel2',
    artiest2 = '$artiest2',
    url2 = '$url2',
    titel3 = '$titel3',
    artiest3 = '$artiest3',
    url3 = '$url3'
    WHERE id = {$update_id}";

    if(mysqli_query($conn, $query)){
        header('Location: '.ROOT_URL.'fetchtest.php');
    } else {
        echo 'ERROR: '.mysqli_error($conn);
    }

  }

  // get ID
  $id = mysqli_real_escape_string($conn, $_GET['id']);
  //create query
  $query = 'SELECT * FROM Songs WHERE id = '.$id;

  //get result
  $result = mysqli_query($conn, $query);

  // Fetch Data
  $song = mysqli_fetch_assoc($result);
  // var_dump($song);
  //free result
  mysqli_free_result($result);

  //close connection
  mysqli_close($conn);

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit Post</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/cerulean/bootstrap.min.css">
  </head>
  <body>


  <div class="container">
    <h1>Add Data</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-group col-12 float-left">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="username" value="<?php echo $song['username']; ?>">
      </div>
      <div class="form-group">
        <label for="Email1">Email address</label>
        <input type="email" name="mail" class="form-control" value="<?php echo $song['mail']; ?>">
        <small class="form-text text-muted">Je emailadres wordt niet met anderen gedeeld.</small>
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Laat een bericht achter voor Dirk</label>
        <textarea class="form-control" name="message" rows="3"><?php echo $song['message']; ?></textarea>
      </div>
      <h4>Kies je 3 favoriete nummers.</h4>
      <div class="form-group">
        <p>Nummer 1</p>
        <label for="exampleFormControlInput1">Titel</label>
        <input type="text" class="form-control" name="titel1" value="<?php echo $song['titel1']; ?>">
        <label for="exampleFormControlInput1">Artiest</label>
        <input type="text" class="form-control" name="artiest1" value="<?php echo $song['artiest1']; ?>">
        <label for="exampleFormControlInput1">URL</label>
        <input type="text" class="form-control" name="url1" value="<?php echo $song['url1']; ?>">
      </div>
      <div class="form-group">
        <p>Nummer 2</p>
        <label for="exampleFormControlInput1">Titel</label>
        <input type="text" class="form-control" name="titel2" value="<?php echo $song['titel2']; ?>">
        <label for="exampleFormControlInput1">Artiest</label>
        <input type="text" class="form-control" name="artiest2" value="<?php echo $song['artiest2']; ?>">
        <label for="exampleFormControlInput1">URL</label>
        <input type="text" class="form-control" name="url2" value="<?php echo $song['url2']; ?>">
      </div>
      <div class="form-group">
        <p>Nummer 3</p>
        <label for="exampleFormControlInput1">Titel</label>
        <input type="text" class="form-control" name="titel3" value="<?php echo $song['titel3']; ?>">
        <label for="exampleFormControlInput1">Artiest</label>
        <input type="text" class="form-control" name="artiest3" value="<?php echo $song['artiest3']; ?>">
        <label for="exampleFormControlInput1">URL</label>
        <input type="text" class="form-control" name="url3" value="<?php echo $song['url3']; ?>">
      </div>
      <input type="hidden" name="update_id" value="<?php echo $song['id']; ?>">
      <button name="submit" type="submit" class="btn btn-primary">Bewaar</button>
    </form>
  </div>

  <script
  src="https://code.jquery.com/jquery-1.12.4.js"
  integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="
  crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  </body>
</html>
