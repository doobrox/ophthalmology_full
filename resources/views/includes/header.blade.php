<header>
    {{--<ul>--}}
        {{--<li>--}}
            {{--<a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Home</a>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<a href="add_statement_sheet" class="{{ request()->is('add_statement_sheet') ? 'active' : '' }}">add_statement_sheet.blade Link</a>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<a href="see_crystalline" class="{{ request()->is('see_crystalline') ? 'active' : '' }}">see_crystalline.blade Link</a>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<a href="patients_info" class="{{ request()->is('patients_info') ? 'active' : '' }}">patients_info.blade Link</a>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<a href="/receptie" class="{{ request()->is('receptie') ? 'active' : '' }}">receptie Link</a>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<a href="/medic" class="{{ request()->is('medic') ? 'active' : '' }}">medic Link</a>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<a href="/lista_proceduri" class="{{ request()->is('lista_proceduri') ? 'active' : '' }}">lista_proceduri Link</a>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<a href="/users" class="{{ request()->is('users') ? 'active' : '' }}">users Link</a>--}}
        {{--</li>--}}
    {{--</ul>--}}

    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                Logo
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto"></ul>


                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    @else
                        <li><a class="nav-link" href="/receptie">receptie</a></li>
                        <li><a class="nav-link" href="/medic">medic</a></li>
                        <li><a class="nav-link" href="/lista_proceduri">lista_proceduri</a></li>
                        <li><a class="nav-link" href="/lista_articole">lista_articole</a></li>
                        <li><a class="nav-link" href="{{ route('users.index') }}">Manage Users</a></li>
                        <li><a class="nav-link" href="{{ route('roles.index') }}">Manage Role</a></li>
                        {{--                    <li><a class="nav-link" href="{{ route('products.index') }}">Manage Product</a></li>--}}
                        <li class="nav-item dropdown">
                            <div class="">
                                <div class="dropdown inline-block relative">
                                    <button class="bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded inline-flex items-center">
                                        <span class="mr-1">{{ Auth::user()->name }}</span>
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
                                    </button>
                                    <ul class="dropdown-menu absolute hidden text-gray-700 pt-0 mt-0">
                                        <a class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </ul>
                                </div>

                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>