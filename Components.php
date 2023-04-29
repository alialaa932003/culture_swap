<?php

class Components {
  static public function createCard($cardData)
  {
    extract($cardData);
    require base_path("views/partials/card.view.php");
  }

  static public function createCardsGrid($cardsData, $classes = [], $createHead = null){
    extract($classes);
    require base_path("views/partials/grid.view.php");
  }
}