

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        require base_path("views/partials/head.view.php");
    ?>
    <link rel="stylesheet" href="/culture_swap/public/assets/css/signup/traveller.css">
    <title>signup</title>
</head>
<body>
    <?php
        require base_path("views/partials/nav.view.php");
    ?>

    <header class="section-padding">
			<h2>Traveler Sign Up for free </h2>
			<form action="/culture_swap/signup/traveller" method="POST" enctype="multipart/form-data">
				
				<label for="user-name">user Name:</label>
				<input type="text" id="user-name" name="user-name" placeholder="Enter your user name" required><br>

				<label for="first-name">First Name:</label>
				<input type="text" id="first-name" name="first-name" placeholder="Enter your first name" required><br>

				<label for="last-name">Last Name:</label>
				<input type="text" id="last-name" name="last-name" placeholder="Enter your last name" required><br>

				<label for="email">Email:</label>
				<input type="email" id="email" name="email" placeholder="Enter your email"  required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please enter a valid email address"><br>

				<label for="country">country:</label>
				<input type="text" id="country" name="country" placeholder="Enter your country" required><br>


				<label for="password">Password:</label>
				<input type="password" id="password" name="password" placeholder="Enter your password" required pattern=".{8,}" title="Password must be at least 8 characters long"><br>

				
				<label for="phone-number">Phone Number:</label>
				<input type="tel" id="phone-number" name="phone-number" placeholder="Enter your phone number"  pattern="[0-9]+" title="Phone number should only contain integers." required><br>

				<label for="profile-photo">Profile image:</label>
				<input type="file" id="profile-photo" name="profile-photo" accept="image/*" required><br>


				<label for="services">Services:</label><br>
				<input type="radio" id="service1" name="services" value="Animals & Farming"required>
				<label for="service1">Animals & Farming</label><br>

				<input type="radio" id="service2" name="services" value=" 	packpaker Hotels &hospitality">
				<label for="service2"> 	packpaker Hotels &hospitality</label><br>

				<input type="radio" id="service3" name="services" value="Farming & Homesteads">
				<label for="service3">Farming & Homesteads</label><br>

				<input type="radio" id="service4" name="services" value="Building & Restoration">
				<label for="service4">Building & Restoration</label><br>

				<input type="radio" id="service5" name="services" value="Teaching & language">
				<label for="service5">Teaching & language</label><br>

				<input type="radio" id="service6" name="services" value="intenships Abroad">
				<label for="service6">intenships Abroad</label><br>

				<button type="submit" name="submit" class="main-btn">Sign Up</button>
			</form>




    <?php
        require base_path("views/partials/footer.view.php");
    ?>
    <?php
        require base_path("views/partials/scripts.view.php");
    ?>

    
</body>
</html>
