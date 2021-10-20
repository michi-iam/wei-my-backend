<div>
    @foreach($news as $n)
    @foreach($n->posts->sortByDesc("updated_at") as $post)
        <div id="post{{ $post->id }}" class="container mt-2 bg-info p-3 rounded shadow-lg font-monospace">
            <div class="row justify-content-center text-center ">
                <div class="row">
                    <h2>{{ $post->title }}</h2>
                    <h4>{{ $post->subtitle }}</h4>
                </div>
                <div  class="row justify-content-center mt-3 mb-3 d-none bg-dark p-3">
                    <div class="col-8" id="newsImageShowField{{ $post->id }}">
    
                    </div>
                </div>
                <script>
                    jQuery('#newsImageShowField{{ $post->id }}').on("click", function(e){
                        e.preventDefault();
                        e.stopPropagation();
                        e.stopImmediatePropagation();
                        var image = $(this).html("");
                        $(this).parent().addClass("d-none");
                   
                      
                    });
                </script>
            
                <div class="row justify-content-center mt-4 border border-dark border-3 shadow bg-primary bg-gradient">
                    @foreach($post->images as $img)
                    <div class="col-12 col-lg-3 border border-3 border-dark p-3 bg-secondary m-1">
                        <button imgTitle="{{ $img->title }}" showField="newsImageShowField{{ $post->id }}" class="btn btn-info newsImageBtn">
                            <img class="img-fluid" src="{{ asset('/storage/uploaded_images/'.$img->src) }}" onerror="$(this).attr('src', '{{ URL::to('/') }}{{ '/images/'.$img->src }}')" alt="{{ $img->alt }}">
                        </button>
                    </div>
                    @endforeach
                </div>
               
                <div class="row text-start mt-2">
                    <p class="lh-lg">{{ $post->text }}</p>
                </div>
            </div>
        </div>
    @endforeach
@endforeach
</div>


<script>
    jQuery('.newsImageBtn').on("click", function(e){
        e.preventDefault();
        e.stopPropagation();
        e.stopImmediatePropagation();
        var showField = $(this).attr("showField");
        showField = "#" + showField;
        $(showField).parent().removeClass("d-none");
        var image = $(this).html();
        
        $(showField).html("<p class='text-light'>"+$(this).attr("imgTitle")+"</p>")
        $(showField).append(image);
        $(showField)[0].scrollIntoView();
      
    });

</script>