 <!-- =========================
        Header
    =========================== -->
    <header class="header header-layout2">
        <nav class="navbar navbar-expand-lg sticky-navbar">
          <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
              <img src="{{ asset('assets/images/logo/logo-light.png') }}" class="logo-light" alt="logo">
              <img src="{{ asset('assets/images/logo/logo2.png') }}" class="logo-dark" alt="logo">
            </a>
            <button class="navbar-toggler" type="button">
              <span class="menu-lines"><span></span></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNavigation">
              <ul class="navbar-nav ml-auto">
                <li class="nav__item">
                  <a href="{{ url('/') }}"  class="nav__item-link @if(Request::is('/')) active @endif">Home</a>
                </li><!-- /.nav-item -->
                <li class="nav__item">
                  <a href="{{ url('peta-sebaran/2020') }}"  class="nav__item-link @if(Request::is('peta-sebaran')) active @endif">Peta Sebaran</a>
                </li><!-- /.nav-item -->
                <li class="nav__item">
                  <a href="{{ url('contact-us') }}" class="nav__item-link @if(Request::is('contact-us')) active @endif ">Keluhan</a>
                </li><!-- /.nav-item -->
              </ul><!-- /.navbar-nav -->
              <button class="close-mobile-menu d-block d-lg-none"><i class="fas fa-times"></i></button>
            </div><!-- /.navbar-collapse -->
            <div class="d-none d-xl-flex align-items-center position-relative ml-0">
              <a href="{{ url('login') }}" class="btn btn__primary btn__rounded ml-30">
                <i class="icon-calendar"></i>
                <span>Login</span>
              </a>
            </div>
          </div><!-- /.container -->
        </nav><!-- /.navabr -->
      </header>