<?php
$user = $isHost ? $host : $traveller;
?>

<div class="modal fade" id="profileForms" tabindex="-1" aria-labelledby="profileFormsLabel" aria-hidden="true">
  <form class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable" style="font-size: 2rem;width:70vw" method="post">
    <div class="modal-content">
      <div class="modal-header px-5">
        <h5 class="modal-title" id="profileFormsLabel" style="font-size: 3.2rem;">Edit your data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body d-flex flex-column" style="gap: 2.4rem;">
        <input type="number" name="id" value="<?= $idFromQuery ?>" hidden />

        <div class="d-flex flex-column">
          <label for="firstName" class='form-check-label'>First name</label>
          <input type="text" class="form-control px-4" style="font-size: 1.8rem;" placeholder="FirstName" id="firstName" name="firstName" value="<?= $user->getFirstName() ?? '' ?>">
        </div>
        <div class="d-flex flex-column">
          <label for="lastName" class='form-check-label'>Last name</label>
          <input type="text" class="form-control px-4" style="font-size: 1.8rem;" placeholder="LastName" id="lastName" name="lastName" value="<?= $user->getLastName() ?? '' ?>">
        </div>
      </div>

      <div class="modal-footer px-5 py-4">
        <button type="button" class="second-btn" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="main-btn" name='update' value=true>Save changes</button>
      </div>
    </div>
  </form>
</div>