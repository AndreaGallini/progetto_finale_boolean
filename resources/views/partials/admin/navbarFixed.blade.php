

<nav id="navFixed" class="d-flex flex-column align-items-center">
    <ul id="navItems" class="d-flex flex-column d-none">
        @guest

@if (Route::has('register'))
{{-- <li>
    <a href="#" class="d-flex justify-content-center align-items-center">
        <i class="fa-solid fa-shop"></i>

    </a>
</li> --}}
<li>
    <a href="{{ route('login') }}" class="d-flex justify-content-center align-items-center">
        <i class="fa-solid fa-user"></i>
    </a>
</li>
@endif
@else
{{-- <li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        {{ Auth::user()->name }}
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ url('admin') }}">{{ __('Dashboard') }}</a>
        <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</li> --}}



{{-- <li>
    <a href="#" class="d-flex justify-content-center align-items-center">
        <i class="fa-solid fa-shop"></i>

    </a>
</li>
--}}
<li> 
    <a class="d-flex justify-content-center align-items-center" href="{{ url('admin') }}">
        <i class="fa-solid fa-table-columns"></i>
    </a>
</li>
<li>
    <a class="d-flex justify-content-center align-items-center" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
        </a>
</li>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
@endguest
    </ul>
    <div id="navToggler">
        <i class="fa-solid fa-bars"></i>
    </div>
</nav>
