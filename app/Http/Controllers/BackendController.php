<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Backend\Image;
use App\Models\Backend\Post;
use App\Models\Backend\Post_Image;
use App\Models\Backend\BusinessHours;
use App\Models\Backend\Category;
use App\Models\Backend\Hours;
use Log;

use Auth;

class BackendController extends Controller
{
    // Context
    public function get_base_context() {
        $businessHours = new BusinessHours();
        $businessHours = $businessHours->get_hours();
        $categories = Category::all();
        $posts = Post::all();
        $context = [
            "posts" => $posts,
            "images" => Image::all(),
            "buisnesshours" => $businessHours,
            "categories" => $categories,
            
        ];
        return $context;
    }

    //logout
    public function meinlogout(Request $request) {
        Auth::logout();
        return redirect()->action([BackendController::class, 'index']);
      }

    // Startseite
    public function index(Request $req){
        $context = $this->get_base_context();
        return view("backend.dashboard", $context);
    }

    // Neu erstellen
    public function add_new_image(Request $req){
        $image = new Image();
        $image = $image->create_image($req);
        return redirect()->action([BackendController::class, 'index']);

    }

    public function add_new_post(Request $req){
        $post = new Post();
        $post = $post->create_post($req);
        return redirect()->action([BackendController::class, 'index']);

    }

    public function add_new_businesshours(Request $req){
        // Model erstellen

    }

    // Bilder einem Post zuordnen
    public function set_images_for_post(Request $req){
        $postImage = new Post_Image();
        $postImage = $postImage->create_postimage($req);
        return redirect()->action([BackendController::class, 'index']);

    }

    // Editieren und Löschen
        // Posts
    public function edit_post(Request $req){
        $post_id = $req->post_id;
        $post = Post::where("id", $post_id)->first();
        return view("backend.components.forms.edit.post", ["post"=>$post, "categories" => Category::all()]);
    }


    public function update_post(Request $req){
        $post_id = $req->post_id;
        $post = new Post();
        $post->update_post($req, $post_id);
        return redirect()->action([BackendController::class, 'index']);

    }
    public function toggle_post_active(Request $req){
        $post_id = $req->post_id;
        $post = new Post();
        $post->toggle_post_active($post_id);
        return redirect()->action([BackendController::class, 'index']);

    }
    public function delete_post(Request $req){
        $post_id = $req->post_id;
        $post = new Post();
        $post->delete_post($post_id);
        return redirect()->action([BackendController::class, 'index']);

    }

        // Images 
    public function edit_image(Request $req){
        $image_id = $req->image_id;
        Log::info("image id");
        Log::info($image_id);
        $image = Image::where("id", $image_id)->first();
        return view("backend.components.forms.edit.image", ["image"=>$image]);

    }
    public function update_image(Request $req){
        $image_id = $req->image_id;
        $image = new Image();
        $image->update_image($req, $image_id);
        return redirect()->action([BackendController::class, 'index']);

    }
    public function delete_image(Request $req){
        $image_id = $req->image_id;
        $image = new Image();
        $image->delete_image($image_id);
        return redirect()->action([BackendController::class, 'index']);

    }


    // Öffnungszeiten (BusinessHours)
    public function update_businesshours(Request $req) {
        $post = Post::where("id", $req->post_id )->first();
        $post->title = $req->post_title;
        $post->subtitle = $req->post_subtitle;
        $post->text = $req->post_text;

        $post->save();
        Log::info("REQUESR");
        Log::info($req);

        foreach(config("app.wochentage") as $wd){
            $hours = Hours::where("weekday", $wd)->where("afternoon", 0)->first();
            $hours->start = $req->input("start_".$wd."_morning");
            $hours->end = $req->input("end_".$wd."_morning");
            $hours->save();

            $businessHours = BusinessHours::where("hours_id", $hours->id)->first();
            $businessHours->post_id = $post->id;
            $businessHours->hours_id = $hours->id;
            $businessHours->save();
            
            $hours = Hours::where("weekday", $wd)->where("afternoon", 1)->first();
            $hours->start = $req->input("start_".$wd."_afternoon");
            $hours->end = $req->input("end_".$wd."_afternoon");
            $hours->save();

            $businessHours = BusinessHours::where("hours_id", $hours->id)->first();
            $businessHours->post_id = $post->id;
            $businessHours->hours_id = $hours->id;
            $businessHours->save();

        }
        return redirect()->action([BackendController::class, 'index']);
    }



    public function update_post_category(Request $req){
        $post_id = $req->post_id;
        $category_id = $req->category_id;
        $post = Post::where("id", $post_id)->first();
        $category = Category::where("id", $category_id)->first();
        $post->category_id = $category->id;
        $post->save();
        return redirect()->action([BackendController::class, 'index']);
    }
}
