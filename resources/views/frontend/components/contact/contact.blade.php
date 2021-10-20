@foreach($contacts as $c)
@foreach($c->posts as $post)
    <div id="post{{ $post->id }}" class="container mt-2 bg-dark bg-gradient shadow-lg p-3 text-light rounded">
        <div class="row">
            <h2 class="text-center text-info text-decoration-underline font-monospace fw-bolder">{{ $post->title }}</h2>
            <h4>{{ $post->subtitle }}</h4>
        </div>
        <div class="mt-3 row lh-lg fw-bold fs-4">
            <p style="white-space: pre-line">{{ $post->text }}</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <x-carousel carouselName="literatur{{ $post->id }}" :images="$post->images"></x-carousel>
            </div>
        </div>
        
    </div>

@endforeach
@endforeach