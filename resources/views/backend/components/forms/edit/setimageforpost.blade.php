@foreach($posts as $post)
@isset($post->category)
@if($post->category->name != "businesshours")
<div class="row mt-4 bg-primary border border-2 border-dark p-2">
    <form action="set_images_for_post" method="POST">
        @csrf
        <h4>Titel: <br> <span class="text-warning">{{ $post->title }}</span></h4>
        <h5>Kategorie: <span class="text-warning">{{ $post->category->name }}</span></h5>
        <h5>Status: <span class="text-warning">@if($post->active == true) aktiv @else inaktiv @endif</span></h5>
        <hr>
        <input type="hidden" name="post_id" value="{{ $post->id }}">

        <div class="row mt-2">
            <h4>Bilder von <br> <span class="text-warning">{{ $post->title }}</span></h4>
            @foreach($post->images as $pimg)
            <div class="col-4 bg-secondary border border-1 border-dark p-2">
                    <h5>{{ $pimg->title }}</h5>
                
                    <img class="img img-fluid" onerror="$(this).attr('src', '{{ URL::to('/') }}{{ '/images/'.$pimg->src }}')" src="{{ asset('/storage/uploaded_images/'.$pimg->src) }}" alt="">
                
                </div>
            @endforeach
        </div>

        <div class="row mt-2">
            <h6>Mehrere auswählen mit str+click</h6>
            <select class="form-select" name="images_ids[]" id="" multiple>
                @foreach($images as $img)
                    @if($post->images->contains($img)))
                    <option selected="selected" value="{{ $img->id }}">{{ $img->title }}</option>
                    @else 
                    <option value="{{ $img->id }}">{{ $img->title }}</option>
                    @endif
                    
                @endforeach
            </select>
        </div>

        <button class="btn btn-success mt-2" type="submit">ändern</button>
    </form>
</div>
@endif
@endisset
@endforeach