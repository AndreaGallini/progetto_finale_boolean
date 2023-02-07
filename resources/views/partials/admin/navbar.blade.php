<nav class="d-flex justify-content-start align-items-center container">
    <h2 class="me-3">
        @if (Auth::user()->isAdmin())
            Dashboard admin:
        @else
            Dashboard di {{ Auth::user()->name }}:
        @endif
    </h2>
    <ul class="d-flex justify-content-between align-items-center">
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
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'admin.apartments.index' ? 'active' : '' }}"
                    href="{{ route('admin.apartments.index') }}">Appartamenti</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'admin.sponsors.index' ? 'active' : '' }}"
                    href="{{ route('admin.sponsors.index') }}">Sponsor</a>
            </li>
        @endif


    </ul>
</nav>
