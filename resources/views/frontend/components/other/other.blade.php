@foreach($others as $n)
@foreach($n->posts->sortByDesc("updated_at") as $post)

<div class="container mt-2 bg-primary bg-transparent bg-gradient p-3 rounded shadow-lg">
    <x-clearfix template="alt 1" :post="$post"></x-clearfix>
</div>

@endforeach
@endforeach