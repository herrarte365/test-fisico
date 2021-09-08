<div class="nav dark:bg-gray-900" id="navbar">
            <nav class="nav__container">
                <div>
                    <a href="{{ route("dashboard") }}" class="nav__link nav__logo {{ Request::path() == "dashboard" ? "active" : "" }}">
                        <i class='bx bxs-disc nav__icon' ></i>
                        <span class="nav__logo-name">PROATLETA</span>
                    </a>
    
                    <div class="nav__list">
                        <div class="nav__items">
                            <h3 class="nav__subtitle dark:text-white">Menu</h3>
    
                            <a href="{{ route('atletas') }}" class="nav__link {{ Request::path() == "atletas" ? "active" : "" }}">
                                <i class='bx bx-run nav__icon'></i>
                                <span class="nav__name dark:text-white">Atletas</span>
                            </a>
                            
                            <a href="{{ route('grupos') }}" class="nav__link {{ Request::path() == "grupos" ? "active" : "" }}">
                                <i class='bx bx-group nav__icon'></i>
                                <span class="nav__name dark:text-white">Grupos</span>
                            </a>

                            <a href="{{ route('entrenadores') }}" class="nav__link {{ Request::path() == "entrenadores" ? "active" : "" }}">
                                <i class='bx bx-user-voice nav__icon'></i>
                                <span class="nav__name dark:text-white">Entrenadores</span>
                            </a>

                            <a href="{{ route('pruebas') }}" class="nav__link {{ Request::path() == "pruebasfisicas" ? "active" : "" }}">
                                <i class='bx bx-test-tube bx-burst-hover nav__icon'></i>
                                <span class="nav__name dark:text-white">Prubas Físicas</span>
                            </a>
                        </div>
    
                        <div class="nav__items">
                            <h3 class="nav__subtitle dark:text-white">Usuario</h3>

                            <a href="{{ route('profile.show') }}" class="nav__link {{ Request::path() == "user/profile" ? "active" : "" }}">
                                <i class='bx bx-user nav__icon'></i>
                                <span class="nav__name dark:text-white">Configuración</span>
                            </a>

                            
                        </div>
                    </div>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" class="nav__link nav__logout"
                        role="menuitem" tabindex="-1" id="user-menu-item-2" onclick="event.preventDefault();
                                            this.closest('form').submit();">
                        <i class='bx bx-log-out nav__icon' ></i>
                        <span class="nav__name dark:text-white">Salir</span>
                    </a>
                </form>
            </nav>
        </div>