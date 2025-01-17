<nav class="bg-white border-b border-gray-200 shadow-sm py-3">
    <div class="container d-flex justify-content-between align-items-center">
        <!-- Logo -->
        <div class="d-flex align-items-center">
            <a href="{{ route('home') }}" class="text-dark fw-bold text-decoration-none d-flex align-items-center">
                <img src="{{ asset('logo.png') }}" alt="Komunitas Belajar" width="30" height="30" class="me-2">
                Komunitas Belajasr
            </a>
        </div>

        <!-- Navigation Links -->
        <ul class="nav">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'fw-bold' : '' }}">
                    Home
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'fw-bold' : '' }}">
                    Dashboard
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="categoryDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Kategori
                </a>
                <ul class="dropdown-menu" aria-labelledby="categoryDropdown">
                    <li><a class="dropdown-item" href="{{ route('categories.show', 'matematika') }}">Matematika</a></li>
                    <li><a class="dropdown-item" href="{{ route('categories.show', 'sains') }}">Sains</a></li>
                    <li><a class="dropdown-item" href="{{ route('categories.show', 'bahasa') }}">Bahasa</a></li>
                    <li><a class="dropdown-item" href="{{ route('categories.show', 'sejarah') }}">Sejarah</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{ route('questions.trending') }}" class="nav-link {{ request()->routeIs('questions.trending') ? 'fw-bold' : '' }}">
                    Forum
                </a>
            </li>
        </ul>

        <!-- User Dropdown / Login -->
        <div>
            @auth
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">Profil</a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary">Login/Daftar</a>
            @endauth
        </div>
    </div>
</nav>
