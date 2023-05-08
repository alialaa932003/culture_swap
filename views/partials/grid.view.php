<div class=<?= $gridContainerClass ?? "container" ?>>
  <?= $createHead ? $createHead($headData) : null ?>

  <div class=<?= $rowContainerClass ?? 'row' ?> style='justify-content:center'>
    <?php
    foreach ($cardsData as $cardData)
      Components::createCard($cardData, $cardClasses, $isHost)
    ?>
  </div>
</div>