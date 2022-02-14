 <!-- Navbar -->
 <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
          <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
          <li class="breadcrumb-item text-sm text-dark active" aria-current="page">@yield('page')</li>
        </ol>
        <h6 class="font-weight-bolder mb-0">@yield('page')</h6>
      </nav>
      <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          <p class=" text-dark  font-weight-bolder mx-3">{{Auth::user()->name}}</p>
          <img width="50" src="{{asset('storage/' . Auth::user()->photo)}}">
        </div>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->