
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
      <form action="/culture_swap/signup/host" method="POST">
        <label for="user-name">User Name:</label>
        <input type="text" id="user-name" name="user-name" placeholder="Enter your user name" required><br>

        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first-name" placeholder="Enter your first name" required><br>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last-name" placeholder="Enter your last name" required><br>

        <label for="telephone">Telephone Number:</label>
        <input type="tel" id="telephone" name="phone-number" placeholder="Enter your telephone number" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required><br>

        <label for="password">Choose Password:</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required><br>

       
          <label for="profile-photo">Profile image:</label>
				<input type="file" id="profile-photo" name="profile-photo" accept="image/*" required><br>

				<label for="profile-photo">cover image:</label>
				<input type="file" id="profile-photo" name="cover-img" accept="image/*" required><br>

        <label for="country">Country:</label>
        <input type="text" id="country" name="country" placeholder="Enter your country" required><br>

        <label for="city">location :</label>
        <input type="text" id="city" name="location" placeholder="Enter your location" required><br>

        <label for="about_family">Tell Us About You :</label>
        <textarea id="about_family" name="Description" placeholder="for example: your experance "
          rows="10" required></textarea><br>

        <label for="help_with">What Are You Looking for Help With?</label><br>
        <input type="checkbox" id="help_none" name="help-with[]" value="Farmstay help" checked>
        <label for="help_none">Farmstay help</label><br>
        <input type="checkbox" id="help_one" name="help-with[]" value="Creating/ Cooking family meals">
        <label for="help_one">Creating/ Cooking family meals</label><br>
        <input type="checkbox" id="help_two" name="help-with[]" value="Art Projects" >
        <label for="help_two">Art Projects</label><br>
        <input type="checkbox" id="help_three" name="help-with[]" value="Animal Care">
        <label for="help_three">Animal Care</label><br>
        <input type="checkbox" id="help_four" name="help-with[]" value="Teaching">
        <label for="help_four">Teaching </label><br>
        <input type="checkbox" id="help_five" name="help-with[]" value="Language practice">
        <label for="help_five">Language practice</label><br>

        <label for="more_info">Some More Information:</label><br>
        <input type="checkbox" id="info_none" name="more-info[]" value="have Internet access" checked>
        <label for="info_none">Do you have Internet access? </label><br>
        <input type="checkbox" id="info_one" name="more-info[]" value="internet access limited">
        <label for="info_one">Is your internet access limited? </label><br>
        <input type="checkbox" id="info_two" name="more-info[]" value="have animals/pets">
        <label for="info_two">Do you have animals/pets</label><br>
        <input type="checkbox" id="info_three" name="more-info[]" value="smoker" >
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