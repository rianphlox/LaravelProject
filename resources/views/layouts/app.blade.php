@include('inc.head')

<body class="">
    <div class="wrapper ">
      <div class="sidebar" data-color="white" data-active-color="danger">
        <div class="logo">
          <a href="#" class="simple-text logo-mini">
            <div class="logo-image-small">
              <img src="../assets/img/logo-small.png">
            </div>
            <!-- <p>CT</p> -->
          </a>
          <a href="#" class="simple-text logo-normal">
            Student Records
            <!-- <div class="logo-image-big">
              <img src="../assets/img/logo-big.png">
            </div> -->
          </a>
        </div>
        <div class="sidebar-wrapper">
          <ul class="nav">
            
            <li class="active ">
              <a href="/students/">
                <i class="nc-icon nc-single-02"></i>
                <p>User</p>
              </a>
            </li>
            <li>
              <a href="{{ route('masters') }}">
                <i class="nc-icon nc-hat-3"></i>
                <p>Masters</p>
              </a>
            </li>
            <li>
              <a href="{{ route('part-time') }}">
                <i class="nc-icon nc-hat-3"></i>
                <p>Part-Time</p>
              </a>
            </li>
            <li>
              <a href="{{ route('diploma') }}">
                <i class="nc-icon nc-hat-3"></i>
                <p>Diploma</p>
              </a>
            </li>
            <li>
              <a href="/students/broadsheet">
                <i class="nc-icon nc-alert-circle-i"></i>
                <p>Broadsheet</p>
              </a>
            </li>
            
          </ul>
        </div>
      </div>
      <div class="main-panel">
  
        <!-- Navbar -->
        @include('inc.navbar')
        <!-- End Navbar -->

        <div class="content">
            @yield('content')
        </div>

            @include('inc.footer')

            @include('inc.scripts')

        </body>
        </html>