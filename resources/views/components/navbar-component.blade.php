<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active bg-success rounded" aria-current="page" href="{{ route('index') }}">Besucher</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active bg-info rounded" href="{{ route('dashboard') }}">Admin</a>
          </li>


          @if(Request::path() != 'dashboard')
          @foreach($categories as $c)
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{ $c["category"] }}
                </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                @foreach($c["posts"] as $post)
              <li><a class="nav-link" href="#post{{ $post['id'] }}">{{ $post["title"] }}</a></li>
                @endforeach
            </ul>
          </li>
          @endforeach
          @endif
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle bg-secondary rounded" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Logout
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="nav-link" href="{{ route('meinlogout') }}">logout</a></li>

            </ul>
          </li>

        </ul>
      </div>
    </div>
  </nav>