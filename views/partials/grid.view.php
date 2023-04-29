<div class=<?= $gridContainerClass ?? "container" ?>>
  <?= $createHead ? $createHead($headData) : null ?>

  <div class=<?= $rowContainerClass ?? "row" ?>>
      <?php 
        foreach ($cardsData as $cardData)
          Components::createCard($cardData)
      ?>
  </div>
</div>