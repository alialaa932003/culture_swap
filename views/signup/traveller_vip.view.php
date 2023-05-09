
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        require base_path("views/partials/head.view.php");
    ?>
  
    <link rel="stylesheet" href="/culture_swap/public/assets/css/signup/traveller_vip.css">
    <title>signup</title>
</head>
<body>
    <?php
        require base_path("views/partials/nav.view.php");
    ?>

    <header>	
		<section class="section-padding">
			<h2>Traveller Sign Up</h2>
			<form action="/culture_swap/signup/traveller_vip" method="POST" enctype="multipart/form-data">
				<label for="username">Username:</label>
				<input type="text" id="username" name="username" placeholder="Enter your username" required><br>

				<label for="first-name">First Name:</label>
				<input type="text" id="first-name" name="first-name" placeholder="Enter your first name" required><br>

				<label for="last-name">Last Name:</label>
				<input type="text" id="last-name" name="last-name" placeholder="Enter your last name" required><br>

				<label for="email">Email:</label>
				<input type="email" id="email" name="email" placeholder="Enter your email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please enter a valid email address"><br>

				<label for="password">Password:</label>
				<input type="password" id="password" name="password" placeholder="Enter your password" required pattern=".{8,}" title="Password must be at least 8 characters long"><br>

				<label for="phone-number">Phone Number:</label>
				<input type="tel" id="phone-number" name="phone-number" placeholder="Enter your phone number"  pattern="[0-9]+" title="Phone number should only contain integers." required><br>
				<label for="country">Country:</label>
		        <input type="text" id="country" name="country" placeholder="Enter your country" required><br>

				<label for="profile-photo">Profile Photo:</label>
				<input type="file" id="profile-photo" name="profile-photo" accept="image/*" required><br>


				<label for="services">Services:</label><br>
				<input type="radio" id="service1" name="services" value="Farmstay help" required>
				<label for="service1">Farmstay help</label><br>

				<input type="radio" id="service2" name="services" value="Creating/ Cooking family meals">
				<label for="service2">Creating/ Cooking family meals</label><br>

				<input type="radio" id="service3" name="services" value="Art Projects">
				<label for="service3">Art Projects</label><br>

				<input type="radio" id="service4" name="services" value="Animal Care">
				<label for="service4">Animal Care</label><br>

				<input type="radio" id="service5" name="services" value="Teaching">
				<label for="service5">Teaching </label><br>

				<input type="radio" id="service6" name="services" value="Language practice">
				<label for="service6">Language practice</label><br>

				<fieldset>
					<legend>Payment Options:</legend>
					<input type="radio" id="paypal" name="payment" value="paypal" required>
					<label for="paypal">PayPal</label><br>

					<input type="radio" id="visa" name="payment" value="visa">
					<label for="visa">Visa</label><br>

					<input type="radio" id="mastercard" name="payment" value="mastercard">
					<label for="mastercard">Mastercard</label><br>

					<input type="radio" id="other" name="payment" value="other">
					<label for="other">Other</label><br>
				</fieldset>

				<label for="card-number">Card Number:</label>
				<input type="text" id="card-number" name="card-number" placeholder="Enter your card number"required pattern=".{16}" title="Password must be  16 characters long" ><br>

				<label for="expiration-date">Expiration Date:</label>
				<input type="month" id="expiration-date" name="expiration-date" placeholder="MM/YY" required><br>

				<label for="cvc">CVC:</label>
				<input type="text" id="cvc" name="cvc" placeholder="Enter your CVC" required pattern=".{3}" title="Password must be 3 characters long"><br>

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
