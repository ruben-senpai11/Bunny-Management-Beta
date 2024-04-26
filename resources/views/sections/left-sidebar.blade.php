<style>
  .navbar-brand img {
    height: 35px;
  }

  .disabled {
    color: #888888;
  }

  .nav-bottom {
    /* position: absolute;
        bottom: 0; */
  }
</style>
<nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
  <div class="sidebar-inner px-4 pt-3">
    <!--User content-->
    <div class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
      <div class="d-flex align-items-center">
        <div class="avatar-lg me-4">
          <img src="{{ asset('assets/img/profile.svg') }}" style="max-height: 50px;max-width: 50px;"
            class="card-img-top rounded-circle border-white">
        </div>
        <div class="d-block">
          <h2 class="h5 mb-3">Hi, {{\Auth::user()->last_name}} {{\Auth::user()->first_name}}</h2>
          <a href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
            class="btn btn-secondary btn-sm d-inline-flex align-items-center">
            <svg class="icon icon-xxs me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
              </path>
            </svg>
            Sign Out
          </a>


          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </div>
      </div>
      <div class="collapse-close d-md-none">
        <a href="#sidebarMenu" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu"
          aria-expanded="true" aria-label="Toggle navigation">
          <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
              clip-rule="evenodd"></path>
          </svg>
        </a>
      </div>
    </div>
    <!-- End User content-->
    <ul class="nav flex-column pt-3 pt-md-0">
      <li class="nav-item">

        <a href="{{ route('home', []) }}" class="nav-link">
          <div class="d-flex align-items-center">
            <span class="sidebar-icon">
              <img src="{{ asset('assets/img/favicon/rabbit.svg') }}" height="20" width="20" alt="Logo"
                style="margin-right: 8px;">
            </span>
            <span class="sidebar-text fit-content overflow: hidden;text-overflow: ellipsis;width: 200px;"
              style="font-weight: 500; font-size: 20px;">
              {{\Auth::user()->userFarms()->first()->farm()->first()->farm_name}}
            </span>
          </div>
        </a>
      </li>
      <li class="nav-item  {{\Route::currentRouteName() == 'home' ? 'active' : ''}}">
        <a href="{{ route('home', []) }}" class="nav-link">
          <span class="sidebar-icon">
            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
              <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
            </svg>
          </span>
          <span class="sidebar-text">Acceuil</span>
        </a>
      </li>
      <li class="nav-item {{\Route::currentRouteName() == 'list-bunny' ? 'active' : '' }} {{\Route::currentRouteName() == 'create-bunny' ? 'active' : '' }}">
        <a href="{{ route('list-bunny', []) }}" class="nav-link"><span class="sidebar-icon"><svg
              class="icon icon-xs me-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
              <path fill-rule="evenodd"
                d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                clip-rule="evenodd"></path>
            </svg> </span><span class="sidebar-text">Catalogue de lapins</span></a>
      </li>

      <li class="nav-item {{\Route::currentRouteName() == 'planifications' ? 'active' : '' }} ">
        <a href="{{ route('planifications') }}" class="nav-link">
          <span class="sidebar-icon" style="max-height: 20px; max-width: 20px; margin-right: 14px;">
            <svg class="icon icon-xs text-gray-400" fill="currentColor" viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                clip-rule="evenodd"></path>
            </svg>
          </span>
          <span class="sidebar-text ">Calendrier</span></a>
      </li>

      <li class="nav-item"><span class="nav-link collapsed d-flex justify-content-between align-items-center"
          data-bs-toggle="collapse" data-bs-target="#submenu-app"><span><span class="sidebar-icon"><svg
                class="icon icon-xs me-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                  d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z"
                  clip-rule="evenodd"></path>
              </svg> </span><span class="sidebar-text">Reproductions</span> </span><span class="link-arrow "><svg
              class="icon icon-sm" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                clip-rule="evenodd"></path>
            </svg></span></span>
        <div
          class="multi-level collapse {{\Route::currentRouteName() == 'planifications' || \Route::currentRouteName() == 'matings' || \Route::currentRouteName() == 'palpations'|| \Route::currentRouteName() == 'gestations' ? 'show' : '' }}"
          role="list" id="submenu-app" aria-expanded="false">
          <ul class="flex-column nav">
            <!-- heatcycles -->
            {{-- <li class="nav-item d-non {{ \Route::currentRouteName() == 'heatcycles' ? 'active' : '' }}"><a
                class="nav-link" href="#"><span
                  class="sidebar-text-contracted">C</span> <span class="sidebar-text ">Cycles de chaleur</span></a>
            </li> --}}
            <!-- planifications -->
            {{-- <li class="nav-item d-non {{ \Route::currentRouteName() == 'planifications' ? 'active' : '' }}"><a
                class="nav-link" href="{{ route('planifications', []) }} "><span
                  class="sidebar-text-contracted">P</span> <span class="sidebar-text ">Planifications</span></a>
            </li> --}}
            <li class="nav-item {{ \Route::currentRouteName() == 'matings' ? 'active' : '' }}"><a class="nav-link"
                href="{{ route('matings', []) }}"><span class="sidebar-text-contracted">A</span>
                <span class="sidebar-text">Accouplements</span></a></li>
             {{-- <li class="nav-item {{ \Route::currentRouteName() == 'palpations' ? 'active' : '' }}"><a class="nav-link" href="{{ route('palpations').'#palpation' }}"><span class="sidebar-text-contracted">P</span> <span class="sidebar-text">Palpations</span></a></li> --}}
            <li class="nav-item {{ \Route::currentRouteName() == 'palpations' ? 'active' : '' }}"><a class="nav-link"
                href="{{ route('palpations', []) }}"><span class="sidebar-text-contracted">P</span> <span
                  class="sidebar-text">Palpations</span></a></li>
            <li class="nav-item {{ \Route::currentRouteName() == 'gestations' ? 'active' : '' }}"><a class="nav-link"
                href="{{ route('gestations', []) }}"><span class="sidebar-text-contracted">G</span> <span
                  class="sidebar-text">Gestations</span></a></li>
          </ul>
        </div>
      </li> 

      <li class="nav-item">
        <span class="nav-link collapsed d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
          data-bs-target="#submenu-transactions">
          <span>
            <span class="sidebar-icon">
              <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 18 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path>
                <path fill-rule="evenodd"
                  d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"
                  clip-rule="evenodd"></path>
              </svg>
            </span>
            <span class="sidebar-text disabled">Transactions</span>
          </span>

          <span class="link-arrow disabled ">
            <svg class="icon icon-sm" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                clip-rule="evenodd"></path>
            </svg>
          </span>
        </span>


        <div class="multi-level collapse" role="list" id="submenu-transactions" aria-expanded="false">
          <ul class="flex-column nav">
            <li class="nav-item"><a class="nav-link" href="#"><span class="sidebar-text-contracted">A</span>
                <span class="sidebar-text  disabled">
                  Acheter</span></a></li>
            <li class="nav-item"><a class="nav-link" href="#"><span class="sidebar-text-contracted">V</span>
                <span class="sidebar-text disabled">Vendre</span></a></li>
            <li class="nav-item"><a class="nav-link" href="#"><span class="sidebar-text-contracted">L</span>
                <span class="sidebar-text disabled">Liste des
                  transactions</span></a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item"><span class="nav-link collapsed d-flex justify-content-between align-items-center"
          data-bs-toggle="collapse" data-bs-target="#submenu-components"><span><span class="sidebar-icon"><svg
                class="icon icon-xs me-2" width="20" height="20" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
              </svg> </span><span class="sidebar-text disabled">Gestion des inputs</span> </span><span
            class="link-arrow disabled "><svg class="icon icon-sm" fill="currentColor" viewbox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                clip-rule="evenodd"></path>
            </svg></span></span>
        <div class="multi-level collapse" role="list" id="submenu-components" aria-expanded="false">
          <ul class="flex-column nav">
            <li class="nav-item"><a class="nav-link" href="#">
                <!-- <span class="icon icon-sm"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="16" height="16" fill="currentColor">
                                        <path d="M0 192c0-35.3 28.7-64 64-64c.5 0 1.1 0 1.6 0C73 91.5 105.3 64 144 64c15 0 29 4.1 40.9 11.2C198.2 49.6 225.1 32 256 32s57.8 17.6 71.1 43.2C339 68.1 353 64 368 64c38.7 0 71 27.5 78.4 64c.5 0 1.1 0 1.6 0c35.3 0 64 28.7 64 64c0 11.7-3.1 22.6-8.6 32H8.6C3.1 214.6 0 203.7 0 192zm0 91.4C0 268.3 12.3 256 27.4 256H484.6c15.1 0 27.4 12.3 27.4 27.4c0 70.5-44.4 130.7-106.7 154.1L403.5 452c-2 16-15.6 28-31.8 28H140.2c-16.1 0-29.8-12-31.8-28l-1.8-14.4C44.4 414.1 0 353.9 0 283.4z" />                                    
                                    </svg></span>  -->
                <span class="sidebar-text disabled">Provendres</span>
              </a></li>
            <li class="nav-item"><a class="nav-link" href="#">
                <!-- <span class="icon icon-sm"><svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.828 8.9 8.9 1.827a4 4 0 1 1 5.657 5.657l-7.07 7.071A4 4 0 1 1 1.827 8.9Zm9.128.771 2.893-2.893a3 3 0 1 0-4.243-4.242L6.713 5.429l4.243 4.242Z" />
                                    </svg></span> -->
                <span class="sidebar-text disabled">Médicaments</span>
              </a></li>

          </ul>
        </div>
      </li>
      <li class="nav-item"><span class="nav-link collapsed d-flex justify-content-between align-items-center"
          data-bs-toggle="collapse" data-bs-target="#submenu-pages"><span><span class="sidebar-icon"><img
                src="{{ asset('assets/img/stats.svg') }}" alt=""
                style="max-height: 20px;max-width: 20px; margin-right: 10px;"></span><span
              class="sidebar-text disabled">Statistiques</span>
          </span><span class="link-arrow disabled "><svg class="icon icon-sm" fill="currentColor" viewbox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                clip-rule="evenodd"></path>
            </svg></span></span>
        <div class="multi-level collapse" role="list" id="submenu-pages" aria-expanded="false">
          <ul class="flex-column nav">
            <li class="nav-item"><a class="nav-link" href="#">
                <!-- <span class="icon icon-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                                        <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm4 9h8a.5.5 0 0 0 .374-.832l-4-4.5a.5.5 0 0 0-.748 0l-4 4.5A.5.5 0 0 0 4 11z" />
                                    </svg></span> -->
                <span class="sidebar-text disabled">Revenus</span>
              </a></li>
            <li class="nav-item"><a class="nav-link" href="#">
                <!-- <span class="icon icon-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                                        <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm4 9h8a.5.5 0 0 0 .374-.832l-4-4.5a.5.5 0 0 0-.748 0l-4 4.5A.5.5 0 0 0 4 11z" />
                                    </svg></span> -->
                <span class="sidebar-text disabled">Natalité</span>
              </a></li>
            <li class="nav-item"><a class="nav-link" href="#">
                <!-- <span class="icon icon-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-square" viewBox="0 0 16 16">
                                        <path d="M3.626 6.832A.5.5 0 0 1 4 6h8a.5.5 0 0 1 .374.832l-4 4.5a.5.5 0 0 1-.748 0l-4-4.5z" />
                                        <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 0a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2z" />
                                    </svg></span>  -->
                <span class="sidebar-text disabled">Mortalité</span>
              </a></li>
            <li class="nav-item"><a class="nav-link" href="#l">
                <!-- <span class="icon icon-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-slash-minus" viewBox="0 0 16 16">
                                        <path d="m1.854 14.854 13-13a.5.5 0 0 0-.708-.708l-13 13a.5.5 0 0 0 .708.708ZM4 1a.5.5 0 0 1 .5.5v2h2a.5.5 0 0 1 0 1h-2v2a.5.5 0 0 1-1 0v-2h-2a.5.5 0 0 1 0-1h2v-2A.5.5 0 0 1 4 1Zm5 11a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5A.5.5 0 0 1 9 12Z" />
                                    </svg></span>  -->
                <span class="sidebar-text disabled">Total</span>
              </a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item"><a href="#" class="nav-link"><span class="sidebar-icon"><svg class="icon icon-xs me-2"
              fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z" />
            </svg></span><span class="sidebar-text disabled">Notifications</span>
          <span>
            <span class="badge badge-sm bg-secondary ms-1 disabled">0</span>
          </span>
        </a></li>

      <li class="nav-item"><a href="{{\Route::currentRouteName() == 'settings' ? 'active' : '' }}"
          class="nav-link"><span class="sidebar-icon">
            <img src="{{ asset('assets/img/setting.svg') }}" height="20" width="20" alt="setting">
          </span><span class="sidebar-text">Paramètres</span></a></li>
      <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>

      <div class="nav-bottom">
        <li class="nav-item"><a href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
            class="nav-link d-flex align-items-center"><span class="sidebar-icon"><img
                src="{{ asset('assets/img/logout.svg') }}" height="20" width="28" alt="Logout">
            </span><span class="sidebar-text">Se déconnecter</span></a></li>
      </div>

    </ul>
  </div>
</nav>