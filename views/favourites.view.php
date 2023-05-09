<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require base_path("views/partials/head.view.php");
    ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="/culture_swap/public/assets/css/favourites.css">
    <title>home</title>
</head>

<body>

    <?php
    require base_path("views/partials/nav.view.php");
    ?>

    <main>
        <header>
            <div class="container">
                <h2>favourites</h2>
            </div>
        </header>
        <div class="cards"></div>
        <section class="section-padding cards">

            <div class="container">
                <div class="head">
                    <h2 class="heading">Featured Stays</h2>
                    <a href="./hosts" class="main-btn">all hosts</a>
                </div>
                <div class="row">
                    <!-- -------------------------------------#cards---------------------------------------------->

                    <?php foreach ($cards as $card) : ?>
                        <div class="col-xl-4 col-md-6">
                            <div class="myCard">
                                <div class="cardImage">
                                    <img src="public/assets/imgs/home/header5.webp" alt="">
                                    <button class="love">
                                        <span>
                                            <i class="fa-regular fa-heart"></i>
                                        </span>
                                    </button>
                                    <div class="userCardImg">
                                        <img src="public/assets/imgs/home/header5.webp" alt="">
                                    </div>
                                </div>
                                <div class="cardContent">

                                    <div class="userContent">
                                        <div class="cardCountry">
                                            <span class="countryIcon"><i class="fa-solid fa-location-dot"></i></span>
                                            <span class="countryText">norway</span>
                                        </div>
                                        <div class="userCardContent">


                                            <span class="userIcon"><i class="fa-regular fa-user"></i></span>
                                            <span>ali alaa</span>

                                        </div>
                                    </div>
                                    <h3>
                                        <?= $card["descriptions"] ?>
                                    </h3>
                                    <div class="cardDetails">
                                        <a href="#" class="second-btn">view profile</a>
                                        <!----------------------------------------------        Rate   ------------------------------------>
                                        <div class="rate">

                                            <?php $rate = $card["max_rating"]; ?>
                                            <?php $goldstar = $rate ?>

                                            <?php while ($goldstar) : ?>

                                                <span>
                                                    <i class="fa-solid fa-star"></i>
                                                </span>

                                                <?php $goldstar--; ?>

                                            <?php endwhile ?>

                                            <?php $regStar = 5 - $rate ?>

                                            <?php while ($regStar) : ?>

                                                <span>
                                                    <i class="fa-regular fa-star"></i>
                                                </span>

                                                <?php $regStar-- ?>
                                            <?php endwhile ?>
                                        </div>

                                        <!----------------------------------------------     end   Rate   ------------------------------------>

                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
        </section>
    </main>



    <?php
    require base_path("views/partials/footer.view.php");
    ?>
    <?php
    require base_path("views/partials/scripts.view.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>


</body>

</html>