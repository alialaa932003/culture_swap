
<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  require base_path("views/partials/head.view.php");
  ?>


  <link rel="stylesheet" href="/culture_swap/public/assets/css/signup/host.css">
  <title>signup</title>
</head>

<body>
  <?php
  require base_path("views/partials/nav.view.php");
  ?>

  <header class="section-padding">
    <h2>Host Sign Up</h2>
    <section>
      <form action="#" method="post">
        <label for="user-name">User Name:</label>
        <input type="text" id="user-name" name="user-name" placeholder="Enter your user name" required><br>

        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" placeholder="Enter your first name" required><br>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" placeholder="Enter your last name" required><br>

        <label for="telephone">Telephone Number:</label>
        <input type="tel" id="telephone" name="telephone" placeholder="Enter your telephone number" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required><br>

        <label for="password">Choose Password:</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required><br>

        <label for="confirm_password">Repeat Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" placeholder="confirm your password"
          required><br>

        <label for="country">Country:</label>
        <input type="text" id="country" name="country" placeholder="Enter your country" required><br>

        <label for="city">City:</label>
        <input type="text" id="city" name="city" placeholder="Enter your city" required><br>

        <label for="street">Street (including number):</label>
        <input type="text" id="street" name="street" placeholder="Enter your street" required><br>

        <label for="about_family">Tell Us About You and Your Family:</label>
        <textarea id="about_family" name="about_family" placeholder="for example: your experance "
          rows="10" required></textarea><br>

        <label for="help_with">What Are You Looking for Help With?</label><br>
        <input type="checkbox" id="help_none" name="help_with[]" value="none" checked>
        <label for="help_none">Farmstay help</label><br>
        <input type="checkbox" id="help_one" name="help_with[]" value="one">
        <label for="help_one">Creating/ Cooking family meals</label><br>
        <input type="checkbox" id="help_two" name="help_with[]" value="two" required>
        <label for="help_two">Art Projects</label><br>
        <input type="checkbox" id="help_three" name="help_with[]" value="three">
        <label for="help_three">Animal Care</label><br>
        <input type="checkbox" id="help_four" name="help_with[]" value="four">
        <label for="help_four">Teaching </label><br>
        <input type="checkbox" id="help_five" name="help_with[]" value="five">
        <label for="help_five">Language practice</label><br>

        <label for="more_info">Some More Information:</label><br>
        <input type="checkbox" id="info_none" name="more_info[]" value="none" checked>
        <label for="info_none">Do you have Internet access? </label><br>
        <input type="checkbox" id="info_one" name="more_info[]" value="one">
        <label for="info_one">Is your internet access limited? </label><br>
        <input type="checkbox" id="info_two" name="more_info[]" value="two">
        <label for="info_two">Do you have animals/pets</label><br>
        <input type="checkbox" id="info_three" name="more_info[]" value="three" required>
        <label for="info_three">Are you smokers?</label><br>

        <button type="submit" class="main-btn">Sign Up</button>
      </form>

    </section>
  </header>


  <?php
  require base_path("views/partials/footer.view.php");
  ?>
  <?php
  require base_path("views/partials/scripts.view.php");
  ?>
  
</body>

</html>