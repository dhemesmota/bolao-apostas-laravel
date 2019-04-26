@if ($msg)

    @php
        switch ($status) {
            case 'success':
                $status = 'success';
                break;
            case 'error':
                $status = 'danger';
                break;
            case 'notification':
                $status = 'warning';
                break;
            default:
                $status = 'secondary';
                break;
        }
    @endphp

    <div class="alert alert-{{ $status }}" role="alert">
        {{ $msg }}
    </div>
@endif