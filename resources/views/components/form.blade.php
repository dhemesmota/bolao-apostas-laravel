
@php
    $method = strtolower($method);
    $method_input = "";

    switch ($method) {
        case 'post':
            $method_input = "";
            break;

        case 'put':
            $method = "post";
            $method_input = method_field('PUT');
            break;

        case 'delete':
            $method = "post";
            $method_input = method_field('DELETE');
            break;
        
        default:
            $method = "get";
            $method_input = "";
            break;
    }
@endphp

<form action="{{ $action }}" method="{{ $method }}">
    @csrf
    {{ $method_input }}
    {{ $slot }}
</form>