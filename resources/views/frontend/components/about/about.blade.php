@foreach($abouts as $c)
@foreach($c->posts as $post)
<div class="container mt-2 bg-primary bg-transparent bg-gradient p-3 rounded shadow-lg">
    <x-clearfix :post="$post"></x-clearfix>
</div>
@endforeach
@endforeach