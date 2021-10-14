


<div class="row row-cols-2 g-2 mt-3">
    <div class="col-3 bg-secondary rounded p-3">
        <div class="row text-center">
            <h3>Bilder zuordnen</h3>
        </div>
        @include("backend.components.forms.edit.setimageforpost")
    </div>
    
    <div class="col-1"></div>

    <div class="col-8 bg-secondary rounded p-3">
        <div class="row text-center">
            <h3>Posts und Bilder bearbeiten</h3>
        </div>
        <div class="row bg-primary p-3 rounded">
            <h4>Alle verfügbaren Bilder</h4>
            @foreach($images as $img)
            <div class="col-3 border border-dark border-2 p-2 bg-secondary">
                <div class="row">
                    <h3>{{ $img->title }}</h3>
                    <img imageId="{{ $img->id }}" class="editImage img img-fluid" src="{{ asset('/storage/uploaded_images/'.$img->src) }}" onerror="$(this).attr('src', '{{ URL::to('/') }}{{ '/images/'.$img->src }}')" alt="{{ $img->alt }}">
                </div>
            </div>
            @endforeach
        </div>
        <div id="showImageToEdit" class="row mt-2 bg-info border border-1 border-dark p-2 d-none">

        </div>
        <div class="row mt-4 justify-content-center">
            <div class="row bg-danger p-3 rounded">
                <h4>Alle verfügbaren Posts</h4>
                <select class="form-select" name="" id="editPostSelect">
                    <option value="" ></option>
                    @foreach($posts->sortBy("category.name") as $post)
                  
                        @if($post->category->name != "businesshours")
                            <option value="{{ $post->id }}">{{ $post->category->name }} : {{ $post->title }}</option>
                        @endif
               
                    @endforeach
                </select>                
            </div>
            <div id="showPostToEdit" class="row mt-3 bg-info border border-1 border-dark d-none p-2 rounded">

            </div>
        </div>
        
    </div>
</div>



<script>
    jQuery('#editPostSelect').on("change", function(e){
        e.preventDefault();
        e.stopPropagation();
        e.stopImmediatePropagation();
        var postId = $(this).val();
        if(postId){
            $.ajax({
                url: "edit_post",
                type: "GET",
                data:{
                    "post_id": postId,
                }, success: function(data){
                    $('#showPostToEdit').removeClass("d-none");
                    $('#showPostToEdit').html(data);
                }
            });

        }
      
    });
    jQuery('.editImage').on("click", function(e){
        e.preventDefault();
        e.stopPropagation();
        e.stopImmediatePropagation();
        var imageId = $(this).attr("imageId");
        $.ajax({
            url: "edit_image",
            type: "GET",
            data:{
                "image_id": imageId,
            }, success: function(data){
 
                $('#showImageToEdit').removeClass("d-none");
                $('#showImageToEdit').html(data);
            }
        });
      
    });
    

</script>
