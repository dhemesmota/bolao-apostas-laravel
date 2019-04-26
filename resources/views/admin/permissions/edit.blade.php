@extends('layouts.app')

@section('content')
    @page_component(['col'=>12,'page'=>__('linguagem.edit_crud',['page'=>$page2])])
    
        <!-- Componente mensagens de alerta -->
        @alert_component(['msg'=>session('msg'),'status'=>session('status')])
        @endalert_component

        <!-- Componente breadcrumb -->
        @breadcrumb_component(['page'=>$page,'items'=>$breadcrumb ?? []])
        @endbreadcrumb_component

        <!-- Componente form -->
        @form_component(['action'=>route($routeName.'.update',$register->id),'method'=>'PUT'])
            @include('admin.'.$routeName.'.form')
            <button class="btn btn-primary btn-lg float-right">{{ __('linguagem.edit') }}</button>
        @endform_component
        
    @endpage_component
@endsection
