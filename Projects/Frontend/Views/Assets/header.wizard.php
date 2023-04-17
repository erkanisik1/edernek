 @if(USERID)
 <div class="page">
      <!-- Navbar -->
      <header class="navbar navbar-expand-md navbar-light d-print-none">
        <div class="container-xl">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href="/">
              <h1 class="text-primary" style="font-weight: bolder; text-shadow:  1px 1px 1px #757575;">Ümraniye Tüm Engelliler Derneği</h1>
              <!-- 
              <img src="img/logo.png" width="110" height="32" alt="Tabler" class="navbar-brand-image"> 
               -->
            </a>
          </h1>
          <div class="navbar-nav flex-row order-md-last">
            <div class="d-none d-md-flex">
              <a  data-theme="dark" id="thm" class="nav-link px-0 hide-theme-dark thm" title="Enable dark mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
             <img src="img/moon.png" alt="" width="24">
              </a>
              <a data-theme="light" class="nav-link px-0 hide-theme-light thm" id="thm" title="Enable light mode" data-bs-toggle="tooltip"
		   data-bs-placement="bottom">
                <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="4" /><path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" /></svg>
              </a>
             
            </div>
    
        </div>
      </header>
    <div class="navbar-expand-md">
        <div class="collapse navbar-collapse" id="navbar-menu">
          <div class="navbar navbar-light">
            <div class="container-xl">
            
            @view('Assets/menu')
            </div>
          </div>
        </div>
      </div>
 <div class="page-body">
          <div class="container-xl">

@endif