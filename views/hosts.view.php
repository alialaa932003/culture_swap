
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
	<?php require base_path("views/partials/nav.view.php"); ?>

	<div style="padding: 1rem"></div>

	<?php require base_path("views/partials/searchInput.view.php") ?>

	<div class="mt-5 py-5 d-flex">
	<?php Components::createCardsGrid($cardsData) ?>
	
	</div>

	<?php require base_path("views/partials/footer.view.php"); ?>
	<?php require base_path("views/partials/scripts.view.php"); ?>
</body>
</html>
