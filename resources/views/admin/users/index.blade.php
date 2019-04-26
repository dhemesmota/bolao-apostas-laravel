@extends('layouts.app')

@section('content')
    @page_component(['col'=>12,'page'=>__('linguagem.list',['page'=>$page])])

        <!-- Componente mensagens de alerta -->
        @alert_component(['msg'=>session('msg'),'status'=>session('status')])
        @endalert_component

        <!-- Componente breadcrumb -->
        @breadcrumb_component(['page'=>$page,'items'=>$breadcrumb ?? []])
        @endbreadcrumb_component

        <!-- Componente search -->
        @search_component(['routeName'=>$routeName,'search'=>$search])
        @endsearch_component

        <!-- Componente tabela -->
        @table_component(['columnList'=>$columnList,'list'=>$list,'routeName'=>$routeName])
        @endtable_component

        <!-- Componente paginate -->
        @paginate_component(['search'=>$search,'list'=>$list])
        @endpaginate_component
        
    @endpage_component
@endsection
