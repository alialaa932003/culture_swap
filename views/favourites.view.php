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