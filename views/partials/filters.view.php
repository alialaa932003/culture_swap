<aside style="gap: 3.2rem;width:15%;">

  <form class="d-flex flex-column" style="gap: 3.2rem;">
    <div style=<?= $isHost ? "display: none;" : "" ?>>

      <h4 class='mb-3'>Rating</h4>
      <div class='form-check'>
        <input type='radio' class='form-check-input' id='4OrMore' name='startRate' value='4' />
        <label class='form-check-label' for='4OrMore'>4 or more</label>
      </div>
      <div class='form-check'>
        <input type='radio' class='form-check-input' id='3OrMore' name='startRate' value='3' />
        <label class='form-check-label' for='3OrMore'>3 or more</label>
      </div>
      <div class='form-check'>
        <input type='radio' class='form-check-input' id='2OrMore' name='startRate' value=2 />
        <label class='form-check-label' for='2OrMore'>2 or more</label>
      </div>
      <div class='form-check'>
        <input type='radio' class='form-check-input' id='1OrMore' name='startRate' value=1 />
        <label class='form-check-label' for='1OrMore'>1 or more</label>
      </div>
    </div>


    <div style=<?= $isHost ? "display: none;" : '' ?>>
      <h4 class='mb-3'>Countries</h4>

      <?php foreach ($allCountries as $i => $country) : ?>

        <div class='form-check'>
          <input type='checkbox' class='form-check-input' id='<?= "country-$i" ?>' name='countries[]' value='<?= $country['country'] ?>' />
          <label class='form-check-label' for='<?= "country-$i" ?>'><?= $country['country'] ?></label>
        </div>
      <?php endforeach; ?>
    </div>


    <?php
    $serviceNaming = $isHost ? "needs" : "services";
    ?>
    <div style=<?= $isHost ? "display: none;" : '' ?>>
      <h4 class='mb-3' style="text-transform: capitalize;"><?= $serviceNaming ?></h4>

      <div class='form-check'>
        <input type='checkbox' class='form-check-input' id='1' name='<?= $serviceNaming ?>[]' value='1' />
        <label class='form-check-label' for='1'>Animals & Farming</label>
      </div>
      <div class='form-check'>
        <input type='checkbox' class='form-check-input' id='2' name='<?= $serviceNaming ?>[]' value='2' />
        <label class='form-check-label' for='2'>packpaker Hotels &hospitality</label>
      </div>
      <div class='form-check'>
        <input type='checkbox' class='form-check-input' id='3' name='<?= $serviceNaming ?>[]' value='3' />
        <label class='form-check-label' for='3'>Farming & Homesteads</label>
      </div>
      <div class='form-check'>
        <input type='checkbox' class='form-check-input' id='4' name='<?= $serviceNaming ?>[]' value='4' />
        <label class='form-check-label' for='4'>Building & Restoration</label>
      </div>
      <div class='form-check'>
        <input type='checkbox' class='form-check-input' id='5' name='<?= $serviceNaming ?>[]' value='5' />
        <label class='form-check-label' for='5'>Teaching & language</label>
      </div>
      <div class='form-check'>
        <input type='checkbox' class='form-check-input' id='6' name='<?= $serviceNaming ?>[]' value='6' />
        <label class='form-check-label' for='6'>intenships Abroad</label>
      </div>
    </div>
    <div>
      <button type="submit" class="main-btn">Filter</button>
    </div>
  </form>

</aside>