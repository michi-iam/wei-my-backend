@extends("backend.layouts.main")



@section('content')
   <div class="row justify-content-center">
        <div class="row text-center mt-5 bg-secondary text-light rounded p-3 shadow-lg border border-dark border-2">
            <h1>Startseite Backend</h1>
        </div>

        <div class="container mt-5 bg-warning rounded p-3 shadow">
            <div class="row text-center">
                <h2>Bearbeiten</h2>
            </div>
            @include("backend.components.postimage")
        </div>


        <div class="row mt-5 bg-danger rounded p-3 shadow-lg justify-content-center">
            <div class="row text-center">
                <h2>Neue Posts / Bilder erstellen</h2>
            </div>
            @include("backend.components.mainnew")
        </div>

        <div class="row mt-5 bg-warning rounded p-3 shadow-lg justify-content-center">
            <div class="row text-center">
                <h2>Öffnungszeiten ändern</h2>
            </div>
            @include("backend.components.businesshours")
        </div>
   </div>




@stop



