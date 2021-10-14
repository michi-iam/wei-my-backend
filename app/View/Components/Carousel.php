<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Carousel extends Component
{
    public $carouselName;
    public $context;
    public $images;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($carouselName, $images)
    {
        $this->carouselName = $carouselName;
        $this->images = $images;
        $this->context = [
            "carouselName"=> $this->carouselName,
            "images"=> $this->images,
        ];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $context = $this->context;
        return view('components.carousel', $context);
    }
}
