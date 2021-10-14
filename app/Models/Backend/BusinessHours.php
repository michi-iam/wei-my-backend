<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Backend\Post;
use App\Models\Backend\Hours;
use Illuminate\Support\Facades\Bus;

class BusinessHours extends Model
{
    use HasFactory;
    public function post()
    {
        return $this->hasOne(Post::class, "id", "post_id");
    }
    public function hours()
    {
        return $this->hasOne(Hours::class, "id", "hours_id");
    }

    public function get_hours(){
        if(BusinessHours::all()->count() === 0) {
            $this->create_businesshours();
        }
      
        return BusinessHours::all();
       
    }

    public function create_businesshours(){

        $categorys = ["about", "news", "contact", "other", "businesshours"];
        if(Category::all()->count()===0){
            foreach($categorys as $c){
                $cat = new Category();
                $cat->name = $c;
                $cat->save();
            }
        }

        $post = new Post();
        $post->title = "Unsere Öffnungszeiten";
        $post->subtitle = "Wir sind montags bis samstags für dich da.";
        $post->text = "Wir freuen uns auf Ihren Besuch!";
  
        $cat = Category::where("name", "businesshours")->first();
        $post->category_id = $cat->id;
        $post->save();

        foreach(config("app.wochentage") as $wd){
            $hours = new Hours();
            $hours->weekday = $wd;
            $hours->start = "9:00";
            $hours->end = "13:00";
            $hours->afternoon = 0;
            $hours->save();

            $businessHours = new BusinessHours();
            $businessHours->post_id = $post->id;
            $businessHours->hours_id = $hours->id;
            $businessHours->special = 0;
            $businessHours->lunchbreak = 1;
            $businessHours->save();

            $hours = new Hours();
            $hours->weekday = $wd;
            $hours->start = "15:00";
            $hours->end = "18:30";
            $hours->afternoon = 1;
            $hours->save();

            $businessHours = new BusinessHours();
            $businessHours->post_id = $post->id;
            $businessHours->hours_id = $hours->id;
            $businessHours->special = 0;
            $businessHours->lunchbreak = 1;
            $businessHours->save();
        }


    }
}
