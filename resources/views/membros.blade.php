@extends('layouts.app')

@section('content')
<div class="container-fluid">
      <div class="row">
        <!-- a posição dos vetores é referente ao active do nav ( ideia minha :) ) -->
        @include('layouts.sidenav', ['index' => ['', '', 'active', '', '']])

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Membros</h1>
          </div>
            <p>Membros aqui</p>
        </main>
      </div>


                    <!-- MENU do GDD -->
                    <!--
                        Visão Geral
                            tabela de tudo
                        Membros
                            Listar membros
                            caadastrar membros
                        Relatórios
                            listar relatórios
                            cadastrar relatórios
                        Backups - formatado
                           listar bakcups
                           fazer novo backup
                    -->


</div>
@endsection
