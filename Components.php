<?php

class Components {
  static public function createCard($cardData, $cardClasses)
  {
    extract($cardData);
    extract($cardClasses);
    require base_path("views/partials/card.view.php");
  }

  static public function createCardsGrid($cardsData, $gridClasses = [], $cardClasses = [], $createHead = null){
    extract($gridClasses);
    require base_path("views/partials/grid.view.php");
  }
}