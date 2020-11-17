<!-- Nav Item - Alerts -->
<li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bell fa-fw"></i>
        <!-- Counter - Alerts -->
        @if (count(auth()->user()->unreadNotifications)!=0)
        <span class="badge badge-danger badge-counter">
            @if(count(auth()->user()->unreadNotifications)<4)
                {{count(auth()->user()->unreadNotifications)}}
            @else
                3+
            @endif            
        </span>                
        @endif
        
    </a>
    <!-- Dropdown - Alerts -->
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="alertsDropdown">
        <h6 class="dropdown-header">
            Notificaciones
        </h6>
        @if (count(auth()->user()->unreadNotifications)!=0)
            @foreach (auth()->user()->unreadNotifications as $notification)
                <a class="dropdown-item d-flex align-items-center" href="{{route('marcarNotificacionLeida', [$notification->data['offer'], $notification->id])}}">
                    <div class="mr-3">
                        <div class="icon-circle bg-success">
                            <i class="fas fa-envelope text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">{{ date('d-M-Y', strtotime($notification->created_at)) }}</div>
                        Oferta: {{$notification->data['code']}}
                    </div>
                </a>
            @endforeach        
        @else
            <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                    <div class="icon-circle bg-success">
                        <i class="fas fa-envelope-open text-white"></i>
                    </div>
                </div>
                <div>   
                <div class="small text-gray-500">{{ date('d-M-Y', strtotime(now())) }}</div>
                    No tiene notifaciones nuevas.
                </div>
            </a>         
        @endif
        <!--a class="dropdown-item d-flex align-items-center" href="#">
            <div class="mr-3">
                <div class="icon-circle bg-dark">
                    <i class="fas fa-file-alt text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500">Septiembre 29, 2020</div>
                <span class="font-weight-bold">Se ha registrado una venta.</span>
            </div>
        </a>
        <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="mr-3">
                <div class="icon-circle bg-success">
                    <i class="fas fa-shipping-fast text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500">Septiembre 28, 2020</div>
                El proveedor a modificado una oferta.
            </div>
        </a>
        <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="mr-3">
                <div class="icon-circle bg-info">
                    <i class="fas fa-store text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500">Septiembre 27, 2020</div>
                Nuevos Productos Registrados.
            </div>
        </a-->
        <a class="dropdown-item text-center small text-gray-500" href="#">Todas las notificaciones.</a>
    </div>
</li>
