<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Backend\Post;

class Image extends Model
{
    use HasFactory;

    public function posts()
    {
        return $this->belongsToMany(Post::class, "post__images");
    }

    public function create_image($request){
        $image = new Image();
        $image->title = $request->image_title;
        $image->alt = $request->image_alt;
        if ($request->hasFile('image_src')) {
            $request->validate([
                'image_src' => 'mimes:jpeg,bmp,png,jpg',
                // 'file' => 'max:500000',
            ]);
            $request->image_src->store('uploaded_images', 'public');
            $image->src=$request->image_src->hashName();
       
        }
        $image->save();
        return $image;
    }

    public function update_image($request, $image_id){
        $image = Image::where("id", $image_id)->first();
        $image->title = $request->image_title;
        $image->alt = $request->image_alt;
        $image->save();
    }

    
    public function delete_image($image_id){
        $image = Image::where("id", $image_id)->first();
        $filename = storage_path().'/app/public/uploaded_images/'.$image->src;
        unlink($filename);
        Image::where("id", $image->id)->delete();
        $image = Image::where("id", $image_id)->delete();
    }


}
