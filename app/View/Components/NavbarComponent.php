<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Backend\Category;
use App\Models\Backend\Post;

class NavbarComponent extends Component
{
    public $categories;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $categories = Category::all();
        $cs = [];
        foreach($categories as $c){
            if(Post::where("category_id", $c->id)->exists()){
                $ps = Post::where("category_id", $c->id)->get();
                if($ps){
                    $obj = [
                        "category" => $c->name,
                        "posts" => $ps, 
                    ];
                    array_push($cs, $obj);
                }

            }
        }
        $this->categories = $cs;
        $this->context = [
            "categories"=> $this->categories,
          
        ];
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.navbar-component');
    }
}
