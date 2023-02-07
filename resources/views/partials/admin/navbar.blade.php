<nav class="d-flex justify-content-start align-items-center container">
    <h2 class="me-3">
        @if (Auth::user()->isAdmin())
            Admin's Office:
        @else
            {{ Auth::user()->name }} 's Office :
        @endif
    </h2>
    <ul class="d-flex justify-content-between align-items-center">
        @if (Auth::user()->isAdmin())
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'admin.apartments.index' ? 'active' : '' }}"
                    href="{{ route('admin.apartments.index') }}">Apartments</a>
            </li>
            <li class="ms-4 me-2">
                <p class="m-0 text-secondary"> 1 to many:</p>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'admin.categories.index' ? 'active' : '' }}"
                    href="{{ route('admin.categories.index') }}">Categories</a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'admin.mediabooks.index' ? 'active' : '' }}"
                    href="{{ route('admin.mediabooks.index') }}">Mediabooks</a>
            </li>
            <li class="ms-4 me-2">
                <p class="m-0 text-secondary">Many to many:</p>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'admin.services.index' ? 'active' : '' }}"
                    href="{{ route('admin.services.index') }}">Services</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'admin.sponsors.index' ? 'active' : '' }}"
                    href="{{ route('admin.sponsors.index') }}">Sponsors</a>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'admin.apartments.index' ? 'active' : '' }}"
                    href="{{ route('admin.apartments.index') }}">Apartments</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'admin.sponsors.index' ? 'active' : '' }}"
                    href="{{ route('admin.sponsors.index') }}">Sponsors</a>
            </li>
        @endif


    </ul>
</nav>
