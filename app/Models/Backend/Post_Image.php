<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post_Image extends Model
{
    use HasFactory;

  

    public function create_postimage($request){
        $post_id = $request->post_id;
        $images_ids = $request->images_ids;
        
        if(Post_Image::where("post_id", $post_id)->exists()){
            $postImages = Post_Image::where("post_id", $post_id)->delete();
        }

        foreach($images_ids as $imgId){
            $postImage = new Post_Image();
            $postImage->post_id = $post_id;
            $postImage->image_id = $imgId;
            $postImage->save();
        }
        return "Images zum Post gespeichert";
        

    }
}
