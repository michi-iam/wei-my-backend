
<div class="clearfix">
    @foreach($post->images as $img)
    <img class="col-12 col-md-6 float-md-end mt-5 ms-md-3 border border-1 border-dark" src="{{ asset('/storage/uploaded_images/'.$img->src) }}" onerror="$(this).attr('src', '{{ URL::to('/') }}{{ '/images/'.$img->src }}')" alt="{{ $img->alt }}">
    @endforeach
    <h2 class="mt-4 bg-warning rounded shadow text-primary p-5">{{ $post->title }}</h2>
    <h4 class="p-5 ms-lg-3 text-muted pb-2">{{ $post->subtitle }}</h4>
    <p style="white-space: pre-line">
        {{ $post->text }}
    </p>
  
   
  </div>