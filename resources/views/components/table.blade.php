<table class="table">
    <thead>
        <tr>
            @foreach ($columnList as $key => $value)
                <th scope="col">{{ $value }}</th>      
            @endforeach
            <th scope="col">{{ __('linguagem.action') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($list as $key => $value)
        <tr>
            @foreach ($columnList as $key2 => $value2)
                @if ($key2 == 'id')
                    <th scope="row">@php echo $value->{$key2} @endphp</th>
                @else
                    <td>@php echo $value->{$key2} @endphp</td>
                @endif
            @endforeach
            <td>
                <a href="{{ route($routeName.'.show',$value->id) }}" class="btn btn-dark btn-sm">
                    <i class="fas fa-eye"></i>
                </a>
                <a href="{{ route($routeName.'.edit',$value->id) }}" class="btn btn-warning btn-sm">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="{{ route($routeName.'.show',[$value->id,'delete=1']) }}" class="btn btn-danger btn-sm">
                    <i class="fas fa-trash"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>