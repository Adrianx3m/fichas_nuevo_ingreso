@extends('layouts.app')
<script>
    var presionado = false;
    function mostrar(){
        let nombre = document.getElementById('name');
        let correo = document.getElementById('email');
        let contra1 = document.getElementById('password');
        let contra2 = document.getElementById('password-confirm');
    if(presionado && nombre.value !== "" && correo.value !== "" && contra1.value !== "" && contra2.value!==""){
        document.querySelector("#spin").style="visibility:visible";
    }
    else{
        let boton = document.getElementById('botonRegistrar');
        boton.style="";
    }
}
</script>
<style>
    .spinner{
        border:4px solid rgba(0,0,0,0.1);
        width:36px;
        height:36px;
        border-radius:50%;
        border-left-color:#09f;
        animation:spin 2s ease infinite;
    }
    @keyframes spin {
        0%{
            transform: rotate(0deg);
        }
        100%{
            transform:rotate(100deg);
        }
    }
</style>
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
    <div class="col-md-6">
          <img src="data1/images/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
    </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-success text-wrap text-white text-center fs-4 fw-bold" >{{ __('Registrarse en el sistema') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre completo') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo electrónico') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirmar contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="botonRegistrar" onclick="presionado=true;this.style='display:none;';mostrar()">
                                    {{ __('Registrar') }}
                                </button>
                                <div id="spin" style="visibility:hidden;">
                                    <div class="spinner"></div>
                                    <span>Registrando</span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
