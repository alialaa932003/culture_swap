
<!DOCTYPE html>
<html lang="en">
<head>
	<?php
			require base_path("views/partials/head.view.php");
	?>
	<title>home</title>
	<link rel="stylesheet" href=<?="{$ASSET_URL}/assets/css/search/searchInput.css"?>>
</head>
<body>
	<?php
		require base_path("views/partials/nav.view.php");
	?>
	<div style="padding: 1rem"></div>
	<?php
		require base_path("views/partials/searchInput.view.php")
	?>

	<div class="mt-5 py-5 d-flex">

	<?php
		$cardsData = [
			[
				'img' => "public/assets/imgs/home/header5.webp",
				'country' => "norway",
				'title' => "Beautiful smallholding on the island of Engeløya, Norway",
				'rating' => 4,
				'hostId' => 1,
				'isFav' => true,
				'toggleFav' => function () {},
			],
			[
				'img' => "public/assets/imgs/home/header4.webp",
				'country' => "norway",
				'title' => "Beautiful smallholding on the island of Engeløya, Norway",
				'rating' => 5,
				'hostId' => 1,
				'isFav' => true,
				'toggleFav' => function () {},
			],
			[
				'img' => "public/assets/imgs/home/header2.webp",
				'country' => "norway",
				'title' => "Beautiful smallholding on the island of Engeløya, Norway",
				'rating' => 1,
				'hostId' => 1,
				'isFav' => true,
				'toggleFav' => function () {},
			],
			[
				'img' => "public/assets/imgs/home/header2.webp",
				'country' => "norway",
				'title' => "Beautiful smallholding on the island of Engeløya, Norway",
				'rating' => 3,
				'hostId' => 1,
				'isFav' => true,
				'toggleFav' => function () {},
			],
			[
				'img' => "public/assets/imgs/home/header5.webp",
				'country' => "norway",
				'title' => "Beautiful smallholding on the island of Engeløya, Norway",
				'rating' => 0,
				'hostId' => 1,
				'isFav' => true,
				'toggleFav' => function () {},
			],
			[
				'img' => "public/assets/imgs/home/header4.webp",
				'country' => "norway",
				'title' => "Beautiful smallholding on the island of Engeløya, Norway",
				'rating' => 4,
				'hostId' => 1,
				'isFav' => true,
				'toggleFav' => function () {},
			],
			[
				'img' => "public/assets/imgs/home/header4.webp",
				'country' => "norway",
				'title' => "Beautiful smallholding on the island of Engeløya, Norway",
				'rating' => 5,
				'hostId' => 1,
				'isFav' => true,
				'toggleFav' => function () {},
			],
			[
				'img' => "public/assets/imgs/home/header2.webp",
				'country' => "norway",
				'title' => "Beautiful smallholding on the island of Engeløya, Norway",
				'rating' => 2,
				'hostId' => 1,
				'isFav' => true,
				'toggleFav' => function () {},
			],
			[
				'img' => "public/assets/imgs/home/header5.webp",
				'country' => "norway",
				'title' => "Beautiful smallholding on the island of Engeløya, Norway",
				'rating' => 3,
				'hostId' => 1,
				'isFav' => true,
				'toggleFav' => function () {},
			],
			[
				'img' => "public/assets/imgs/home/header2.webp",
				'country' => "norway",
				'title' => "Beautiful smallholding on the island of Engeløya, Norway",
				'rating' => 4,
				'hostId' => 1,
				'isFav' => true,
				'toggleFav' => function () {},
			],
			[
				'img' => "public/assets/imgs/home/header4.webp",
				'country' => "norway",
				'title' => "Beautiful smallholding on the island of Engeløya, Norway",
				'rating' => 1,
				'hostId' => 1,
				'isFav' => true,
				'toggleFav' => function () {},
			],
			[
				'img' => "public/assets/imgs/home/header5.webp",
				'country' => "norway",
				'title' => "Beautiful smallholding on the island of Engeløya, Norway",
				'rating' => 4,
				'hostId' => 1,
				'isFav' => true,
				'toggleFav' => function () {},
			],
		];
		Components::createCardsGrid($cardsData)
	?>

	</div>

	<?php
			require base_path("views/partials/footer.view.php");
	?>
	<?php
			require base_path("views/partials/scripts.view.php");
	?>
</body>
</html>
