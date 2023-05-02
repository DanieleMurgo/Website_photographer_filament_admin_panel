<nav class="navbar navbar-expand-lg fixed-top height-nav bg-dark navbar-dark" id="myNavbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{Route('welcome')}}">Logo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mt-1 bg-collapse-nav navbar-dark" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link @if(Route::currentRouteName() == 'welcome') active @endif" aria-current="page"
                        href="{{Route('welcome')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(Route::currentRouteName() == 'project.index') active @endif"
                        href="{{Route('project.index')}}">Projects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(Route::currentRouteName() == 'about') active @endif"
                        href="{{Route('about')}}">About us</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-md-auto mb-2 mb-lg-0">
                @auth
                <li class="nav-item">
                    <a class="nav-link @if(Route::currentRouteName() == 'admin') active @endif"
                        href="{{Route('admin')}}">Admin</a>
                </li>
                <li>
                    <form action="{{Route('logout')}}" method="POST" class=" me-3">
                        @csrf
                        <button class="nav-link bg-transparent" type="submitage of empires" id="logout">Logout</button>
                    </form>
                </li>
                @endauth
                <li class="nav-item">
                    <a class="nav-link" href="{{Route('contact')}}">Contact</a>
                </li>

            </ul>
        </div>
    </div>
</nav>