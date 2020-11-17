 <!-- Topbar -->
 <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow border-bottom-secondary">
     <!-- Sidebar Toggle (Topbar) -->
     <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
         <i class="fa fa-bars"></i>
     </button>
        <div>
            <h5 class="m-0 font-weight-bold text-gray d-none d-sm-none d-md-block">
                {{ config('app.business', 'CR')    }}
             </h5>

             <h5 class="m-0 font-weight-bold text-dark d-block d-sm-block d-md-none">
                CR
            </h5>
        </div>

     <div class="topbar-divider d-none d-sm-block"></div>

     <!-- Topbar Search -->
     <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
         <div class="input-group">
             <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar..." aria-label="Search"
                 aria-describedby="basic-addon2">
             <div class="input-group-append">
                 <button class="btn btn-dark" type="button">
                     <i class="fas fa-search fa-sm"></i>
                 </button>
             </div>
         </div>
     </form>

     <!-- Topbar Navbar -->
     <ul class="navbar-nav ml-auto">
         <!-- Nav Item - Search Dropdown (Visible Only XS Movil) -->
         <li class="nav-item dropdown no-arrow d-sm-none">

            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
         <!-- Dropdown - Messages -->
         <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small"
                            placeholder="Search for..." aria-label="Search"
                            aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-dark" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

         <!-- Nav Item - Alerts -->
         @include('layouts.topbar.alerttopbar')

         <!-- Nav Item - Messages -->

         <!-- Nav Item - User Information -->
         @include('layouts.topbar.usertopbar')

     </ul>
 </nav>
 <!-- End of Topbar -->
