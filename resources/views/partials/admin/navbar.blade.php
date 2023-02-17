

@guest

@if (Route::has('register'))

@endif
@else
<div class="d-flex justify-content-between align-items-center container maincont">
    <a href="{{ url('admin') }}" class="nameuser">
        @if (Auth::user()->isAdmin())
        <span> Dashboard Admin</span>
        @else
        <span> Dashboard di {{ Auth::user()->name }}:</span>
        @endif
    </a>
    <ul class="d-flex justify-content-between align-items-center navl">
        @if (Auth::user()->isAdmin())
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'admin.apartments.index' ? 'active' : '' }}"
                    href="{{ route('admin.apartments.index') }}">Appartamenti</a>
            </li>
            <li class="ms-4 me-2">
                <p class="m-0 text-secondary"> One to many:</p>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'admin.categories.index' ? 'active' : '' }}"
                    href="{{ route('admin.categories.index') }}">Categorie</a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'admin.mediabooks.index' ? 'active' : '' }}"
                    href="{{ route('admin.mediabooks.index') }}">Album foto</a>
            </li>
            <li class="ms-4 me-2">
                <p class="m-0 text-secondary">Many to many:</p>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'admin.services.index' ? 'active' : '' }}"
                    href="{{ route('admin.services.index') }}">Servizi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'admin.sponsors.index' ? 'active' : '' }}"
                    href="{{ route('admin.sponsors.index') }}">Sponsor</a>
            </li>
        @else
            {{-- <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'admin' ? 'active' : '' }}"
                    href="{{ url('admin') }}">Dashboard</a>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'admin.apartments.index' ? 'active' : '' }}"
                    href="{{ route('admin.apartments.index') }}">Appartamenti</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'admin.sponsors.index' ? 'active' : '' }}"
                    href="{{ route('admin.sponsors.index') }}">Sponsorizza</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'admin.inbox' ? 'active' : '' }}"
                    href="{{ route('admin.inbox') }}">Messaggi</a>
            </li>
        @endif
    </ul>
    <div class="logou">
        <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
    </div>
</div>
@endguest