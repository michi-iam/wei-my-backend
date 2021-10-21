@extends("backend.layouts.main")

@section("content")
    <div class="container" style="min-height: 100vh;">
        <div class="row justify-content-center">
            @if ($errors->any())
                <div class="row">
                    <div class="text-info bg-dark bg-gradient rounded p-4 mt-5">{{ __('Whoops! Something went wrong.') }}</div>

                    <ul class="text-info bg-dark bg-gradient rounded p-4 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('status'))
                <div class="bg-dark bg-gradient rounded text-info mt-5">
                    {{ session('status') }}
                </div>
            @endif
        </div>
        <div class="row justify-content-center">
           <div class="col-auto">
            <form class="mt-5 bg-warning bg-gradient p-5 rounded shadow" method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <label class="form-label" for="email">
                        {{ __('Email') }}
                        <x-jet-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
                    </label>
                </div>

                <div class="mt-4">
                    <label class="form-label" for="password">
                        {{ __('Password') }}
                    <x-jet-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                    </label>
                </div>

                <div class="block mt-4">
                    <label for="remember_me" class="flex items-center">
                        <x-jet-checkbox id="remember_me" name="remember" />
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <button type="submit" class="btn btn-success shadow">
                        {{ __('Log in') }}
                    </button>
                </div>
            </form>
           </div>
        </div>
    </div>
@stop
