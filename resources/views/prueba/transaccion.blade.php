<h1>Transacción</h1>

<div class="saldo">
    <p>Saldo actual: ${{ number_format($usuario->saldo, 0, ',', '.') }}</p>
</div>

<div class="recarga">
    <h2>Recargar saldo</h2>
    
    <form action="{{ route('transaccion.recargar') }}" method="POST">
        @csrf
        <div>
            <input type="number" name="monto" placeholder="Ingrese monto (mínimo 10.000)" 
                class="form-control" value="{{ old('monto') }}">
            
            @error('monto')
                <p class="mensaje-error">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-success mt-2">Finalizar</button>
    </form>

    @if (session('éxito'))
        <p class="mensaje-éxito mt-2">{{ session('éxito') }}</p>
    @endif
</div>
