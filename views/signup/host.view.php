
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
      <form action="/culture_swap/signup/host" method="POST" enctype="multipart/form-data">
        <label for="user-name">User Name:</label>
        <input type="text" id="user-name" name="user-name" placeholder="Enter your user name" required><br>

        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first-name" placeholder="Enter your first name" required><br>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last-name" placeholder="Enter your last name" required><br>

        <label for="telephone">Telephone Number:</label>
        <input type="tel" id="telephone" name="phone-number" placeholder="Enter your telephone number"  pattern="[0-9]+" title="Phone number should only contain integers." required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please enter a valid email address"><br>

        <label for="password">Choose Password:</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required  pattern=".{8,}" title="Password must be at least 8 characters long"><br>

       
          <label for="profile-photo">Profile image:</label>
				<input type="file" id="profile-photo" name="profile-photo" accept="image/*" required><br>

        <label for="country">Country:</label>
        <input type="text" id="country" name="country" placeholder="Enter your country" required><br>

        <label for="city">location :</label>
        <input type="text" id="city" name="location" placeholder="Enter your location" required><br>

        <label for="about_family">Tell Us About You :</label>
        <textarea id="about_family" type ="" name="Description" placeholder="for example: your experance "
          rows="10" required></textarea><br>

        <label for="help_with">What Are You Looking for Help With?</label><br>
        <input type="checkbox" id="help_none" name="help-with[]" value="Animals & Farming" checked>
        <label for="help_none">Animals & Farming</label><br>
        <input type="checkbox" id="help_one" name="help-with[]" value="packpaker Hotels &hospitality">
        <label for="help_one"> 	packpaker Hotels &hospitality</label><br>
        <input type="checkbox" id="help_two" name="help-with[]" value="Farming & Homesteads" >
        <label for="help_two">Farming & Homesteads</label><br>
        <input type="checkbox" id="help_three" name="help-with[]" value="Building & Restoration">
        <label for="help_three">Building & Restoration</label><br>
        <input type="checkbox" id="help_four" name="help-with[]" value="Teaching & language">
        <label for="help_four">Teaching & language </label><br>
        <input type="checkbox" id="help_five" name="help-with[]" value="intenships Abroad">
        <label for="help_five">intenships Abroad</label><br>

        <label for="more_info">Some More Information:</label><br>
        <input type="checkbox" id="info_none" name="more-info[]" value="have Internet access" checked>
        <label for="info_none">Do you have Internet access? </label><br>
        <input type="checkbox" id="info_one" name="more-info[]" value="internet access limited">
        <label for="info_one">Is your internet access limited? </label><br>
        <input type="checkbox" id="info_two" name="more-info[]" value="have animals/pets">
        <label for="info_two">Do you have animals/pets</label><br>
        <input type="checkbox" id="info_three" name="more-info[]" value="smoker" >
        <label for="info_three">Are you smokers?</label><br>

        <button type="submit" name="submit" class="main-btn">Sign Up</button>
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