<div> 
    <div class="row">
      <form id="postEditForm" method="POST">
        @csrf
        <input type="hidden" value="{{ $post->id }}" name="post_id" id="posteditform_post_id">
        <label class="form-label" for="id_title">Titel</label>
        <input value="{{ $post->title }}" class="form-control" type="text" id="posteditform_id_title" name="post_title">
        <label class="form-label" for="id_subtitle">Untertitel</label>
        <input value="{{ $post->subtitle }}" class="form-control" type="text" id="posteditform_id_subtitle" name="post_subtitle">
        <label class="form-label" for="id_text">Text</label>
        <textarea value="{{ $post->text }}" class="form-control" type="text" id="posteditform_id_text" name="post_text">{{ $post->text }}</textarea>
        <button id="postEditFormBtn" class="btn btn-success mt-2" type="submit">ändern</button>
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
      <form method="POST">
        @csrf
        <input type="hidden" value="{{ $post->id }}" name="post_id" id="selectPostId">
        <label class="form-label" for="category_select">Kategorie</label>
        <select id="category_select" name="category_id" class="form-select">
          <option value="{{ $post->category->id }}">{{ $post->category->name }}</option>
          @foreach($categories as $cat)
            @if($cat->name != $post->category->name && $cat->name != "businesshours")
            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endif
          @endforeach
        </select>
        <p id="category_selectInfoField" class="d-none"></p>
      </form>
    </div>

    <div class="row mt-4">
      <form method="POST">
        @csrf
        <input type="hidden" value="{{ $post->id }}" name="post_id">
        <h4 id="TogglePostStatusInfoField">Status: @if($post->active == true) aktiv @else inaktiv @endif</h4>
        <button id="TogglePostStatusBtn" post_id="{{ $post->id }}" class="btn btn-warning mt-2" type="submit">Status ändern</button>
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



  <script>


    jQuery('#TogglePostStatusBtn').on("click", function(e){
      e.preventDefault();
      e.stopPropagation();
      e.stopImmediatePropagation();
      var post_id = $(this).attr("post_id");
      $.ajax({
        url: "toggle_post_active",
        type: "POST",
        data:{
            "_token": "{{ csrf_token() }}",
            "post_id":post_id,
    
      
        }, success: function(data){
          console.log(data)
          var infoField = $('#TogglePostStatusInfoField');
          if(data === "1"){
            infoField.html("aktiv")
          }
          else {
            infoField.html("inaktiv")
          }

        }
    });

    })



    jQuery('#category_select').on("change", function(e){
      e.preventDefault();
      e.stopPropagation();
      e.stopImmediatePropagation();
     // action="update_post_category"
     var category_id = $(this).val()
     var post_id = $('#selectPostId').val();
      $.ajax({
          url: "update_post_category",
          type: "POST",
          data:{
              "_token": "{{ csrf_token() }}",
              "category_id":category_id,
              "post_id":post_id,
      
        
          }, success: function(data){
            var infoField = $("#category_selectInfoField");
            infoField.html(data);
            infoField.removeClass("d-none")
         
            setTimeout(function() { 
              infoField.html("");
              infoField.addClass("d-none")
          }, 3500);
          }
      });
    });


    jQuery('#postEditForm').on("submit", function(e){
      e.preventDefault();
      e.stopPropagation();
      e.stopImmediatePropagation();
      var post_id = $('#posteditform_post_id').val();
      var post_title = $('#posteditform_id_title').val();
      var post_subtitle = $('#posteditform_id_subtitle').val();
      var post_text = $('#posteditform_id_text').val();
    
          $.ajax({
              url: "update_post",
              type: "POST",
              data:{
                  "_token": "{{ csrf_token() }}",
                  "post_id":post_id,
                  "post_title":post_title,
                  "post_subtitle":post_subtitle,
                  "post_text":post_text,
             
              }, success: function(data){
                var btn = $("#postEditFormBtn");
                var oldText = btn.html();
                btn.html(data);
                btn.removeClass("btn-success")
                btn.addClass("btn-info")
                setTimeout(function() { 
                  btn.html(oldText);
                  btn.removeClass("btn-info")
                  btn.addClass("btn-success")
              }, 3500);
              }
          });

    
  });
  </script>