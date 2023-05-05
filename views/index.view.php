<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require base_path("views/partials/head.view.php");
    ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="/culture_swap/public/assets/css/home.css">
    <title>home</title>
</head>

<body>

    <?php
    require base_path("views/partials/nav.view.php");
    ?>

    <!-- start header -->
    <header class="">
        <div class="container">
            <div class="headerContent">
                <h1>Travel differently, connect globally</h1>
                <p>
                    The largest and safest community for cultural exchange, working holidays and volunteering in 170
                    countries.
                </p>
            </div>
            <a href="#" class="second-btn discoverBtn ">
                <span class="discoverIcon"><i class="fa-solid fa-magnifying-glass"></i></span>
                <span class="discoverText ">Discover 50,000+ opportunities</span>
            </a>
        </div>

    </header>

    <!-- start categories section -->

    <section class=" categories">
        <div class="container">
            <div class="row">

                <!---------------------- services --------------------->
                <?php foreach ($services as $service): ?>

                <?php if ($service["name"] === "Animals & Farming"): ?>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 item">
                    <a href="#" >
                        <span class="itemIcon">
                            <i class="fa-solid fa-seedling"></i>
                        </span>
                        <span class="itemText" name="animals">
                            <?= $service["name"] ?>
                        </span>
                    </a>
                </div>
                <?php endif ?>

                <?php if ($service["name"] == "packpaker Hotels &hospitality"): ?>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 item">
                    <a href="#">
                        <span class="itemIcon">
                            <i class="fa-regular fa-hospital"></i>
                        </span>
                        <span class="itemText" name="animals">
                            <?= $service["name"] ?>
                        </span>
                    </a>
                </div>
                <?php endif ?>

                <?php if ($service["name"] == "Farming & Homesteads"): ?>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 item">
                    <a href="#">
                        <span class="itemIcon">
                            <i class="fa-solid fa-tractor"></i>
                        </span>
                        <span class="itemText" name="animals">
                            <?= $service["name"] ?>
                        </span>
                    </a>
                </div>
                <?php endif ?>

                <?php if ($service["name"] == "Building & Restoration "): ?>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 item">
                    <a href="#">
                        <span class="itemIcon">
                                  <i class="fa-solid fa-hammer"></i>
                        </span>
                        <span class="itemText" name="animals">
                            <?= $service["name"] ?>
                        </span>
                    </a>
                </div>
                <?php endif ?>

                <?php if ($service["name"] == "Teaching & language"): ?>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 item">
                    <a href="#">
                        <span class="itemIcon">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <span class="itemText" name="animals">
                            <?= $service["name"] ?>
                        </span>
                    </a>
                </div>
                <?php endif ?>


                <?php if ($service["name"] == "intenships Abroad"): ?>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 item">
                    <a href="#">
                        <span class="itemIcon">
                            <i class="fa-solid fa-school"></i>
                        </span>
                        <span class="itemText" name="animals">
                            <?= $service["name"] ?>
                        </span>
                    </a>
                </div>
                <?php endif ?>


                <?php endforeach ?>
                <!----------------------  end services --------------------->




                 </div>
            </div>
    </section>

    <!-- start host cards -->

    <section class="section-padding cards">
        <div class="container">
            <div class="head">
                <h2 class="heading">Featured Stays</h2>
                <a href="./hosts" class="main-btn">all hosts</a>
            </div>
            <div class="row">
                <!-- -------------------------------------#cards---------------------------------------------->

                <?php foreach ($cards as $card): ?>
                    <div class="col-xl-4 col-md-6">
                        <div class="myCard">
                            <div class="cardImage">
                                <img src="public/assets/imgs/home/header5.webp" alt="">
                                <button class="love">
                                    <span>
                                        <i class="fa-regular fa-heart"></i>
                                    </span>
                                </button>
                            </div>
                            <div class="cardContent">
                                <div class="cardCountry">
                                    <span class="countryIcon"><i class="fa-solid fa-location-dot"></i></span>
                                    <span class="countryText">norway</span>
                                </div>
                                <h3>
                                    <?= $card["descriptions"] ?>
                                </h3>
                                <div class="cardDetails">
                                    <a href="#" class="second-btn">view profile</a>
                                    <div class="rate">
                                        <span>
                                            <i class="fa-solid fa-star"></i>
                                        </span>
                                        <span>
                                            <i class="fa-solid fa-star"></i>
                                        </span>
                                        <span>
                                            <i class="fa-solid fa-star"></i>
                                        </span>
                                        <span>
                                            <i class="fa-solid fa-star"></i>
                                        </span>
                                        <span>
                                            <i class="fa-regular fa-star"></i>
                                        </span>
                                    </div>

                                </div>
                            </div>

                        </div>


                    </div>
                <?php endforeach ?>
            </div>
    </section>

    <!-------------------------------------     end  cards        -------------------------------------------->
    <!-- start popular places -->

    <section class="section-padding places">
        <div class="container">
            <div class="head">
                <h2 class="heading">popular places</h2>
            </div>
            <div class="row">

            <!----------------------------------  popularplaces           --------------------->
                    <?php foreach ($popularPlaces as $popularPlace): ?>
            <div class="col-lg-3">
                    <div class="placeItem">
                        <div class="placeImage">
                            <img src=<?= "${ASSET_URL}assets/imgs/home/header3.webp" ?> alt="">
                        </div>
                        <a href="#" class='placeLink second-btn'>
                        <?=$popularPlace["Location"]?>
                        </a>
                    </div>
                </div>
                <?php endforeach ?>
                         <!----------------------------------  end popularplaces           --------------------->

            </div>
        </div>
    </section>


    <!-- start testimonials -->
    <section class="section-padding testimonials">
        <div class="container">
            <div class="head">
                <h2 class="heading">our testimonials</h2>

            </div>
            <div class="swiper">
                <div class="swiper-wrapper">

                    <div class="swiper-slide testiItem">
                        <div class="testiHead">
                            <div class="testiUser">
                                <div class="userImg">
                                    <img src=<?= "${ASSET_URL}assets/imgs/home/header4.webp" ?> alt="">
                                </div>
                                <div>
                                    <h3>raul k.smith</h3>
                                    <span>host</span>
                                </div>
                            </div>
                            <div class="rate">
                                <span>
                                    <i class="fa-solid fa-star"></i>
                                </span>
                                <span>
                                    <i class="fa-solid fa-star"></i>
                                </span>
                                <span>
                                    <i class="fa-solid fa-star"></i>
                                </span>
                                <span>
                                    <i class="fa-solid fa-star"></i>
                                </span>
                                <span>
                                    <i class="fa-solid fa-star"></i>
                                </span>
                            </div>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, enim porro corporis dicta
                            omnis id voluptatibus dolores optio nesciunt sapiente sunt dolorum nihil dolorem et officia.
                            Iste eius dolorem amet.</p>
                    </div>
                    <div class="swiper-slide testiItem">
                        <div class="testiHead">
                            <div class="testiUser">
                                <div class="userImg">
                                    <img src=<?= "${ASSET_URL}assets/imgs/home/header4.webp" ?> alt="">
                                </div>
                                <div>
                                    <h3>raul k.smith</h3>
                                    <span>host</span>
                                </div>
                            </div>
                            <div class="rate">
                                <span>
                                    <i class="fa-solid fa-star"></i>
                                </span>
                                <span>
                                    <i class="fa-solid fa-star"></i>
                                </span>
                                <span>
                                    <i class="fa-solid fa-star"></i>
                                </span>
                                <span>
                                    <i class="fa-solid fa-star"></i>
                                </span>
                                <span>
                                    <i class="fa-solid fa-star"></i>
                                </span>
                            </div>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, enim porro corporis dicta
                            omnis id voluptatibus dolores optio nesciunt sapiente sunt dolorum nihil dolorem et officia.
                            Iste eius dolorem amet.</p>
                    </div>
                    <div class="swiper-slide testiItem">
                        <div class="testiHead">
                            <div class="testiUser">
                                <div class="userImg">
                                    <img src=<?= "${ASSET_URL}assets/imgs/home/header4.webp" ?> alt="">
                                </div>
                                <div>
                                    <h3>raul k.smith</h3>
                                    <span>host</span>
                                </div>
                            </div>
                            <div class="rate">
                                <span>
                                    <i class="fa-solid fa-star"></i>
                                </span>
                                <span>
                                    <i class="fa-solid fa-star"></i>
                                </span>
                                <span>
                                    <i class="fa-solid fa-star"></i>
                                </span>
                                <span>
                                    <i class="fa-solid fa-star"></i>
                                </span>
                                <span>
                                    <i class="fa-solid fa-star"></i>
                                </span>
                            </div>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, enim porro corporis dicta
                            omnis id voluptatibus dolores optio nesciunt sapiente sunt dolorum nihil dolorem et officia.
                            Iste eius dolorem amet.</p>
                    </div>

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
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="public/assets/js/home.js"></script>


</body>

</html>