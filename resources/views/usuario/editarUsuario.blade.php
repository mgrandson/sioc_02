@extends('layouts.template')

<!-- #### USER VIEW #### -->


@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Editar Usuario</h1>

            <div id="app">
                <!--alerts-component>Vue Section</alerts-component-->
            </div>
        </div>

        <!-- Content Row - Formulario -->
        <div class="row">
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Encabezado Formulario - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-dark">Cuenta de Usuario - {{ $usuario->email }}</h6>
                    </div>

                    <div class="col-lg-7">
                        <div class="p-3">
                            <form action="{{ route('usuario.actualizar', $usuario->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                @if (session('mensaje'))
                                    <div class="alert alert-success alert-dismissible">
                                        {{ session('mensaje') }}
                                    </div>
                                @endif
                                <!-- form -->
                                <div class="form-group row">

                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="name"
                                            value="{{ $usuario->name ? $usuario->name : old('name') }}"
                                            class="form-control form-control-user @error('name') is-invalid @enderror"
                                            id="firstName" placeholder="Nombre">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="last_name"
                                            value="{{ $usuario->last_name ? $usuario->last_name : old('last_name') }}"
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
                                        <input type="email" name="email" value="{{ $usuario->email }}"
                                            class="form-control form-control-user @error('email') is-invalid @enderror"
                                            id="exampleInputEmail" placeholder="Correo Electrónico" readonly>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-sm-6">
                                        <input id="jvalue" type="hidden" value="{{ $usuario->role_id }}">
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
                                        <input type="password" name="password" value="{{ $usuario->password }}"
                                            class="form-control form-control-user @error('password') is-invalid @enderror"
                                            id="password" placeholder="Contraseña" autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="password_confirmation" value="{{ $usuario->password }}"
                                            class="form-control form-control-user" id="password-confirm"
                                            placeholder="Repetir Contraseña" autocomplete="new-password">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-dark btn-user btn-block">
                                    Actualizar Usuario
                                </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        var x = document.getElementById("jvalue").value;
        document.getElementById("selectRole").value = x;

        /*var y = document.getElementById("utvalue").value;
        document.getElementById("selectUserType").value = y;

        var z = document.getElementById("acvalue").value;
        document.getElementById("selectAccessLevel").value = z;*/

        setTimeout(function() {

            // Closing the alert
            $('.alert').alert('close');
        }, 2000);

    </script>


@endsection
