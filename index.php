<?php
  require('config/config.php');
  require('config/db.php');
  // echo "test";
  //MESSAGE VARS
  $msg = '';
  $msgClass = '';
  //CHECK FOR SUBMIT
  if(filter_has_var(INPUT_POST, submit)){
      //GET FORM DATA
      $username = htmlspecialchars($_POST['name']);
      $mail = htmlspecialchars($_POST['mail']);
      $message = htmlspecialchars($_POST['bericht']);
      $titel1 = htmlspecialchars($_POST['titel1']);
      $artiest1 = htmlspecialchars($_POST['artiest1']);
      $url1 = htmlspecialchars($_POST['url2']);
      $titel2 = htmlspecialchars($_POST['titel2']);
      $artiest2 = htmlspecialchars($_POST['artiest2']);
      $url2 = htmlspecialchars($_POST['url2']);
      $titel3 = htmlspecialchars($_POST['titel3']);
      $artiest3 = htmlspecialchars($_POST['artiest3']);
      $url3 = htmlspecialchars($_POST['url3']);
      //CHECK REQUIRED FIELDS
      if (!empty($username) && !empty($mail) && !empty($message)) {
          //PASSED
          //CHECK MAIL
          if(filter_var($mail, FILTER_VALIDATE_EMAIL) === false){
              //FAILED
              $msg = 'Please use a valid E-mail';
              $msgClass = 'alert-danger';

          } else {
              //PASSED
              $msg = 'Form has been submitted';
              $msgClass = 'alert-success';
              //echo 'Form has been submitted';

          }
      } else {
        //FAILED
        $msg = 'Please fill in all fields';
        $msgClass = 'alert-danger';

      }
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Birthday Dirk</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <!-- <link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/cosmo/bootstrap.min.css"> -->
    <link rel="stylesheet" href="./assets/css/main.css">
  </head>
  <body>

  <div class="container float-right col-sm-6">
    <div class="">
      <p>Your Entry:</p>
      <p><?php echo $_POST['name']; ?></p>
      <p><?php echo $_POST['mail']; ?></p>
      <p><?php echo $_POST['message']; ?></p>
      <p><?php echo $_POST['titel1']; ?></p>
      <p><?php echo $_POST['artiest1']; ?></p>
      <p><?php echo $_POST['url1']; ?></p>
      <p><?php echo $_POST['titel2']; ?></p>
      <p><?php echo $_POST['artiest2']; ?></p>
      <p><?php echo $_POST['url2']; ?></p>
      <p><?php echo $_POST['titel3']; ?></p>
      <p><?php echo $_POST['artiest3']; ?></p>
      <p><?php echo $_POST['url3']; ?></p>
    </div>
  </div>



  <div class="container float-left col col-sm-6">
    <div>
      <?php if($msg != ''): ?>
        <div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
      <?php endif; ?>
    </div>


    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-group col-12 float-left">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Enter your name" value="<?php echo isset($_POST['name']) ? $name : ''; ?>">
      </div>
      <div class="form-group">
        <label for="Email1">Email address</label>
        <input type="email" name="mail" class="form-control" placeholder="Enter email" value="<?php echo isset($_POST['mail']) ? $mail : ''; ?>">
        <small class="form-text text-muted">Je emailadres wordt niet met anderen gedeeld.</small>
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Laat een bericht achter voor Dirk</label>
        <textarea class="form-control" name="message" rows="3"><?php echo isset($_POST['bericht']) ? $message : ''; ?></textarea>
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

      <button type="submit" class="btn btn-primary">Bewaar</button>
    </form>
  </div>


  <!-- <script
  src="https://code.jquery.com/jquery-1.12.4.js"
  integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="
  crossorigin="anonymous"></script> -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="./assets/js/main.js"></script>
  </body>
</html>
