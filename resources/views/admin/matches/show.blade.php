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
        <p>{{ __('linguagem.bet') }}: {{ $register->betting_title }}</p>
        <p>{{ __('linguagem.date_start') }}: {{ $register->date_start_site }}</p>
        <p>{{ __('linguagem.date_end') }}: {{ $register->date_end_site }}</p>

        @if ($delete)
            <!-- Componente form -->
            @form_component(['action'=>route($routeName.'.destroy',$register->id),'method'=>'DELETE'])
            <button class="btn btn-danger btn-lg">{{ __('linguagem.delete') }}</button>
            @endform_component
        @endif
        
        
    @endpage_component
@endsection
