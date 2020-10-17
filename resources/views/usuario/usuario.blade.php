@extends('layouts.template')

<!-- #### USER VIEW #### -->


@section('content')

@section('toast-body')
    {{ session('mensaje') }}
@endsection
<!-- Begin Page Content -->

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Gestion de Usuarios.</h1>
    <p class="mb-4">Registre las personas que tendrán acceso al sistema.</p>

    <!--a href="#" class="d-none d-sm-inline-block btn btn-sm btn-dark shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a-->


    <!-- Content Row - Formulario -->
    <div class="row">
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Encabezado Formulario - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-dark">
                        Cuenta de Usuario.
                        @if (session('mensaje'))
                            <span class="alert alert-success" style="border:none; background: transparent;"
                                role="alert">
                                {{ session('mensaje') }}
                            </span>
                        @endif
                    </h6>

                </div>

                <div class="col-lg-7">
                    <div class="p-5">

                        <form action="{{ route('usuario.crear') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" name="name" value="{{ old('name') }}"
                                        class="form-control form-control-user @error('name') is-invalid @enderror"
                                        id="firstName" placeholder="Nombre">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                                <div class="col-sm-6">
                                    <input type="text" name="last_name" value="{{ old('last_name') }}"
                                        class="form-control form-control-user @error('last_name') is-invalid @enderror"
                                        id="lastName" placeholder="Apellido">
                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="email" name="email" value="{{ old('email') }}"
                                        class="form-control form-control-user @error('email') is-invalid @enderror"
                                        id="exampleInputEmail" placeholder="Correo Electrónico">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-sm-6">
                                    <!-- input type="hidden" name="old_job" value="{ { old('job') }}"-->

                                    <select id="selectRole" name="role"
                                        class="form-control form-control-user @error('role') is-invalid @enderror">
                                        <option value="" class="m-0 font-weight-bold text-dark">Cargo Empleado</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ ucfirst($role->role_name) }}</option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>

                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" name="password"
                                        class="form-control form-control-user @error('password') is-invalid @enderror"
                                        id="password" placeholder="Contraseña" autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" name="password_confirmation"
                                        class="form-control form-control-user" id="password-confirm"
                                        placeholder="Repetir Contraseña" autocomplete="new-password">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-dark btn-user btn-block">
                                Registrar Usuario
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Usuarios -->
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Encabezado Usuarios - Dropdown -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-dark">Usuarios Locales</h6>
                </div>
                <!-- Tabla de Usuarios -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Rol</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usuarios as $usuario)
                                    <tr>
                                        <th scope="row">{{ $usuario->id }}</th>
                                        <td>{{ $usuario->name }} {{ $usuario->last_name }} </td>
                                        <td>{{ $usuario->email }}</td>
                                        <td>{{ $usuario->role['role_name'] }}</td>
                                        <td>
                                            <div>

                                            </div class="d-inl">
                                            <a class="nav-link d-inline" href="{{ route('usuario.editar', $usuario) }}">
                                                <i class="fas fa-sm fa-pen"></i>

                                            </a>

                                            <!--a class="nav-link d-inline" href="">
                                                        <i class="fas fa-sm fa-trash"></i>
                                                    </a-->

                                            <form action="{{ route('usuario.eleminar', $usuario) }}" method="POST"
                                                class="d-inline">
                                                @method('DELETE')
                                                @csrf
                                                <button style="border: none; background: transparent;" type="submit">
                                                    <i class="fas fa-sm fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $usuarios->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<script>
    setTimeout(function() {

        // Closing the alert
        $('.alert').alert('close');
    }, 2000);

</script>
@endsection
