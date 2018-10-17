<div class="box-body">
    <h3>¡Suscribete!</h3>

    <div> Ingrese su Email
    <input class="form-control" name="email" type="email" value="{{ old('email') }}">
    </div>

    <div> Ingrese su Nombre
        <input class="form-control" name="name" type="text" value="{{ old('text') }}">
    </div>

    @if ($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif

    @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif

    <div class="form-group">
        <label for="name"><i class="fa fa-user-secret"></i> Privacy policy</label>
        <div class="col-12 p-0">
            <textarea readonly style="  border:1px solid #999999;margin:5px 0;padding:3px;  width:100%;" rows="8" cols="100" >Validación por controlador.</textarea>
            <input type="checkbox" id="policies" name="policies" > <label for="policiesLabel">Do you agree with these policies?</label>
            @if ($errors->has('policies'))
                <span class="help-block">
                                  <strong>{{ $errors->first('policies') }}</strong>
                              </span>
            @endif
        </div>
    </div>

</div>
