<div>
    <div class="row">
      <form action="update_post" method="POST">
        @csrf
        <input type="hidden" value="{{ $post->id }}" name="post_id">
        <label class="form-label" for="id_title">Titel</label>
        <input value="{{ $post->title }}" class="form-control" type="text" id="id_title" name="post_title">
        <label class="form-label" for="id_subtitle">Untertitel</label>
        <input value="{{ $post->subtitle }}" class="form-control" type="text" id="id_subtitle" name="post_subtitle">
        <label class="form-label" for="id_text">Text</label>
        <textarea value="{{ $post->text }}" class="form-control" type="text" id="id_text" name="post_text">{{ $post->text }}</textarea>
        <button class="btn btn-success mt-2" type="submit">ändern</button>
      </form>
    </div>
    <div class="row  mt-4">
      <div class="col-auto">
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#postDeleteModal{{ $post->id }}">
          löschen
        </button>
      </div>
    </div>

    <div class="row mt-4">
      <form action="update_post_category" method="POST">
        @csrf
        <input type="hidden" value="{{ $post->id }}" name="post_id">
        <label class="form-label" for="category_select">Kategorie</label>
        <select id="category_select" name="category_id" class="form-select">
          <option value="{{ $post->category->id }}">{{ $post->category->name }}</option>
          @foreach($categories as $cat)
            @if($cat->name != $post->category->name && $cat->name != "businesshours")
            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endif
          @endforeach
        </select>
        <button class="btn btn-success mt-2" type="submit">Kategorie ändern</button>
      </form>
    </div>

    <div class="row mt-4">
      <form action="toggle_post_active" method="POST">
        @csrf
        <input type="hidden" value="{{ $post->id }}" name="post_id">
        <h4>Status: @if($post->active == true) aktiv @else inaktiv @endif</h4>
        <button class="btn btn-warning mt-2" type="submit">Status ändern</button>
      </form>
    </div>
</div>




  
  <!-- Modal -->
  <div class="modal fade" id="postDeleteModal{{ $post->id }}" tabindex="-1" aria-labelledby="postDeleteModal{{ $post->id }}Label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="postDeleteModal{{ $post->id }}Label">Post wirklich löschen?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <h4>{{ $post->title }} löschen?</h4>
            <form action="delete_post" method="POST">
                @csrf
                <input type="hidden" value="{{ $post->id }}" name="post_id">
                <button class="btn btn-danger mt-2" type="submit">löschen</button>
            </form>
        </div>
      </div>
    </div>
  </div>