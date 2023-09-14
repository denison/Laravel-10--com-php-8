<!-- need to remove -->
@if (auth()->user()->hasRole(\App\Enum\RoleName::SUPER_ADMIN))
    <li class="nav-item">
        <a href="{{ route('home') }}" style="font-family: Comfortaa, Cursive;" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
            <i class="nav-icon fas fa-home"></i>
            <p>Home</p>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ route('users.index') }}" style="font-family: Comfortaa, Cursive;" class="nav-link {{ Request::is('usuarios') ? 'active' : '' }}">
            <i class="nav-icon fas fa-users"></i>
            <p>Usuários</p>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ route('companies.index') }}" style="font-family: Comfortaa, Cursive;" class="nav-link {{ Request::is('*escolinhas*') ? 'active' : '' }}">
            <i class="fas fa-futbol"></i>
            <p>Escolinhas de Futebol</p>
        </a>
    </li>
@endif

@if (auth()->user()->hasRole(\App\Enum\RoleName::MANAGER))
    <li class="nav-item">
        <a href="{{ route('companies.index') }}" style="font-family: Comfortaa, Cursive;" class="nav-link {{ Request::is('*escolinhas*') ? 'active' : '' }}">
            <i class="fas fa-futbol"></i>
            <p>Escolinhas de Futebol</p>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ route('subscriptions.index') }}" style="font-family: Comfortaa, Cursive;" class="nav-link {{ Request::is('turmas*') ? 'active' : '' }}">
            <i class="fas fa-users"></i>
            <p>Turmas</p>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ route('users.clients') }}" style="font-family: Comfortaa, Cursive;" class="nav-link {{ Request::is('*alunos*') ? 'active' : '' }}">
            <i class="fas fa-user-friends"></i>
            <p>Alunos</p>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ route('payments.index') }}" style="font-family: Comfortaa, Cursive;" class="nav-link {{ Request::is('*minhas-faturas*') ? 'active' : '' }}">
            <i class="fas fa-money-check-alt"></i>
            <p> Minhas Faturas</p>
        </a>
    </li>
@endif