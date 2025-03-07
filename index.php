
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
   <script src="https://kit.fontawesome.com/a076d05399.js"></script>
   <style>
    .error{
      color: white;
    }
   </style>
  </head>
  <body>
    <div class="bg-img">
      <div class="content">
        <header></header>
        <header>Login Form</header>
        <?php
    session_start();
    if (isset($_SESSION['login_error'])) {
        echo '<p class="error">' . $_SESSION['login_error'] . '</p>';
        unset($_SESSION['login_error']);
    }
    ?>
        <form method="post" action="signin.php">
          <div class="field">
              <span class="fa fa-user"></span>
              <input type="text" name="email" required placeholder="Email or Phone">
          </div>
          <div class="field space">
              <span class="fa fa-lock"></span>
              <input type="password" name="password" class="pass-key" required placeholder="Password">
              <span class="show">SHOW</span>
          </div>
          <div class="field">
              <input type="submit" value="LOGIN">
          </div>
      </form>
      
       
        
        <div class="signup">Don't have account?
          <a href="./signup.php">Signup Now</a>
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
