@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('linguagem.verify_your_email_address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('linguagem.verification_link') }}
                        </div>
                    @endif

                    {{ __('linguagem.check_verification_link') }}
                    {{ __('linguagem.receive_email') }}, <a href="{{ route('verification.resend') }}">{{ __('linguagem.request_another') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
