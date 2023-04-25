<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  require base_path("views/partials/head.view.php");
  ?>
  <link rel="stylesheet" href="public/assets/css/about.css">
  <title>about</title>
</head>

<body>
  <?php
  require base_path("views/partials/nav.view.php");
  ?>
  <!-- --------------->
  <!-- Hero Section -->
  <!-- --------------->

  <section class="hero-section">
    <div class="container">
      <h1 class="section-header">How it works</h1>
      <h3 class="section-description">New to Culture Swap? Here you'll find all you need to know about our great
        community.</h3>
      <a href="#"><button class="second-btn btn">Let's start</button></a>
    </div>
  </section>

  <!-- --------------->
  <!-- Advantages Section -->
  <!-- --------------->

  <section class="advantages-section section-padding">
    <div class="container">
      <h1 class="section-header">Culture Swap Advantages</h1>
      <div class="cards-container">


        <div class="adv-card">
          <div class="card-circle circle-red">
            <i class="card-icon"><img src="public/assets/imgs/about/icons/house.png"></i>
          </div>
          <div class="card-content">
            <h3 class="card-header">A huge selections of hosts</h3>
            <p class="card-paragraph">Over 50,000 opportunities in more than 170 countries worldwide. Inspiration
              abounds!</p>
          </div>
        </div>

        <div class="adv-card">
          <div class="card-circle circle-red">
            <i class="card-icon"><img src="public/assets/imgs/about/icons/money-bag.png"></i>
          </div>
          <div class="card-content">
            <h3 class="card-header">No hidden fees</h3>
            <p class="card-paragraph">Our membership fees are simple with no hidden costs. Simply join today and start
              connecting with hosts.</p>
          </div>
        </div>

        <div class="adv-card">
          <div class="card-circle circle-red">
            <i class="card-icon"><img src="public/assets/imgs/about/icons/worldwide.png"></i>
          </div>
          <div class="card-content">
            <h3 class="card-header">A truly global membership</h3>
            <p class="card-paragraph">Your membership is valid everywhere and allows you to connect with hosts anywhere
              in the world.</p>
          </div>
        </div>

        <div class="adv-card">
          <div class="card-circle circle-yellow">
            <i class="card-icon"><img src="public/assets/imgs/about/icons/connection.png"></i>
          </div>
          <div class="card-content">
            <h3 class="card-header">Connect with other travellers</h3>
            <p class="card-paragraph">Find a travel buddy to join you on your travel adventures.</p>
          </div>
        </div>

        <div class="adv-card">
          <div class="card-circle circle-yellow">
            <i class="card-icon"><img src="public/assets/imgs/about/icons/open up a world.png"></i>
          </div>
          <div class="card-content">
            <h3 class="card-header">Open up a world of learning</h3>
            <p class="card-paragraph">Discover other cultures, practice a language, learn new skills, get fresh ideas
              and perspectives.</p>
          </div>
        </div>

        <div class="adv-card">
          <div class="card-circle circle-yellow">
            <i class="card-icon"><img src="public/assets/imgs/about/icons/24-hours-support.png"></i>
          </div>
          <div class="card-content">
            <h3 class="card-header">Dedicated 24-hours support</h3>
            <p class="card-paragraph">Our team personally check every profile and provide advice. We're also travellers
              and hosts, here to help.</p>
          </div>
        </div>

      </div>
    </div>
  </section>


  <!-- --------------->
  <!-- Join as traveller Section -->
  <!-- --------------->

  <section class="join-traveller-section section-padding">
    <div class="container">
      <h1 class="section-header">How to join us as a traveller</h1>

      <div class="row row-1">
        <div class="image">
          <div class="image-circle">1</div>
          <img src="public/assets/imgs/about/join-traveller/image-1.webp">
        </div>
        <div class="row-content">
          <h3 class="row-header">Join the community</h3>
          <p class="row-paragraph">Create a great profile , We will verify you within 24 hours after that <br> you can
            enter our community</p>
        </div>
      </div>

      <div class="row row-2">
        <div class="row-content">
          <h3 class="row-header">Connect with hosts</h3>
          <p class="row-paragraph">Contact your favourite hosts, discuss your stay and <br>what is expected in return
          </p>
        </div>
        <div class="image">
          <div class="image-circle circle-row-2">2</div>
          <img src="public/assets/imgs/about/join-traveller/image-2.webp">
        </div>
      </div>

      <div class="row ">
        <div class="image">
          <div class="image-circle">3</div>
          <img src="public/assets/imgs/about/join-traveller/image-3.webp">
        </div>
        <div class="row-content">
          <h3 class="row-header">Travel like a local</h3>
          <p class="row-paragraph">Discover new cultures, friends, places and skills</p>
        </div>
      </div>

    </div>

    <a href="#"><button class="second-btn btn join-btn">Join Now !</button></a>
  </section>

  <!-- --------------->
  <!-- Join as host Section -->
  <!-- --------------->

  <section class="join-host-section section-padding">
    <div class="container">
      <h1 class="section-header">How to join us as a Host</h1>

      <div class="all-content-container">
        <div class="content">

        </div>

        <div class="svg">
          <img src="">
        </div>
      </div> 

    </div>
  </section>


  <?php
  require base_path("views/partials/footer.view.php");
  ?>
  <?php
  require base_path("views/partials/scripts.view.php");
  ?>

  <script src="public/assets/js/about.js"></script>
</body>

</html>