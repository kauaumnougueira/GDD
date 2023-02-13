@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- a posição dos vetores é referente ao active do nav ( ideia minha :) ) -->
        @include('layouts.sidenav', ['index' => ['', '', 'active', '', '']])

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h1 class="h2">Membros</h1>

                @if(Auth::user()->cargo_id == $cargos[0]->id)
                <button class="btn btn-dark mr-auto mx-5" onclick="showEdit()">editar</button>
                @endif
            </div>
            <!-- view para todos -->
            <form action="{{ route('save-edit') }}" method="POST">
                @csrf
                <div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Cargo</th>
                                <th scope="col">Email</th>
                                <th scope="col">Entrada</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <div class="form-group">
                                    <td>
                                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                                        <select class="form-control" id="select" name="user_cargo" style="border:none; pointer-events: none">
                                            <option>{{ $cargos[$user->cargo_id - 1]->nome }}</option>
                                            @foreach($cargos as $cargo)
                                            @if($cargo->nome != $cargos[$user->cargo_id - 1]->nome)
                                            <option>{{ $cargo->nome }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </td>
                                </div>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->entrada_cel }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        <button class="btn btn-dark " id="salvar" style="display:none;" type="submit">Salvar</button>
                    </div>
                </div>
            </form>
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
<script>
    function showEdit() {
        let selects = document.getElementsByClassName("form-control")
        let Salvar = document.getElementById("salvar")

        //torna editável
        for (let i = 0; i < selects.length; i++) {
            if (selects[i].style.border === "none") {
                selects[i].style.border = ""
                selects[i].style.pointerEvents = ""
            } else {
                selects[i].style.border = "none"
                selects[i].style.pointerEvents = "none"
            }
        }

        if (salvar.style.display === "none") {
            salvar.style.display = ""
        } else {
            salvar.style.display = "none"
        }

    }
</script>
@endsection
