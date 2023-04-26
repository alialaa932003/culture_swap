
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        require base_path("views/partials/head.view.php");
    ?>
    <!-- عشان عارف انك حمار -->
    <!--  put your css file here -->
    <link rel="stylesheet" href="/culture_swap/public/assets/css/signup/traveller.css">
    <title>signup</title>
</head>
<body>
    <?php
        require base_path("views/partials/nav.view.php");
    ?>

    <header class="section-padding">
			<h2>Traveler Sign Up for free </h2>
			<form>
			
				<label for="user-name">user Name:</label>
				<input type="text" id="user-name" name="user-name" placeholder="Enter your user name" required><br>

				<label for="first-name">First Name:</label>
				<input type="text" id="first-name" name="first-name" placeholder="Enter your first name" required><br>

				<label for="last-name">Last Name:</label>
				<input type="text" id="last-name" name="last-name" placeholder="Enter your last name" required><br>

				<label for="email">Email:</label>
				<input type="email" id="email" name="email" placeholder="Enter your email" required><br>

				<label for="password">Password:</label>
				<input type="password" id="password" name="password" placeholder="Enter your password" required><br>

				<label for="repeat-password">Repeat Password:</label>
				<input type="password" id="repeat-password" name="repeat-password" placeholder="Repeat your password" required><br>

				<label for="phone-number">Phone Number:</label>
				<input type="tel" id="phone-number" name="phone-number" placeholder="Enter your phone number"><br>

				<label for="profile-photo">Profile Photo:</label>
				<input type="file" id="profile-photo" name="profile-photo" accept="image/*" required><br>

				<label for="services">Services:</label><br>
				<input type="radio" id="service1" name="services" value="service1">
				<label for="service1">Farmstay help</label><br>

				<input type="radio" id="service2" name="services" value="service2">
				<label for="service2">Creating/ Cooking family meals</label><br>

				<input type="radio" id="service3" name="services" value="service3">
				<label for="service3">Art Projects</label><br>

				<input type="radio" id="service4" name="services" value="service4">
				<label for="service4">Animal Care</label><br>

				<input type="radio" id="service5" name="services" value="service5">
				<label for="service5">Teaching </label><br>

				<input type="radio" id="service6" name="services" value="service6">
				<label for="service6">Language practice</label><br>

				<button type="submit" class="main-btn">Sign Up</button>
			</form>




    <?php
        require base_path("views/partials/footer.view.php");
    ?>
    <?php
        require base_path("views/partials/scripts.view.php");
    ?>

    <!-- عشان عارف انك بهيم -->
    <!-- حط ملف الجافاسكربت بتاعك هنا -->
</body>
</html>