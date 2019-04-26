<div class="row">
    <div class="form-group col-6">
        <label for="name">{{ __('linguagem.name') }}</label>
        <input type="text" name="name" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"  value="{{ old('name') ?? ($register->name ?? '') }}" required autofocus>

        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group col-6">
        <label for="email">{{ __('linguagem.email') }}</label>
        <input type="mail" name="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') ?? ($register->email ?? '') }}" required>

        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group col-6">
        <label for="password">{{ __('linguagem.password') }}</label>
        <input type="password" name="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}">

        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group col-6">
        <label for="password_confirmation">{{ __('linguagem.confirm_password') }}</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
    </div>

    <div class="form-group col-6">
        <label for="roles">{{ __('linguagem.role_list') }}</label>
        <div class="form-group">
            @foreach ($roles as $key => $value)

                @php
                    $checked = '';
                    // No caso da validação, permitir que fique selecionado as permissões selecionadas
                    if(old('roles') ?? false){
                        foreach (old('roles') as $key => $id) {
                            if($id == $value->id){
                                $checked = 'checked';
                            }
                        }
                    } else {
                        if($register ?? false){
                            foreach ($register->roles as $key => $role) {
                                if($role->id == $value->id){
                                    $checked = 'checked';
                                }
                            }
                        }
                    }
                @endphp

                <div class="form-check">
                    <input {{ $checked }} type="checkbox" class="form-check-input" name="roles[]" id="{{ $value->id }}" value="{{ $value->id }}">
                    <label class="form-control-label" for="{{ $value->id }}">{{ $value->name }}</label>
                </div>
            @endforeach
        </div>
    </div>

</div>