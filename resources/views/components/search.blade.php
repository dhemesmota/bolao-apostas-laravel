<form class="form-inline" method="GET" action="{{route($routeName.'.index')}}">
        @can('create-user')
            <div class="form-group mb-2">
                <a href="{{ route($routeName.'.create') }}">{{ __('linguagem.add') }}</a>
            </div>
        @endcan
    <div class="form-group mx-sm-3 mb-2">
        <input type="search" name="search" class="form-control form-control-sm" placeholder="{{ __('linguagem.search') }}" value="{{$search}}">
    </div>
    <button type="submit" class="btn btn-primary mb-2 btn-sm">{{ __('linguagem.search') }}</button>
    <a href="{{ route($routeName.'.index') }}" class="btn btn-secondary mb-2 ml-2 btn-sm">{{ __('linguagem.clean') }}</a>
</form>