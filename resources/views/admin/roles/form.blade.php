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
        <label for="description">{{ __('linguagem.description') }}</label>
        <input type="text" name="description" id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"  value="{{ old('description') ?? ($register->description ?? '') }}" required>

        @if ($errors->has('description'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group col-6">
        <label for="permissions">{{ __('linguagem.permission_list') }}</label>
        <div class="form-group">
            @foreach ($permissions as $key => $value)

                @php
                    $checked = '';
                    // No caso da validação, permitir que fique selecionado as permissões selecionadas
                    if(old('permissions') ?? false){
                        foreach (old('permissions') as $key => $id) {
                            if($id == $value->id){
                                $checked = 'checked';
                            }
                        }
                    } else {
                        if($register ?? false){
                            foreach ($register->permissions as $key => $permission) {
                                if($permission->id == $value->id){
                                    $checked = 'checked';
                                }
                            }
                        }
                    }
                @endphp

                <div class="form-check">
                    <input {{ $checked }} type="checkbox" class="form-check-input" name="permissions[]" id="{{ $value->id }}" value="{{ $value->id }}">
                <label class="form-control-label" for="{{ $value->id }}">
                    <span data-toggle="tooltip" data-placement="right" title="{{ $value->description }}">
                        {{ $value->name }}
                    </span>
                </label>
                </div>
            @endforeach
        </div>
    </div>
</div>