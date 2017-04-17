<?php 
  #include title
  $page_title = "Log In";

  #include header
  include 'includes/header.php';

  #include database
  include 'includes/database.php';

  #include functions
  include 'includes/functions.php';

  $errors = [];
  if(array_key_exists("login", $_POST)) {

    if(empty($_POST['email'])) {
      $errors['email'] = "Please enter email";
    }
    if(empty($_POST['password'])) {
      $errors['password'] = "Please enter password";
    }
    if(empty($errors)) {
      #do database stuff
      $clean = array_map('trim', $_POST);
      $cross = userLogin($conn, $clean);

      if($cross[0]) {
        $_SESSION['id'] = $cross[1]['user_id'];
        $_SESSION['email'] = $cross[1]['email'];

        header("Location:index.php");
      } else {
        redirect("userLogin.php?msg=incorrect email or password");
      }

    }

  }

?>

<body id="login">

  <div class="main">
    <div class="login-form">
      <form class="def-modal-form" action="userLogin.php" method="POST">
        <div class="cancel-icon close-form"></div>
        <label for="login-form" class="header"><h3>Login</h3></label>
       
        <?php 
            displayErrors($errors, 'email');
        ?>

        <input type="text" class="text-field email" name="email" placeholder="Email">
      
      <?php 
          displayErrors($errors, 'password'); 
      ?>
        <input type="password" class="text-field password" name="password" placeholder="Password">
        <!--clear the error and use it later just to show you how it works -->
      
        <input type="submit" class="def-button login" name="login" value="Login">
      </form>
    </div>
  </div>
  <!-- footer starts here-->
  <?php 
    include 'includes/footer.php';
  ?>
</body>