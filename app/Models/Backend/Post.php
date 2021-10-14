<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Backend\Image;
use App\Models\Backend\Post_Image;
use App\Models\Backend\Category;
use Log;

class Post extends Model
{
    use HasFactory;

    public function images()
    {
        return $this->belongsToMany(Image::class, "post__images");
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function create_post($request, $active = null, $category_id = null)
    {
        $post = new Post;
        $post->title = $request->post_title;
        $post->subtitle = $request->post_subtitle;
        $post->text = $request->post_text;
        if($active){
            $post->active = $active;
        }
        else {
            $post->active = 0;
        }
        if($category_id){
            $cat = Category::where("id", $category_id)->first();
        }
        else {
            $cat = Category::where("name", "other")->first();
        }
        $post->category_id = $cat->id;
        $post = $post->save();
        return $post;
    }

    
    public function update_post($request, $post_id)
    {
        $post = Post::where("id", $post_id)->first();
        $post->title = $request->post_title;
        $post->subtitle = $request->post_subtitle;
        $post->text = $request->post_text;
        $post->active = 0;
        $post = $post->save();
        return $post;
    }
    public function toggle_post_active($post_id)
    {
        $post = Post::where("id", $post_id)->first();
        Log::info($post->active);
        if($post->active === false){
            Log::info("war 0");
            $post->active = true;
        }
        else {
            Log::info("war 1");
            $post->active = false;
        }
        $post->save();
        return $post;
    }
    public function delete_post($post_id)
    {
        $post = Post::where("id", $post_id)->delete();
        return $post;
    }



}
