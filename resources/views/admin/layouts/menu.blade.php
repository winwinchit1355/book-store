<div class="main-menu">
    <!-- Brand Logo -->
    <div class="logo-box">
        <!-- Brand Logo Light -->
        <a href="index.html" class="logo-light">
            <img src="assets/images/logo-light.png" alt="logo" class="logo-lg" height="28">
            <img src="assets/images/logo-sm.png" alt="small logo" class="logo-sm" height="28">
        </a>

        <!-- Brand Logo Dark -->
        <a href="index.html" class="logo-dark">
            <img src="assets/images/logo-dark.png" alt="dark logo" class="logo-lg" height="28">
            <img src="assets/images/logo-sm.png" alt="small logo" class="logo-sm" height="28">
        </a>
    </div>

    <!--- Menu -->
    <div data-simplebar>
        <ul class="app-menu">

            <li class="menu-title">Menu</li>

            <li class="menu-item {{ request()->is('/')  ? 'active' : '' }}">
                <a href="{{route('dashboard')}}" class="menu-link waves-effect waves-light ">
                    <span class="menu-icon"><i class="bx bx-home-smile"></i></span>
                    <span class="menu-text"> Dashboard </span>
                </a>
            </li>
            <li class="menu-item {{ request()->is('/books')  ? 'active' : '' }}">
                <a href="{{route('books.index')}}" class="menu-link waves-effect waves-light ">
                    <span class="menu-icon"><i class="bx bx-table"></i></span>
                    <span class="menu-text"> Books </span>
                </a>
            </li>
        </ul>
    </div>
</div>