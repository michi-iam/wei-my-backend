<div>
    <form action="update_image" method="POST">
        @csrf
        <input type="hidden" name="image_id" value="{{ $image->id }}">
        <label class="form-label" for="id_title">Titel</label>
        <input value="{{ $image->title }}" class="form-control" type="text" id="id_title" name="image_title">
        <label class="form-label" for="id_alt">Alt</label>
        <input value="{{ $image->alt }}" class="form-control" type="text" id="id_alt" name="image_alt">

        <button class="btn btn-success mt-2" type="submit">ändern</button>
    </form>
    <button type="button" class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#imageDeleteModal{{ $image->id }}">
        löschen
      </button>
</div>


  <!-- Modal -->
  <div class="modal fade" id="imageDeleteModal{{ $image->id }}" tabindex="-1" aria-labelledby="imageDeleteModal{{ $image->id }}Label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="imageDeleteModal{{ $image->id }}Label">Bild wirklich löschen?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <h4>{{ $image->title }} löschen?</h4>
            <form action="delete_image" method="POST">
                @csrf
                <input type="hidden" value="{{ $image->id }}" name="image_id">
                <button class="btn btn-danger mt-2" type="submit">löschen</button>
            </form>
        </div>
      </div>
    </div>
  </div>