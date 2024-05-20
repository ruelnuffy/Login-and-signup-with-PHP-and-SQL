<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css">
   <script src="https://kit.fontawesome.com/a076d05399.js"></script>
   <style>
    .error{
      color: white;
    }
    .success{
      color: white;
    }
    </style>
  </head>
  <body>
    <div class="bg-img">
      <div class="content">
        <header></header>
        <header>Signup Form</header>
        <?php
    session_start();
    if (isset($_SESSION['error_message'])) {
        echo '<p class="error">' . $_SESSION['error_message'] . '</p>';
        unset($_SESSION['error_message']);
    }
    if (isset($_SESSION['success_message'])) {
        echo '<p class="success">' . $_SESSION['success_message'] . '</p>';
        unset($_SESSION['success_message']);
    }
    ?>
        <form action="process_form.php" method="POST">
            <div class="field">
                <span class="fa fa-user"></span>
                <input type="text" name="fullname" required placeholder="Enter Your Fullname">
            </div>
            <div class="field">
                <span class="fa fa-user"></span>
                <input type="text" name="phone" required placeholder="Enter Your Phone Number">
            </div>
            <div class="field">
                <span class="fa fa-user"></span>
                <input type="email" name="email" required placeholder="Email or Phone">
            </div>
            <div class="field space">
                <span class="fa fa-lock"></span>
                <input type="password" name="password" class="pass-key" required placeholder="Password">
                <span class="show">SHOW</span>
            </div>
            <div class="field space">
                <span class="fa fa-lock"></span>
                <input type="password" name="confirm_password" class="pass-key" required placeholder="Confirm Password">
                <span class="show">SHOW</span>
            </div>
            <div class="field">
                <input type="submit" name="submit" value="Sign Up">
            </div>
        </form>
        
       
        
        <div class="signup">Have an account Already?
          <a href="./index.php">Login Now</a>
        </div>
        <div class="signup">
            <a href="#">Back Home</a>
        </div>
      </div>
    </div>

    <script>
      const pass_field = document.querySelector('.pass-key');
      const showBtn = document.querySelector('.show');
      showBtn.addEventListener('click', function(){
       if(pass_field.type === "password"){
         pass_field.type = "text";
         showBtn.textContent = "HIDE";
         showBtn.style.color = "#3498db";
       }else{
         pass_field.type = "password";
         showBtn.textContent = "SHOW";
         showBtn.style.color = "#222";
       }
      });
    </script>


  </body>
</html>
