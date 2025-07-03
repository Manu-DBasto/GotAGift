@extends('layouts.user')

@section('content')
    <div class="container mt-5 d-flex justify-content-center">
        <div style="max-width: 500px; width: 100%;">
            @php
                $user = auth()->user();
            @endphp

            <!-- Datos Personales -->
            <div class="card shadow-sm mb-4 p-4">
                <h3 class="mb-3">Cuenta</h3>
                <div class="row pb-3">
                    <div class="col-md-6 mb-2"><strong>Nombre:</strong></div>
                    <div class="col-md-6 mb-2">{{ $user->name }} {{ $user->lastname }}</div>
                    <div class="col-md-6 mb-2"><strong>E-mail:</strong></div>
                    <div class="col-md-6 mb-2">{{ $user->email }}</div>
                    <div class="col-md-6 mb-2"><strong>Numero telefónico:</strong></div>
                    <div class="col-md-6 mb-2">{{ $user->phone }}</div>
                </div>
                <h5 class="mb-1">Ubicacion</h5>
                <div class="row pb-3">
                    <div class="col-md-6 mb-2"><strong>Dirección:</strong></div>
                    <div class="col-md-6 mb-2">{{ $user->direccion }}</div>
                    <div class="col-md-6 mb-2"><strong>Estado:</strong></div>
                    <div class="col-md-6 mb-2">{{ $user->estado }}</div>
                    <div class="col-md-6 mb-2"><strong>Ciudad:</strong></div>
                    <div class="col-md-6 mb-2">{{ $user->ciudad }}</div>
                </div>
                <div class="row pb-3">
                    <div class="col-md-6 mb-2"><span class="fw-bold fs-5">Puntos:</span> {{ $user->puntos }}</div>

                </div>
            </div>
        </div>
    </div>
@endsection
