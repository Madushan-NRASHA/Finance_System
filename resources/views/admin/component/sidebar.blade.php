<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



</head>
<body>


    <aside class="main-sidebar sidebar-dark-primary elevation-4">




        <div class="sidebar">

          <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="info">
                <span class="logo-text">
                    {{-- <span class="logo-main">reelook<span class="me">.me</span></span><br>
                    <span class="slogan">where style meets expression</span> --}}
                </span>
            </div>
          </div>


          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

              <li class="nav-item menu-open">
                <a href="{{ route('dashboard.index') }}" class="nav-link @if(request()->routeIs('dashboard'))active @endif ">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard

                  </p>
                </a>
              </li>

            <li class="nav-item">
                <a href="{{ route('summery') }}" class="nav-link @if(request()->routeIs('summery'))active @endif ">
                    <i class="nav-icon fas fa-list"></i>
                    <p>Summery</p>
                </a>
            </li>


            <li class="nav-item">
                <a href="{{ route('clientRegister') }}" class="nav-link @if(request()->routeIs('clientRegister'))active @endif ">
                    <i class="nav-icon fas fa-user"></i>
                    <p>Client Register</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('clientDetails') }}" class="nav-link @if(request()->routeIs('clientDetails'))active @endif ">
                    <i class="nav-icon fas fa-info-circle"></i>
                    <p>Client Details</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('Installment') }}" class="nav-link @if(request()->routeIs('Installment'))active @endif ">
                    <i class="nav-icon fas fa-book"></i>
                    <p>Installments</p>
                </a>
            </li>

            {{-- <li class="nav-item">
                <a href="{{ route('admin.airtickets') }}" class="nav-link @if(request()->routeIs('admin.airtickets'))active @endif ">
                    <i class="nav-icon fas fa-ticket-alt"></i>
                    <p>Payments</p>
                </a>
            </li> --}}





            {{-- <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link @if(request()->routeIs('logout'))active @endif "
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                 {{ __('Logout') }}
             </a>

             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                 @csrf
             </form>
            </li>
            </nav>
            </div>  --}}
      </aside>
</body>
</html>
