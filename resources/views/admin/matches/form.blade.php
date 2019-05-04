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
        <label for="betting_id">{{ __('linguagem.bet') }}</label>
        <select type="datetime" placeholder="{{ date('d-m-Y H:i') }}" name="betting_id" id="betting_id" class="form-control{{ $errors->has('betting_id') ? ' is-invalid' : '' }}" required>
            <option value="">Selecionar aposta...</option>
            @foreach ($listRel as $key => $value)
                @php
                    $selected = '';

                    if(old('betting_id') ?? false){
                        if(old('betting_id') == $value->id){
                            $selected = "selected";
                        }
                    } else {
                        if($register_id ?? false){
                            if($register_id == $value->id){
                                $selected = "selected";
                            }
                        }                        
                    }

                @endphp
                <option {{$selected}} value="{{ old('betting_id') ?? ($value->id ?? '') }}">
                    {{ $value->title }}
                </option>
            @endforeach
        </select>

        @if ($errors->has('betting_id'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('betting_id') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group col-6">
        <label for="date_start">{{ __('linguagem.date_start') }} ({{ date('d-m-Y H:i') }})</label>
        <input type="datetime" placeholder="{{ date('d-m-Y H:i') }}" name="date_start" id="date_start" class="form-control{{ $errors->has('date_start') ? ' is-invalid' : '' }}"  value="{{ old('date_start') ?? ($register->date_start ?? '') }}" required>

        @if ($errors->has('date_start'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('date_start') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group col-6">
        <label for="date_end">{{ __('linguagem.date_end') }} ({{ date('d-m-Y H:i') }})</label>
        <input type="datetime" placeholder="{{ date('d-m-Y H:i') }}" name="date_end" id="date_end" class="form-control{{ $errors->has('date_end') ? ' is-invalid' : '' }}"  value="{{ old('date_end') ?? ($register->date_end ?? '') }}" required>

        @if ($errors->has('date_end'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('date_end') }}</strong>
            </span>
        @endif
    </div>
</div>