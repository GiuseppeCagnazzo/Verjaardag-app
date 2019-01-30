<?php
  require('config/config.php');
  require('config/db.php');
  // echo "test";

  //Filters and Validation
  if (isset($_POST['submit'])){

    $username = $_POST['username'];
    $mail = $_POST['mail'];
    $message = $_POST['message'];
    $titel1 = $_POST['titel1'];
    $artiest1 = $_POST['artiest1'];
    $url1 = $_POST['url1'];
    $titel2 = $_POST['titel2'];
    $artiest2 = $_POST['artiest2'];
    $url2 = $_POST['url2'];
    $titel3 = $_POST['titel3'];
    $artiest3 = $_POST['artiest3'];
    $url3 = $_POST['url3'];

    if (empty($username) || empty($mail) || empty($message) || empty($titel1) || empty($artiest1) ||  empty($url1) || empty($titel2) || empty($artiest2) || empty($url2) || empty($titel3) || empty($artiest3) || empty($url3)) {
      //header('Location: http://localhost/birthdaydirk/addposts.php');
    }
    else {
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
          // header('Location: http://localhost/birthdaydirk/addposts.php');
      }
      else {
        echo "Sign up the user!";
      }
    }
  }
  else {
    // header('Location: http://localhost/birthdaydirk/addposts.php');
  }

  // Check For Submit
  if(isset($_POST['submit'])){
    // echo 'Submitted';
    // Get Form Data
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

    $query = "INSERT INTO Songs(username, mail, message, titel1, artiest1, url1, titel2, artiest2, url2, titel3, artiest3, url3) VALUES('$username','$mail','$message','$titel1','$artiest1','$url1','$titel2','$artiest2','$url2','$titel3','$artiest3','$url3')";

    if(mysqli_query($conn, $query)){
        header('Location: '.ROOT_URL.'fetchtest.php');
    } else {
        echo 'ERROR: '.mysqli_error($conn);
    }

  }

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add Post</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/cerulean/bootstrap.min.css">

  </head>
  <body>


  <div class="container">
    <h1>Choose your 3 songs</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-group col-6 float-left">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="username" placeholder="Enter your name" value="<?php echo isset($_POST['name']) ? $name : ''; ?>">
      </div>
      <div class="form-group">
        <label for="Email1">Email address</label>
        <input type="email" name="mail" class="form-control" placeholder="Enter email" value="<?php echo isset($_POST['mail']) ? $mail : ''; ?>">
        <small class="form-text text-muted">Je emailadres wordt niet met anderen gedeeld.</small>
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Laat een bericht achter voor Dirk</label>
        <textarea class="form-control" name="message" rows="3"><?php echo isset($_POST['message']) ? $message : ''; ?></textarea>
      </div>
      <h4>Kies je 3 favoriete nummers.</h4>
      <div class="form-group">
        <p>Nummer 1</p>
        <label for="exampleFormControlInput1">Titel</label>
        <input type="text" class="form-control" name="titel1">
        <label for="exampleFormControlInput1">Artiest</label>
        <input type="text" class="form-control" name="artiest1">
        <label for="exampleFormControlInput1">URL</label>
        <input type="text" class="form-control" name="url1">
      </div>
      <div class="form-group">
        <p>Nummer 2</p>
        <label for="exampleFormControlInput1">Titel</label>
        <input type="text" class="form-control" name="titel2">
        <label for="exampleFormControlInput1">Artiest</label>
        <input type="text" class="form-control" name="artiest2">
        <label for="exampleFormControlInput1">URL</label>
        <input type="text" class="form-control" name="url2">
      </div>
      <div class="form-group">
        <p>Nummer 3</p>
        <label for="exampleFormControlInput1">Titel</label>
        <input type="text" class="form-control" name="titel3">
        <label for="exampleFormControlInput1">Artiest</label>
        <input type="text" class="form-control" name="artiest3">
        <label for="exampleFormControlInput1">URL</label>
        <input type="text" class="form-control" name="url3">
      </div>

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
