@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registro') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="documento" class="col-md-4 col-form-label text-md-end">Documento</label>
                            <div class="col-md-6">
                                <input id="documento" type="text" class="form-control @error('documento') is-invalid @enderror" name="documento" value="{{ old('documento') }}" required>
                                @error('documento')
                                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="names" class="col-md-4 col-form-label text-md-end">Nombres</label>
                            <div class="col-md-6">
                                <input id="names" type="text" class="form-control @error('names') is-invalid @enderror" name="names" value="{{ old('names') }}" required>
                                @error('names')
                                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="primerApell" class="col-md-4 col-form-label text-md-end">Primer Apellido</label>
                            <div class="col-md-6">
                                <input id="primerApell" type="text" class="form-control @error('primerApell') is-invalid @enderror" name="primerApell" value="{{ old('primerApell') }}" required>
                                @error('primerApell')
                                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="segundoApell" class="col-md-4 col-form-label text-md-end">Segundo Apellido</label>
                            <div class="col-md-6">
                                <input id="segundoApell" type="text" class="form-control @error('segundoApell') is-invalid @enderror" name="segundoApell" value="{{ old('segundoApell') }}">
                                @error('segundoApell')
                                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Correo Electrónico</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="saldo_ini" class="col-md-4 col-form-label text-md-end">Saldo Inicial</label>
                            <div class="col-md-6">
                                <input id="saldo_ini" type="number" class="form-control @error('saldo_ini') is-invalid @enderror" name="saldo_ini" value="{{ old('saldo_ini') }}" required>
                                @error('saldo_ini')
                                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="tipo_documento_id" class="col-md-4 col-form-label text-md-end">Tipo de Documento</label>
                            <div class="col-md-6">
                                <select id="tipo_documento_id" class="form-control @error('tipo_documento_id') is-invalid @enderror" name="tipo_documento_id" required>
                                    <option value="">Seleccione un tipo</option>
                                    @foreach($tipos_documento as $tipo)
                                        <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('tipo_documento_id')
                                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Contraseña</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                                @error('password')
                                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirmar Contraseña</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Registrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
