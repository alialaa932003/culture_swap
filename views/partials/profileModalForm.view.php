<?php
$user = $isHost ? $host : $traveller;
?>

<div class="modal fade" id="profileForms" tabindex="-1" aria-labelledby="profileFormsLabel" aria-hidden="true">
  <form class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable" style="font-size: 2rem;width:70vw"
    method="post">
    <input type="hidden" name="_method" value="PUT">

    <div class="modal-content">
      <div class="modal-header px-5">
        <h5 class="modal-title" id="profileFormsLabel" style="font-size: 3.2rem;">Edit your data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex flex-column" style="gap: 2.4rem;">
        <input type="number" name="id" value="<?= $idFromQuery ?>" hidden />
        <div class="d-flex flex-column">
          <label for="first_name" class='form-check-label'>First name</label>
          <input type="text" class="form-control px-4" style="font-size: 1.8rem;" placeholder="FirstName"
            id="first_name" name="first_name" value="<?= $user->getFirstName() ?? '' ?>">
        </div>
        <div class="d-flex flex-column">
          <label for="last_name" class='form-check-label'>Last name</label>
          <input type="text" class="form-control px-4" style="font-size: 1.8rem;" placeholder="lastName" id="last_name"
            name="last_name" value="<?= $user->getLastName() ?? '' ?>">
        </div>
        <div class="d-flex flex-column">
          <label for="user_name" class='form-check-label'>User name</label>
          <input type="text" class="form-control px-4" style="font-size: 1.8rem;" placeholder="Username" id="user_name"
            name="user_name" value="<?= $user->getUserName() ?? '' ?>">
        </div>
        <div class="d-flex flex-column">
          <label for="email" class='form-check-label'>Email</label>
          <input type="text" class="form-control px-4" style="font-size: 1.8rem;" placeholder="Email" id="email"
            name="email" value="<?= $user->getEmail() ?? '' ?>">
        </div>
        <div class="d-flex flex-column">
          <label for="password" class='form-check-label'>Password</label>
          <input type="password" class="form-control px-4" style="font-size: 1.8rem;" placeholder="Password"
            id="password" name="password" value="<?= $user->getPassword() ?? '' ?>">
        </div>

        <?php if ($isHost): ?>
          <div class='dropdown'>
            <button class='btn btn-secondary dropdown-toggle px-2 px-4' style='font-size: 1.6rem;' type='button'
              data-bs-toggle='dropdown' aria-expanded='false'>
              Status
            </button>
            <ul class='dropdown-menu px-3' style='text-align: center;'>
              <li>
                <div class='form-check'>
                  <input type='radio' class='form-check-input' id='status-active' name='Status' value='Active' checked />
                  <label class='form-check-label' for='status-active'>Active</label>
                </div>
              </li>
              <li>
                <div class='form-check'>
                  <input type='radio' class='form-check-input' id='status-inactive' name='Status' value='Inactive' />
                  <label class='form-check-label' for='status-inactive'>Inactive</label>
                </div>
              </li>
            </ul>
          </div>
          <div class="d-flex flex-column">
            <label for="Description" class='form-check-label'>Description</label>
            <textarea class="form-control px-4" style="font-size: 1.8rem;" placeholder="Description" id="Description"
              name="Description"><?= $user->getDescription() ?? '' ?></textarea>
          </div>
          <div class="d-flex flex-column">
            <label for="Location" class='form-check-label'>Location</label>
            <input type="text" class="form-control px-4" style="font-size: 1.8rem;" placeholder="Location" id="Location"
              name="Location" value="<?= $user->getLocation() ?? '' ?>">
          </div>
        <?php endif; ?>

      </div>
      <div class="modal-footer px-5 py-4">
        <button type="button" class="second-btn" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="main-btn" name='update' value=true>Save changes</button>
      </div>
    </div>
  </form>
</div>