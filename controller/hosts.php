<?php
$ASSET_URL = "/culture_swap/public";

$cardsData = fetchCardData($_GET);

require base_path("views/hosts.view.php");