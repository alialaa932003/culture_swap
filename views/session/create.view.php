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

        <div class="form-content" action="/culture_swap/login">
          <form method="POST" class="form">
            <input type="text" class="username-input" name="email" placeholder="Enter your email "pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please enter a valid email address" required>
            <input type="password" class="password-input" name="password" placeholder="Enter your Password" pattern=".{8,}" title="Password must be at least 8 characters long" required>
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