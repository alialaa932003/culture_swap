<?php

class Components
{
  private static $CARDS_PER_PAGE = 30;

  public static function getCardsPerPageLimit()
  {
    return Components::$CARDS_PER_PAGE;
  }

  public static function createCard($cardData, $cardClasses, $isHost = true)
  {
    extract($cardData);
    extract($cardClasses);
    require base_path("views/partials/card.view.php");
  }

  public static function createCardsGrid($cardsData, $isHost = true, $gridClasses = [], $cardClasses = [], $createHead = null)
  {
    extract($gridClasses);
    require base_path("views/partials/grid.view.php");
  }
}
