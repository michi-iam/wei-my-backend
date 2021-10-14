<div>
    <form action="add_new_post" method="POST">
        @csrf
        <label class="form-label" for="id_title">Titel</label>
        <input class="form-control" type="text" id="id_title" name="post_title">
        <label class="form-label" for="id_subtitle">Untertitel</label>
        <input class="form-control" type="text" id="id_subtitle" name="post_subtitle">
        <label class="form-label" for="id_text">Text</label>
        <textarea class="form-control" type="text" id="id_text" name="post_text"></textarea>
        <button class="btn btn-success mt-2" type="submit">eintragen</button>
    </form>
</div>