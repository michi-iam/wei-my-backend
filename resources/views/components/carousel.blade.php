<div id="{{ $carouselName }}" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
    @foreach($images as $img)
    @if($loop->first)
      <button type="button" data-bs-target="#{{ $carouselName }}" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    @else
      <button type="button" data-bs-target="#{{ $carouselName }}" data-bs-slide-to="{{ $loop->index }}" aria-label="Slide 2"></button>
    @endif
    @endforeach
    </div>
    <div class="carousel-inner">
    @foreach($images as $img)
        @if($loop->first)
      <div class="carousel-item active" data-bs-interval="10000">
        <img class="d-block w-100" src="{{ asset('/storage/uploaded_images/'.$img->src) }}" onerror="$(this).attr('src', '{{ URL::to('/') }}{{ '/images/'.$img->src }}')" alt="{{ $img->alt }}">
        <div class="carousel-caption d-none d-md-block">
          <h5 class="bg-secondary text-muted bg-gradient p-3 bg-transparent">{{ $img->title }}</h5>
        </div>
      </div>
      @else
      <div class="carousel-item" data-bs-interval="2000">
        <img class="d-block w-100" src="{{ asset('/storage/uploaded_images/'.$img->src) }}" onerror="$(this).attr('src', '{{ URL::to('/') }}{{ '/images/'.$img->src }}')" alt="{{ $img->alt }}">
        <div class="carousel-caption d-none d-md-block">
            <h5 class="bg-secondary text-muted bg-gradient p-3 bg-transparent">{{ $img->title }}</h5>
        </div>
      </div>
      @endif
      @endforeach
    </div>
    @if($images->count() > 1)
    <button class="carousel-control-prev" type="button" data-bs-target="#{{ $carouselName }}" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#{{ $carouselName }}" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    @endif
  </div>