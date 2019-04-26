<div class="row">
    <div class="form-group col-6">
        <label for="title">{{ __('linguagem.title') }}</label>
        <input type="text" name="title" id="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"  value="{{ old('title') ?? ($register->title ?? '') }}" required autofocus>

        @if ($errors->has('title'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group col-6">
        <label for="value_result">{{ __('linguagem.value_result') }}</label>
        <input type="text" name="value_result" id="value_result" class="form-control{{ $errors->has('value_result') ? ' is-invalid' : '' }}"  value="{{ old('value_result') ?? ($register->value_result ?? '') }}" required>

        @if ($errors->has('value_result'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('value_result') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group col-6">
        <label for="extra_value">{{ __('linguagem.extra_value') }}</label>
        <input type="text" name="extra_value" id="extra_value" class="form-control{{ $errors->has('extra_value') ? ' is-invalid' : '' }}"  value="{{ old('extra_value') ?? ($register->extra_value ?? '') }}" required>

        @if ($errors->has('extra_value'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('extra_value') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group col-6">
        <label for="value_fee">{{ __('linguagem.value_fee') }}</label>
        <input type="text" name="value_fee" id="value_fee" class="form-control{{ $errors->has('value_fee') ? ' is-invalid' : '' }}"  value="{{ old('value_fee') ?? ($register->value_fee ?? '') }}" required>

        @if ($errors->has('value_fee'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('value_fee') }}</strong>
            </span>
        @endif
    </div>
</div>