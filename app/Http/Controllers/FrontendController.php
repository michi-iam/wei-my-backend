<?php

namespace App\Http\Controllers;

use App\Models\Backend\BusinessHours;
use App\Models\Backend\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(Request $req){
        $context = [
            "businesshours" => BusinessHours::all(),
            "news" => Category::where("name", "news")->whereRelation("posts", "active", "=", true)->get(),
            "contacts" => Category::where("name", "contact")->whereRelation("posts", "active", "=", true)->get(),
            "abouts" => Category::where("name", "about")->whereRelation("posts", "active", "=", true)->get(),
            "others" => Category::where("name", "other")->whereRelation("posts", "active", "=", true)->get(),
        ];
        return view("frontend.startseite", $context);
    }
}
