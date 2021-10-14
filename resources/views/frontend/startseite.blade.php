@extends("backend.layouts.main")



@section('content')

<div class="container p-4">
    <div class="row">
        <h1>Startseite Frontend</h1>
    </div>
    <div class="row mt-5 justify-content-center">
        @isset($news)
        @include("frontend.components.news.news")
        @endisset
    </div>
    <div class="row mt-5 justify-content-center">
        @isset($businesshours)
        @include("frontend.components.businesshours.businesshours")
        @endisset
    </div>
    <div class="row mt-5 justify-content-center">
        @isset($contacts)
        @include("frontend.components.contact.contact")
        @endisset
    </div>
    <div class="row mt-5 justify-content-center">
        @isset($abouts)
        @include("frontend.components.about.about")
        @endisset
    </div>
    <div class="row mt-5 justify-content-center">
        @isset($others)
            @include("frontend.components.other.other")
        @endisset
    </div>
    
</div>

@stop