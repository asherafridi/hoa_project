
  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      {{-- <h1 class="logo"><a href="index.html">BizLand<span>.</span></a></h1> --}}
      <!-- Uncomment below if you prefer to use an image logo -->
       <a href="{{route('home')}}" class="logo"><img src="{{settings('website_logo')}}" alt=""></a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto " href="{{route('home')}}">Home</a></li>
          <li><a class="nav-link scrollto" href="{{route('event')}}">Events</a></li>
          <li><a class="nav-link scrollto" href="{{route('document')}}">Documents</a></li>
          <li><a class="nav-link scrollto " href="{{route('gallery')}}">Gallery</a></li>
          <li><a class="nav-link scrollto" href="{{route('home')}}#contact">Contact</a></li>
          <li><a class="nav-link scrollto" href="{{route('dashboard')}}">Create a Work Order</a></li>
          <li><a class="nav-link scrollto" href="{{route('dashboard')}}">Member Panel</a></li>
          {{-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> --}}
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->