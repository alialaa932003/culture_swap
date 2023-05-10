<div class="modal fade" id="joinForm" tabindex="-1" aria-labelledby="joinFormLabel" aria-hidden="true">
  <form class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable" style="font-size: 2rem;width:70vw"
    method="POST">
    <input type="hidden" name="_method" value="PUT">
    <div class="modal-content">
      <div class="modal-header px-5">
        <h5 class="modal-title" id="joinFormLabel" style="font-size: 3.2rem;">Edit your data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body d-flex flex-column" style="gap: 2.4rem;">
        <input type="number" name="id" value="<?= $idFromQuery ?>" hidden />

        <div class="d-flex flex-column">
          <label for="startDate" class='form-check-label'>First name</label>
          <input type="date" class="form-control px-4" style="font-size: 1.8rem;" placeholder="StartDate" id="startDate"
            name="startDate">
        </div>
        <div class="d-flex flex-column">
          <label for="endDate" class='form-check-label'>Last name</label>
          <input type="date" class="form-control px-4" style="font-size: 1.8rem;" placeholder="EndDate" id="endDate"
            name="endDate">
        </div>
      </div>

      <div class="modal-footer px-5 py-4">
        <button type="button" class="second-btn" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="main-btn" name='join' value=true>Send a request</button>
      </div>
    </div>
  </form>
</div>