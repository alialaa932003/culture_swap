<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  require base_path("views/partials/head.view.php");
  ?>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FAQ</title>
  <link rel="stylesheet" href="/culture_swap/public/assets/css/faq.css">
</head>

<body>
  <?php
  require base_path("views/partials/nav.view.php");
  ?>
  <div class="hero-section">
    <h1 class="section-header">Frequently asked questions</h1>
  </div>


  <div class="container">

    <div class="faq">
      <button class="accordion">
        What is expected of me as a Traveller?
        <i class="fa-solid fa-chevron-down arrow"></i>
      </button>
      <div class="pannel">
        <p class="faq-body">
          Generally you will be expected to help around 5 hours per day in exchange for food and accommodation. Some
          hosts may give a paid allowance to ensure they are offering at least the minimum wage in their country.
          Conditions and agreements may vary depending on the skills you can offer and the requirements of each host. It
          is important you communicate as much as possible beforehand with your hosts so that you both know each other's
          expectations.
        </p>
      </div>
    </div>

    <div class="faq">
      <button class="accordion">
        What is the minimum age for using the website?
        <i class="fa-solid fa-chevron-down arrow"></i>
      </button>
      <div class="pannel">
        <p class="faq-body">
          You must be 18 years old to register for a profile. The minimum age for volunteering in most countries is 18.
          Minors
          accompanied with their parents are also accepted on some family projects.
        </p>
      </div>
    </div>

    <div class="faq">
      <button class="accordion">
        Can I Travell in a group?
        <i class="fa-solid fa-chevron-down arrow"></i>
      </button>
      <div class="pannel">
        <p class="faq-body">
          Yes, but each member of the group must have their own Workaway profile. You can connect your accounts so hosts
          know you
          are travelling together.
        </p>
      </div>
    </div>

    <div class="faq">
      <button class="accordion">
        Can we sign up as a family?
        <i class="fa-solid fa-chevron-down arrow"></i>
      </button>
      <div class="pannel">
        <p class="faq-body">
          Yes, of course! When you sign up as a Workawayer you can access the host list and contact host families, NGO's
          or
          projects directly for 1 year to Workaway and offer your services. Workaway is a cultural exchange, you offer a
          few hours
          of help in exchange of food and accommodation. When signing up as a family kids do not pay if they are under
          18. You can
          create a couple account and add info in your listing saying that you are travelling as a family. If you are a
          single
          parent with children under 18 you can use a single type account. There are plenty of hosts that receive
          families
          especially the ones that have children too.
        </p>
      </div>
    </div>

    <div class="faq">
      <button class="accordion">
        Is Culture Swap safe?
        <i class="fa-solid fa-chevron-down arrow"></i>
      </button>
      <div class="pannel">
        <p class="faq-body">
          Here at Workaway safety is our top priority. We strive to provide all the resources for our community members
          to feel as
          safe as possible during their Workaway trips.
        </p>
      </div>
    </div>

    <div class="faq">
      <button class="accordion">
        Can I bring my dog or pet with me?
        <i class="fa-solid fa-chevron-down arrow"></i>
      </button>
      <div class="pannel">
        <p class="faq-body">
          There are many different hosts on Workaway, some will be able to accept you with your pet. You should be aware
          that it's
          likely to limit your possibilities of finding a host if you are travelling with a pet.
        </p>
      </div>
    </div>

    <div class="faq">
      <button class="accordion">
        What do the colours on the host's calendar indicate?
        <i class="fa-solid fa-chevron-down arrow"></i>
      </button>
      <div class="pannel">
        <p class="faq-body">
          Green (shown with a 'tick' so that it's clear to the visually impaired) means that a host has availability and
          volunteers are needed for that month. Yellow indicates that there is partial availability for that month. Red
          means that
          the host does not need help for this month. Grey just indicates that this month has passed.
        </p>
      </div>
    </div>

  </div>
  <?php
  require base_path("views/partials/footer.view.php");
  ?>
  <?php
  require base_path("views/partials/scripts.view.php");
  ?>
  <script src="public/assets/js/faq.js"></script>
  <script src="https://kit.fontawesome.com/b5fbdc0f1a.js" crossorigin="anonymous"></script>
</body>

</html>