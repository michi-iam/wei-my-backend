<div>
    <form action="add_new_image" method="POST" enctype="multipart/form-data">
        @csrf
        <label class="form-label" for="id_title">Titel</label>
        <input class="form-control" type="text" id="id_title" name="image_title">
        <label class="form-label" for="id_alt">Alt</label>
        <input class="form-control" type="text" id="id_alt" name="image_alt">
        <label class="form-label" for="image_src">Bild</label>
        <input class="form-control" id="image_src" type="file" name="image_src">
        <button class="btn btn-success mt-2" type="submit">eintragen</button>
    </form>
</div>