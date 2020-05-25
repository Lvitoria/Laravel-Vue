@extends('layouts.app')

@section('content')
<pagina tamanho="10">
    <painel titulo="Dashboard">
        <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>
        <div class="row">

            <div class="col-md-4" >
            <caixa qtd="150" icone="ion ion-pie-graph" cor="orange" titulo="Artigos" url="{{route('artigos.index')}}"></caixa>
            </div>
        
            <div class="col-md-4">
                {{-- <painel cor="panel-warning" titulo="conteudo 2">
                 opa, tudo bem?
                </painel> --}}
                <caixa qtd="150" icone="ion ion-person-stalker" cor="red" titulo="artigos" url="#"></caixa>
            </div>
      
            <div class="col-md-4">
                <caixa qtd="150" icone="ion ion-person" cor="info" titulo="artigos" url="#"></caixa>
            </div>
        </div>

    </painel>
</pagina>
@endsection
