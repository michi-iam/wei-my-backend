<div class="clearfix">
    
    <h2 class="mt-4 fw-bolder bg-primary bg-gradient rounded shadow text-info p-5 ">{{ $post->title }}</h2>
    <h4 class="p-3 fw-bolder bg-info bg-gradient rounded ms-lg-3 text-muted">{{ $post->subtitle }}</h4>
    <div class="col-12 col-md-6 float-md-end mt-5 ms-md-3 border border-1 border-dark">
        <x-carousel carouselName="literatur{{ $post->id }}" :images="$post->images"></x-carousel>

    </div>
    <p class="mt-2 fw-bold font-monospace lh-lg">
        {{ $post->text }}
    </p>
   
  </div>