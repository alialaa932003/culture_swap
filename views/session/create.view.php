<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  require base_path("views/partials/head.view.php");
  ?>

  <link rel="stylesheet" href="/culture_swap/public/assets/css/login/login.css">
  <title>login</title>
</head>

<body>



  <div class="login-section section-padding">
    <div class="container">
      <div class="login-form">

        <a href="/culture_swap" class="back-link"><img src="public/assets/imgs/login/left-arrow.png" class="back-icon"></a> 
        <div class="logo">
          <img src="public/assets/imgs/login/logo.png">
        </div>

        <div class="form-content">
          <form method="POST" class="form">
            <input type="text" class="username-input" name="username" placeholder="Username" required>
            <input type="password" class="password-input" name="password" placeholder="Password" required>
            <label class="remember-pass"><input type="checkbox" name="Remember-password">Remember Password</label>
            
            <button type="submit" class="submit main-btn btn">Log In</button>
          </form>
        </div>

      </div>
    </div>
  </div>





  <?php
  require base_path("views/partials/scripts.view.php");
  ?>

</body>

</html>