<div class="box-body">
    <h3>¡Suscribete!</h3>
    <div> Ingrese su Email
    <input class="form-control" name="email" type="email" value="{{ old('email') }}">
    </div>
    @if ($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif

    <div> Ingrese su Nombre
        <input class="form-control" name="name" type="text" value="{{ old('text') }}">
    </div>
    @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>
