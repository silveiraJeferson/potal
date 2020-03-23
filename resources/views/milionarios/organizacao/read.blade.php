@extends('milionarios.read')

@section('milion')
<div class="row">
    <a href="/organizacao/create" class="btn btn-flat waves-effect waves-light btn"><i class="material-icons right">add</i></a>    
    <div class="btn btn-flat #ffcdd2 "><i class="material-icons">account_balance</i> Organizações</div>
</div>

@if(session('success'))
<div class="card center-align {{session('alert')}}">{{session('success')}}</div>
@endif
<div class="row">    
    <ul class="collapsible " data-collapsible="accordion">
        @foreach($organizacoes as $org)
        <li>
            <div class="collapsible-header">{{$org->nome}}<span class=" badge">{{$count[$org->id]}}</span></div>
            <div class="collapsible-body">
                <span>
                    <ul class="row">
                        @foreach($apostadores[$org->id] as $ap)
                        <li class="col s6 m4">{{$ap->nome}}</li>
                        @endforeach
                    </ul>
                </span>
                <div class="divider"></div>

                <form class=" right-align" method="post" action="/organizacao/{{$org->id}}">
                    @csrf
                    @method('DELETE')
                    <button  type="submit" class="btn-flat"><i class="material-icons right red-text">delete</i></button>    
                </form>
            </div>

        </li>       
        @endforeach
    </ul>
</div>
@endsection