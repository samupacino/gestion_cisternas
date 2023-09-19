<!-- Modal -->
<div class="modal fade font-monospace text-center" id="modal_error_tracto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">MESSAGE:</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p id="modal_mensaje">
            <?php
                echo $mensaje_error;
            ?>
        </p>
      </div>
    </div>
  </div>
</div>
