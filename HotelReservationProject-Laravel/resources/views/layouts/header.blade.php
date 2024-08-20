
<header>
  <!-- Intro settings -->
  <style>
    /* Default height for small devices */
    #intro-example {
      height: 400px;
    }

    /* Height for devices larger than 992px */
    @media (min-width: 992px) {
      #intro-example {
        height: 600px;
      }
    }
  </style>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container-fluid">
      <!-- Icon on the very left -->
      <a class="navbar-brand" href="#">
      <img src="{{ asset('img/logo.jpeg') }}" alt="Icon" width="50" height="50">
    </a>
      <button
        data-mdb-collapse-init
        class="navbar-toggler"
        type="button"
        data-mdb-target="#navbarExample01"
        aria-controls="navbarExample01"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarExample01">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item active">
            <a class="nav-link" aria-current="page" href="home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="reserve">Reserve A Room</a>
          </li>

          <li class="nav-item dropdown">
        <a
          data-mdb-dropdown-init
          class="nav-link dropdown-toggle"
          href="#"
          id="navbarDropdownMenuLink"
          role="button"
          aria-expanded="false"
        >
          About Us
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <li>
            <a class="dropdown-item" href="/about">About Our Hotel</a>
          </li>
          <li>
            <a class="dropdown-item" href="/rooms">Rooms</a>
          </li>
         
        </ul>
      </li>
         <!-- <li class="nav-item">
            <a class="nav-link" href="/login">Login</a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="/register">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/dashboard">dashboard</a>
          </li> -->
        </ul>

        
        <div class="dropdown">
  
</div>
      </div>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

      <li class="nav-item dropdown">

      <a
          data-mdb-dropdown-init
          class="nav-link dropdown-toggle"
          href="/dashboard"
          id="navbarDropdownMenuLink"
          role="button"
          aria-expanded="false"
        >
         Dashboard 
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <li>
            <a class="dropdown-item" href="/login">Login</a>
          </li>
          <li>
            <a class="dropdown-item" href="/dashboard">Dashboard</a>
          </li>
          <li>
            <a class="dropdown-item" href="/logout">Log Out</a>
          </li>
  </li>
  </ul>
     
    </div>
    </div>
  </nav>
  <!-- Navbar -->

  
</header>