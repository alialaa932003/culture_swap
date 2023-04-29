<?php 
$starFull = "<i class=\"fa-solid fa-star\"></i>";
$starEmpty = "<i class=\"fa-regular fa-star\"></i>";

$heartFull = "<i class=\"fa-solid fa-heart\"></i>";
$heartEmpty = "<i class=\"fa-regular fa-heart\"></i>";
?>

<div class=<?=$cardContainerClass ?? "col-xl-4 col-md-6"?>>
  <div class="myCard">
    <div class="cardImage">
      <img src=<?=$img?> alt=<?="host's place {$country}"?>>
      <button class="love" onclick="$toggleFav()">
          <span>
            <?=$isFav ? $heartFull : $heartEmpty?>
          </span>
      </button>
    </div>
    <div class="cardContent">
      <div class="cardCountry">
        <span class="countryIcon"><i class="fa-solid fa-location-dot"></i></span>
        <span class="countryText"><?=$country?></span>
      </div>
      <h3><?=$title?></h3>
      <div class="cardDetails">
        <a href=<?="/profile?id={$hostId}"?> class="second-btn">view profile</a>
        <div class="rate">
          <?php 
            $i = 0;
            for($i; $i < $rating; $i++)
              echo "<span>{$starFull}</span>";
            for($i; $i < 5; $i++)
              echo "<span>{$starEmpty}</span>";
          ?>
        </div>
      </div>
    </div>
  </div>
</div>