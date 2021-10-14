<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Clearfix extends Component
{
    public $post;
    public $template;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($post, $template=null)
    {
        $this->post = $post;
        $this->template = $template;
    }
 
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        if(! $this->template){
            return view('components.clearfix.clearfix', ["post"=>$this->post]);
        }
        else {
            if($this->template === "alt 1"){
                return view('components.clearfix.clearfix2', ["post"=>$this->post]);
            }
        }
    }
}
