<!-- need to remove -->
{{-- <li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li> --}}


<li class="nav-item">
    <a href="{{ route('companies.index') }}" class="nav-link {{ Request::is('*escolinhas*') ? 'active' : '' }}">
        <i class="fas fa-futbol"></i>
        <p>Escolinhas de Futebol</p>
    </a>
</li>