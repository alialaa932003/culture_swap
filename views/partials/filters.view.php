<aside style="gap: 3.2rem;width:10%">
  <form class="d-flex flex-column" style="gap: 3.2rem;">
    <?=
    $isHost ?
      "<div>
      <h4 class='mb-3'>Rating</h4>
      <div class='form-check'>
        <input 
          type='radio' 
          class='form-check-input' 
          id='4OrMore' 
          name='startRate' 
          value='4'
          />
        <label class='form-check-label' for='4OrMore'>4 or more</label>
      </div>
      <div class='form-check'>
        <input 
          type='radio' 
          class='form-check-input' 
          id='3OrMore' 
          name='startRate' 
          value='3'
          />
        <label class='form-check-label' for='3OrMore'>3 or more</label>
      </div>
      <div class='form-check'>
        <input 
          type='radio' 
          class='form-check-input' 
          id='2OrMore' 
          name='startRate' 
          value=2
          />
        <label class='form-check-label' for='2OrMore'>2 or more</label>
      </div>
      <div class='form-check'>
        <input 
          type='radio' 
          class='form-check-input' 
          id='1OrMore' 
          name='startRate' 
          value=1
          />
        <label class='form-check-label' for='1OrMore'>1 or more</label>
      </div>
    </div>" : ''
    ?>

    <div>
      <button type="submit" class="main-btn">Filter</button>
    </div>
  </form>
</aside>