@extends('layouts.app')
{{-- mostrar os valore que vieram da controller --}}
{{-- {{ dd($listaMigalhas) }} --}}
@section('content')
<pagina tamanho="12">
    <painel titulo="Lista de artigos">
    <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>
       <tabela-lista 
       v-bind:titulos="['#', 'Titulo', 'Descrição', 'Author']"
       v-bind:itens="[['1', 'PHP 00', 'Curso de PHP', 'Luquinhas'],['2', 'vue 00', 'Curso de VUE', 'Luquinhas']]"
       ordem="desc" ordemCol = "1" 
       criar="#criar" detalhe="#detalhe" editar="#editar" deletar="#deletar" token="7887522323"
       />
    </painel>
</pagina>
@endsection
