@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">@lang('linguagem.dashboard')</div>

                <div class="card-body">
                    @alert_component(['msg'=>session('msg'), 'status'=>session('status')])
                    @endalert_component

                    <!-- Bolões Grid -->
                    <span id="portfolio">
                        <div class="row">
                            @can('list-user')
                            <!-- Permissão para listar usuários -->
                                <div style="cursor:pointer" onclick="window.location = '{{ route('users.index') }}'"  class="col-md-4 col-sm-6 portfolio-item">
                                    <a class="portfolio-link">
                                        <div class="portfolio-hover">
                                            <div class="portfolio-hover-content">
                                            <i class="fas fa-plus fa-3x"></i>
                                            </div>
                                        </div>
                                        <img class="img-fluid" src="{{ asset('img/portfolio/05-thumbnail.jpg') }}" alt="">
                                    </a>
                                    <div class="portfolio-caption">
                                        <h4>@lang('linguagem.list',['page'=>__('linguagem.user_list')])</h4>
                                        <p class="text-muted">{{ __('linguagem.create_or_edit') }}</p>
                                    </div>
                                </div>
                            @endcan
                            @can('acl')
                                <!-- Permissão para listar funções -->
                                <div style="cursor:pointer" onclick="window.location = '{{ route('roles.index') }}'"  class="col-md-4 col-sm-6 portfolio-item">
                                    <a class="portfolio-link">
                                        <div class="portfolio-hover">
                                            <div class="portfolio-hover-content">
                                            <i class="fas fa-plus fa-3x"></i>
                                            </div>
                                        </div>
                                        <img class="img-fluid" src="{{ asset('img/portfolio/03-thumbnail.jpg') }}" alt="">
                                    </a>
                                    <div class="portfolio-caption">
                                        <h4>@lang('linguagem.list',['page'=>__('linguagem.role_list')])</h4>
                                        <p class="text-muted">{{ __('linguagem.create_or_edit') }}</p>
                                    </div>
                                </div>
                            @endcan
                            @can('acl')
                                <!-- Permissão para listar permissões -->
                                <div style="cursor:pointer" onclick="window.location = '{{ route('permissions.index') }}'"  class="col-md-4 col-sm-6 portfolio-item">
                                    <a class="portfolio-link">
                                        <div class="portfolio-hover">
                                            <div class="portfolio-hover-content">
                                            <i class="fas fa-plus fa-3x"></i>
                                            </div>
                                        </div>
                                        <img class="img-fluid" src="{{ asset('img/portfolio/02-thumbnail.jpg') }}" alt="">
                                    </a>
                                    <div class="portfolio-caption">
                                        <h4>@lang('linguagem.list',['page'=>__('linguagem.permission_list')])</h4>
                                        <p class="text-muted">{{ __('linguagem.create_or_edit') }}</p>
                                    </div>
                                </div>
                            @endcan                            
                        </div>
                    </span>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
