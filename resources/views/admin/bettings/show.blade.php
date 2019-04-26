@extends('layouts.app')

@section('content')
    @page_component(['col'=>12,'page'=>__('linguagem.show_crud',['page'=>$page2])])
    
        <!-- Componente mensagens de alerta -->
        @alert_component(['msg'=>session('msg'),'status'=>session('status')])
        @endalert_component

        <!-- Componente breadcrumb -->
        @breadcrumb_component(['page'=>$page,'items'=>$breadcrumb ?? []])
        @endbreadcrumb_component

        <p>{{ __('linguagem.title') }}: {{ $register->title }}</p>
        <p>{{ __('linguagem.current_round') }}: {{ $register->current_round }}</p>
        <p>{{ __('linguagem.value_result') }}: {{ $register->value_result }}</p>
        <p>{{ __('linguagem.extra_value') }}: {{ $register->extra_value }}</p>
        <p>{{ __('linguagem.value_fee') }}: {{ $register->value_fee }}</p>

        @if ($delete)
            <!-- Componente form -->
            @form_component(['action'=>route($routeName.'.destroy',$register->id),'method'=>'DELETE'])
            <button class="btn btn-danger btn-lg">{{ __('linguagem.delete') }}</button>
            @endform_component
        @endif
        
        
    @endpage_component
@endsection
