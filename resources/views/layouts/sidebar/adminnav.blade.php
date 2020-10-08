<!-- Heading -->
<div class="sidebar-heading">
    Usuarios
</div>

<!-- Nav Item -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('usuario') }}">
        <i class="fas fa-fw fa-user-cog"></i>
        <span>Usuarios</span></a>
</li>
<!-- Nav Item -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('proveedor') }}">
        <i class="fas fa-fw fa-shipping-fast"></i>
        <span>Proveedores</span></a>
</li>

<!-- Heading -->
<div class="sidebar-heading">Proveedores</div>
<!-- Nav Item -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('ofertaProveedor') }}">
        <i class="fas fa-fw fa-file-invoice"></i>
        <span>Ofertas [Proveedor]</span></a>
</li>
<!-- Nav Item -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('home') }}">
        <i class="fas fa-fw fa-box"></i>
        <span>Pedidos [Proveedor]</span></a>
</li>
<!-- Nav Item -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('ofertaTienda') }}">
        <i class="fas fa-fw fa-file-invoice"></i>
        <span>Ofertas [Gerente]</span></a> <!-- Oferta Recibidas -->
</li>
<!-- Nav Item -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('home') }}">
        <i class="fas fa-fw fa-box"></i>
        <span>Pedidos [Gerente]</span></a>
</li>
<!-- Nav Item -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('home') }}">
        <i class="fas fa-fw fa-envelope"></i>
        <span>Mensajes</span></a>
</li>
<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>
